<?php $this->layout('layout', ['title' => 'Contact']) ?>
<?php $this->start('main_content') ?>
<!-- FORMULAIRE de contact-->

<div class="contact-form">
    <div class="row">
      <form id="contact_us" method="post" action="#">
          <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
              <input type="text" name="nameContact" id="nameContact" required="required" class="form" placeholder="Nom" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['username'];} ?>
              "/>
              <input type="email" name="mailContact" id="mailContact" required="required" class="form" placeholder="Email" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['email'];} ?>
              "/>
              <input type="text" name="subjectContact" id="subjectContact" required="required" class="form" placeholder="Sujet" />
          </div>
          <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
              <textarea name="messageContact" id="messageContact" class="form textarea"  placeholder="Message"></textarea>
          </div>
          <div class="relative fullwidth col-xs-12">
              <button type="submit" id="send_email" name="send_email" class="form-btn semibold">Envoyer</button>
          </div>
          <div class="clear"></div>
      </form>
    </div>
    <div class="mail-message-area">
        <div class="alert gray-bg mail-message not-visible-message">
            <strong>Merci !</strong> Votre email a bien été envoyé.
        </div>
    </div>

</div><!-- End Contact Form Area -->

<form id="inscription" class="inscription" action="#" method="POST">
  <label for="pseudo">Pseudo :</label>
  <span id="error_pseudo" style="color: red;"><?php if(!empty($error['pseudo'])) { echo $error['pseudo']; } ?></span>
  <input id="pseudo_inscription" class="inscpseudo" type="text" name="pseudo" value="<?php if (!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>">

  <label for="email">Email :</label>
  <span id="error_email" style="color: red;"><?php if (!empty($error['email'])) { echo $error['email']; } ?></span>
  <input id="email_inscription" type="email" name="email" value="<?php if (!empty($_POST['email'])) { echo $_POST['email']; } ?>">

  <label for="password">Mot de passe :</label>
  <span id="error_password" style="color: red;"><?php if (!empty($error['password'])) { echo $error['password']; } ?></span>
  <input id="password_inscription" type="password" name="password" value="<?php if (!empty($_POST['password'])) { echo $_POST['password']; } ?>">

  <label for="retapePassword">Retappez votre mot de passe</label>
  <span id="error_retapePassword" style="color: red;"><?php if (!empty($error['retapePassword'])) { echo $error['retapePassword']; } ?></span>
  <input id="retapePassword_inscription" type="password" name="retapePassword" value="<?php if (!empty($_POST['retapePassword'])) { echo $_POST['retapePassword']; } ?>">
  <span id="success_inscription" style="color: green;"><?php if (!empty($successPassword)) { echo $successPassword; } ?></span>



  <input class="submit" type="submit" name="submit" value="Envoyer">
</form>





<?php $this->stop('main_content') ?>
