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
   * INSCRIPTION
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
    $errors['password'] = $this->validError->textValid($password, 'password', 6, 15);
		if(empty($errors['password'])) {
			$errors['password2'] = $this->validError->correspondancePassword($password2,$password);
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

  /**
   * CONNEXION
   */
  public function login()
  { // Affichage du formulaire de Connexion
    $this->show('user/login');
  }
  public function loginAction()
  { // Sécurisation Faille XSS
 		$email = trim(strip_tags($_POST['email']));
 		$password = trim(strip_tags($_POST['password']));

 		$user = $this->userModel->getUserByEmail($email); // Fonction getUserByEmail de UsersModel qui permet de récupérer un utilisateur par rapport à son email

 		if(!empty($user)){
      // Fonction isValidEmailInfo($email, $password) de UsersModel qui vérifie qu'une combinaison d'email et mot de passe (en clair) sont présents en bdd et valides
	 		if($this->userModel->isValidEmailInfo($email, $password)!=0){
      // Fonction logUserIn($user) de W/Security/AuthentificationModel qui connecte un utilisateur
	 		$this->authentificationModel->logUserIn($user);
      // Redirection vers la page d'accueuil
	 		$this->redirectToRoute('default_home');
	 		}else{
        // Affichage de l'erreur de non concordance d'email et password
	 			$errors['password'] = "Le mot de passe est incorrect";
	 			$this->show('user/login',array (
	 				'errors' => $errors,
	 			));
	 		}
 		}else{
      // Affichage de l'erreur qui ne trouve pas d'utilisateur correspondant à l'email fourni
 			$errors['email'] = "Identifiant introuvable";
 			$this->show('user/login',array (
 				'errors' => $errors,
 			));
 		}
  }

  /**
   * DECONNEXION
   */
  public function logoutAction()
	{ // Fonction logUserOut() de W/Security/AuthentificationModel qui déconnecte un utilisateur
		$this->authentificationModel->logUserOut();
    // Redirection vers la page d'accueil
		$this->redirectToRoute('default_home');
	}

  public function forgetPassword()
  {
    $this->show('user/forgetpassword');
  }

  /**
   * PASSWORD OUBLIE
   */
  public function forgetPasswordAction()
  {
    $app = getApp(); // récupère les infos dans config.php
		$urlbase = $app->getConfig('url_base'); //récupère la base de l'url definit dans config.php
		$errors = array();
		$email = trim(strip_tags($_POST['email']));
		$user = $this->userModel->getUserByEmail($email);
		if(!empty($user)){
			$urlLink = $this->generateUrl('modifpassword');
			$emailurl = urlencode($email);
      $html = '';
      $html .= '<a href="' . $urlbase . $urlLink .'?email=' . $emailurl .'&token=' .  $user['token'] . '">Cliquez ici</a>';
			//envoi du mail

			$mail = new \PHPMailer;
      $mail->isMail();
      $mail->setFrom('mragot2@msn.com');
      $mail->addAddress($email);     // Add a recipient
      $mail->Subject = 'Votre nouveau mot de passe';
      $mail->Body    = $html;
			if(!$mail->send()){
				echo "Le message n\'a pas été envoyé.";

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

  public function modifPassword()
  {
    $form = false;
    if(!empty($_GET['email']) && !empty($_GET['token'])){
      $this->show('user/modifpassword', array('form' => $form));
      $form = true;
    } else {
      $this->redirectToRoute('default_home');
    }

  }
  public function modifPasswordAction()
  {

    if(!empty($_GET['email']) && !empty($_GET['token'])){

      //  On sécurise l'email et le token
		  $email = trim(strip_tags($_GET['email']));
		  $token = trim(strip_tags($_GET['token']));
		  // Vérification que l'email et le token correspondent bien au mail et token de la BDD
		  $emailrecup = $_GET['email']; // Adresse email récupéré dans l'URL
		  $email = urldecode($emailrecup); // On décode l'email récupéré
		  $tokenrecup = $_GET['token']; // token récupéré dans l'URL
			$id = $this->userModel->getUserByEmail($email); // on récupère l'ID de l'utilisateur en BDD
			if(!empty($id)){
				if($email == $id['email']){
          if( $tokenrecup == $id['token']){
					if(!empty($_POST['submit'])){
						$password = trim(strip_tags($_POST['password']));
						$password2 = trim(strip_tags($_POST['password2']));
            $errors = array();
						$errors['password'] = $this->validError->textValid($password,'password', 6, 15);
						$errors['password2'] = $this->validError->correspondancePassword($password2,$password);
						if($this->validError->IsValid($errors)){
							$token = StringUtils::randomString(20);
							$hashpassword = $this->authentificationModel->hashPassword($password);
				      $data = array(
				        'password' => $hashpassword,
								'token' => $token,
                'modified_at' => $this->dateTimeModel->format('Y-m-d  H:i:s'),
				      );
				      $user = $this->userModel->update($data,$id['id']);
				      // redirection
				      $this->redirectToRoute('login');
						}else{
              $this->show('user/modifpassword',array (
                'errors' => $errors,
              ));
            }
					}
				}}
			}
  	}
  }
}




  // password forget
