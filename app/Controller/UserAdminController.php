<?php

namespace Controller;

use \Controller\AppController;
use \Model\UsersModel;
use \Service\ValidationTools;
use \W\Security\StringUtils;
use \W\Security\AuthentificationModel;
use \DateTime;



class UserAdminController extends AppController
{
  public function __construct()
  {
    $this->model = new UsersModel();
    $this->valid = new ValidationTools();
    $this->authentification = new AuthentificationModel();
    $this->date = new DateTime();
  }
  // listing en back-office des user
  public function index()
  {
    $list = $usersmodel->findAll();
    $this->show('admin/index', array(
      'users' => $users
    ));

  }


  public function addNew()
  {
    $this->show('admin/user/admin_inscription');
  }

  public function addNewAction()
  {
    $errors = [];
		// protection
		$email = trim(strip_tags($_POST['email']));
		$password = trim(strip_tags($_POST['password']));
		$password2 = trim(strip_tags($_POST['password2']));

		// Référencement des erreurs
		$errors['email'] = $this->valid->emailValid($email);
		$errors['password'] = $this->valid->textValid($password,'password');
		$errors['password2'] = $this->valid->textValid($password2,'password');

    die(print_r($errors));
		// Vérifie si les 2 mots de passe sont identiques
		$errors['password'] = $this->valid->correspondancePassword($password,$password2);
		// création d'un token
		$token = StringUtils::randomString();
		// hachage du mot de passe
		$hashpassword = $this->authentification->hashPassword($password);
		// Vérifie si l'email existe déjà dans la base de données

		$mailExist = $this->model->emailExists($email);
		if(!empty($mailExist)){
			$errors['email'] = 'Cet email est déjà utilisé';
		}

		if($this->valid->isValid($errors)){
					$data = array(
						'email' => $email,
						'password' => $hashpassword,
						'token' => $token,
						'created_at' => $this->date->format('Y-m-d H:i:s')
					);
					$this->model->insert($data);
					$this->redirectToRoute('blog_articles');
		} else {
			$this->show('admin/user/admin_inscription', array(
				'errors' => $errors
			));

		}
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
