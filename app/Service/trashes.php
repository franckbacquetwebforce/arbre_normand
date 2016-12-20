<?php
// pour gitignore : app/Service/trashes.php

public function forgetPasswordAction()
{
  $app = getApp(); //pour récup info de config.php
  $urlbase = $app->getConfig('url_base'); // url de base defini dans config.php

    $postusername  = trim(strip_tags($_POST['email']));
    $getId = new UsersModel();
    $foundUser = $getId->getUserByEmail($postusername);
    print_r($foundUser);
    if(!empty($_POST['email'])){
      if(!empty($foundUser)){
        $urlLink = $this->generateUrl('modifpassword');
        $foundUserMailEncode=urlencode($foundUser['email']);
           $body = '';
           $body .= '<div>';
             $body .= '<p>Bonjour,'.$foundUser['email'].'</p>';
             $body .= '<p><strong>Ceci est un mail de recuperation de mot de passe pour votre adresse mail: </strong> '. $foundUser['email'] . '</p>';
             $body .= '<a href="'.$urlbase.$urlLink.'?email='.$foundUserMailEncode.'&token='.$foundUser['token'].'">Reinitialiser mot de passe</a>';
           $body .= '</div>';
          $mail = new \PHPMailer();//VERIF USE
          //adresse du localhost: http://localhost:1080/#/
          //$mail->SMTPDebug = 3;// Enable verbose debug output
          $mail->isMail();       // Set mailer to use SMTP
          $mail->setFrom('from@example.com', 'Mailer');// Add a recipient
          $mail->addAddress('ellen@example.com');       // Name is optional
          $mail->addCC('cc@example.com');
          $mail->isHTML(true);              // Set email format to HTML
          $mail->Subject = 'Nouveau message de la page contact du site xxx.com';
          $mail->Body    = $body;
          $mail->AltBody = 'Pas de alt body';
        if(!$mail->Send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
        echo 'Message has been sent.';
        }
      }else{
        $errors['email'] = "Identifiant ou e-mail inconnu";
        $this->show('user/forgetpassword',array (
        'errors' => $errors,
        ));
      }
    }else{
      $errors['email'] = "Merci de renseigner votre identifiant ou e-mail";
      $this->show('user/forgetpassword',array (
      'errors' => $errors,
      ));
    }
}

public function getProductWithImage()
{
  $sql = "SELECT *,(SELECT * FROM img WHERE id_product = products.id) AS array_img
          FROM $this->table
          WHERE i.status_img = 1";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  debug($query->fetchAll());
  return $query->fetchAll();

}
