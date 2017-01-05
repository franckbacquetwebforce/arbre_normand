<?php

namespace Model;

use \W\Model\Model;
use \W\Security\AuthentificationModel;
use \W\Model\ConnectionModel;
use \DateTime;


class OrderModel extends Model
{
  /**
   *Constructeur
   */
  public function __construct()
  {
    $this->setTable('orders');
    $this->dbh = ConnectionModel::getDbh();
    $this->authentification = new AuthentificationModel();
    $this->date = new DateTime();
  }
  /**
   *indexOrders
   *recupère toutes les commandes en db
   *@return un tableau multidimensionnel
   */
  public function indexOrders()
  {
    $sql = "SELECT orders_products.*,products.*,orders.*,users.username,users.email,users_adress.firstname,users_adress.lastname,users_adress.phone,users_adress.type,users_adress.city,users_adress.zip
    FROM orders_products
    LEFT JOIN orders ON orders_products.id_order = orders.id
    LEFT JOIN products ON products.id = orders_products.id_product
    LEFT JOIN users ON orders.id_user = users.id
    LEFT JOIN users_adress ON orders.id_user = users_adress.id_user AND users_adress.type = 'livraison'
    ORDER BY orders.date_order DESC
    ";



     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     $array = $sth->fetchAll();
  if(!empty($array)){
     foreach ($array as $key => $value) {
      //  tableau contenant les infos de chaque produit de chaque commande
       $newArray[$value['id_order']]['produits'][$value['id_product']] =[
              'id_product' => $value['id_product'],
              'slug' => $value['slug'],
              'product_name' => $value['product_name'],
              'description' => $value['description'],
              'price_ht' => $value['price_ht'],
              'width' => $value['width'],
              'height' => $value['height'],
              'length' => $value['length'],
              'weight' => $value['weight'],
              'stock' => $value['stock'],
              'id_category' => $value['id_category'],
              'qt_product' => $value['qt_product'],
              'price_product' => $value['price_product']
            ];
            // tableau contenant les information de l'utilisateur ayant passé la commande
        $newArray[$value['id_order']]['client'] =[
          'id_user' => $value['id_user'],
          'username' => $value['username'],
          'email' => $value['email'],
          'firstname' => $value['firstname'],
          'lastname' => $value['lastname'],
          'phone' => $value['phone'],
          'city' => $value['city'],
          'zip' => $value['zip'],
             ];
            //  tableaux contenant des informations nécessaires sur la commande
        $newArray[$value['id_order']]['ref'] = $value['ref'];
        $newArray[$value['id_order']]['date_order'] = $value['date_order'];
        $newArray[$value['id_order']]['status'] = $value['status'];


     }
   }

     return $newArray;
  }
// Single product
  public function singleOrder($id)
  {
    $sql = "SELECT orders_products.*,products.*,orders.*,users.username,users.email,users_adress.firstname,users_adress.lastname,users_adress.phone,users_adress.type,users_adress.city,users_adress.zip
    FROM orders_products
    LEFT JOIN orders ON orders_products.id_order = orders.id
    LEFT JOIN products ON products.id = orders_products.id_product
    LEFT JOIN users ON orders.id_user = users.id
    LEFT JOIN users_adress ON orders.id_user = users_adress.id_user AND users_adress.type = 'livraison'
    WHERE orders.id = $id
    ";



     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     $array = $sth->fetchAll();
  if(!empty($array)){
     foreach ($array as $key => $value) {
       $newArray[$value['id_order']]['produits'][$value['id_product']] =[
              'id_product' => $value['id_product'],
              'slug' => $value['slug'],
              'product_name' => $value['product_name'],
              'description' => $value['description'],
              'price_ht' => $value['price_ht'],
              'width' => $value['width'],
              'height' => $value['height'],
              'length' => $value['length'],
              'weight' => $value['weight'],
              'stock' => $value['stock'],
              'id_category' => $value['id_category'],
              'qt_product' => $value['qt_product'],
              'price_product' => $value['price_product']
            ];
        $newArray[$value['id_order']]['client'] =[
          'id_user' => $value['id_user'],
          'username' => $value['username'],
          'email' => $value['email'],
          'firstname' => $value['firstname'],
          'lastname' => $value['lastname'],
          'phone' => $value['phone'],
          'city' => $value['city'],
          'zip' => $value['zip'],
             ];

        $newArray[$value['id_order']]['ref'] = $value['ref'];
        $newArray[$value['id_order']]['date_order'] = $value['date_order'];
        $newArray[$value['id_order']]['status'] = $value['status'];


     }
   }

     return $newArray;
  }
  /**
   *showCartProducts
   *montre les produits dans le panier
   */
  public function showCartProducts()
  {
      $carts = $_SESSION['cart'];
      debug($carts);


      for($i = 0; $i<count($carts['id_product']);$i++) {
        $sql = "SELECT product_name as name, id as product FROM products WHERE id = ". $carts['id_product'][$i];
          $sth = $this->dbh->prepare($sql);
          // $sth->bindValue(':id', $id_product);
          $sth->execute();
          return $sth->fetchAll();

      }
  }

  /**
  * Ajoute une ligne
  * @param array $data Un tableau associatif de valeurs à insérer
  * @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
  * @return mixed false si erreur, les données insérées mise à jour sinon
  */
  //  passer une commande :
  public function insertCommandeProduits(array $data, $stripTags = true)
  {


  		$colNames = array_keys($data);
  		$colNamesEscapes = $this->escapeKeys($colNames);
  		$colNamesString = implode(', ', $colNamesEscapes);

  		$sql = 'INSERT INTO orders_products (' . $colNamesString . ') VALUES (';
  		foreach($data as $key => $value){
  			$sql .= ":$key, ";
  		}
  		// Supprime les caractères superflus en fin de requète
  		$sql = substr($sql, 0, -2);
  		$sql .= ')';

  		$sth = $this->dbh->prepare($sql);
  		foreach($data as $key => $value){
  			$value = ($stripTags) ? strip_tags($value) : $value;
  			$sth->bindValue(':'.$key, $value);
  		}

  		if (!$sth->execute()){
  			return false;
  		}
  		return $this->find($this->lastInsertId());
  	}





  /*
  *findUserOrders
  *récupère les commandes de l'utilisateur connecté
  */
    public function findUserOrders()
    {

      $user = $this->authentification->getLoggedUser();

      $sql = "SELECT * FROM ".$this->table." WHERE id_user = :id_user ORDER BY date_order DESC";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id_user', $user['id']);
        $sth->execute();
      return $sth->fetchAll();
    }
    public function findWaitingOrders()
    {
      $sql = "SELECT * FROM $this->table WHERE status = 'en_attente'";
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      return $sth->fetchAll();
    }
    public function waitingOrdersProducts()
    {
      $orders = $this->findWaitingOrders();
      for($i=0; $i<count($orders); $i++){
        $sql = "SELECT * FROM orders_products WHERE id_order = ".$orders[$i]['id'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
      }
    }

    public function userOrderProducts()
    {
      $orders = $this->findUserOrders();


      foreach($orders as $order){

        $sql = "SELECT * FROM orders_products WHERE id_order = ".$order['id'];
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            return $sth->fetchAll();
      }


    }

 public function findAllWaitingOrders()
 {

  $sql = "SELECT orders_products.*,products.*,orders.*,users.username,users.email FROM orders_products

  LEFT JOIN orders ON orders_products.id_order = orders.id
  LEFT JOIN products ON products.id = orders_products.id_product
  LEFT JOIN users ON orders.id_user = users.id
  WHERE orders.status = 'en_attente'
  ";



   $sth = $this->dbh->prepare($sql);
   $sth->execute();
   $array = $sth->fetchAll();
if(!empty($array)){
   foreach ($array as $key => $value) {
     $newArray[$value['id_order']]['produits'][$value['id_product']] =[
            'id_product' => $value['id_product'],
            'slug' => $value['slug'],
            'product_name' => $value['product_name'],
            'description' => $value['description'],
            'price_ht' => $value['price_ht'],
            'width' => $value['width'],
            'height' => $value['height'],
            'length' => $value['length'],
            'weight' => $value['weight'],
            'stock' => $value['stock'],
            'id_category' => $value['id_category'],
            'qt_product' => $value['qt_product'],
            'price_product' => $value['price_product']
          ];
        $newArray[$value['id_order']]['date_order'] = $value['date_order'];
        $newArray[$value['id_order']]['status'] = $value['status'];
        $newArray[$value['id_order']]['id_user'] = $value['id_user'];
        $newArray[$value['id_order']]['username'] = $value['username'];
        $newArray[$value['id_order']]['email'] = $value['email'];



   }
 }

   return $newArray;
 }



 public function validOrders()
 {
   $sql = "SELECT orders_products.*,products.*,orders.*,users.username,users.email FROM orders_products

   LEFT JOIN orders ON orders_products.id_order = orders.id
   LEFT JOIN products ON products.id = orders_products.id_product
   LEFT JOIN users ON orders.id_user = users.id
   WHERE orders.status = 'valide'
   ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $array = $sth->fetchAll();
 if(!empty($array)){

    foreach ($array as $key => $value) {
      $newArray[$value['id_order']]['produits'][$value['id_product']] =[
             'id_product' => $value['id_product'],
             'slug' => $value['slug'],
             'product_name' => $value['product_name'],
             'description' => $value['description'],
             'price_ht' => $value['price_ht'],
             'width' => $value['width'],
             'height' => $value['height'],
             'length' => $value['length'],
             'weight' => $value['weight'],
             'stock' => $value['stock'],
             'id_category' => $value['id_category'],
             'qt_product' => $value['qt_product'],
             'price_product' => $value['price_product']
           ];
           $newArray[$value['id_order']]['date_order'] = $value['date_order'];
         $newArray[$value['id_order']]['status'] = $value['status'];
         $newArray[$value['id_order']]['id_user'] = $value['id_user'];
         $newArray[$value['id_order']]['username'] = $value['username'];
         $newArray[$value['id_order']]['email'] = $value['email'];

    }
  }
    return $newArray;
 }
 public function userOrders($id)
 {


   $sql = "SELECT orders_products.*,products.*,orders.*,users.username,users.email FROM orders_products

   LEFT JOIN orders ON orders_products.id_order = orders.id
   LEFT JOIN products ON products.id = orders_products.id_product
   LEFT JOIN users ON orders.id_user = users.id
   WHERE orders.id_user = $id
   ";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $array = $sth->fetchAll();
 if(!empty($array)){

    foreach ($array as $key => $value) {
      $newArray[$value['id_order']]['produits'][$value['id_product']] =[
             'id_product' => $value['id_product'],
             'slug' => $value['slug'],
             'product_name' => $value['product_name'],
             'description' => $value['description'],
             'price_ht' => $value['price_ht'],
             'width' => $value['width'],
             'height' => $value['height'],
             'length' => $value['length'],
             'weight' => $value['weight'],
             'stock' => $value['stock'],
             'id_category' => $value['id_category'],
             'qt_product' => $value['qt_product'],
             'price_product' => $value['price_product']

           ];

           $newArray[$value['id_order']]['date_order'] = $value['date_order'];
           $newArray[$value['id_order']]['ref'] = $value['ref'];
         $newArray[$value['id_order']]['status'] = $value['status'];
         $newArray[$value['id_order']]['id_user'] = $value['id_user'];
         $newArray[$value['id_order']]['username'] = $value['username'];
         $newArray[$value['id_order']]['email'] = $value['email'];

      //  $newArray[$value['id_order']]['date_order'] = $value['date_order'];
      //  $newArray[$value['id_order']]['ref'] = $value['ref'];
      //  $newArray[$value['id_order']]['status'] = $value['status'];
      //  $newArray[$value['id_order']]['id_user'] = $value['id_user'];
      //  $newArray[$value['id_order']]['username'] = $value['username'];
      //  $newArray[$value['id_order']]['email'] = $value['email'];


    }
  }
    return $newArray;
 }

 /*
 * selectProduct
 * @param  int $id identifiant d'un produit
 * return les donnée du produit
 */
 public function selectProduct($id)
 {
   $sql = "SELECT * FROM products WHERE id = $id";
   $sth = $this->dbh->prepare($sql);

   $sth->execute();
   return $sth->fetchAll();
 }

 public function updateProduct($data, $id, $stripTags = true )
 {
   $sql = "UPDATE products SET stock = :stock WHERE id = :id";
   $sth = $this->dbh->prepare($sql);
   $sth->bindValue(':id', $id);
   $sth->bindValue(':stock', $data);
   $sth->execute();
 }
 public function selectRef($ref)
 {
   $sql = "SELECT * FROM orders WHERE ref = :ref";
   $sth = $this->dbh->prepare($sql);
   $sth->bindValue(':ref', $ref);
   $sth->execute();
   return $sth->fetch();

 }


  //  Compte le nombre total de commandes
   public function countOrders()
   {
     $sql = "SELECT COUNT(*) From orders";
     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     return $sth->fetchColumn();
   }
   private function escapeKeys($datas)
 	{
 		return array_map(function($val){
 			return '`'.$val.'`';
 		}, $datas);
 	}
  public function ref()
  {
    $a =1;
    while ($a > 0) {

      $reference = uniqid();
      $sql = "SELECT COUNT(*) FROM orders WHERE ref = :ref";
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':ref',$reference);
      $sth->execute();
      $a = $sth->fetchColumn();
    }
    return $reference;
  }

// ==================================================
// on affiche sur une page chaque commandes de l'utilisateur
// pour chaque commande on veut le nom des produits, leur quantité, le prix ht

}
