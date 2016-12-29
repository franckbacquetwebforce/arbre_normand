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
<!-- AUTRE PROPOSITION MICHELE-->
<div class="container Articles">
  <div class="row">
    <div class="col-xs-12 col-md-9">
			<div class="parent">
				<div class="enfant">
					<h1>CE QUE VOUS TROUVEREZ SUR CE SITE</h1>
				</div>
			</div>
      <article class="col-xs-12">
        <img class="img-responsive media-object" src="<?= $this->assetUrl('images/champignon_plat_min.jpg') ?>" alt="...">
        <h2 class="media-heading">Champignons en bois</h2>
        <p>
					Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.
					Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi.        </p>
      </article>
      <article class="col-xs-12">
        <img class="img-responsive media-object" src="<?= $this->assetUrl('images/table_champignon.jpg') ?>" alt="...">
        <h2 class="media-heading">Champignons tables</h2>
        <p>
					Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.
					Advenit post multos Scudilo Scutariorum tribunus velamento subagrestis ingenii persuasionis opifex callidus. qui eum adulabili sermone seriis admixto solus omnium proficisci pellexit vultu adsimulato saepius replicando quod flagrantibus votis eum videre</p>
      </article>
      <article class="col-xs-12">
        <img class="img-responsive media-object" src="<?= $this->assetUrl('images/palissade_min.jpg') ?>" alt="...">
        <h2 class="media-heading">Palissades</h2>
        <p>
					Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.
					Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; </p>
					Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.
      </article>
		</div>
	</div>
</div>
<!-- ===================== FIN MICHELE ============================= -->
<!-- <div class="thumbs container"> -->
	<!-- <div class="presentation row">
		<div class="parent">
			<div class="enfant">
				<h1>CE QUE VOUS TROUVEREZ SUR CE SITE</h1>
			</div>
		</div>
		<div class="presentation_detail">
			<img class="presentation_img col-xs-12 col-sm-8 col-lg-8" src="<?= $this->assetUrl('images/champignon_plat_sur_souche_lite.jpg') ?>" alt="champignon_plat_sur_souche">
			<div class="presentation_div_text col-xs-12 col-sm-4 col-lg-4">
				<h2>Champignons en bois</h2>
				<p>Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.
					Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi.
			</div>
			<div class="spacer"></div>
		</div>
		<div class="presentation_detail">
			<div class="presentation_div_text col-xs-12 col-sm-4 col-lg-4">
				<h2>Champignons tables</h2>
				<p>
					Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.
					Advenit post multos Scudilo Scutariorum tribunus velamento subagrestis ingenii persuasionis opifex callidus. qui eum adulabili sermone seriis admixto solus omnium proficisci pellexit vultu adsimulato saepius replicando quod flagrantibus votis eum videre</p>
			</div>
			<img class="presentation_img col-xs-12 col-sm-8 col-lg-8" src="<?= $this->assetUrl('images/table_champignon_lg.jpg') ?>" alt="champignon_plat_sur_souche">
			<div class="spacer"></div>
		</div>
		<div class="presentation_detail">
			<img class="presentation_img col-xs-12 col-sm-8 col-lg-8" src="<?= $this->assetUrl('images/palissade02_lg.jpg') ?>" alt="champignon_plat_sur_souche">
			<div class="presentation_div_text col-xs-12 col-sm-4 col-lg-4">
				<h2>Palissades</h2>
				<p>
					Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.
					Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; </p>
					Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.
			</div>
			<div class="spacer"></div>
		</div>
	</div>
<!-- </div> -->
<!-- 
	<div class="presentation row">
		<div class="parent">
			<div class="enfant">
				<h1>CE QUE VOUS TROUVEREZ SUR CE SITE</h1>
			</div>
		</div>
		<div class="presentation_detail">
			<div class="presentation_div_text">
				<img class="img-responsive presentation_img_left" src="<?= $this->assetUrl('images/champignon_plat_sur_souche_lite.jpg') ?>" alt="champignon_plat_sur_souche">
				<h2>Champignons en bois</h2>
				<p>Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.
					Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi.
			</div>
			<div class="spacer"></div>
		</div>
		<div class="presentation_detail">
			<div class="presentation_div_text">
				<img class="img-responsive presentation_img_right" src="<?= $this->assetUrl('images/table_champignon_lg.jpg') ?>" alt="champignon_plat_sur_souche">
				<h2>Champignons tables</h2>
				<p>Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.
					Advenit post multos Scudilo Scutariorum tribunus velamento subagrestis ingenii persuasionis opifex callidus. qui eum adulabili sermone seriis admixto solus omnium proficisci pellexit vultu adsimulato saepius replicando quod flagrantibus votis eum videre</p>
			</div>
			<div class="spacer"></div>
		</div>
		<div class="presentation_detail">
			<div class="presentation_div_text">
				<img class="img-responsive presentation_img_left" src="<?= $this->assetUrl('images/palissade02_lg.jpg') ?>" alt="champignon_plat_sur_souche">
				<h2>Palissades</h2>
				<p>Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.
					Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; </p>
					Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.
			</div>
			<div class="spacer"></div>
		</div>
	</div> -->


<?php $this->stop('main_content') ?>
