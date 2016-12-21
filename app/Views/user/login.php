<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<!-- FORMULAIRE de connexion -->
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title"><strong>Connexion à votre compte </strong></h1>
        </div>
        <div class="panel-body">
          <form id="connexion" action="<?= $this->url('login_action'); ?>" method="post">
            <div class="form-group">
              <label for="login">Pseudo ou Email*</label>
              <input type="text" class="form-control" name="login" required="required"/>
              <span class="help-block" id="error_login"><?php if(!empty($errors['login'])) {echo $errors['login']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password">Password </label>
              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
              <span id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
              <a href="<?= $this->url('forgetpassword'); ?>">Mot de passe oublié</a>
            </div>
            <button type="submit" class="btn btn-sm btn-default">Se connecter</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!-- <div class="container">
  <div class="row">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Connexion à votre compte</h4>
      </div>
      <form id="connexion" action="<?= $this->url('login_action'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="login">Pseudo ou Email*</label><br><br>
                <input type="text" name="login" tabindex="1" class="form-control" value="<?php if(!empty($_POST['login'])){echo $_POST['login'];}?>"><br>
                <span class="help-block" id="error_login"><?php if(!empty($errors['login'])) {echo $errors['login']; } ?></span><br><br>
              </div>
            </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password*</label><br><br>
                <input type="password" name="password" tabindex="1" class="form-control" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
                <span id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br><br>
                <a href="<?= $this->url('forgetpassword'); ?>">Mot de passe oublié</a><br><br>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="isEmpty" value="">
          <button type="submit" name="submit" value="connexion" class="btn btn-success btn-icon"><i class="fa fa-check"></i>Connexion</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div> -->
<?php $this->stop('main_content') ?>
