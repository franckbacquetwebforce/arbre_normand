<?php $this->layout('layout', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>
<div class="spacer"></div>
  <section class="thumbs container">
    <?php foreach($products as $product){
    

    ?>
    <article>
      <img class="img_thumbnail_back" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" />
      <h3><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h3>
      Description :
      <p><?php if(!empty($product['description'])) { echo $product['description'];} ?></p>
      <p>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</p>
      <p>Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
    </article>
    <?php } ?>
  </section>
<div class="spacer"></div>
<?php $this->stop('main_content') ?>
