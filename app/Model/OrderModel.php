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
  *findOrder
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
    /*
    *findOrder
    *récupère les identifiants des commandes passées par l'utilisateur ainsi que des produits liés a cette commande
    */
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
    // Récupère les données des produits liés a une commande
   public function getProducts()
   {
      $orderproducts = $this->userOrderProducts();

      if(!empty($orderproducts)){
        foreach($orderproducts as $orderproduct){
          // $sql = "SELECT * FROM products WHERE id = ".$orderproduct['id_product'];
          $sql = "SELECT orders_products.id as order_product,
          orders_products.qt_product as quantity,
          orders_products.price_product as pricettc,
          orders.id as orders,
          orders.date_order as date_order,
          orders.ref as ref,
          products.id as product,
          products.product_name as product_name,
          products.slug as slug,
          products.price_ht as priceht
          FROM orders_products
          INNER JOIN products
          ON orders_products.id_product = products.id
          INNER JOIN orders
          ON orders_products.id_order = orders.id
          ORDER BY orders.date_order DESC";
          $sth = $this->dbh->prepare($sql);
          $sth->execute();
          return $sth->fetchAll();
        }
      }
   }
   //Récupère toutes les commandes dans la table orders
   public function findAllOrders()
   {
     $sql = "SELECT * FROM orders";
     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     return $sth->fetchAll();
   }
   //Récupère les données dans la table intermédiaire orders_products
   public function allOrdersProducts()
   {
     $orders = $this->findAllOrders();


     foreach($orders as $order){

       $sql = "SELECT * FROM orders_products WHERE id_order = ".$order['id'];
           $sth = $this->dbh->prepare($sql);
           $sth->execute();
           return $sth->fetchAll();
     }

   }
   //Récupère les commandes avec le status 'en_attente'
   public function waitingOrders()
   {
     $orderproducts = $this->userOrderProducts();

     if(!empty($orderproducts)){
       foreach($orderproducts as $orderproduct){
         // $sql = "SELECT * FROM products WHERE id = ".$orderproduct['id_product'];
         $sql = "SELECT orders_products.id as order_product,
         orders_products.qt_product as quantity,
         orders_products.price_product as pricettc,
         orders.id as orders,
         orders.date_order as date_order,
         orders.ref as ref,
         products.id as product,
         products.product_name as product_name,
         products.slug as slug,
         orders.status as status,
         products.price_ht as priceht
         FROM orders_products
         INNER JOIN products
         ON orders_products.id_product = products.id
         INNER JOIN orders
         ON orders_products.id_order = orders.id
         AND orders.status = 'en_attente'
         ORDER BY orders.date_order ASC";
         $sth = $this->dbh->prepare($sql);
         $sth->execute();
         return $sth->fetchAll();
       }
   }
 }
 //Récupère les commandes ayant le status valide
 public function validOrders()
 {
   $orderproducts = $this->userOrderProducts();

   if(!empty($orderproducts)){
     foreach($orderproducts as $orderproduct){
       $sql = "SELECT orders_products.id as order_product,
       orders_products.qt_product as quantity,
       orders_products.price_product as pricettc,
       orders.id as orders,
       orders.date_order as date_order,
       orders.ref as ref,
       products.id as product,
       products.product_name as product_name,
       products.slug as slug,
       orders.status as status,
       products.price_ht as priceht
       FROM orders_products
       INNER JOIN products
       ON orders_products.id_product = products.id
       INNER JOIN orders
       ON orders_products.id_order = orders.id
       AND orders.status = 'valide'
       ORDER BY orders.date_order ASC";
       $sth = $this->dbh->prepare($sql);
       $sth->execute();
       return $sth->fetchAll();
     }
 }
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

// ==================================================
// on affiche sur une page chaque commandes de l'utilisateur
// pour chaque commande on veut le nom des produits, leur quantité, le prix ht

}
