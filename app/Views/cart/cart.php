<?php $this->layout('layout_product', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>
<?php
debug($_SESSION['cart']);

// debug ($infoPanier);?>
<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Mon panier</h1></br>
			<span><?php if(!empty($error)){echo $error;} ?></span>
    </div>
  </div>
	<form method="post" action="cart.php">
		<table class="layout display responsive-table"><?php
			$nbArticles=count($_SESSION['cart']['id_product']);
			if ($nbArticles <= 0){ ?>
        <div class="cart">
		<?php echo "<p class='empty_cart'><h3>Votre panier est vide</h3></p>";?>
        </div>
		<?php	}else{ ?>
		    <thead>
		      <tr>
            <th colspan="1" style="width:20%">Image</th>
		        <th style="width:20%">Libellé</th>
		        <th colspan="1" style="width:10%">Quantité</th>
		        <th colspan="1" style="width:10%">Prix Unitaire</th>
		        <th colspan="1" style="width:10%">Poids Unitaire</th>
            <th colspan="1" style="width:10%">Total Commande</th>
		        <th colspan="1" style="width:20%">Action</th>
		      </tr>
		    </thead>
		    <tbody>
				<?php for ($i=0; $i < $nbArticles; $i++){?>
								<tr>
                  <td><img class="thumb_cart" src="<?= $this->url('default_home').$infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
									<td><b><?= $infoPanier[$i]['product_name'] ?></b></td>
									<td><a href="<?= $this->url('user_cart_add', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button type="button" name="button">+</button></a></br>
										<?= $_SESSION['cart']['qt_product'][$i]?></br>
										<a href="<?= $this->url('user_cart_substrat', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1]); ?>"><button type="button" name="button">-</button></a></td>
									<td><?= $infoPanier[$i]['cart_price']?> €</td>
									<td><?= $infoPanier[$i]['product_weight']?> kg</td>
                  <td colspan="1"><b>Total: <?= $total ?> €</b></td>
									<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
								</tr>
				<?php } ?>
			<?php } ?>
		</table>
	</form>
	<?php if($nbArticles>0){ ?>
	<p class="button"><a class="colorlien btn btn-success" href="<?= $this->url('confirm_order'); ?>">Passer la commande</a></p>
	<?php } ?>
</div>
<?php $this->stop('main_content') ?>
