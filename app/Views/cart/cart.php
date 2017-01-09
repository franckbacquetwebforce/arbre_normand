<?php $this->layout('layout_product', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>
<?php
debug($_SESSION['cart']);
debug ($infoPanier);?>

<!-- Page affichant le panier en fron-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Mon panier</h1></br>
      <!-- span pour afficher les erreurs de stocks -->
			<span><?php if(!empty($error)){echo $error;} ?></span>
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
								<tr>
                  <td><img class="thumb_cart" src="<?= $this->url('default_home').$infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
									<td><b><?= $infoPanier[$i]['product_name'] ?></b></td>
									<td>
                    <a href="<?= $this->url('user_cart_add', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button type="button" name="button"><i class="fa fa-plus"></i></button></a></br>
										<?= $_SESSION['cart']['qt_product'][$i]?></br>
										<a href="<?= $this->url('user_cart_substrat', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button type="button" name="button"><i class="fa fa-minus"></i></button></a></td>
									<td><?= $infoPanier[$i]['cart_price']?> €</td>
									<td><?= $infoPanier[$i]['product_weight']?> kg</td>
                  <td colspan="1"><b> <?= number_format($pricetotalttc, 2, ',', ' '); ?> €</b></td>
									<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
								</tr>

				<?php
$total+=$pricetotalttc;
      } ?>
			<?php } ?>
               <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>
                   <strong>Total :
                   <?php echo number_format($total, 2, ',', ' ');;
                   ?>
                   €
                   </strong>
                 </td>
                 <td></td>
               </tr>
		</table>
	</form>
<?php if($nbArticles>0){ ?>
	     <p class="button"><a class="colorlien btn btn-success" href="<?= $this->url('confirm_order'); ?>">Passer la commande</a></p>
<?php } ?>
</div>

<?php $this->stop('main_content') ?>
