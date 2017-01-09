<?php

namespace Controller;

use \Controller\AppController;
use \Controller\CartController;
use \Model\UsersModel;
use \Model\OrderModel;
use \Model\UserAdressModel;
use \W\Security\AuthentificationModel;
use \DateTime;

class OrderController extends AppController
{

 public function __construct()
 {
   $this->ordermodel = new OrderModel();
   $this->cart = new CartController();
   $this->date = new DateTime();
   $this->adresse = new UserAdressModel();
   $this->authentification = new AuthentificationModel();
 }

 // public function index()
 // {
 //
 //   $products = $this->ordermodel->getProducts();
 //   // debug($products);
 //   // die();
 //   $this->show('order/list', array(
 //                       'products' => $products
 //   ));
 // }
 /**
 *confirmOrder
 * Affiche le récapitulatif du panier pour la validation
 */
 public function confirmOrder()
 {
   $orders = $this->cart->infoProduitPanier();

   $this->show('order/confirmorder', array(
                   'orders' => $orders,
   ));
 }
 /**
 *confirmOrderAction
 * Insert dans les tables concernées les différentes inlformations sur la commande
 */
 public function confirmOrderAction()
 {
   $orders = $this->cart->infoProduitPanier();
   $success = false;
   $user = $this->authentification->getLoggedUser();
   if(empty($user)){
     $this->redirectToRoute('login');
   }
   $adress = $this->adresse->getAddress($user['id']);
   if(empty($adress)){
     $this->redirectToRoute('add_new_address');
   }

   $refe = $this->ordermodel->ref();

     $data1 = array(
       'date_order' => $this->date->format('Y-m-d  H:i:s'),
       'id_user' => $user['id'],
       'status' => 'en_attente',
       'ref' => $refe
     );

   $lastinsert = $this->ordermodel->insert($data1);
     foreach($orders as $order){
       $data2 = array(
         'id_order' => $lastinsert['id'],
         'id_product' => $order['product_id'],
         'qt_product' => $order['cart_qt'],
         'price_product' => $order['cart_price']
       );
       $this->ordermodel->insertCommandeProduits($data2);
     }
     // pour chaque produit dans la commande
     for($i = 0 ; $i<count($orders);$i++){
       // on récupère le produit

         $product =  $this->ordermodel->selectProduct($orders[$i]['product_id']);
         // debug($product);
         $cart_qt = (int) $orders[$i]['cart_qt'];
         $stock = (int) $product[0]['stock'];
         $newstock = 0;
         $newstock += $stock;
         $newstock -= $cart_qt;
         // $new_qt = $orders[$i]['cart_qt'];
         $this->ordermodel->updateProduct($newstock,$product[0]['id']);
     }
     $_SESSION['cart'] = array();
     unset($_SESSION['cart']);

     // Envoi des mails de confirmation de commande utilisateur et admin (Michèle)
     $app = getApp();
     $html = 'Nous avons bien pris en compte votre commande, un email de confirmation vous sera envoyé prochainement';
            //envoi du mail fonction PHPMailer
         $mail = new \PHPMailer;
      $mail->isMail();
      $mail->setFrom($app->getConfig('emailadmin'), $app->getConfig('site_name'));
      $mail->addAddress($user['email']);
      $mail->addAddress($app->getConfig('emailadmin'));
      $mail->Subject = 'Prise en compte de la commande de ' .$user['username'];
      $mail->Body    = $html;
             if(!$mail->send()){
                 echo "Le message n\'a pas été envoyé.";
         echo 'Erreur Mail: ' . $mail->ErrorInfo;
           } else {
         echo 'Le message a bien été envoyé';

       }
     $this->redirectToRoute('user_orders');

 }
}
