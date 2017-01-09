<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<!-- FORMULAIRE d'inscription avec affichage des erreurs-->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <section class="panel panel-default">
        <article class="header_panel">
          <h1 class="panel-title"><strong>Creer un nouveau compte</strong></h1>
        </article>
        <article class="panel-body">
          <form id="inscription" action="<?= $this->url('register_action'); ?>" method="post">
            <div class="form-group">
              <label for="username">Pseudo*</label>
              <input type="text" class="form-control" name="username" value="<?php if(!empty($_POST['username'])) {echo $_POST['username']; } ?>"/>
              <span class="help-block" id="error_username"><?php if(!empty($errors['username'])) {echo $errors['username']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="username">Email*</label>
              <input type="email" class="form-control" name="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email']; } ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe*</label>
              <input type="password" class="form-control" name="password" tabindex="1" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
              <span class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password2">Répéter le mot de passe*</label>
              <input type="password" class="form-control" name="password2" tabindex="1" value="<?php if(!empty($_POST['password2'])){echo $_POST['password2'];}?>"><br>
              <span class="help-block" id="error_password2"><?php if(!empty($errors['password2'])) {echo $errors['password2']; } ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">S'inscrire</button>
          </form>
        </article>
      </section>
    </div>
  </div>
  <div class="col-md-3"></div>
</main>

<?php $this->stop('main_content') ?>
