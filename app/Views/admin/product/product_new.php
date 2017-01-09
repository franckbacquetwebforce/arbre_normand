<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content') ?>

<!-- Formulaire d'ajout de produit en back-office
     Mise en forme et CSS (Michèle et modif apportées par Hermelen) -->
<main class="container-fluid ajout">
  <section class="parent">
    <article class="enfant">
      <h1 class="titre">Nouveau produit</h1>
    </article>
  </section>
  <section class="row">
    <form class="responsive ajout-form" action="<?= $this->url('admin_product_new_action') ?>" method="post" enctype="multipart/form-data">
      <div class="col-sm-5 padding-box">
        <label for="product_name"><h4>Nom du produit :</h4></label>
        <span class="help-block"><?php if(!empty($error['product_name'])){echo $error['product_name'];} ?></span><br />
        <input type="text" name="product_name" class="form-control" value="<?php if(!empty($_POST['product_name'])){echo $_POST['product_name'];}?>"><br />
        <label for="description"><h4>Description</h4></label>
        <span class="help-block"><?php if(!empty($error['description'])){echo $error['description'];} ?></span><br />
        <textarea name="description" rows="12" cols="80" class="form-control"><?php if(!empty($_POST['description'])){echo $_POST['description'];}?></textarea><br />
        <div class="row">
          <div class="col-sm-4">
            <label for="width"><h5>Largeur en cm :</h5></label>
            <span class="help-block"><?php if(!empty($error['width'])){echo $error['width'];} ?></span>
            <input type="text" name="width" class="form-control" value="<?php if(!empty($_POST['width'])){echo $_POST['width'];} ?>">
          </div>
          <div class="col-sm-4">
            <label for="length"><h5>Longueur en cm :</h5></label>
            <span class="help-block"><?php if(!empty($error['length'])){echo $error['length'];} ?></span>
            <input type="text" name="length" class="form-control" value="<?php if(!empty($_POST['length'])){echo $_POST['length'];} ?>">
          </div>
          <div class="col-sm-4">
            <label for="height"><h5>Hauteur en cm :</h5></label>
            <span class="help-block"><?php if(!empty($error['height'])){echo $error['height'];} ?></span>
            <input type="text" name="height" class="form-control" value="<?php if(!empty($_POST['height'])){echo $_POST['height'];} ?>">
          </div>
        </div>

      </div>
			<div class="col-sm-2">
        <label for="price_ht"><h4>Prix HT :</h4></label>
        <span class="help-block"><?php if(!empty($error['price_ht'])){echo $error['price_ht'];} ?></span><br />
        <input type="text" name="price_ht" class="form-control" value="<?php if(!empty($_POST['price_ht'])){echo $_POST['price_ht'];}?>"><br />
        <label for="weight"><h4>Poids en kg :</h4></label>
        <span class="help-block"><?php if(!empty($error['weight'])){echo $error['weight'];} ?></span><br />
        <input type="text" name="weight" class="form-control" value="<?php if(!empty($_POST['weight'])){echo $_POST['weight'];}?>"><br />
        <label for="stock"><h4>Stock :</h4></label>
        <span class="help-block"><?php if(!empty($error['stock'])){echo $error['stock'];} ?></span><br />
        <input type="text" name="stock" class="form-control" value="<?php if(!empty($_POST['stock'])){echo $_POST['stock'];}?>"><br />
        <label for="id_category"><h4>Catégorie :</h4></label><br />
        <select class="form-control" name="id_category">
          <?php // Select categories dynamique
          foreach($categories as $category){?>
          <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
          <?php } ?>
        </select><br /><br />
			</div>
			<div class="col-sm-5">
        <label for="image_principale"><h4>Image principale: </h4></label>
        <span class="help-block"><?php if(!empty($error['image'])){echo $error['image'];} ?></span>
        <input type="file" name="image" class="form-control"/><br />

        <label for="image_secondaire1"><h4>Image secondaire 1: </h4></label>
        <span class="help-block"><?php if(!empty($error['imageSecondaire1'])){echo $error['imageSecondaire1'];} ?></span>
        <input type="file" name="imageSecondaire1" class="form-control" /><br />

        <label for="image_secondaire2"><h4>Image secondaire 2: </h4></label>
        <span class="help-block"><?php if(!empty($error['imageSecondaire2'])){echo $error['imageSecondaire2'];} ?></span>
        <input type="file" name="imageSecondaire2" class="form-control" /><br />

        <label for="image_secondaire3"><h4>Image secondaire 3: </h4></label>
        <span class="help-block"><?php if(!empty($error['imageSecondaire3'])){echo $error['imageSecondaire3'];} ?></span>
        <input type="file" name="imageSecondaire3" class="form-control"} /><br />
        <button class="btn btn-success modif_product" type="submit" name="submitfile" value="Envoyer">Envoyer</button>
      </div>
			<div class="spacer"></div>
	  </form>
	</section>
</main>

<?php $this->stop('main_content') ?>
