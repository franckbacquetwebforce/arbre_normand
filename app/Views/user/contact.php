<?php $this->layout('layout', ['title' => 'Contact']) ?>
<?php $this->start('main_content');
// debug($_SESSION);
?>
<!-- FORMULAIRE de contact-->

<div class="contact-form" style="background-color:white">
    <div class="row">
<<<<<<< HEAD
      <form id="contact_us" method="post" action="<?php $this->url('contact_action') ?>">
          <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
            <span id="error_name"></span><br>
              <input type="text" name="nameContact" required="required" class="form" placeholder="Nom" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['username'];} ?>
              "/><br>
              <input type="email" name="mailContact" required="required" class="form" placeholder="Email" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['email'];} ?>
              "/><br>
              <span id="error_mail"></span><br>
              <input type="text" name="subjectContact" required="required" class="form" placeholder="Sujet" /><br>
              <span id="subject_contact"></span><br>
          </div>
          <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
              <textarea name="messageContact" class="form textarea"  placeholder="Message"></textarea><br>
              <span id="error_message"></span><br>
          </div>
          <div class="relative fullwidth col-xs-12">
              <input type="submit" id="send_email" name="send_email" class="form-btn semibold" value="Envoyer">
              <!-- <input type="submit" name="submit" value="test"> -->
=======
      <form id="contact_us" method="post" action="<?php $this->url('contact')?>" alt="<?php $this->url('contact_send')?>">
        <span "">
        </span>
          <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
              <?php if(array_key_exists('user',$_SESSION)){ ?>
              <input type="text" name="nameContact" id="nameContact" class="form hidden" placeholder="Nom" value=" <?= $_SESSION['user']['username']; ?> "/>
              <input type="text" name="mailContact" id="mailContact" class="form hidden" placeholder="Email" value=" <?= $_SESSION['user']['email']; ?> "/>
              <?php } else { ?>
              <label for="nameContact">Votre Nom: </label></br>
              <input type="text" name="nameContact" id="nameContact" class="form" placeholder="Nom" value="<?php if(!empty($_POST['nameContact'])){echo $_POST['nameContact'];} ?>"/>
              <span id="error_name"></span></br>
              <label for="mailContact">Votre e-mail: </label></br>
              <input type="text" name="mailContact" id="mailContact" class="form" placeholder="Email" value="<?php if(!empty($_POST['mailContact'])){echo $_POST['mailContact'];} ?>"/>
              <span id="error_mail"></span></br>
              <?php } ?>
              <label for="subjectContact">Sujet: </label></br>
              <input type="text" name="subjectContact" id="subjectContact" class="form" placeholder="Sujet" value="<?php if(!empty($_POST['subjectContact'])){echo $_POST['subjectContact'];} ?>"/>
              <span id="error_subject"></span>
          </div>
          <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
            <label for="messageContact">Message: </label></br>
            <textarea name="messageContact" id="messageContact" class="form textarea"  placeholder="Message"><?php if(!empty($_POST['messageContact'])){echo $_POST['messageContact'];} ?></textarea>
            <span id="error_message"></span>
          </div>
          <div class="relative fullwidth col-xs-12">
              <button type="submit" id="send_email" name="send_email" class="form-btn semibold">Envoyer</button>
>>>>>>> a961f63d4b30db06caa375499737345862fcc7fc
          </div>
          <div class="clear"></div>
      </form>
    </div>
    <div class="mail-message-area">
        <div id="success" class="alert gray-bg mail-message not-visible-message">
        </div>
    </div>

</div><!-- End Contact Form Area -->





<?php $this->stop('main_content') ?>
