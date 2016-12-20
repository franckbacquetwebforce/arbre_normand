<?php

namespace Model;

use \W\Model\Model;
use \W\Security\AuthentificationModel;
use \W\Model\ConnectionModel;


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
  }

  //  passer une commande :
  public function insertCommande()
  {
    // $sql = 'INSERT INTO orders_products'

  }


  /*
  *findOrder
  *récupère les commandes de l'utilisateur connecté
  */
    public function findOrders()
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
    public function orderProducts()
    {
      $orders = $this->findOrders();


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
      $orderproducts = $this->orderProducts();

      if(!empty($orderproducts)){
        foreach($orderproducts as $orderproduct){
          // $sql = "SELECT * FROM products WHERE id = ".$orderproduct['id_product'];
          $sql = "SELECT * 
          FROM orders_products
          INNER JOIN products
          ON orders_products.id_product = products.id
          INNER JOIN orders
          ON orders_products.id_order = orders.id";
          $sth = $this->dbh->prepare($sql);
          $sth->execute();
          return $sth->fetchAll();
        }
      }
   }

// ==================================================
// on affiche sur une page chaque commandes de l'utilisateur
// pour chaque commande on veut le nom des produits, leur quantité, le prix ht

}
