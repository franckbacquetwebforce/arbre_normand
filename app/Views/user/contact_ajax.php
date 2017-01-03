<?php

$error = array();
$success = false;


  $nameContact = trim(strip_tags($_POST['nameContact']));
  $mailContact = trim(strip_tags($_POST['mailContact']));
  $subjectContact = trim(strip_tags($_POST['subjectContact']));
  $messageContact = trim(strip_tags($_POST['messageContact']));

  // verifications
  if (!empty($pseudo)) {
    if (strlen($pseudo) < 5) {
      $error['pseudo'] = 'Veuillez inscrire plus de 5 caractères';
    } elseif (strlen($pseudo) > 40) {
      $error['pseudo'] = 'Veuillez inscrire moins de 40 caractères';
    } else {
      $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
      $query = $pdo->prepare($sql);
      $query->bindvalue  (':pseudo', $pseudo, PDO::PARAM_STR);
      $query->execute();
      $resultPseudo = $query->fetch();

      if (!empty($resultPseudo)) {
        $error['pseudo'] = 'Ce pseudo est déja existant';
      }
    }

  } else {
    $error['pseudo'] = 'Veuillez renseigner un pseudo';
  }



  if (!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql = "SELECT * FROM users WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query->bindvalue( ':email', $email, PDO::PARAM_STR );
      $query->execute();
      $resultEmail = $query->fetch();

      if (!empty($resultEmail)) {
        $error['email'] = 'Cet Email est déja existant';
      }

    } else {
      $error['email'] = 'Veuillez renseigner un email valide';
    }
  } else {
    $error['email'] = 'Veuillez renseigner un email';
  }


  $verifPassword = verifTaille($password, 5, 20, 'mot de passe');
  if (!empty($verifPassword)) { $error['password'] = $verifPassword; }

  if (!empty($retapePassword)) {
    if ($retapePassword != $password) {
      $error['retapePassword'] = 'les mots de passes sont différents';
    } else {
      if (strlen($retapePassword) < 5) {
        $error['retapePassword'] = 'Veuillez inscrire plus de 5 caractères';
      } elseif (strlen($retapePassword) > 40) {
        $error['retapePassword'] = 'Veuillez inscrire moins de 40 caractères';
      }
    }
  } else {
    $error['retapePassword'] = 'Veuillez retapper votre mot de passe';
  }

  if (count($error) == 0) {

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $token = generateRandomString();
    $sql = "INSERT INTO users (pseudo, email, password, token, created_at, role) VALUES (:pseudo, :email, :password, :token, NOW(), 'user')";
    $query = $pdo->prepare($sql);
    $query->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->bindvalue(':email', $email, PDO::PARAM_STR);
    $query->bindvalue(':password', $hashPassword, PDO::PARAM_STR);
    $query->bindvalue(':token', $token, PDO::PARAM_STR);
    $query->execute();


    $success = true;

  }



$response = array(
  'error'=> $error,
  'success'=> $success,
);
showJson($response);
