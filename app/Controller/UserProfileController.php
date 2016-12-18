<?php

namespace Controller;

use \Controller\AppController;
use \Model\UserAdressModel;
use \Model\UsersModel;
use \Security\AuthentificationModel;
use \Service\ValidationTools;

class UserProfileController extends AppController
{
  public function __construct()
  {
    $this->model = new UsersModel();
    $this->valid = new ValidationTools();
    $this->address = new UserAdressModel();
  }

  public function monprofil($id)
  {

      $user = $this->model->find($id);
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
  public function addAddressAction()
  {
    $errors = [];
    // protection
    $lastname = trim(strip_tags($_POST['lastname']));
    $firstname = trim(strip_tags($_POST['firstname']));
    $phone = trim(strip_tags($_POST['phone']));
    $adresse = trim(strip_tags($_POST['address']));
    $city = trim(strip_tags($_POST['city']));
    $zip = trim(strip_tags($_POST['zip']));
    $country = trim(strip_tags($_POST['country']));
    $type = trim(strip_tags($_POST['type']));

    // Référencement des erreurs
    $errors['firstname'] = $this->valid->textValid($firstname,'prenom');
    $errors['lastname'] = $this->valid->textValid($lastname,'nom');
    $errors['phone'] = $this->valid->textValid($phone,'telephone');
    $errors['address'] = $this->valid->textValid($adresse,'adresse',3,150);
    $errors['city'] = $this->valid->textValid($city,'ville',3,125);
    $errors['zip'] = $this->valid->textValid($zip,'code postal');
    $errors['country'] = $this->valid->textValid($country,'Pays');
    if(!$type){
      $errors['type'] = 'Vous n\'avez pas sélectionné de pays';

    }



    if($this->valid->isValid($errors)){

          $this->address->addUserAdress($lastname,$firstname,$phone,$adresse,$city,$zip,$country,$type);
          die('bad');
          // $this->redirectToRoute('user_profile_monprofil',['id' => $w_user['id']]);
    } else {
      $this->show('add_new_address', array(
        'errors' => $errors
      ));

    }
  }

  // gestion des adresses

}
