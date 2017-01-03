<!-- Formulaire de création d'un nouvel administrateur -->
<!-- a mettre en forme -->

<?php $this->layout('layout_admin', ['title' => 'Création admin']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Ajout d'un administrateur</strong></h1>
        </div>
        <div class="panel-body">
          <form id="forget" action="<?= $this->url('admin_user_new_action') ?>" method="post">
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name="email" required="required" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span><br>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe*</label>
              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
              <span id="error_password"><?php if(!empty($errors['password'])){ echo $errors['password'];} ?></span><br>
            </div>
            <div class="form-group">
              <label for="password2">Répéter le mot de passe*</label>
              <input type="password" class="form-control" name="password2" tabindex="1" required="required" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];} ?>"><br>
              <span id="error_password2"><?php if(!empty($errors['password2'])){ echo $errors['password2'];} ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">Créer un nouvel admin</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!-- <form class="" action="<?= $this->url('admin_user_new_action') ?>" method="post">
  <label for="email">Email</label><br>
  <input type="email" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>">
  <span><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span><br>
  <label for="password">Mot de passe</label><br>
  <input type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>">
  <span><?php if(!empty($errors['password'])){ echo $errors['password'];} ?></span><br>
  <label for="password2">Entrez une deuxième fois votre mot de passe</label><br>
  <input type="password" name="password2" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];} ?>">
  <span><?php if(!empty($errors['password2'])){ echo $errors['password2'];} ?></span><br>
  <input type="submit" name="submit" value="Créer un nouvel admin">
</form> -->
<?php $this->stop('main_content') ?>
