<?php $this->layout('layout', ['title' => 'Contact']) ?>
<?php $this->start('main_content') ?>
<!-- FORMULAIRE de contact-->

<div id="success">
</div>
<div class="contact-form">
    <div class="row">
      <form id="contact_us" method="post" action="<?php $this->url('contact') ?>">
          <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
            <span id="error_name"></span>
              <input type="text" name="nameContact" id="nameContact" required="required" class="form" placeholder="Nom" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['username'];} ?>
              "/>
              <input type="email" name="mailContact" id="mailContact" required="required" class="form" placeholder="Email" value="
              <?php if(!empty($_SESSION['user']['username'])){echo $_SESSION['user']['email'];} ?>
              "/>
              <span id="error_mail"></span>
              <input type="text" name="subjectContact" id="subjectContact" required="required" class="form" placeholder="Sujet" />
              <span id="subject_contact"></span>
          </div>
          <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
              <textarea name="messageContact" id="messageContact" class="form textarea"  placeholder="Message"></textarea>
              <span id="error_message"></span>
          </div>
          <div class="relative fullwidth col-xs-12">
              <input type="submit" id="send_email" name="send_email" class="form-btn semibold" value="hvfngf">
          </div>
          <div class="clear"></div>
      </form>
    </div>
    <div class="mail-message-area">
        <div class="alert gray-bg mail-message not-visible-message">
            <!-- <strong>Merci !</strong> Votre email a bien été envoyé. -->
        </div>
    </div>

</div><!-- End Contact Form Area -->





<?php $this->stop('main_content') ?>
