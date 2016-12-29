<?php $this->layout('layout_admin_product', ['title' => 'Modification du produit']) ?>
<?php $this->start('main_content');

?>
<div class="parent">
  <div class="enfant">
    <h1>Modification du produit</h1>
  </div>
</div>
<div class="container-fluid ajout">
  <div class="row">
    <form class="responsive modif-form" action="<?= $this->url('admin_product_update_action',['id' => $product['id']])?>" method="post" enctype="multipart/form-data">
      <div class="col-sm-5 padding-box">
        <label for="product_name"><h4>Nom du produit :</h4></label>
        <span class=""><?php if(!empty($error['product_name'])){echo $error['product_name'];} ?></span><br />
        <input type="text" name="product_name" class="form-control" value="<?php if(!empty($_POST['product_name'])){echo $_POST['product_name'];}else{echo $product['product_name'];} ?>"><br />
        <label for="description"><h4>Description</h4></label>
        <span class=""><?php if(!empty($error['description'])){echo $error['description'];} ?></span><br />
        <textarea name="description" rows="12" cols="80" class="form-control"><?php if(!empty($_POST['description'])){echo $_POST['description'];}else{echo $product['description'];} ?></textarea><br /><br />
			</div>
			<div class="col-sm-2">
        <label for="price_ht"><h4>Prix HT :</h4></label>
        <span class=""><?php if(!empty($error['price_ht'])){echo $error['price_ht'];} ?></span><br />
        <input type="text" name="price_ht" class="form-control" value="<?php if(!empty($_POST['price_ht'])){echo $_POST['price_ht'];}else{echo $product['price_ht'];} ?>"><br />
        <label for="weight"><h4>Poids en kg :</h4></label>
        <span class=""><?php if(!empty($error['weight'])){echo $error['weight'];} ?></span><br />
        <input type="text" name="weight" class="form-control" value="<?php if(!empty($_POST['weight'])){echo $_POST['weight'];}else{echo $product['weight'];} ?>"><br />
        <label for="stock"><h4>Stock :</h4></label>
        <span class=""><?php if(!empty($error['stock'])){echo $error['stock'];} ?></span><br />
        <input type="text" name="stock" class="form-control" value="<?php if(!empty($_POST['stock'])){echo $_POST['stock'];}else{echo $product['stock'];} ?>"><br />
        <label for="id_category"><h4>Catégorie :</h4></label><br />
        <select class="form-control" name="id_category">
          <?php // Select categories dynamique
          foreach($categories as $category){?>
          <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
          <?php } ?>
        </select><br /><br />
			</div>
			<div class="col-sm-5">
        <label for="image_principale"><h4>Image principale: <span class="product_modified_img_name"><?= $imageProduct[0]['original_name']; ?></span></h4></label>
        <span class=""><?php if(!empty($error['image'])){echo $error['image'];} ?></span>
        <img class="img-responsive product_modified_img" src="<?= $this->url('default_home').$imageProduct[0]['path'].$imageProduct[0]['name']; ?>" alt="<?= $imageProduct[0]['original_name']; ?>">
        <input type="file" name="image" class="form-control"/><br />

        <label for="image_secondaire1"><h4>Image secondaire 1: <span class="product_modified_img_name"><?= $imageProduct[1]['original_name']; ?></span></h4></label>
        <span class=""><?php if(!empty($error['imageSecondaire1'])){echo $error['imageSecondaire1'];} ?></span>
        <img class="img-responsive product_modified_img" src="<?= $this->url('default_home').$imageProduct[1]['path'].$imageProduct[1]['name']; ?>" alt="<?= $imageProduct[0]['original_name']; ?>">
        <input type="file" name="imageSecondaire1" class="form-control" /><br />

        <label for="image_secondaire2"><h4>Image secondaire 2: <span class="product_modified_img_name"><?= $imageProduct[2]['original_name']; ?></span></h4></label>
        <span class=""><?php if(!empty($error['imageSecondaire2'])){echo $error['imageSecondaire2'];} ?></span>
        <img class="img-responsive product_modified_img" src="<?= $this->url('default_home').$imageProduct[2]['path'].$imageProduct[2]['name']; ?>" alt="<?= $imageProduct[0]['original_name']; ?>">
        <input type="file" name="imageSecondaire2" class="form-control" /><br />

        <label for="image_secondaire3"><h4>Image secondaire 3: <span class="product_modified_img_name"><?= $imageProduct[3]['original_name']; ?></span></h4></label>
        <span class=""><?php if(!empty($error['imageSecondaire3'])){echo $error['imageSecondaire3'];} ?></span>
        <img class="img-responsive product_modified_img" src="<?= $this->url('default_home').$imageProduct[3]['path'].$imageProduct[3]['name']; ?>" alt="<?= $imageProduct[0]['original_name']; ?>">
        <input type="file" name="imageSecondaire3" class="form-control"} /><br />
        <br /><button class="btn btn-success modif_product" type="submit" name="submitfile" value="Envoyer">Envoyer</button>
      </div>
			<div class="spacer"></div>
	  </form>
	</div>
</div>
  <?php $this->stop('main_content') ?>
