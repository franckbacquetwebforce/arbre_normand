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
    $this->userModel = new UsersModel();
    $this->validError = new ValidationTools();
    $this->dateTimeModel = new DateTime();
    $this->authentificationModel = new AuthentificationModel();
  }
  /**
   * Inscription
   */
  public function register()
  { // Affichage du formulaire d'inscription
    $this->show('user/inscription');
  }

  public function registerAction()
  {
    // Sécurisation Faille XSS
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));

    // Gestion des erreurs
    if(!empty($email)){
      $errors['email'] = $this->validError->emailValid($email);
      if($this->userModel->emailExists($email)){
        $errors['email']	= "Ce mail existe déjà";
      }
    } else {
      $errors['email'] = "Vous n'avez pas rempli ce champ";
    }
    // $validError = new ValidationTools();
    $errors['password'] = $this->validError->textValid($password, 'password', 6, 15);
		if(empty($errors['password'])) {
			$errors['password2'] = $this->validError->passwordsIdentique($password2,$password);
		}


    if($this->validError->IsValid($errors)){ // Si pas d'erreurs, insertion en base de données
    $token = StringUtils::randomString(20); // Génération d'un token
    $hashpassword = $this->authentificationModel->hashPassword($password); // Hashage du password
    $data = array(
      'email' => $email,
      'password' => $hashpassword,
      'token' => $token,
      'created_at' => $this->dateTimeModel->format('Y-m-d  H:i:s'),
    );
    $user = $this->userModel->insert($data);
    $this->redirectToRoute('login'); // Redirection vers la page connexion
    } else {
      $this->show('user/inscription',array ( // sinon on affiche les erreurs dans le formulaire d'inscription
        'errors' => $errors,
      ));
    }
  }
  public function login()
  {
    $this->show('user/login');
  }

  public function loginAction()
  {
 		$email = trim(strip_tags($_POST['email']));
 		$password = trim(strip_tags($_POST['password']));
 		$user = $this->userModel->getUserByEmail($email);
 		if(!empty($user)){
	 		if($this->authentificationModel->isValidLoginInfo($email, $password)!=0){
	 		$this->authentificationModel->logUserIn($user);
	 		$this->redirectToRoute('default_home');
	 		}else{
	 			$errors['password'] = "Le mot de passe est incorrect";
	 			$this->show('user/login',array (
	 				'errors' => $errors,
	 			));
	 		}
 		}else{
 			$errors['email'] = "Identifiant introuvable";
 			$this->show('user/login',array (
 				'errors' => $errors,
 			));
 		}
  }
}




  // password forget
