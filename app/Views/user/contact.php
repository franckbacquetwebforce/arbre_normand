<?php $this->layout('layout', ['title' => 'Contact']) ?>
<?php $this->start('main_content');
// debug($_SESSION);
?>
<!-- FORMULAIRE de contact-->
<div class="container-fluid" style="margin-top: 30px">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Envoyer un message </strong></h1>
        </div>
        <div class="panel-body" id=form_contact>
          <form id="contact_us" method="post" action="<?php echo $this->url('contact_action')?>">
            <div class="col-xs-6 form-group">
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
        </div>
          <div class="mail-message-area">
            <div id="success" >
              <div id="wait_send"></div>
            </div>
          </div>
      </div>

</div><!-- End Contact Form Area -->





<?php $this->stop('main_content') ?>
