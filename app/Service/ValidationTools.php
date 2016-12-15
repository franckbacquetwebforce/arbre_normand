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

  /**
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


}
