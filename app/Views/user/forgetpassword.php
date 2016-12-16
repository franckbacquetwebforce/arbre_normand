<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
<form class="" action="<?= $this->url('forgetpassword_action')?>" method="post">
  <label for="email">Email</label><br><br>
  <input type="email" name="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>"><br><br>
  <span><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span>
  <input type="submit" name="submit" value="Envoyer">
</form>
<?php $this->stop('main_content') ?>
