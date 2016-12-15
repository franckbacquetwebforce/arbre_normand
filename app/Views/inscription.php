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
      <form id="inscription" action="<?= $this->url('blog_inscription_action'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email*</label><br><br>
                <input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"><br>
                <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password*</label><br><br>
                <input type="text" name="password" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>"><br>
                <span class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password2">Repeat password*</label><br><br>
                <input type="text" name="password2" value=""><br>
                <span class="help-block" ><?php if(!empty($_POST['password2'])){echo $_POST['password2'];} ?></span><br>
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
