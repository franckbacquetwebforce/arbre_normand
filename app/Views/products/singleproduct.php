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

              <!-- DEBUT SLIDER IMG PRODUCT HERMELEN -->

          	<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            	<ol class="carousel-indicators"><?php
              for ($i=0; $i < 1 ; $i++) { ?>
              	<li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="active"></li>
                <?php }
                for ($i=1; $i < count($img) ; $i++) { ?>
              	<li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>
                <?php } ?>
            	</ol>
            <!-- Wrapper for slides -->
            	<div class="carousel-inner" role="listbox"><?php
              for ($i=0; $i < 1 ; $i++) { ?>
                <div class="item active">
          				<img class ="slider_img img-responsive" src="<?= $this->url('default_home').$img[$i]['path'].$img[$i]['name']; ?>" alt="image <?= $i + 1 ?>: <?= $product['product_name'] ?>">
          			</div>
              <?php }
              for ($i=1; $i < count($img) ; $i++) { ?>
                <div class="item">
          					<img class ="slider_img img-responsive" src="<?= $this->url('default_home').$img[$i]['path'].$img[$i]['name']; ?>" alt="image <?= $i + 1 ?>: <?= $product['product_name'] ?>">
          			</div>
              <?php } ?>
            <!-- Left and right controls -->
            	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            	</a>
            	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            	</a>
          	</div>
              <!-- FIN SLIDER IMG PRODUCT HERMELEN -->

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
                  <p>''</p>
                  <p class="caract">Catégorie : <?php echo $product['category_name']; ?></p>
                  <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                  <p class="caract">Stock : <?php if(!empty($product['stock'])) { echo $product['stock'];}  ?></p>
                  <p>''</p>
                  <p class="button"><a href="<?= $this->url('user_cart_add', ['l'=> $product['id'],'q'=> 1,'p'=> $product['price_ht']]); ?>"class="btn btn-success" title="">Ajouter au panier</a></p>
              </article>
            </section>
          </div>
        </main>
      </section>
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
  </div>
</div>



  <?php $this->stop('main_content') ?>
