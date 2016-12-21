<?php $this->layout('layout', ['title' => 'Inscription']) ?>
<?php $this->start('main_content') ?>
<!-- FORMULAIRE d'inscription avec affichage des erreurs-->
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title"><strong>Creer un nouveau compte</strong></h1>
        </div>
        <div class="panel-body">
          <form id="inscription" action="<?= $this->url('register_action'); ?>" method="post">
            <div class="form-group">
              <label for="username">Username*</label>
              <input type="text" class="form-control" name="username" required="required" value="<?php if(!empty($_POST['username'])) {echo $_POST['username']; } ?>"/>
              <span class="help-block" id="error_username"><?php if(!empty($errors['username'])) {echo $errors['username']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="username">Email*</label>
              <input type="email" class="form-control" name="email" required="required" value="<?php if(!empty($_POST['email'])) {echo $_POST['email']; } ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password">Password*</label>
              <input type="password" class="form-control" name="password" tabindex="1" required="required" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
              <span id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password2">Repeat password*</label>
              <input type="password" class="form-control" name="password2" tabindex="1" required="required" value="<?php if(!empty($_POST['password2'])){echo $_POST['password2'];}?>"><br>
              <span id="error_password2"><?php if(!empty($errors['password2'])) {echo $errors['password2']; } ?></span><br>
            </div>
            <button type="submit" class="btn btn-sm btn-default">S'inscrire'</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!-- <div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Creer un nouveau compte</h4>
        </div>
        <div id="inscriptiondone"></div>
        <form id="inscription" action="<?= $this->url('register_action'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
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
            <div class="form-group">
              <label for="password">Password*</label><br><br>
              <input type="password" name="password" class="form-control" value=""><br>
              <span class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password2">Repeat password*</label><br><br>
              <input type="password" name="password2" class="form-control" value=""><br>
              <span class="help-block" ><?php if(!empty($errors['password2'])) {echo $errors['password2']; } ?></span><br>
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
    <div class="col-md-2"></div>
  </div>
</div> -->
<?php $this->stop('main_content') ?>
