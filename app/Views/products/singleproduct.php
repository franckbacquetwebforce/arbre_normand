<?php $this->layout('layout_product', ['title' => 'Details']) ?>

<?php $this->start('main_content') ?>
<?php
$id_product = $product['id'];
$price_ht = $product['price_ht'];
$qt_product = '1';
?>
<div class="container_fluid single">
  <div class="row">
    <div class="col-xs-6">
      <figure class="thumbnail">
        <img src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>">
      </figure>
    </div>
    <div class="col-xs-6">
      <section class="thumbs container">
        <main class="main-area">
          <div class="centered">
            <section class="cards">
              <!-- AFFICHAGE DU PRODUIT CORRESPONDANT A l'ID -->
              <article class="card">
                <div class="card-content">
                  <h2><?php echo $product['product_name']; ?></h2>
                  <p><h3>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p>
                  <p class="caract">Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
                  <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                  <p class="caract">Stock : <?php if(!empty($product['stock'])) { echo $product['stock'];}  ?></p>
                  <p class="button"><a href="<?= $this->url('user_cart_add', ['l'=> $product['id'],'q'=> 1,'p'=> $product['price_ht']]); ?>"class="btn btn-success" title="">Ajouter au panier</a></p>
              </article>
            </section>
          </div>
        </main>
      </section>
    </div>
  </div>
</div>

  </div>
</div>
  <section class="article_single">
  <!-- AFFICHAGE DE LA DESCRIPTION -->
    <article>
      <div class="spacer"></div>
      <h3>Description du produit</h3>
      <p><?php echo nl2br($product['description']); ?></p>
      <div class="spacer"></div>
    </article>
  </section>

  <?php $this->stop('main_content') ?>
