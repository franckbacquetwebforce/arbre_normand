<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<!-- FORMULAIRE de connexion -->
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="header_panel">
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
              <label for="password">Mot de passe*</label>
              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
              <span  class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
              <a href="<?= $this->url('forgetpassword'); ?>">Mot de passe oublié</a>
              <span class="pull-right"><?php echo "Pas encore inscrit ? " ?></span>
            </div>
            <button type="submit" class="btn btn-success">Se connecter</button>
            <a href="<?= $this->url('register') ?>"><button type="button" class="btn btn-primary pull-right">S'inscrire </button></a>
            <label>
  				  <input type="checkbox" name="remember" /> Se souvenir de moi
  			  </label>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<?php $this->stop('main_content') ?>
