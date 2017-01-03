<?php $this->layout('layout', ['title' => 'Modification Password']) ?>

<?php $this->start('main_content') ?>
	<div class="container-fluid" style="margin-top: 30px">
	  <div class="row">
	    <div class="col-md-3"></div>
	    <div class="col-md-6">
	      <div class="panel panel-default">
	        <div class="header_panel">
	          <h1 class="panel-title"><strong>Réinitialisation du mot de passe</strong></h1>
	        </div>
	        <div class="panel-body">
	          <form class="" action="<?= $this->url('modifpassword_action')?>?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>&token=<?php if(!empty($_GET['token'])){echo $_GET['token'];}?>" method="post">
	            <div class="form-group">
	              <label for="password">Nouveau mot de passe*</label>
	              <input type="password" name="password" class="form-control" required="required" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
	              <span class="help-block" id="error_password"><?php if(!empty($errors['login'])) {echo $errors['login']; } ?></span><br>
	            </div>
	            <div class="form-group">
	              <label for="password2">Répéter le mot de passe</label>
	              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];}?>"><br>
	              <span  class="help-block" id="error_password2"><?php if(!empty($error['password2'])){ echo $error['password2'];} ?></span><br>
	            </div>
	            <button type="submit" class="btn btn-success">Se connecter</button>
	          </form>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-3"></div>
	  </div>
	</div>

  <!-- <form class="" action="<?= $this->url('modifpassword_action')?>?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>&token=<?php if(!empty($_GET['token'])){echo $_GET['token'];}?>" method="post">
    <div class="form-group donnees">
      <label for="password">Password*</label><br><br>
      <input type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
    <span class="erreur"><?php if(!empty($error['password'])){ echo $error['password'];} ?></span><br>

    <label for="password2">Repeat password*</label><br><br>
    <input type="password" name="password2" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];}?>"><br>
    <span class="erreur"><?php if(!empty($error['password2'])){ echo $error['password2'];} ?></span><br>

    <input type="submit" name="submit" value="Envoyer"> -->
<?php $this->stop('main_content') ?>
