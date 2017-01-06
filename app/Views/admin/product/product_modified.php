<?php $this->layout('layout_admin', ['title' => 'Modification du produit']) ?>
<?php $this->start('main_content') ?>
	<h2>Modification du produit</h2>
  <form class="" action="<?= $this->url('admin_product_update_action',['id' => $product['id']])?>" method="post">

    <label for="product_name">Nom du produit :</label><br/>
    <span class=""><?php if(!empty($error['product_name'])){echo $error['product_name'];} ?></span><br />
    <input type="text" name="product_name" value="<?php if(!empty($_POST['product_name'])){echo $_POST['product_name'];}else{if(!empty($product['product_name'])){echo $product['product_name'];}} ?>"><br/><br/>

    <label for="description">Description</label><br />
    <span class=""><?php if(!empty($error['description'])){echo $error['description'];} ?></span><br />
    <textarea name="description" rows="8" cols="80"><?php if(!empty($_POST['description'])){echo $_POST['description'];}else{if(!empty($product['description'])){echo $product['description'];}} ?> </textarea><br /><br />

    <label for="price_ht">Prix HT :</label><br />
    <span class=""><?php if(!empty($error['price_ht'])){echo $error['price_ht'];} ?></span><br/>
    <input type="text" name="price_ht" value="<?php if(!empty($_POST['price_ht'])){echo $_POST['price_ht'];}else{if(!empty($product['price_ht'])){echo $product['price_ht'];}} ?>"><br /><br/>

    <label for="weight">Poids en kg :</label><br />
    <span class=""><?php if(!empty($error['weight'])){echo $error['weight'];} ?></span><br />
    <input type="text" name="weight" value="<?php if(!empty($_POST['weight'])){echo $_POST['weight'];}else{if(!empty($product['weight'])){echo $product['weight'];}} ?>"><br/><br/>

    <label for="stock">Nombre de produits en stock :</label><br />
    <span class=""><?php if(!empty($error['stock'])){echo $error['stock'];} ?></span><br />
    <input type="text" name="stock" value="<?php if(!empty($_POST['stock'])){echo $_POST['stock'];}else{if(!empty($product['stock'])){echo $product['stock'];}} ?>"><br /><br />

    <label for="id_category">Catégorie :</label><br /><br />
    <select class="" name="id_category">
      <option value="1">Catégorie 1</option>
      <option value="2">Catégorie 2</option>
      <option value="3">Catégorie 3</option>
      <option value="4">Catégorie 4</option>
    </select><br /><br />
    <label for="image_principale">Image principale :</label>
    <span class=""><?php if(!empty($error['image'])){echo $error['image'];} ?></span><br />
    <input type="file" name="image" /><br /><br />
    <label for="image_secondaire1">Image secondaire 1 :</label>
    <span class=""><?php if(!empty($error['imageSecondaire1'])){echo $error['imageSecondaire1'];} ?></span><br />
    <input type="file" name="imageSecondaire1" /><br /><br />
    <label for="image_secondaire2">Image secondaire 2 :</label>
    <span class=""><?php if(!empty($error['imageSecondaire2'])){echo $error['imageSecondaire2'];} ?></span><br />
    <input type="file" name="imageSecondaire2" /><br /><br />
    <label for="image_secondaire3">Image secondaire 3 :</label>
    <span class=""><?php if(!empty($error['imageSecondaire3'])){echo $error['imageSecondaire3'];} ?></span><br />
    <input type="file" name="imageSecondaire3" /><br /><br />
    <br /><input type="submit" name="submitfile" value="Envoyer">
  </form>

  <?php $this->stop('main_content') ?>
