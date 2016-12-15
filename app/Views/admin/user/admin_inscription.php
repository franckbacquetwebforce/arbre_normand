<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<form class="" action="<?= $this->url('admin_user_new_action') ?>" method="post">
  <label for="email">Email</label>
  <span><?php if(!empty($error['email'])){ echo $error['email'];} ?></span>
  <input type="email" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>">
  <label for="password">Mot de passe</label>
  <span><?php if(!empty($error['password'])){ echo $error['password'];} ?></span>
  <input type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>">
  <label for="password2">Entrez une deuxième fois votre mot de passe</label>
  <span><?php if(!empty($error['password2'])){ echo $error['password2'];} ?></span>
  <input type="password" name="password2" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];} ?>">
  <input type="submit" name="submit" value="Créer un nouvel admin">
</form>
<?php $this->stop('main_content') ?>
