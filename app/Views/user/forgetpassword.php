<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>

<?php if(!empty($message)){ echo $message;} ?>
<?php if(!empty($mailerror)){ echo $mailerror;} ?>

<!-- Formulaire de mot de passe oublié en front-office -->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <section class="panel panel-default">
        <article class="header_panel">
          <h1 class="panel-title"><strong>Mot de passe oublié</strong></h1>
        </article>
        <article class="panel-body">
          <form id="forget" action="<?= $this->url('forgetpassword_action')?>" method="post">
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>"/>
              <span class="help-block" id="error_email"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">Soumettre</button>
            <br><div class="">
            <!-- Affichage du message de mail envoyé -->
            <?php if(!empty($message)){ echo $message;} ?>
            <!-- Affichage de l'erreur mail -->
            <?php if(!empty($mailerror)){ echo $mailerror;} ?>
            </div>
          </form>
        </article>
      </section>
    </div>
    <div class="col-md-3"></div>
  </div>
</main>

<?php $this->stop('main_content') ?>
