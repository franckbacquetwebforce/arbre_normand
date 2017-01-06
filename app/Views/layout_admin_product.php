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
  <div class="all_content">
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
    <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12"> -->
          <section>
          <?= $this->section('main_content') ?>
          </section>
        <!-- </div>
      </div>
    </div> -->

    <footer>
    </footer>
  </div><!-- div all_content -->
    <script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
  </body>
</html>
