<!DOCTYPE html>
<html lang="fr">
  <head>
  	<meta charset="UTF-8">
  	<title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="<?= $this->assetUrl('css/admin_style.css') ?>">

  </head>
  <body>
    <div class ="all_content">
      <nav class="navbar navbar-default dimension_navbar">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="title_back_container">
              <img class="logo_navbar_back"src="<?= $this->assetUrl('images/SVG/logo_epure.svg') ?>" alt="">
              <h1 class="admin_title">Panneau d'administration</h1>
            </div>
      			<ul class="nav navbar-nav navbar-right">
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
      <div class="row container-fluid product">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <section class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Sidebar menu</span>
              </div>
              <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav">
                <!--Faire un JS sur la classe active-->
                  <li class="accueil_site"><a id="link_front" href="<?= $this->url('default_home') ?>"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Retour sur le site</span></a></li>
                  <li class="<?php if($w_current_route == 'site_statistics'){echo "active";} ?>"><a href="<?= $this->url('site_statistics') ?>"><i class="fa fa-tachometer" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Accueil administration</span></a></li>
                  <li class="<?php if($w_current_route == 'admin_product'){echo "active";} ?>"><a href="<?= $this->url('admin_product') ?>"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Produits</span></a></li>
                  <li class="<?php if($w_current_route == 'admin_user'){echo "active";} ?>"><a href="<?= $this->url('admin_user') ?>"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Utilisateurs</span></a></li>
                  <li class="<?php if($w_current_route == 'admin_order'){echo "active";} ?>"><a href="<?= $this->url('admin_order') ?>"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Commandes</span></a></li>
                  <li class="<?php if($w_current_route == 'admin_categories'){echo "active";} ?>"><a href="<?= $this->url('admin_categories') ?>"><i class="fa fa-flag" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Categories</span></a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </section>
        </div>
        <div class="row col-xs-12 col-sm-9 col-md-9 col-lg-9 main_column">
          <section>
          <?= $this->section('main_content') ?>
          </section>
        </div>
      <footer>
      </footer>
    </div> <!-- div all_content -->
	  <script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
	</body>
</html>
