<?php include 'functions.php';
$categories = findAll('categories');?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
<div class="all_content">
<nav class="navbar navbar-default dimension_navbar navbar_header_top">
  <div class="container-fluid ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<img class="logo_navbar_burger"src="<?= $this->assetUrl('images/SVG/logo.svg') ?>" alt="">
    </div>

		<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="row collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<img class="abattage_navbar col-xs-4 col-sm-3 col-md-4 col-lg-4"src="<?= $this->assetUrl('images/SVG/abattage.svg') ?>" alt="">
				<a href="<?= $this->url('default_home') ?>">
					<img class="logo_navbar col-xs-4 col-sm-4 col-md-4 col-lg-4"src="<?= $this->assetUrl('images/SVG/logo.svg') ?>" alt="">
				</a>
				<div class="col-xs-4 col-sm-5 col-md-4 col-lg-4">

      	<ul class="nav navbar-nav navbar-right ">
					<li>
						<a href="<?= $this->url('user_cart') ?>">
							<button type="button" class="btn btn-default" aria-label="Left Align">
					<?php if(!empty($w_user)){?>
						<li>Bienvenue <?php echo $w_user['username']; ?></li>
					<?php	}?>
						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
						<span class="cart_content">
					<?php if(!empty($_SESSION['cart']['qt_product'])){
						echo '('.array_sum($_SESSION['cart']['qt_product']).')';
					} ?>
					</span>
					<span class="sr-only">Panier</span>
				</button></a>
				</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte<span class="caret"></span></a>
          <ul class="dropdown-menu">
						<?php if(!empty($w_user)){?>
							<li><a href="<?= $this->url('user_profile_monprofil',['id' => $w_user['id']]) ?>">Mon compte </a></li><!-- Si connecté -->
							<li><a href="<?= $this->url('logout_action') ?>">Se déconnecter </a></li><!-- Si connecté -->
					<?php	} else { ?>
						<li><a href="<?= $this->url('login') ?>">Se connecter </a></li><!-- Si déconnecté -->
						<li><a href="<?= $this->url('register') ?>">S'inscrire </a></li><!-- Si déconnecté -->
				<?php	} ?>
				<li role="separator" class="divider"></li>
				<li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
		</div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid product">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<section id="menu_left_container" class="sidebar-nav">
				<div class="navbar menu_left navbar-default navbar_header_left" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<span class="visible-xs navbar-brand">Menu</span>
					</div>
					<div class="navbar-collapse collapse sidebar-navbar-collapse">
						<ul class="nav navbar-nav">
							<!--Faire un JS sur la classe active-->
					<?php if(!empty($w_user)){
						if($w_user['role'] === "admin") {?>
							<li class="menu_admin"><a id="link_admin" href="<?= $this->url('site_statistics') ?>">Administration</a></li>
						<?php	}?>
					<?php } ?>
							<li class="<?php if($w_current_route == 'default_home'){echo "active";} ?>"><a href="<?= $this->url('default_home') ?>"> Accueil</span></a></li>
							<li class="menu_categorie_all <?php if($w_current_route == 'listproducts'){echo "active";} ?>"><a href="<?= $this->url('listproducts') ?>">Tous les produits</a></li>
						<?php foreach($categories as $categorie){
							$products = findAllProd('products',$categorie['id']);
							if(!empty($products)){ ?>
							<li class="menu_categorie <?php if($_GET['id_category'] == $categorie['id']){echo "active";} ?>"><a href="<?= $this->url('categoryproduct') ?>?id_category=<?= $categorie['id'] ?>"><?= $categorie['category_name'] ?></a></li>
						<?php }} ?>
							<li class="<?php if($w_current_route == 'contact'){echo "active";} ?>"><a href="<?= $this->url('contact') ?>">Contact </a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
				<span id="error_ajax">
			</section>

			</span>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
			<section>
			<?= $this->section('main_content') ?>
			</section>
		</div>
		<div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div><!-- partie droite vide -->
	</div>
</div>
</div><!-- div all_content -->
<footer class= "footer row">
	<section class="footer_section col-xs-3 col-sm-3">
		<a href="https://twitter.com/?lang=fr" target="_blank" class="lien_ext"><i class="fa fa-2x fa-twitter" aria-hidden="true"></i></a>
		<a href="https://fr-fr.facebook.com/" target="_blank" class="lien_ext"><i class="fa fa-2x fa-facebook" aria-hidden="true"></i></a>
		<a href="https://fr.pinterest.com/" target="_blank" class="lien_ext"><i class="fa fa-2x fa-pinterest" aria-hidden="true"></i></a>
	</section>
	<section class="footer_section col-xs-5 col-sm-5">
		<p class="copyright">Copyright 2016 M.Ragot, F.Bacquet, H.Peris.</p>
	</section>
	<section class="footer_section col-xs-4 col-sm-4">
		<a href="<?= $this->url('cgu') ?>" class="lien_ext"><p>Condition générales d'utilisation</p></a>
	</section>
</footer>
	</div> <!-- div all_content -->
		<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/app.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/ajax.js') ?>"></script>
	</body>
</html>
