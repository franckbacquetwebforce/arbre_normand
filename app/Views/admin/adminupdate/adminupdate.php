<!-- Formulaire de modification d'un compte administrateur -->
<!-- A mettre en forme -->
<?php $this->layout('layout_admin', ['title' => 'Modification du compte']) ?>

<?php $this->start('main_content') ?>
<?php  ?>
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Mise à jour du compte administrateur</strong></h1>
        </div>
        <div class="panel-body">
          <form id="forget" action="<?= $this->url('admin_user_update_action', ['id' => $w_user['id']]) ?>" method="post">
            <div class="form-group">
              <label class="formadmin" for="email">Email*</label>
              <input type="email" class="form-control" name="email" required="required" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];}else{ echo $w_user['email'];} ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span><br>
            </div>
            <div class="form-group">
              <label class="formadmin" for="password">Mot de passe*</label>
              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
              <span id="error_password"><?php if(!empty($errors['password'])){ echo $errors['password'];} ?></span><br>
            </div>
            <div class="form-group">
              <label class="formadmin" for="password2">Répéter le mot de passe*</label>
              <input type="password" class="form-control" name="password2" tabindex="1" required="required" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];} ?>"><br>
              <span id="error_password2"><?php if(!empty($errors['password2'])){ echo $errors['password2'];} ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">Mettre a jour votre compte admin</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>


<?php $this->stop('main_content') ?>
