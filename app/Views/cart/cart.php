<?php $this->layout('layout_product', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>
<?php
// debug($_SESSION['cart']);
// debug ($infoPanier);
			?>
<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Mon panier</h1>
    </div>
  </div>
	<form method="post" action="cart.php">
		<table class="layout display responsive-table"><?php
			$nbArticles=count($_SESSION['cart']['id_product']);
			if ($nbArticles <= 0){
				echo "<p class='empty_cart'><h3>Votre panier est vide</h3></p>";
			}else{ ?>
		    <thead>
		      <tr>
		        <th style="width:20%">Libellé</th>
		        <th colspan="1" style="width:45%">Image</th>
		        <th colspan="1" style="width:5%">Quantité</th>
		        <th colspan="1" style="width:5%">Prix Unitaire</th>
		        <th colspan="1" style="width:5%">Poids Unitaire</th>
		        <th colspan="2" style="width:20%">Action</th>
		      </tr>
		    </thead>
		    <tbody>
				<?php for ($i=0; $i < $nbArticles; $i++){?>
								<tr>
									<td><b><?= $infoPanier[$i]['product_name'] ?></b></td>
									<td><img class="thumb_cart" src="<?= $this->url('default_home').$infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
									<td><a href="<?= $this->url('user_cart_add', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button type="button" name="button">+</button></a></br>
										<?= $infoPanier[$i]['cart_qt']?></br>
										<a href="<?= $this->url('user_cart_substrat', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1]); ?>"><button type="button" name="button">-</button></a></td>
									<td><?= $infoPanier[$i]['cart_price']?> €</td>
									<td><?= $infoPanier[$i]['product_weight']?> kg</td>
									<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
								</tr>
				<?php } ?>
				<tr>
			  	<td colspan="2"> </td>
			  	<td colspan="4"><b>Total: <?= $total ?> €</b></td>
			  </tr>
			<?php } ?>
		</table>
	</form>

	<a href="<?= $this->url('confirm_order'); ?>"><button type="button" name="button">Passer la commande</button></a>
</div>
<?php $this->stop('main_content') ?>