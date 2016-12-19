<?php $this->layout('layout_product', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>
<div class="spacer"></div>
  <section class="thumbs container">
    <?php foreach($products as $product){ ?>
    <article>
      <a href="<?php echo $this->url("singleproduct",["id" => $product['id']]); ?>"><img class="img_thumbnail_back" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" /></a>
      <h3>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3>
      <a href="<?php echo $this->url("singleproduct",["id" => $product['id']]); ?>"><h4><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h4></a>
      <p>Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
      <p>Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
    </article>
    <?php } ?>
  </section>
<div class="spacer"></div>

<?php $this->stop('main_content') ?>
