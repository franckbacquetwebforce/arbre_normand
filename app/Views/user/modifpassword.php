<?php $this->layout('layout', ['title' => 'Modification Password']) ?>

<?php $this->start('main_content') ?>
	<h2>Modification du password</h2>

  <form class="" action="<?= $this->url('modifpassword_action')?>?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>&token=<?php if(!empty($_GET['token'])){echo $_GET['token'];}?>" method="post">
    <div class="form-group donnees">
      <label for="password">Password*</label><br><br>
      <input type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
    <span class="erreur"><?php if(!empty($error['password'])){ echo $error['password'];} ?></span><br>

    <label for="password2">Repeat password*</label><br><br>
    <input type="password" name="password2" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];}?>"><br>
    <span class="erreur"><?php if(!empty($error['password2'])){ echo $error['password2'];} ?></span><br>

    <input type="submit" name="submit" value="Envoyer">
<?php $this->stop('main_content') ?>
