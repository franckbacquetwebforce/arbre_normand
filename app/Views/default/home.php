<?php $this->layout('layout_home', ['title' => 'Accueil']) ?>
<?php $this->start('slider') ?>
	<img class="arbre_header" src="<?= $this->assetUrl('images/arbre/arbre_blanc_ter.png') ?>" alt="">
	<div id="logo_container" class="logo_container col-lg-3 col-lg-3">
		<img class="logo_header" src="<?= $this->assetUrl('images/SVG/logo.svg') ?>" alt="">
		<div id="container" class="leaves_container">
		</div>
	</div>
  <div class="slider_container col-xs-12 col-sm-6 col-md-9 col-lg-6">
  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    																					<!-- Indicators -->
    	<ol class="carousel-indicators">
      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      	<li data-target="#myCarousel" data-slide-to="1"></li>
      	<li data-target="#myCarousel" data-slide-to="2"></li>
      	<li data-target="#myCarousel" data-slide-to="3"></li>
  			<li data-target="#myCarousel" data-slide-to="4"></li>
				<li data-target="#myCarousel" data-slide-to="5"></li>
      	<li data-target="#myCarousel" data-slide-to="6"></li>
      	<li data-target="#myCarousel" data-slide-to="7"></li>
    	</ol>
    																					<!-- Wrapper for slides -->
    	<div class="carousel-inner" role="listbox">
      	<div class="item active">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (1).jpg') ?>" alt="amanite_phalloide">
  			</div>
      	<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (2).jpg') ?>" alt="Chania">
      	</div>
      	<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (3).jpg') ?>" alt="Flower">
      	</div>
  			<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (4).jpg') ?>" alt="Flower">
      	</div>
  			<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (5).jpg') ?>" alt="Flower">
      	</div>
				<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (6).jpg') ?>" alt="Flower">
      	</div>
				<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (7).jpg') ?>" alt="Flower">
      	</div>
				<div class="item">
  				<img class ="slider_img" src="<?= $this->assetUrl('images/images_1x2/2x1 (8).jpg') ?>" alt="Flower">
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
	<div class = "description_container col-xs-12 col-sm-6 col-md-3 col-lg-3"><!-- div vide espace left -->
				<img class="abattage_header"src="<?= $this->assetUrl('images/SVG/abattage.svg') ?>" alt="">
				<div class="presentation_header">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
	</div>
<?php $this->stop('slider') ?>

<?php $this->start('main_content') ?>
<?php
// debug($w_user);
?>
<!-- AUTRE PROPOSITION MICHELE-->

<!-- <div class="container Articles"> CONTAINER fait bugger les col-xs... parents-->
<div class="Articles">
  <div class="row">
    <!-- <div class="col-xs-12 col-md-9"> IDEM les col-xs... parents font déjà le boulot-->
		<div class="">
			<div class="parent">
				<div class="enfant">
					<h1>CE QUE VOUS TROUVEREZ SUR CE SITE</h1>
				</div>
			</div>
			<article class="accueil">
      <!-- <article class="col-xs-12"> IDEM les col-xs... parents font déjà le boulot-->
        <h2 class="media-heading">Champignons en bois</h2>
				<img class="img-responsive media-object img_presentation_home" src="<?= $this->assetUrl('images/images_10x15/3x2 (17).jpg') ?>" alt="...">
        <p>
					Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.
					Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi.        </p>
					<div class="spacer"></div><!-- il manquait un spacer -->
      </article>
			<article class="accueil">
      <!-- <article class="col-xs-12"> IDEM les col-xs... parents font déjà le boulot-->
        <h2 class="media-heading">Champignons tables</h2>
				<img class="img-responsive media-object img_presentation_home" src="<?= $this->assetUrl('images/images_10x15/3x2 (20).jpg') ?>" alt="...">
        <p>
					Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.
					Advenit post multos Scudilo Scutariorum tribunus velamento subagrestis ingenii persuasionis opifex callidus. qui eum adulabili sermone seriis admixto solus omnium proficisci pellexit vultu adsimulato saepius replicando quod flagrantibus votis eum videre</p>
					<div class="spacer"></div><!-- il manquait un spacer -->
      </article>
			<article class="accueil">
      <!-- <article class="col-xs-12"> IDEM les col-xs... parents font déjà le boulot-->
        <h2 class="media-heading">Palissades</h2>
				<img class="img-responsive media-object img_presentation_home" src="<?= $this->assetUrl('images/images_10x15/3x2 (6).jpg') ?>" alt="...">
        <p>
					Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.
					Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; </p>
					Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.
					<div class="spacer"></div><!-- il manquait un spacer -->
      </article>
		</div>
	</div>


<?php $this->stop('main_content') ?>
