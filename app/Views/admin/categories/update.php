<?php
$this->layout('layout_admin', ['title' => 'Modification d\'une catégorie']) ?>

<?php $this->start('main_content') ?>
<form class="" action="<?= $this->url('admin_categories_update_action',['id' => $cat['id']]) ?>" method="post">
  <label for="name">Nom de la catégorie</label><br>
  <input type="text" name="name" value="<?php if(!empty($_POST['name'])){ echo $_POST['name'];} else { if(!empty($cat['category_name'])) echo $cat['category_name'];} ?>">
  <span><?php if(!empty($errors['name'])){ echo $errors['name'];} ?></span><br>

  <label for="status">Status de la catégorie</label>
  <select class="" name="status">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>

  <input type="submit" name="submit" value="Créer une nouvelle catégorie">
</form>
<?php $this->stop('main_content') ?>
