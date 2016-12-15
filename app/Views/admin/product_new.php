<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content') ?>

<form class="" action="index.html" method="post" enctype="multipart/form-data">
  <label for="product_name">Nom du produit :</label><br />
  <input type="text" name="product_name" value=""><br />
  <label for="description">Description</label><br />
  <textarea name="description" rows="8" cols="80"></textarea><br />
  <label for="price_ht">Prix HT :</label><br />
  <input type="text" name="price_ht" value=""><br />
  <label for="weight">Poids en kg :</label><br />
  <input type="text" name="weight" value=""><br />
  <label for="stock">Nombre de produits en stock :</label><br />
  <input type="text" name="stock" value=""><br />
  <select class="" name="">
    <option value="1">Catégorie 1</option>
    <option value="2">Catégorie 2</option>
    <option value="3">Catégorie 3</option>
    <option value="4">Catégorie 4</option>
  </select><br />
  <input type="file" name="image" /><br />
  <input type="submit" name="submitfile" value="Envoyer">
</form>

<?php $this->stop('main_content') ?>
