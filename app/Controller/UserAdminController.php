<?php

namespace Controller;

use \Controller\AppController;
use \Model\UsersModel;



class UserAdminController extends AppController
{
  public function __construct()
  {
    $this->usersmodel = new UsersModel();
  }
  // listing en back-office des user
  public function index()
  {
    $list = $usersmodel->findAll();
    $this->show('user/admin/index', array(
      'users' => $users
    ));

  }


  public function new()
  {
    
  }

  public function newAction()
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
