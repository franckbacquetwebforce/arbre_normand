<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>
<div class="container">
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
</div>
<?php $this->stop('main_content') ?>
