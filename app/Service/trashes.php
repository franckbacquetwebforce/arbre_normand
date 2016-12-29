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


//function du tuto que je remplace par une autre
function modifierQTeArticle($id_product,$qt_product){
   //Si le panier éxiste
   if ($this->creationPanier())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qt_product > 0)
      {
         //Recharche du produit dans le panier
         $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);

         if ($positionProduct !== false)
         {
            $_SESSION['cart']['qt_product'][$positionProduct] = $qt_product ;
         }
      }
      else
      supprimerArticle($id_product);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
// ANCIEN LISTPRODUCT
<section class="thumbs container">
  <main class="main-area">
    <div class="centered">
      <section class="cards">
        <?php foreach($products as $product){  ?>
            <article class="card">
              <figure class="thumbnail">
                <img class="img-responsive" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" alt="<?= $product['product_name'] ?>">
              </figure>
              <div class="card-content">
                <h2><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h2>
                <p><h3><?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p>
                <p class="caract">Catégorie : <?php if(!empty($product['category_name'])) { echo $product['category_name'];} ?></p>
                <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                <p class="button"><a href="<?php echo $this->url("singleproduct",["id" => $product['id_product']]); ?>" class="btn btn-success" title="More">Details »</a></p>
              </div><!-- .card-content -->
            </article>
        <?php } ?>
      </section><!-- .card -->
    </div><!-- .centered -->
  </main>
</section>
