<?php $this->layout('layout', ['title' => 'Details']) ?>

<?php $this->start('main_content') ?>
<?php
if(!empty($_SESSION)){
if(array_key_exists('cart', $_SESSION)){
	$key = array_search($product['prod_id'] , $_SESSION['cart']['id_product']);}}
$price_ht = $product['price_ht'];
// debug($_SESSION);
// debug($product['stock']);
// debug($_SESSION['cart']['qt_product'][$key]);
// debug($key);
// debug($product['prod_id']);
// debug($productOriginal);
// debug($img);
?>
<!-- <div class="container"> -->
		<!-- <div class="card"> -->
			<div class="container-fluid">
				<div class="wrapper row">
					<div class="preview col-md-6">
            <figure class="thumbnail">
              <!-- DEBUT SLIDER IMG PRODUCT HERMELEN -->
          	   <div id="myCarousel" class="carousel slide" data-ride="carousel">
                 <!-- Indicators -->
            	    <ol class="carousel-indicators">
              <?php for ($i=0; $i < 1 ; $i++) { ?>
              	      <li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="active"></li>
              <?php }
                    for ($i=1; $i < count($img) ; $i++) { ?>
              	      <li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>
              <?php } ?>
            	     </ol>
              <!-- Wrapper for slides -->
            	<div class="carousel-inner" role="listbox">
          <?php for ($i=0; $i < 1 ; $i++) { ?>
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
            <!-- <section class="thumbs container"> -->
            <!-- <main class="main-area"> -->
              <!-- <div class="centered"> -->
                <!-- <section class="cards"> -->
              <!-- AFFICHAGE DU PRODUIT CORRESPONDANT A l'ID -->
                  <!-- <article class="card"> -->
                    <!-- <div class="card-content"> -->
										<div class="singlecard">
											<h2><?php echo $product['product_name']; ?></h2>
                      <p><h3>Prix : <?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p><br>
                      <p class="caract">Catégorie : <?php echo $product['category_name']; ?></p>
                      <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                      <p class="caract">Longueur : <?php if(!empty($product['weight'])) { echo $product['length'];}  ?> cm</p>
                      <p class="caract">Largeur : <?php if(!empty($product['weight'])) { echo $product['width'];}  ?> cm</p>
                      <p class="caract">Hauteur : <?php if(!empty($product['weight'])) { echo $product['height'];}  ?> cm</p>

                      <?php if(!empty($product['stock'])){ //si le stock est renseigné?>
                      	<p class="caract">Stock : <?php  echo $product['stock']  ?></p><br>


													<?php if($product['stock']>0){// 1-si stock > 0
												 		if(!empty($_SESSION) && array_key_exists('cart', $_SESSION)){ //2-si le panier existe
															if(!empty($key) || $key = 0){// 3- si le produit existe dans le panier
																if($product['stock']>$_SESSION['cart']['qt_product'][$key]){ //4-si le stock est superieur au panier ?>
																	<p  class="button addtocart"><a id="addtocart" href="<?= $this->url('user_cart_add_new', ['l'=> $product['prod_id'],'q'=> 1,'p'=> $product['price_ht']]); ?>"class="btn btn-success">Ajouter au panier</a></p>
																<?php }else{ //4-sinon ?>
																	<p id="specialorder" class="button no-stock"><a class="btn btn-danger" title="">Quantité maximale atteinte</a></p>
																<?php } ?>
															<?php }else{ //3- sinon ?>
																<p  class="button addtocart"><a id="addtocart" href="<?= $this->url('user_cart_add_new', ['l'=> $product['prod_id'],'q'=> 1,'p'=> $product['price_ht']]); ?>"class="btn btn-success">Ajouter au panier</a></p>
																<?php } ?>
														<?php }else{ //2-sinon ?>
															<p  class="button addtocart"><a id="addtocart" href="<?= $this->url('user_cart_add_new', ['l'=> $product['prod_id'],'q'=> 1,'p'=> $product['price_ht']]); ?>"class="btn btn-success">Ajouter au panier</a></p>
														<?php } ?>
													<?php }else{ //1-sinon ?>
														<p id="specialorder" class="button no-stock"><a class="btn btn-danger" title="">Uniquement sur commande</a></p>
													<?php } ?>
													<?php }else{ ?>
														<p id="specialorder" class="button no-stock"><a class="btn btn-warning" title="">Stock inconnu</a></p>
													<?php } ?>

												<div id="status-area"></div>
										</div>


                    <!-- </div> -->
                  <!-- </article> -->
                <!-- </section> -->
              <!-- </div> -->
            <!-- </main> -->
            <!-- </section> -->
          </div>
          <section class="article_single">
            <!-- AFFICHAGE DE LA DESCRIPTION -->
            <article>

              <div class="spacer"></div>
              <h3>Description du produit</h3>
              <p><?php echo nl2br($product['description']); ?></p>
              <div class="spacer"></div>
              <p class="button"><a class="colorlien btn btn-primary" href="<?= $this->url('user_cart') ?>">Voir mon panier</a></p>
            </article>
          </section>
        </div>
      </div>
    <!-- </div> -->
<!-- </div> -->



  <?php $this->stop('main_content') ?>
