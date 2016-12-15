<?php
// Travail Michèle en cours
namespace Controller;

use \Controller\AppController;
use \Model\UsersModel;
use \Service\ValidationTools;
use \W\Security\AuthentificationModel;
use \W\Security\StringUtils;
use \W\Security\AuthorizationModel;
use \DateTime;

class UserController extends AppController
// Contrôleur pour la gestion des inscriptions, connexions utilisateurs
{
  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->validationTools = new ValidationTools();
    $this->dateTime = new DateTime();
    $this->authentificationModel = new AuthentificationModel();
  }
  /**
   * Inscription
   */
  public function register()
  { // Affichage du formulaire d'inscription
    $this->show('');
  }

  public function registerAction()
  {
    // Sécurisation Faille XSS
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));

    // Gestion des erreurs
    $errors['email'] = $validationTools->emailValid($email);
    if($userModel->emailExists($email)){
    $errors['email']	= "Ce mail existe déjà";
    $errors['password'] = $validationTools->textValid($password, 'password', 6, 15);
    $errors['password2'] = $validationTools->passwordsIdentique($password2,$password);

    if($validationTools->IsValid($errors)){ // Si pas d'erreurs, insertion en base de données
      $token = StringUtils::randomString(20); // Génération d'un token
      $password = $authentificationModel->hashPassword($password); // Hashage du password
      $data = array(
        'email' => $email,
        'password' => $password,
        'token' => $token,
        'created_at' => $date->format('Y-m-d  H:i:s'),
      );
      $user = $userModel->insert($data);
      $this->redirectToRoute('login'); // Redirection vers la page connexion
    } else {
      $this->show('Blog/inscription',array ( // sinon on affiche les erreurs dans le formulaire d'inscription
        'errors' => $errors,
      ));
    }
  }


  public function login()
  {

  }

  public function loginAction()
  {

  }

  // password forget

}
