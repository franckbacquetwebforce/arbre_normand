<?php $this->layout('layout_product', ['title' => 'Details']) ?>

<?php $this->start('main_content') ?>
  <h2>Détail du produit</h2>
  <section class="article_single">

  <!-- AFFICHAGE DU PRODUIT CORRESPONDANT A l'ID -->

    <article>
      <img class="img_thumbnail_back" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" />
      <div class="spacer"></div>
      <h2><?php echo $product['product_name']; ?></h2>
      Description :
      <p><?php echo nl2br($product['description']); ?></p>
      <p>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</p>
      <p>Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
      <p>Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
      <p>Stock : <?php if(!empty($product['stock'])) { echo $product['stock'];}  ?> Kg</p>
      <div class="spacer"></div>
    </article>

  </section>

  <?php $this->stop('main_content') ?>
