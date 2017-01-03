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

// Contrôleur pour la gestion des inscriptions, connexions utilisateurs
class UserController extends AppController // le CSS ne fonctionne pas
{
  public function __construct()
  { // instanciation de chaque Model utilisé
    $this->userModel = new UsersModel();
    $this->validError = new ValidationTools();
    $this->dateTimeModel = new DateTime();
    $this->authentificationModel = new AuthentificationModel();
  }
  /**
  *============================================================================
  * INSCRIPTION
  *============================================================================
  */
  // Affichage du formulaire d'inscription
  public function register()
  {
    $this->show('user/inscription');
  }
  // Insertion en BDD des données du formulaire d'inscription
  public function registerAction()
  {
    // Sécurisation Faille XSS des données envoyées par l'utilisateur
    $username = trim(strip_tags($_POST['username']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));

    // Gestion des erreurs username
    $errors['username'] = $this->validError->textValid($username, 'username',  3, 20);
    if($this->userModel->usernameExists($username)){
		$errors['username']	= "Ce nom existe déjà";
		}
    // Gestion des erreurs email
    if(!empty($email)){
      // Fonction de Service/ValidationTools qui vérifie la validité de l'email saisi
      $errors['email'] = $this->validError->emailValid($email);
      // Fonction de W/Model/UsersModel qui vérifie si l'email existe en BDD
      if($this->userModel->emailExists($email)){
        $errors['email']	= "Ce mail existe déjà";
      }
    } else {
      $errors['email'] = "Vous n'avez pas rempli ce champ";
    }

    // Gestion des erreurs passwords
    // Fonction de Service/ValidationTools qui vérifie la validité du texte saisi
    $errors['password'] = $this->validError->textValid($password, 'password', 6, 15);
		if(empty($errors['password'])) {
      // Fonction de Service/ValidationTools qui vérifie la correspondance des passwords saisis
			$errors['password2'] = $this->validError->correspondancePassword($password2,$password);
		}
    // Insertion en base de données
    // Fonction de Service/ValidationTools qui vérifie s'il n'y a pas d'erreurs
    if($this->validError->IsValid($errors)){
    // Génération d'un token avec la fonction de W/Security/StringUtils
    $token = StringUtils::randomString(20);
    // Hashage du password avec la fonction de W/Security/AuthentificationModel
    $hashpassword = $this->authentificationModel->hashPassword($password);
    // Déclaration d'un array $data qui contient les champs/valeurs à insérer dans la BDD
    $data = array(
      'username' => $username,
      'email' => $email,
      'password' => $hashpassword,
      'token' => $token,
      'created_at' => $this->dateTimeModel->format('Y-m-d  H:i:s'), // Fonction propre à POO qui met la date au format SQL
    );
    // Fonction de W/Model/Model qui insère les données en BDD
    $user = $this->userModel->insert($data);
    // Fonction de W/Controller/Controller qui redirige vers une URL (nom de la route de la page connexion ici)
    $this->redirectToRoute('login');
    } else {
      // Fonction de W/Controller/Controller qui affiche un template (formulaire d'inscription ici avec affichage des erreurs)
      $this->show('user/inscription',array (
        'errors' => $errors,
      ));
    }
  }
  /**
  *============================================================================
  * CONNEXION
  *============================================================================
  */
  public function login()
  { // Affichage du formulaire de Connexion
    $this->show('user/login');
  }
  // Ouverture de session utilisateur
  public function loginAction()
  { // Sécurisation Faille XSS des données envoyées par l'utilisateur
    $login = trim(strip_tags($_POST['login']));
 		$password = trim(strip_tags($_POST['password']));
    // Fonction de W/Model/UsersModel qui permet de récupérer un utilisateur en fonction de son email ou de son pseudo
 		$user = $this->userModel->getUserByUsernameOrEmail($login);
    // si un utilisateur est trouvé
 		if(!empty($user)){
      // Fonction de W/Security/AuthentificationModel qui vérifie qu'une combinaison d'email et mot de passe (en clair) sont présents en bdd et valides
	 		if($this->authentificationModel->isValidLoginInfo($login, $password)!=0){
      // Fonction de W/Security/AuthentificationModel qui ouvre une session utilisateur
	 		$this->authentificationModel->logUserIn($user);
      // Fonction de W/Controller/Controller qui redirige vers une URL (nom de la route de la page home ici)
	 		$this->redirectToRoute('default_home');
	 		}else{
        // Affichage de l'erreur de non correspondance de l'email et du password
	 			$errors['password'] = "Le mot de passe est incorrect";
        // Affichage du template formulaire de connexion avec affichage des erreurs
	 			$this->show('user/login',array (
	 				'errors' => $errors,
	 			));
	 		}
 		}else{
      // Affichage de l'erreur qui ne trouve pas d'utilisateur correspondant à l'email fourni
 			$errors['login'] = "Identifiant introuvable";
      // Affichage du template Formulaire de connexion aves les erreurs
 			$this->show('user/login',array (
 				'errors' => $errors,
 			));
 		}
  }
  /**
  *============================================================================
  * DECONNEXION
  *============================================================================
  */
  public function logoutAction()
	{ // Fonction de W/Security/AuthentificationModel qui ferme une session utilisateur
		$this->authentificationModel->logUserOut();
    // Redirection vers la page d'accueil
		$this->redirectToRoute('default_home');
	}
  /**
  *============================================================================
  * PASSWORD OUBLIE
  *============================================================================
  */
  public function forgetPassword()
  { // Affichage du formulaire de mot de passe oublié
    $this->show('user/forgetpassword');
  }
  public function forgetPasswordAction()
  {
    $app = getApp(); // Retourne l'instance de l'application depuis l'espace global
		$errors = array();
		$email = trim(strip_tags($_POST['email']));
    $urlbase = $app->getConfig('url_base'); // Fonction de W/Views/App qui récupère la base de l'url definit dans config.php
    $user = $this->userModel->getUserByUsernameOrEmail($email);
		if(!empty($user)){
			$urlLink = $this->generateUrl('modifpassword');
			$emailurl = urlencode($email);
      $html = '';
      $html .= 'Veuillez cliquer sur le lien ci-dessous pour modifier votre mot de passe<br><a href="' . $urlbase . $urlLink .'?email=' . $emailurl .'&token=' . $user['token'] . '">Modifier le mot de passe</a>';
			//envoi du mail fonction PHPMailer
  		$mail = new \PHPMailer;
       $mail->isMail();
       $mail->setFrom('mragot2@msn.com');
       $mail->addAddress($email);
       $mail->Subject = 'Reinitialisation du mot de passe';
       $mail->Body    = $html;
  			if(!$mail->send()){
  				echo "Le message n\'a pas été envoyé.";
          echo 'Erreur Mail: ' . $mail->ErrorInfo;
    		} else {
          echo 'Le message a bien été envoyé';
        }

  	} else {
			$errors['email']	= "Ce mail n'existe pas";
			$this->show('user/forgetpassword',array (
				'errors' => $errors,
			));
    }
  }
  /**
  *============================================================================
  * MODIFICATION DU PASSWORD
  *============================================================================
  */
  public function modifPassword()
  { // Affichage du formulaire d'inscription avec vérification ??? flou pour Michèle
    $form = false;
    if(!empty($_GET['email']) && !empty($_GET['token'])){
      $this->show('user/modifpassword', array('form' => $form));
      $form = true;
    } else {
      $this->redirectToRoute('default_home');
    }
  }
  // public function modifPasswordAction()
  //   {
  //       $getted_email  = urldecode($_GET['email']);
  //       $getted_token  = $_GET['token'];
  //       // die();
  //       $postpassword  = trim(strip_tags($_POST['password']));
  //       $postpassword2 = trim(strip_tags($_POST['password2']));
  //
  //       // $getUserData = new UsersModel();
  //       $userData = $this->userModel->getUserByUsernameOrEmail($getted_email);
  //       // echo $getted_email;
  //       // print_r($userData);
  //       // die();
  //       // $validation = new ValidationTool();
  //       $error = "";
  //       $error['password'] = $this->validError->textValid($password,'password', 6, 15);
  //       $error['password2'] = $validation->confirmPass($postpassword, $postpassword2, 'password', 3, 50);
  //
  //    if($validation->IsValid($errors)) {
  //      // ici faire un insert
  //               $random = new StringUtils;
  //               $generatedToken = $random->randomString();
  //
  //               $cript= new authentificationModel;
  //               $criptedPass = $cript->hashPassword($postpassword);
  //
  //      $data = array(
  //        'password'=>$criptedPass,
  //        'role'    =>'user',
  //        'token'   =>$generatedToken,
  //      );
  //
  //      $model = new UsersModel;
  //      $model->update($data);
  //
  //      // redirection
  //      $this->redirectToRoute('default_home');
  //
  //
  //    } else {
  //        // refaire afficher la vue avec les errore passé en parametre de cette vue
  //        $this->show('user/register',array (
  //          'errors' => $errors,
  //        ));
  //    }
  //       $this->show('user/newPass');
  //   }

  public function modifPasswordAction()
  { // Insertion en BDD du nouveau password
    if(!empty($_GET['email']) && !empty($_GET['token'])){
      //  On sécurise l'email et le token
		  $email = trim(strip_tags($_GET['email']));
		  $token = trim(strip_tags($_GET['token']));
      $emailrecup = $_GET['email'];
      $emailurl = urldecode($emailrecup); // On décode l'email récupéré
      $tokenrecup = $_GET['token'];

      $urlemail = $this->userModel->getUserByEmail($emailurl); // on récupère l'ID de l'utilisateur en BDD
			if(!empty($_POST['submit'])) {
				$password = trim(strip_tags($_POST['password']));
				$password2 = trim(strip_tags($_POST['password2']));
        debug($password2);
        $errors = array();
				$errors['password'] = $this->validError->textValid($password,'password', 6, 15);
				$errors['password2'] = $this->validError->correspondancePassword($password,$password2);
				if($this->validError->IsValid($errors)){
					$token = StringUtils::randomString(20);
					$hashpassword = $this->authentificationModel->hashPassword($password);
		      $data = array(
		        'password' => $hashpassword,
						'token' => $token,
            'modified_at' => $this->dateTimeModel->format('Y-m-d  H:i:s'),
		      );
		      $user = $this->userModel->update($data,$urlemail['id']);
		      // redirection
		      $this->redirectToRoute('login');
  			} else {
          $this->show('user/modifpassword',array (
            'errors' => $errors,
          ));
        }
      }
    }
  }
}
