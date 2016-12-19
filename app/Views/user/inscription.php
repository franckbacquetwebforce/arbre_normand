<?php $this->layout('layout', ['title' => 'Inscription']) ?>
<?php $this->start('main_content') ?>
<!-- FORMULAIRE d'inscription avec affichage des erreurs-->
<div class="container">
  <div class="row">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Creer un nouveau compte</h4>
      </div>
      <div id="inscriptiondone"></div>
      <form id="inscription" action="<?= $this->url('register_action'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username*</label><br><br>
                <input type="text" name="username" class="form-control" value="<?php if(!empty($_POST['username'])){echo $_POST['username'];}?>"><br>
                <span class="help-block" id="error_username"><?php if(!empty($errors['username'])) {echo $errors['username']; } ?></span><br>
              </div>
              <div class="form-group">
                <label for="email">Email*</label><br><br>
                <input type="email" name="email" class="form-control" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"><br>
                <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password*</label><br><br>
                <input type="password" name="password" class="form-control" value=""><br>
                <span class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password2">Repeat password*</label><br><br>
                <input type="password" name="password2" class="form-control" value=""><br>
                <span class="help-block" ><?php if(!empty($errors['password2'])) {echo $errors['password2']; } ?></span><br>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <input type="hidden" name="isEmpty" value="">
        <button type="submit" name="submit" value="Je m'inscris" class="btn btn-success btn-icon"><i class="fa fa-check"></i> Creer mon compte</button>
      </div>
    </form>
  </div>
</div>
<?php $this->stop('main_content') ?>
