<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/admin_style.css') ?>">
</head>
<body>
	<nav>
		<ul class= "nav_header">
			<li><a href="<?= $this->url('default_home') ?>">| default_home |</a></li>
			<li><a href="<?= $this->url('admin_product') ?>"> admin_product |</a></li>
			<li><a href="<?= $this->url('admin_order') ?>"> admin_order |</a></li>
			<li><a href="<?= $this->url('admin_user') ?>"> admin_user |</a></li>
			<li><a href="<?= $this->url('admin_categories') ?>"> admin_categories |</a></li>
			<li><a href="<?= $this->url('user_cart') ?>"> cart |</a></li>
			<li><a href="<?= $this->url('register') ?>"> register |</a></li>
			<li><a href="<?= $this->url('login') ?>"> login |</a></li>
			<li><a href="<?= $this->url('logout_action') ?>"> logout_action |</a></li>
			<li><a href="<?= $this->url('user_profile_monprofil') ?>"> user_profile_monprofil |</a></li>
		</ul>
	</nav>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>