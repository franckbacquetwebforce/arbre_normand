<?php

namespace Controller;

use \Controller\AppController;
use \Model\OrderModel;
use \W\Security\AuthentificationModel;

class OrderAdminController extends AppController
{
  public function __construct()
  {


    $this->orders = new OrderModel();
    $this->authentification = new AuthentificationModel();

  }

  public function index()
  {
    $adminorders = $this->orders->indexOrders();
    $this->show('admin/orders/list', array(
      'adminorders' => $adminorders
    ));

  }
  // méthode permettant d'afficher les commande en attente de validation
  public function validatingOrders()
  {
    $orders = $this->orders->findAllWaitingOrders();



    $this->show('admin/orders/waitinglist', array(
                        'orders' => $orders
    ));
  }
  // méthode utilisant OrderModel permettant d'afficher les commande validées
  public function validOrders()
  {
    $orders = $this->orders->validOrders();
    // debug($products);
    // die();
    $this->show('admin/orders/valid', array(
                        'orders' => $orders
                      ));
  }

  public function single($id)
  {
    
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
