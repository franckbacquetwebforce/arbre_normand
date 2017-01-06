
<?php $this->layout('layout', ['title' => 'Ajouter une adresse']) ?>

<?php $this->start('main_content') ?>
<div class="container-fluid" style="margin-top: 30px">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="header_panel">
          <h1 class="panel-title"><strong>Ajouter une adresse</strong></h1>
        </div>
        <div class="panel-body">
          <form class="" action="<?= $this->url('add_new_address_action') ?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstname">Prenom</label><br>
                  <input type="text" class="form-control" required="required" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="address">Adresse</label><br>
                  <input type="text" class="form-control" required="required" name="address" value="<?php if(!empty($_POST['address'])){ echo $_POST['address'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['address'])){ echo $errors['address'];} ?></span><br>

                </div>
                <div class="form-group">
                  <label for="zip">Code postal</label><br>
                  <input type="text" class="form-control" required="required" name="zip" value="<?php if(!empty($_POST['zip'])){ echo $_POST['zip'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['zip'])){ echo $errors['zip'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="phone">Telephone</label><br>
                  <input type="text" class="form-control" required="required" name="phone" value="<?php if(!empty($_POST['phone'])){ echo $_POST['phone'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['phone'])){ echo $errors['phone'];} ?></span><br>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">Nom</label><br>
                  <input type="text" class="form-control" required="required" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="city">Ville</label><br>
                  <input type="text" class="form-control" required="required" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['city'])){ echo $errors['city'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="country">Pays</label><br>
                  <input type="text" class="form-control" required="required" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country'];} ?>">
                  <span class="help-block"><?php if(!empty($errors['country'])){ echo $errors['country'];} ?></span><br>
                </div>
                <div class="form-group">
                  <label for="type">Type d'adresse</label>
                  <select  class="form-control" required="required" name="type">
                    <option value="facturation">Facturation</option>
                    <option value="livraison">Livraison</option>
                  </select>
                </div><br>
                <button class="btn btn-success" type="submit" name="submit">Ajouter une adresse</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <div class="col-md-2"></div>
  </div>
</div>
<?php $this->stop('main_content') ?>
