<?php $this->layout('layout_product', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>

<div class="spacer"></div>
  <section class="thumbs container">
    <main class="main-area">
      <div class="centered">
        <section class="cards">
          <?php foreach($products as $product){  ?>
          <article class="card">
              <figure class="thumbnail">
              <img class="img-responsive" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" alt="meow">
              </figure>
              <div class="card-content">
                <h2><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h2>
                <p><h3><?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p>
                <p>''</p>
                <!-- <p class="caract">Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p> -->
                <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                <p>''</p>
                <p class="button"><a href="<?php echo $this->url("singleproduct",["id" => $product['id']]); ?>" class="btn btn-success" title="More">Details »</a></p>
              </div><!-- .card-content -->
          </article>
          <?php } ?>
        </section><!-- .card -->
      </div><!-- .centered -->
    </main>
    <!-- <article>
     <a href="<?php echo $this->url("singleproduct",["id" => $product['id']]); ?>"><img class="img_thumbnail_back" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" /></a>
     <p><h3>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p>
     <p><a href="<?php echo $this->url("singleproduct",["id" => $product['id']]); ?>"><h4><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h4></a></p>
     <p>Catégorie : <?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></p>
     <p>Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
   </article> -->

  </section>
<div class="spacer"></div>

<?php $this->stop('main_content') ?>
