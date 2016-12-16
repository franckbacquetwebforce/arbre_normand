<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<!-- FORMULAIRE de connexion -->
<div class="container">
  <div class="row">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Connexion à votre compte</h4>
      </div>
      <form id="connexion" action="<?= $this->url('login_action'); ?>" method="post" role="form" style="display: block;" >
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control" for="login">Email</label><br><br>
                <input type="email" name="email" tabindex="1" class="form-control" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"><br>
                <span class="help-block" id="error_login"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br><br>
              </div>
            </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password*</label><br><br>
                <input type="password" name="password" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
                <span id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br><br>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="text-center">
            <input type="hidden" name="isEmpty" value="">
            <input type="submit" name="submit" tabindex="4" class="form-control btn btn-login" value="Connexion">
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->stop('main_content') ?>
