<?php
// Hermelen en cours
namespace Controller;

use \Controller\AppController;

class ProductAdminController extends AppController
{

  // listing en back-office des user
  public function index()
  {
    $this->show('admin/product');
  }


  public function addNew()
  {
    $this->show('admin/product');
  }

  public function addNewAction()
  {

  }


  public function update($id)
  {

  }

  public function updateAction($id)
  {

  }

  public function deleteAction($id)
  {

  }

}
