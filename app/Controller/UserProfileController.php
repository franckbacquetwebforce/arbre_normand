<?php

namespace Controller;

use \Controller\AppController;
use \Model\UserAdressModel;
use \Model\UsersModel;
use \Model\OrderModel;
use \W\Security\AuthentificationModel;
use \Service\ValidationTools;

class UserProfileController extends AppController
{
  public function __construct()
  {
    $this->model = new UsersModel();
    $this->ordermodel = new OrderModel();
    $this->authentification = new AuthentificationModel();
    $this->valid = new ValidationTools();
    $this->address = new UserAdressModel();

  }
  /**
  *monProfil
  *affiche les données du compte de l'utilisateur
  *@param int $id l'identifiant de l'utilisateur
  *@return array
  */
  public function monprofil($id)
  {
      // Fonction de Model/Model qui récupère une ligne de la table en fonction de l'identifiant
      $user = $this->model->find($id);
      $addresses = $this->address->getUserAdress();
      $this->show('user/profil/monprofile', array(
        'user' => $user,
        'addresses' => $addresses
      ));
  }
  /**
  *mesCommandes
  *affiche les commandes du compte de l'utilisateur
  *@return array
  */
  public function mesCommandes()
  {
    $user = $this->authentification->getLoggedUser();

    $orders = $this->ordermodel->userOrders($user['id']);

    $this->show('user/userorder/userorder', array(
      'orders' => $orders
    ));
  }
  /*
  *addAddress
  *Affiche le formulaire pour ajouter une nouvelle adresse
  */
  public function addAddress()
  {
      $this->show('user/profil/address/newaddress');
  }
  /*
  *addAddressAction
  *méthode qui permet d'ajouter une nouvelle adresse en base de données
  */
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
    // Fonction de Services/ValidationTools qui vérifie si la chaine de caracteres est entrée correctement
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


    // Fonction de Service/validationTools qui vérifie qu'il n'y a pas d'erreurs
    if($this->valid->isValid($errors)){
      $user = $this->authentification->getLoggedUser();
          // Fonction de Model/UserAdressModel qui permet d'inserer une nouvelle adresse en bdd
          $this->address->addUserAdress($lastname,$firstname,$phone,$adresse,$city,$zip,$country,$type);
          $this->redirectToRoute('user_profile_monprofil',['id' => $user['id']]);
    } else {
      $this->show('user/profil/address/newaddress', array(
        'errors' => $errors
      ));

    }
  }



}
