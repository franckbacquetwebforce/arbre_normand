<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?= $this->url('admin_product_new_action') ?>" method="post" enctype="multipart/form-data">
  <label for="product_name">Nom du produit :</label><br />
  <span class=""><?php if(!empty($error['product_name'])){echo $error['product_name'];} ?></span><br />
  <input type="text" name="product_name" value="<?php if(!empty($_POST['product_name'])){echo $_POST['product_name'];} ?>"><br /><br />
  <label for="description">Description</label><br />
  <span class=""><?php if(!empty($error['description'])){echo $error['description'];} ?></span><br />
  <textarea name="description" rows="8" cols="80"><?php if(!empty($_POST['description'])){echo $_POST['description'];} ?></textarea><br /><br />
  <label for="price_ht">Prix HT :</label><br />
  <span class=""><?php if(!empty($error['price_ht'])){echo $error['price_ht'];} ?></span><br />
  <input type="text" name="price_ht" value="<?php if(!empty($_POST['price_ht'])){echo $_POST['price_ht'];} ?>"><br /><br />
  <label for="weight">Poids en kg :</label><br />
  <span class=""><?php if(!empty($error['weight'])){echo $error['weight'];} ?></span><br />
  <input type="text" name="weight" value="<?php if(!empty($_POST['weight'])){echo $_POST['weight'];} ?>"><br /><br />
  <label for="stock">Nombre de produits en stock :</label><br />
  <span class=""><?php if(!empty($error['stock'])){echo $error['stock'];} ?></span><br />
  <input type="text" name="stock" value="<?php if(!empty($_POST['stock'])){echo $_POST['stock'];} ?>"><br /><br />
  <label for="id_category">Catégorie :</label><br />
  <select class="" name="id_category">
    <option value="1">Catégorie 1</option>
    <option value="2">Catégorie 2</option>
    <option value="3">Catégorie 3</option>
    <option value="4">Catégorie 4</option>
  </select><br />
  <label for="image_principale">Image principale :</label><br />
  <span class=""><?php if(!empty($error['image_principale'])){echo $error['image_principale'];} ?></span><br /><br />
  <input type="file" name="image_principale" /><br />
  <label for="image_secondaire1">Image secondaire 1 :</label><br />
  <span class=""><?php if(!empty($error['image_secondaire1'])){echo $error['image_secondaire1'];} ?></span><br /><br />
  <input type="file" name="image_secondaire1" /><br />
  <label for="image_secondaire2">Image secondaire 2 :</label><br />
  <span class=""><?php if(!empty($error['image_secondaire2'])){echo $error['image_secondaire2'];} ?></span><br /><br />
  <input type="file" name="image_secondaire2" /><br />
  <label for="image_secondaire3">Image secondaire 3 :</label><br />
  <span class=""><?php if(!empty($error['image_secondaire3'])){echo $error['image_secondaire3'];} ?></span><br /><br />
  <input type="file" name="image_secondaire3" /><br />
  <br /><input type="submit" name="submitfile" value="Envoyer">
</form>

<?php $this->stop('main_content') ?>
