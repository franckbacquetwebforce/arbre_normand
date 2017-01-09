<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<!-- FORMULAIRE de connexion avec affichage des erreurs-->
<!-- Mise en forme et CSS (Michèle) -->
<?php if(empty($w_user)) { ?>
<main class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <section class="panel panel-default">
        <article class="header_panel">
          <h1 class="panel-title"><strong>Connexion à votre compte </strong></h1>
        </article>
        <article class="panel-body">
          <form id="connexion" action="<?= $this->url('login_action'); ?>" method="post">
            <div class="form-group">
              <label for="login">Pseudo ou Email*</label>
              <input type="text" class="form-control" name="login"/>
              <span class="help-block" id="error_login"><?php if(!empty($errors['login'])) {echo $errors['login']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe*</label>
              <input type="password" class="form-control" name="password" tabindex="1" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
              <span  class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
              <a href="<?= $this->url('forgetpassword'); ?>">Mot de passe oublié</a>
              <span class="pull-right"><?php echo "Pas encore inscrit ? " ?></span>
            </div>
            <button type="submit" class="btn btn-success">Se connecter</button>
            <a href="<?= $this->url('register') ?>"><button type="button" class="btn btn-primary pull-right">S'inscrire </button></a>
          </form>
        </article>
      </section>
    </div>
    <div class="col-md-2"></div>
  </div>
</main>
<?php } ?>
<?php $this->stop('main_content') ?>
