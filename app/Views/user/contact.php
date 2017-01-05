<?php $this->layout('layout', ['title' => 'Contact']) ?>
<?php $this->start('main_content');
// debug($_SESSION);
?>
<!-- FORMULAIRE de contact-->
<<<<<<< HEAD

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
=======
<div class="container-fluid" style="margin-top: 30px">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Envoyer un message </strong></h1>
        </div>
        <div class="panel-body" id=form_contact>
          <form id="contact_us" method="post" action="<?php echo $this->url('contact_action')?>">
            <div class="col-xs-6 form-group">
>>>>>>> 176b7b7813e1d9e978d8c4630b152cd33ec4b062
              <?php if(array_key_exists('user',$_SESSION)){ ?>
                <input type="text" name="nameContact" id="nameContact" class="form-control hidden" placeholder="Nom" value=" <?= $_SESSION['user']['username']; ?> "/>
                <input type="text" name="mailContact" id="mailContact" class="form-control hidden" placeholder="Email" value=" <?= $_SESSION['user']['email']; ?> "/>
              <?php } else { ?>
                <label for="nameContact" id="label_name">Votre Nom: </label></br>
                <input type="text" name="nameContact" id="nameContact" class="form-control" placeholder="Nom" value="<?php if(!empty($_POST['nameContact'])){echo $_POST['nameContact'];} ?>"/>
                <span id="error_name"></span></br>
                <label for="mailContact" id="label_mail">Votre e-mail: </label></br>
                <input type="mail" name="mailContact" id="mailContact" class="form-control" placeholder="Email" value="<?php if(!empty($_POST['mailContact'])){echo $_POST['mailContact'];} ?>"/>
                <span id="error_mail"></span></br>
              <?php } ?>
<<<<<<< HEAD
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
=======
                <label for="subjectContact" id="label_subject">Sujet: </label></br>
                <input type="text" name="subjectContact" id="subjectContact" class="form-control" placeholder="Sujet" value="<?php if(!empty($_POST['subjectContact'])){echo $_POST['subjectContact'];} ?>"/>
                <span id="error_subject"></span>
            </div>
            <div class="col-xs-6 form-group">
                  <label for="messageContact" id="label_message">Message: </label></br>
                  <textarea name="messageContact" id="messageContact" class="form-control textarea" rows="8" cols="50" placeholder="Message"><?php if(!empty($_POST['messageContact'])){echo $_POST['messageContact'];} ?></textarea>
                  <span id="error_message"></span>
            </div>
            <div class="relative fullwidth col-xs-12">
                  <button type="submit" id="send_email" name="send_email" class="btn btn-success">Envoyer</button>
            </div>
            <div class="clear"></div>
          </form>
>>>>>>> 176b7b7813e1d9e978d8c4630b152cd33ec4b062
        </div>
          <div class="mail-message-area">
            <div id="success" class="alert gray-bg mail-message not-visible-message">
              <div id="wait_send"></div>
            </div>
          </div>
      </div>

</div><!-- End Contact Form Area -->





<?php $this->stop('main_content') ?>
