
<?php $this->layout('layout', ['title' => 'Ajouter une adresse']) ?>

<?php $this->start('main_content') ?>
<form class="" action="<?= $this->url('admin_user_new_action') ?>" method="post">
  <label for="email">Prenom</label><br>
  <input type="text" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname'];} ?>">
  <span><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span><br>

  <label for="lastname">Nom</label><br>
  <input type="text" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname'];} ?>">
  <span><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span><br>

  <label for="address">Adresse</label><br>
  <input type="text" name="address" value="<?php if(!empty($_POST['address'])){ echo $_POST['address'];} ?>">
  <span><?php if(!empty($errors['address'])){ echo $errors['address'];} ?></span><br>

  <label for="city">Ville</label><br>
  <input type="text" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>">
  <span><?php if(!empty($errors['address'])){ echo $errors['address'];} ?></span><br>

  <label for="zip">Code postal</label><br>
  <input type="text" name="zip" value="<?php if(!empty($_POST['zip'])){ echo $_POST['zip'];} ?>">
  <span><?php if(!empty($errors['zip'])){ echo $errors['zip'];} ?></span><br>

  <label for="country">Pays</label><br>
  <input type="text" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country'];} ?>">
  <span><?php if(!empty($errors['country'])){ echo $errors['country'];} ?></span><br>

  <label for="type">Type d'adresse</label>
  <select class="" name="type">
    <option value="facturation">Facturation</option>
    <option value="livraison">Livraison</option>
  </select>


  <input type="submit" name="submit" value="Ajouter une adresse">
</form>
<?php $this->stop('main_content') ?>
