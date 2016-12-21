<?php

namespace Controller;

use \Controller\AppController;
use \Model\UsersModel;
use \Model\OrderModel;
use \Model\ProductsModel;
use \Service\ValidationTools;
use \W\Security\StringUtils;
use \W\Security\AuthentificationModel;
use \DateTime;



class UserAdminController extends AppController
{
  public function __construct()
  {
    $this->orders = new OrderModel();
    $this->model = new UsersModel();
    $this->productmodel = new ProductsModel();
    $this->valid = new ValidationTools();
    $this->authentification = new AuthentificationModel();
    $this->date = new DateTime();
  }
  // listing en back-office des user
  public function index()
  {
    // Fonction de Model qui permet
    $users = $this->model->findAll();
    $this->show('admin/user/list', array(
      'users' => $users
    ));

  }
  /*addNewAction
  *montre le formulaire de création d'un nouveau compte admin
  */
  public function addNew()
  {
    $this->show('admin/adminnew/admin_inscription');
  }
/*addNewAction
*ajout d'un nouveau compte admin  (redirection a modifier)
*
*/
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
						'created_at' => $this->date->format('Y-m-d H:i:s'),
            'role' => 'admin'
					);
					$this->model->insert($data);
					$this->redirectToRoute('admin_user_new_action');
		} else {
			$this->show('admin/adminnew/admin_inscription', array(
				'errors' => $errors
			));

		}
	}



  public function update($id)
  {
    $this->show('admin/adminupdate/adminupdate');
  }

  public function updateAction($id)
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

    // Vérifie si les 2 mots de passe sont identiques
    $errors['password'] = $this->valid->correspondancePassword($password,$password2);
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
            'modified_at' => $this->date->format('Y-m-d H:i:s'),
            'role' => 'admin'
          );
          $this->model->update($data,$id);

          $this->redirectToRoute('default_home');
    } else {
      $this->show('admin/adminupdate/adminupdate', array(
        'errors' => $errors
      ));

    }
  }

  public function delete($id)
  {
    if(!empty($id)){
      $this->model->delete($id);
    }
  }
  public function statistics()
  {
    //////////////////////////////////////////////
    // Compte de nombre de visiteurs sur le site(possibilité de séparer les utilisateurs connectés des visiteurs anonymes plus tard si nécessaire)
    //////////////////////////////////////////////

    if(file_exists('compteur_visites.txt'))
    {
            $compteur_f = fopen('compteur_visites.txt', 'r+');
            $compte = fgets($compteur_f);
    }
    else
    {
            $compteur_f = fopen('compteur_visites.txt', 'a+');
            $compte = 0;
    }
    if(!isset($_SESSION['compteur_de_visite']))
    {
            $_SESSION['compteur_de_visite'] = 'visite';
            $compte++;
            fseek($compteur_f, 0);
            fputs($compteur_f, $compte);
    }
    fclose($compteur_f);
    //////////////////////////////////////////////


    // Utilise UsersModel pour compter le nombre d'utilisateurs inscrits
    $inscriptions = $this->model->countInscriptions();

    //Utilise OrderModel pour compter le nombre total de commandes
    $orders = $this->orders->countOrders();
    //Utilise OrdersModel pour lister les produits et leur stock
    $stocks = $this->productmodel->showStock();

    // Affiche les statistiques du site dans le dashboard
    $this->show('admin/dashboard',array(
                    'stocks' => $stocks,
                    'orders' => $orders,
                    'compte' => $compte,
                    'inscriptions' => $inscriptions
    ));

  }

}
