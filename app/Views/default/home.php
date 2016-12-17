<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<?php
// debug($w_user);
?>
<div class="slider_container row">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		<li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
			<img src="<?= $this->assetUrl('images/amanite_phalloide.jpg') ?>" alt="amanite_phalloide">
		</div>
    <div class="item">
      <img src="<?= $this->assetUrl('images/champignon_paris.jpg') ?>" alt="Chania">
    </div>
    <div class="item">
      <img src="<?= $this->assetUrl('images/champignon_plat.jpg') ?>" alt="Flower">
    </div>
    <div class="item">
      <img src="<?= $this->assetUrl('images/champignon_sur_souche.jpg') ?>" alt="Flower">
    </div>
		<div class="item">
      <img src="<?= $this->assetUrl('images/champignons_tous.jpg') ?>" alt="Flower">
    </div>
		<div class="item">
      <img src="<?= $this->assetUrl('images/champignons_x4.jpg') ?>" alt="Flower">
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

<?php $this->stop('main_content') ?>
