<?php $this->layout('layout_product', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>

<!-- Page affichant la liste des produits en front-office -->
<!-- Mise en forme et CSS (Michèle et modif apportées par Hermelen) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Liste des produits</h1>
    </article>
  </section>
<?php foreach($products as $product){  ?>
        <div class="container col-xs-12 col-sm-6 col-md-4 col-lg-4"><!-- ajout de div pour placement articles -->
          <article class="card bordered">
            <figure class="thumbnail img_link"><!-- img_ling à vérifier -->
              <a href="<?php echo $this->url("singleproduct",["id" => $product['id_product']]); ?>" class="img_link"><!-- img_ling à vérifier -->
                <img class="img-responsive" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" alt="<?= $product['product_name'] ?>">
              </a>
            </figure>
            <div class="card-content">
              <h2><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h2>
              <p><h3><?php if(!empty($product['price_ht'])) {
                $priceht = $product['price_ht'];
                $tva = $priceht * 0.2;
                $pricettc = $priceht + $tva;
                echo number_format($pricettc, 2, ',', ' ');
              } ?> €</h3></p>
              <p class="caract">Catégorie : <?php if(!empty($product['category_name'])) { echo $product['category_name'];} ?></p>
              <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
              <p class="button"><a href="<?php echo $this->url("singleproduct",["id" => $product['id_product']]); ?>" class="btn btn-success" title="More">Details »</a></p>
            </div><!-- .card-content -->
          </article>
        </div><!-- ajout de div pour placement articles -->
<?php } ?>
<div class="spacer"></div>

<?php $this->stop('main_content') ?>
