<?php $this->layout('layout_product', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>
<?php
// debug($_SESSION['cart']);
// debug ($infoPanier);
?>

<!-- Page affichant le panier en fron-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid cart_container">
  <section class="parent">
    <article class="enfant">
      <h1>Mon panier</h1></br>
      <!-- span pour afficher les erreurs de stocks -->
			<!-- <span id="error_ajax"><?php if(!empty($error)){echo $error;} ?></span><br/> -->
    </article>
  </section>
	<form method="post" action="cart.php">
		<table class="layout display responsive-table">
      <?php $nbArticles=count($_SESSION['cart']['id_product']);
			if ($nbArticles <= 0){ ?>
        <div class="cart">
		<?php echo "<p class='empty_cart'><h3>Votre panier est vide</h3></p>";?>
        </div>
<?php	}else{ ?>
		    <thead>
		      <tr>
            <th colspan="1" style="width:15%">Image</th>
		        <th style="width:20%">Libellé</th>
		        <th colspan="1" style="width:10%">Quantité</th>
		        <th colspan="1" style="width:7%">Prix Unitaire HT</th>
		        <th colspan="1" style="width:7%">Poids Unitaire</th>
            <th colspan="1" style="width:20%">Total TTC</th>
		        <th colspan="1" style="width:10%">Action</th>

		      </tr>
		    </thead>
		    <tbody>
				<?php
        $total = 0;
        for ($i=0; $i < $nbArticles; $i++){?>
          <?php $tva =  $infoPanier[$i]['cart_price']*0.2;
          $pricettc =  $infoPanier[$i]['cart_price'] + $tva;
          $pricetotalttc =  $pricettc*$_SESSION['cart']['qt_product'][$i];
           ?>
								<tr class="count count_<?= $i ?>" data-index=<?= $i ?>>
                  <td><img class="thumb_cart" src="<?= $this->url('default_home').$infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
									<td><b><?= $infoPanier[$i]['product_name'] ?></b></td>
									<td>
                    <a class="plus_<?= $i ?>" href="<?= $this->url('user_cart_add_bis') ?>?id_product=<?= $infoPanier[$i]['product_id'] ?>">
                      <button class="more_<?= $i ?>" type="button" name="button"><i class="fa fa-plus"></i></button>
                    </a></br>

										<span id="qt_product_ajax_<?= $i ?>"> <?= $_SESSION['cart']['qt_product'][$i]?> </span></br>

										<a class="moins_<?= $i ?>" href="<?= $this->url('user_cart_substrat_bis') ?>?id_product=<?= $infoPanier[$i]['product_id'] ?>">
                      <button class="less_<?= $i ?>" type="button" name="button"><i class="fa fa-minus"></i></button>
                    </a>
                  </td>
									<td><?= $infoPanier[$i]['cart_price']?> €</td>
									<td><?= $infoPanier[$i]['product_weight']?> kg</td>
                  <td colspan="1"><b><span  id="tot_price_product_ajax_<?= $i ?>"> <?= number_format($pricetotalttc, 2, ',', ' '); ?> </span>€</b></td>
									<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
								</tr>

                <!-- <tr>
                  <td><img class="thumb_cart" src="<?= $this->url('default_home').$infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
									<td><b><?= $infoPanier[$i]['product_name'] ?></b></td>
									<td>
                    <a class="more" href="<?= $this->url('user_cart_add_bis', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button id="more" type="button" name="button"><i class="fa fa-plus"></i></button></a></br>
										<?= $_SESSION['cart']['qt_product'][$i]?></br>
										<a class="less" href="<?= $this->url('user_cart_substrat_bis', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button id="less" type="button" name="button"><i class="fa fa-minus"></i></button></a></td>
									<td><?= $infoPanier[$i]['cart_price']?> €</td>
									<td><?= $infoPanier[$i]['product_weight']?> kg</td>
                  <td colspan="1"><b> <?= number_format($pricetotalttc, 2, ',', ' '); ?> €</b></td>
									<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
								</tr> -->

				<?php
$total+=$pricetotalttc;
      } ?>
			<?php } ?>
               <!-- <tr> -->
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>
                   <strong>
                     Total : <span id="totalTTC"> <?php echo number_format($total, 2, ',', ' '); ?> </span>€
                   </strong>
                 </td>
                 <td></td>
               </tr>
		</table>
	</form>
<?php if($nbArticles>0){ ?>
	     <p class="button"><a class="colorlien btn btn-success" href="<?= $this->url('confirm_order'); ?>">Passer la commande</a></p>
<?php } ?>
<!-- <span id="error_ajax"><?php if(!empty($error)){echo $error;} ?></span><br/> -->
</div>

<?php $this->stop('main_content') ?>
