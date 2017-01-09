<?php $this->layout('layout', ['title' => 'Ajouter une adresse']) ?>

<?php $this->start('main_content') ?>

<!-- Formulaire pour ajouter une adresse client en front-office -->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid" style="margin-top: 30px">
  <section class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <section class="panel panel-default">
        <article class="header_panel">
          <h1 class="panel-title"><strong>Ajouter une adresse</strong></h1>
        </article>
        <article class="panel-body">
          <form class="" action="<?= $this->url('add_new_address_action') ?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstname">Prenom</label><br>
                  <input type="text" class="form-control" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="address">Adresse</label><br>
                  <input type="text" class="form-control" name="address" value="<?php if(!empty($_POST['address'])){ echo $_POST['address'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['address'])){ echo $errors['address'];} ?></span><br>

                </div>
                <div class="form-group">
                  <label for="zip">Code postal</label><br>
                  <input type="text" class="form-control" name="zip" value="<?php if(!empty($_POST['zip'])){ echo $_POST['zip'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['zip'])){ echo $errors['zip'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="phone">Telephone</label><br>
                  <input type="text" class="form-control" name="phone" value="<?php if(!empty($_POST['phone'])){ echo $_POST['phone'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['phone'])){ echo $errors['phone'];} ?></span><br>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">Nom</label><br>
                  <input type="text" class="form-control" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="city">Ville</label><br>
                  <input type="text" class="form-control" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['city'])){ echo $errors['city'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="country">Pays</label><br>
                  <input type="text" class="form-control" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['country'])){ echo $errors['country'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="type">Type d'adresse</label>
                  <select  class="form-control" name="type">
                    <option value="facturation">Facturation</option>
                    <option value="livraison">Livraison</option>
                  </select>
                </div><br>
                <button class="btn btn-success" style="text-align:center;" type="submit" name="submit">Ajouter</button>
              </div>
            </div>
          </form>
        </article>
      </section>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>

<?php $this->stop('main_content') ?>
