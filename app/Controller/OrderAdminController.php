<?php

namespace Controller;

use \Controller\AppController;
use \Model\OrderModel;

class OrderAdminController extends AppController
{
  public function __construct()
  {


    $this->orders = new OrderModel();

  }

  public function index()
  {
    $adminorders -> $this->orders->findAll();
    $this->show('admin/orders/list', array(
      'adminorders' => $adminorders
    ));

  }
  // méthode permettant d'afficher les commande en attente de validation
  public function validatingOrders()
  {
    $products = $this->orders->waitingOrders();
    // debug($products);
    // die();
    $this->show('admin/orders/waitinglist', array(
                        'products' => $products
    ));
  }
  // méthode utilisant OrderModel permettant d'afficher les commande validées
  public function validOrders()
  {
    $products = $this->orders->validOrders();
    // debug($products);
    // die();
    $this->show('admin/orders/waitinglist', array(
                        'products' => $products
                      ));
  }

// ?
  public function addNew()
  {

  }
// ?
  public function addNewAction()
  {

  }


  public function update($id)
  {

  }

  public function updateAction($id)
  {

  }

  public function delete($id)
  {

  }

}
