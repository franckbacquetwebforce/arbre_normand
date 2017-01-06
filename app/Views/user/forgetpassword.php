<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Mot de passe oublié</strong></h1>
        </div>
        <div class="panel-body">
          <form id="forget" action="<?= $this->url('forgetpassword_action')?>" method="post">
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name="email" required="required" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">Soumettre</button>
            <br><div class="">
              <?php if(!empty($message)){ echo $message;} ?>
              <?php if(!empty($mailerror)){ echo $mailerror;} ?>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!-- <div class="container">
  <div class="row">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mot de passe oublié</h4>
      </div>
      <form class="" action="<?= $this->url('forgetpassword_action')?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label><br><br>
                <input type="email" name="email" tabindex="1" class="form-control" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>"><br><br>
                <span><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="isEmpty" value="">
          <button type="submit" name="submit" value="soumettre" class="btn btn-success btn-icon"><i class="fa fa-check"></i>Soumettre</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
<?php $this->stop('main_content') ?>
