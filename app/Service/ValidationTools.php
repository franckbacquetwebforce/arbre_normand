<?php
namespace  Service;


class ValidationTools
{
  protected $errors = array();


  public function IsValid($errors)
  {
    foreach ($errors as $key => $value) {
      if(!empty($value)) {
        return false;
      }
    }
    return true;
  }

  /**
   * emailValid
   * @param email $email
   * @return string $error
   */

  public function emailValid($email)
  {
    $error = '';
    if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
      $error = 'Adresse email invalide.';
    }
      elseif(strlen($email) > 50) {
      $error = 'Votre adresse e-mail est trop longue.';
    }
    return $error;
  }

  /**
   * textValid
   * @param POST $text string
   * @param title $title string
   * @param min $min int
   * @param max $max int
   * @param empty $empty bool
   * @return string $error
   */

  public function textValid($text, $title, $min = 3,  $max = 50, $empty = false)
  {
    $error = '';
    if(!empty($text)) {
      $strtext = strlen($text);
      if($strtext > $max) {
        $error = 'Your ' . $title . ' is too long.';
      } elseif($strtext < $min) {
        $error = 'Your ' . $title . ' is too short.';
      }
    } else {
      if(!$empty) {
        $error = 'Veuillez renseigner un ' . $title . '.';
      }
    }
    return $error;
  }
  /**
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

  public function imgValid($name_img, $sizeMax = 2000000, $validExtensions = array('.jpg','.jpeg','.png'))
	{// $name_img est le name de l'input type='file'
    $error = array();
    if(!empty($_FILES[$name_img])) {
      if ($_FILES[$name_img]['error'] > 0) {
        if ($_FILES[$name_img]['error'] != 4) {
				  $error[$name_img] = 'Problem: ' . $_FILES[$name_img]['error'] . '<br />';
			  }else {
				  $error[$name_img] = 'Aucun fichier n\'a été téléchargé';
			  }
      } else {
        print_r($_FILES[$name_img]);
        $file_name = $_FILES[$name_img]['name']; // le nom du fichier
			  $file_size = $_FILES[$name_img]['size']; // la taille ( peu fiable depend du navigateur)
				// OR $size = filesize($_FILES[$name_img]['tmp_name']);
			  $file_tmp  = $_FILES[$name_img]['tmp_name'];  // le chemin du fichier temporaire
			  $file_type = $_FILES[$name_img]['type'];  // type MIME (peu fiable, depend du navigateur)

        // Taille du fichier (x2)
        if($file_size > $sizeMax || filesize($file_tmp) > $sizeMax){ //limite le fichier a 2mo
				  $error[$name_img] = 'Le fichier est trop gros (max '. $sizeMax .'mo)';
          die('echo');
			  } else {
          // array of valid extensions
          $validExtensions = array('.jpg','.jpeg','.png');

          //$fileExtension = strrchr($file_name, ".");
					$i_point = strrpos($file_name,'.');
   				$fileExtension = substr($file_name, $i_point ,strlen($file_name) - $i_point);

          if (!in_array($fileExtension, $validExtensions)) {
						$error[$name_img] = 'Veuillez télécharger une image de type jpg,jpeg ou png';
					} else {
            // alternative, sécurité +++++
						$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
	    			$mime = finfo_file($finfo, $file_tmp);
						finfo_close($finfo);

						$goodExtension = array('image/jpeg','image/png','image/jpg');

						if (!in_array($mime, $goodExtension)) {
							$error[$name_img] = 'Veuillez télécharger une image de type jpg,jpeg ou png';
						} else {
                  if(count($error) == 0) {
                    $monUrl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    // echo realpath();

                  if(!is_dir("image")) {
                    mkdir("image");
                  }
                  if(!is_dir("image/".date('Y') )) {
                    mkdir("image/".date('Y'));
                  }
                  if(!is_dir("image/".date('Y'). '/'.date('m') )) {
                    mkdir("image/".date('Y'). '/'.date('m'));
                  }
                  $dest_fichier = date('Y_m_d_H_i').'_original'.$fileExtension;
								    // ensure a safe filename
                    if (move_uploaded_file($file_tmp,  'image/'.date('Y').'/'.date('m') . '/' . $dest_fichier)) {
                        return true;


                    }
                  }
            }
          }
        }
      }
    }
  }
  /**
   * correspondancePassword
   * @param password $password string
   * @param another password $password2 string
   * @return string $error
   */
  public function correspondancePassword($password,$password2){
    $error = '';
    if($password =!  $password2){
      $error = 'Vos mots de passe ne correspondent pas';
    }
    return $error;
  }


}
