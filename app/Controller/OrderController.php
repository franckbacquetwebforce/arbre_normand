<?php

namespace Controller;

use \Controller\AppController;
use \Controller\CartController;
use \Model\OrderModel;
use \W\Security\AuthentificationModel;
use \DateTime;

class OrderController extends AppController
{

  public function __construct()
  {
    $this->ordermodel = new OrderModel();
    $this->cart = new CartController();
    $this->date = new DateTime();
    $this->authentification = new AuthentificationModel();
  }

  public function index()
  {

    $products = $this->ordermodel->getProducts();
    // debug($products);
    // die();
    $this->show('order/list', array(
                        'products' => $products
    ));
  }
  public function confirmOrder()
  {
    $orders = $this->cart->infoProduitPanier();

    $this->show('order/confirmorder', array(
                    'orders' => $orders,
    ));
  }
  public function confirmOrderAction()
  {
    $last = $this->ordermodel->lastInsertId();
    die($last);
    $orders = $this->cart->infoProduitPanier();

    $user = $this->authentification->getLoggedUser();
    if(empty($user)){
      $this->redirectToRoute('login');
    }else{
      $data1 = array(
        'date_order' => $this->date->format('Y-m-d  H:i:s'),
        'id_user' => $user['id'],
        'status' => 'en_attente'
      );

      $this->ordermodel->insert($data1);



      foreach($orders as $order){
        $data2 = array(
          'id_order' => $last,
          'id_product' => $order['product_id'],
          'qt_product' => $order['cart_qt'],
          'price_product' => $order['cart_price']
        );
        $this->ordermodel->insertCommandeProduits($data2);
      }

    }
  }


}
