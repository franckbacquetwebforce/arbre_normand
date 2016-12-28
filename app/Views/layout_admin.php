<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/admin_style.css') ?>">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="<?= $this->url('default_home') ?>">Accueil <span class="sr-only">(current)</span></a></li>
	        <li><a href="../docs/tuto/" title="Documentation de W" target="_blank">docs/tuto</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developpement <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><a href="<?= $this->url('admin_product') ?>">admin_product </a></li>
							<li><a href="<?= $this->url('admin_order') ?>">admin_order </a></li>
							<li><a href="<?= $this->url('admin_categories') ?>"> Liste des catégories coté admin |</a></li>
							<li><a href="<?= $this->url('admin_user') ?>">Liste des utilisateurs </a></li>
							<li><a href="<?= $this->url('admin_categories_new') ?>">Ajout d'une catégorie </a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="<?= $this->url('admin_user_new') ?>">Création d'un nouvel admin </a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="<?= $this->url('admin_user_update_action', ['id' => $w_user['id']]) ?>">Update compte admin </a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
					<li><a href="<?= $this->url('user_cart') ?>">
						<button type="button" class="btn btn-default" aria-label="Left Align">
	  				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
						<span class="sr-only">Panier</span>
					</button></a></li>
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
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
		<div class="row container_main_content">
			<!-- partie gauche menu_left -->
			<div class="container_menu_right col-xs-0 col-sm-4 col-lg-3 col-lg-3"></div>
			<!-- partie centrale -->
			<div class="container main_content col-xs-12 col-sm-8 col-lg-6 col-lg-6">
				<section>
					<?= $this->section('main_content') ?>
				</section>
				<footer>
				</footer>
			</div>
			<!-- partie droite (vide)-->
			<div class="container_menu_left col-xs-0 col-sm-0 col-lg-3 col-lg-3"></div>

		</div>
		<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
		<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
	</body>
	</html>
