<?php $this->layout('layout_home', ['title' => 'Accueil']) ?>
<?php $this->start('slider') ?>
<div class="logo_slider container-fluid">
	<div class="logo_container col-xs-3 col-sm-3 col-lg-3 col-lg-3">
		<h1>L'Arbre Normand</h1>
	</div>
  <div class="slider_container col-xs-9 col-sm-9 col-lg-9 col-lg-9">
  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    	<ol class="carousel-indicators">
      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      	<li data-target="#myCarousel" data-slide-to="1"></li>
      	<li data-target="#myCarousel" data-slide-to="2"></li>
      	<li data-target="#myCarousel" data-slide-to="3"></li>
  			<li data-target="#myCarousel" data-slide-to="4"></li>
    	</ol>
    <!-- Wrapper for slides -->
    	<div class="carousel-inner" role="listbox">
      	<div class="item row active">
  				<img class ="slider_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/amanite_phalloide_140x300.jpg') ?>" alt="amanite_phalloide">
  				<div class="div_item_carroussel col-xs-12 col-sm-4 col-md-4 col-lg-4">
  					<h2>Titre</h2>
  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  				</div>
  			</div>
      	<div class="item row ">
  				<img class ="slider_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignon_paris_140x300.jpg') ?>" alt="Chania">
  				<div class="div_item_carroussel col-xs-12 col-sm-4 col-md-4 col-lg-4">
  					<h2>Titre</h2>
  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  				</div>
      	</div>
      	<div class="item row ">
  				<img class ="slider_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignon_plat_sur_souche_140x300.jpg') ?>" alt="Flower">
  				<div class="div_item_carroussel col-xs-12 col-sm-4 col-md-4 col-lg-4">
  					<h2>Titre</h2>
  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  				</div>
      	</div>
  			<div class="item row ">
  				<img class ="slider_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignons_tous_140x300.jpg') ?>" alt="Flower">
  				<div class="div_item_carroussel col-xs-12 col-sm-4 col-md-4 col-lg-4">
  					<h2>Titre</h2>
  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  				</div>
      	</div>
  			<div class="item row ">
  				<img class ="slider_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignons_x4_140x300.jpg') ?>" alt="Flower">
  				<div class="div_item_carroussel col-xs-12 col-sm-4 col-md-4 col-lg-4">
  					<h2>Titre</h2>
  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  				</div>
      	</div>
  		</div>
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
  </div>
</div>
<?php $this->stop('slider') ?>

<?php $this->start('main_content') ?>
<?php
// debug($w_user);
?>
	<h1 class"presentation_title">CE QUE VOUS TROUVEREZ SUR CE SITE</h1>
	<article class="presentation_detail card">
		<img class="presentation_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignon_plat_sur_souche_lite.jpg') ?>" alt="champignon_plat_sur_souche">
		<div class="presentation_div_text col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<h2>Palissades </h2>
			<p>Palissades palissades palissades palissades palissades palissades palissades palissades palissades palissades palissades </p>
		</div>
		<div class="spacer"></div>
	</article>
	<article class="presentation_detail card">
		<div class="presentation_div_text col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<h2>Champignons tables </h2>
			<p>Champignons tables champignons tables champignons tables champignons tables champignons tables champignons tables </p>
		</div>
		<img class="presentation_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignons_tous_lite.jpg') ?>" alt="champignon_plat_sur_souche">
		<div class="spacer"></div>
	</article>
	<article class="presentation_detail card">
		<img class="presentation_img col-xs-12 col-sm-8 col-md-8 col-lg-8" src="<?= $this->assetUrl('images/champignon_paris_lite.jpg') ?>" alt="champignon_plat_sur_souche">
		<div class="presentation_div_text col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<h2>Champignons </h2>
			<p>Champignons champignons champignons champignons champignons champignons champignons champignons champignons </p>
		</div>
		<div class="spacer"></div>
	</article>
<?php $this->stop('main_content') ?>
