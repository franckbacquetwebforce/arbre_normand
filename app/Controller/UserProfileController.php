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

    public function monprofil()
    {

        $user = $this->model->findAll();
        $addresses = $this->address->getUserAdress();
        $this->show('user/profil/monprofile', array(
          'user' => $user,
          'addresses' => $addresses
        ));

    }

    public function addAddress()
    {
        $this->show('user/profil/address/newaddress');
    }


    // gestion des adresses

}
