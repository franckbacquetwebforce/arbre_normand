<?php
namespace  Service;

use \Controller\AppController;
use \Model\UsersModel;
use \Service\ValidationTools;
use \W\Security\AuthentificationModel;
use \W\Security\StringUtils;
use \W\Security\AuthorizationModel;
use \DateTime;

class ValidationTools
{
  protected $errors = array();
  public $dataImg = array(
  );
  /** Validation des erreurs
   * IsValid()
   * @param errors string $errors
   * @return bool
   */
  public function IsValid($errors)
  {
    foreach ($errors as $key => $value) {
      if(!empty($value)) {
        return false;
      }
    }
    return true;
  }
  /** Vérification de la saisie, de la longueur et du format valide de l'email
   * emailValid()
   * @param email $email
   * @return string $error
   */
  public function emailValid($email)
  { // Gestion des erreurs
    $error = '';
    if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) { // si l'email n'est pas saisi ou non conforme
      $error = 'Adresse email invalide.';
    }
      elseif(strlen($email) > 50) { // si l'email dépasse les 50 caractères
      $error = 'Votre adresse e-mail est trop longue.';
    }
    return $error; // on retourne les erreurs dans le formulaire
  }
  /** Vérification de l'existence du texte saisi et de sa longueur conforme
   * textValid
   * @param POST $text string
   * @param title $title string
   * @param min $min int
   * @param max $max int
   * @param empty $empty bool
   * @return string $error
   */
  public function textValid($text, $title, $min = 3,  $max = 50, $empty = false)
  { // Gestion des erreurs
    $error = '';
    // Vérification de la longueur du texte saisi
    if(!empty($text)) {
      $strtext = strlen($text);
      if($strtext > $max) {
        $error = 'Votre ' . $title . ' est trop long.';
      } elseif($strtext < $min) {
        $error = 'Votre ' . $title . ' est trop court.';
      }
    } else {
      // et si le champ est vide :
      if(!$empty) {
        $error = 'Veuillez renseigner un ' . $title . '.';
      }
    }
    return $error;
  }
  /** ??
   * limite montant
   * @param number $number float
   * @return string $error
   */
  public function numberValid($number, $title, $min = 0, $max = 100000, $empty = false)
  {
    $error = '';
    if(!empty($number)) {
      if(is_numeric($number)){
        if($number > $max) {
          $error = 'Votre ' . $title . ' ne peut excéder '.$max.'.';
        } elseif($number < $min) {
          $error = 'Votre ' . $title . ' ne peut être inférieur à '.$min.'.';
        }
      } else {
        $error = 'Le ' . $title . 'doit être au format numérique.';
      }
    } else {
      if(!$empty) {
        $error = 'Veuillez renseigner un ' . $title . '.';
      }
    }
    return $error;
  }
  /** Vérification de la correspondance des deux passwords saisis
   * correspondancePassword
   * @param password $password string
   * @param another password $password2 string
   * @return string $error
   */
  public function correspondancePassword($password,$password2){
    $error = '';
    if($password !=  $password2){
      $error = 'Vos mots de passe ne correspondent pas';
    }
    return $error;
  }
  /** ??
   * imgValid
   * @param
   * @param
   * @return string $error
   */
  public function mainImgValid($name_img, $sizeMax = 2000000, $validExtensions = array('.jpg','.jpeg','.png'))
	{ // $name_img est le name de l'input type='file'
    $error = '';
    if(!empty($_FILES[$name_img])) {
      if ($_FILES[$name_img]['error'] > 0) {
        if ($_FILES[$name_img]['error'] != 4) {
				  $error= 'Problem: ' . $_FILES[$name_img]['error'] . '<br />';
			  }else {
				  $error = 'Aucun fichier n\'a été téléchargé';
			  }
      } else {
        //print_r($_FILES[$name_img]);
        $file_name = $_FILES[$name_img]['name']; // le nom du fichier
			  $file_size = $_FILES[$name_img]['size']; // la taille ( peu fiable depend du navigateur)
				// OR $size = filesize($_FILES[$name_img]['tmp_name']);
			  $file_tmp  = $_FILES[$name_img]['tmp_name'];  // le chemin du fichier temporaire
			  $file_type = $_FILES[$name_img]['type'];  // type MIME (peu fiable, depend du navigateur)

        // Taille du fichier (x2)
        if($file_size > $sizeMax || filesize($file_tmp) > $sizeMax){ //limite le fichier a 2mo
				  $error = 'Le fichier est trop gros (max '. $sizeMax .'mo)';
			  } else {
          // array of valid extensions
          $validExtensions = array('.jpg','.jpeg','.png');

          //$fileExtension = strrchr($file_name, ".");
					$i_point = strrpos($file_name,'.');
   				$fileExtension = substr($file_name, $i_point ,strlen($file_name) - $i_point);

          if (!in_array($fileExtension, $validExtensions)) {
						$error = 'Veuillez télécharger une image de type jpg,jpeg ou png';
					} else {
            // alternative, sécurité +++++
						$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
	    			$mime = finfo_file($finfo, $file_tmp);
						finfo_close($finfo);

						$goodExtension = array('image/jpeg','image/png','image/jpg');

						if (!in_array($mime, $goodExtension)) {
							$error= 'Veuillez télécharger une image de type jpg,jpeg ou png';
						} else {
              $error = array(
                'ext'  => $fileExtension,
                'file_tmp'    => $file_tmp
              );
            }
          }
        }
      }
    } else {
      	$error = 'Veuillez renseigner au moins l\'image principale';
    }
    return $error;
  }

  public function imgValid($name_img, $sizeMax = 2000000, $validExtensions = array('.jpg','.jpeg','.png'))
	{ // $name_img est le name de l'input type='file'
    $error = '';
      if ($_FILES[$name_img]['error'] > 0) {
        if ($_FILES[$name_img]['error'] != 4) {
				  $error= 'Problem: ' . $_FILES[$name_img]['error'] . '<br />';
			  }
      } else {
        //print_r($_FILES[$name_img]);
        $file_name = $_FILES[$name_img]['name']; // le nom du fichier
			  $file_size = $_FILES[$name_img]['size']; // la taille ( peu fiable depend du navigateur)
				// OR $size = filesize($_FILES[$name_img]['tmp_name']);
			  $file_tmp  = $_FILES[$name_img]['tmp_name'];  // le chemin du fichier temporaire
			  $file_type = $_FILES[$name_img]['type'];  // type MIME (peu fiable, depend du navigateur)

        // Taille du fichier (x2)
        if($file_size > $sizeMax || filesize($file_tmp) > $sizeMax){ //limite le fichier a 2mo
				  $error = 'Le fichier est trop gros (max '. $sizeMax .'mo)';
			  } else {
          // array of valid extensions
          $validExtensions = array('.jpg','.jpeg','.png');

          //$fileExtension = strrchr($file_name, ".");
					$i_point = strrpos($file_name,'.');
   				$fileExtension = substr($file_name, $i_point ,strlen($file_name) - $i_point);

          if (!in_array($fileExtension, $validExtensions)) {
						$error = 'Veuillez télécharger une image de type jpg,jpeg ou png';
					} else {
            // alternative, sécurité +++++
						$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
	    			$mime = finfo_file($finfo, $file_tmp);
						finfo_close($finfo);

						$goodExtension = array('image/jpeg','image/png','image/jpg');

						if (!in_array($mime, $goodExtension)) {
							$error= 'Veuillez télécharger une image de type jpg,jpeg ou png';
						} else {
              $error = array(
                'ext'  => $fileExtension,
                'file_tmp'    => $file_tmp
              );
            }
          }
        }
      }
    return $error;
  }

  // public function orderImgValid($current_FILE, $previous_FILE)
  // {
  //   if(!empty($_FILES[$current_FILE]['name']) && empty($_FILES[$previous_FILE]['name'])){
  //     $error = "Merci de remplir d\'abord l\'".$previous_FILE;
  //     return $error;
  //   }
  // }
}
