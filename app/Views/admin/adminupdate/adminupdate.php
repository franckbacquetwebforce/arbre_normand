<!-- Formulaire de modification d'un compte administrateur -->
<!-- A mettre en forme -->
<?php $this->layout('layout_admin', ['title' => 'Modification du compte']) ?>

<?php $this->start('main_content') ?>
<?php debug($w_user); ?>
<form class="" action="<?= $this->url('admin_user_update_action', ['id' => $w_user['id']]) ?>" method="post">
  <label for="email">Email</label><br>
  <input type="email" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];}else{ echo $w_user['email'];} ?>">
  <span><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span><br>
  <label for="password">Mot de passe</label><br>
  <input type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>">
  <span><?php if(!empty($errors['password'])){ echo $errors['password'];} ?></span><br>
  <label for="password2">Entrez une deuxième fois votre mot de passe</label><br>
  <input type="password" name="password2" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];} ?>">
  <span><?php if(!empty($errors['password2'])){ echo $errors['password2'];} ?></span><br>
  <input type="submit" name="submit" value="Mettre a jour votre compte admin">
</form>
<?php $this->stop('main_content') ?>
