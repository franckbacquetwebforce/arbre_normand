<?php

namespace Controller;

use \Controller\AppController;
use \Model\UserAdressModel;
use \Model\UsersModel;
use \Security\AuthentificationModel;

class UserProfileController extends AppController
{
  public function __construct()
  {
    $this->model = new UsersModel();

    $this->address = new UserAdressModel();
  }

    public function monprofil($id)
    {

        $user = $this->model->findAll();
        $addresses = $this->address->getUserAdress($id);
        $this->show('user/profil/monprofile', array(
          'user' => $user,
          'adresses' => $addresses
        ));

    }


    // gestion des adresses

}
