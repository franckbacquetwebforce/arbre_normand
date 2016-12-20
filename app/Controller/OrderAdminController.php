<?php

namespace Controller;

use \Controller\AppController;

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
