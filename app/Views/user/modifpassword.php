<?php $this->layout('layout', ['title' => 'Modification Password']) ?>

<?php $this->start('main_content') ?>

<!-- FORMULAIRE de réinitialisation du mot de passe avec affichage des erreurs-->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <section class="panel panel-default">
        <article class="header_panel">
          <h1 class="panel-title"><strong>Réinitialisation du mot de passe</strong></h1>
        </article>
        <article class="panel-body">
          <form class="" action="<?= $this->url('modifpassword_action')?>?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>&token=<?php if(!empty($_GET['token'])){echo $_GET['token'];}?>" method="post">
            <div class="form-group">
              <label for="password">Nouveau mot de passe*</label>
              <input type="password" name="password" class="form-control" value="<?php if(!empty($_POST['password'])){ echo $_POST['password'];} ?>"><br>
              <span class="help-block" id="error_password"><?php if(!empty($errors['password'])) {echo $errors['password']; } ?></span><br>
            </div>
            <div class="form-group">
              <label for="password2">Répéter le mot de passe</label>
              <input type="password" class="form-control" name="password2" tabindex="1" value="<?php if(!empty($_POST['password2'])){ echo $_POST['password2'];}?>"><br>
              <span  class="help-block" id="error_password2"><?php if(!empty($errors['password2'])){ echo $errors['password2'];} ?></span><br>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Modifier le password">
          </form>
        </article>
      </section>
    </div>
    <div class="col-md-3"></div>
  </div>
</main>

<?php $this->stop('main_content') ?>
