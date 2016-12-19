<?php $this->layout('layout', ['title' => 'Details']) ?>

<?php $this->start('main_content') ?>
<?php
$id_order = 'test';
$id_product = $product['product_name'];
$price_ht = $product['price_ht'];
$qt_product = $product['1'];
?>
  <h2>Détail du produit</h2>
  <section class="article_single">

  <!-- AFFICHAGE DU PRODUIT CORRESPONDANT A l'ID -->

    <article>
      <img class="img_thumbnail_back" src="<?php echo $this->url('singleproduct').$product['path'].$product['name']; ?>" />
      <div class="spacer"></div>
      <h2><?php echo $product['product_name']; ?></h2>
      Description :
      <p><?php echo nl2br($product['description']); ?></p>
      <p>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</p>
      <p>Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
      <a href="cart?action=ajout&amp;o=id_order&amp;l=.<?= $id_product ?>.&amp;q=qt_product&amp;p=price_product" onclick="window.open(this.href, '',
      'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
      <div class="spacer"></div>
    </article>

  </section>

  <?php $this->stop('main_content') ?>
