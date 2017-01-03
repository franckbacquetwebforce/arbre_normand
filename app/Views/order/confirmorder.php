<?php $this->layout('layout', ['title' => 'Confirmer la commande']) ?>
<?php $this->start('main_content') ?>

<?php
debug($orders); ?>

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Validation de la commande</h1>
    </div>
  </div>
	<form method="post" action="<?= $this->url('confirm_order_action'); ?>">
		<table class="layout display responsive-table">
		    <thead>
		      <tr>
		        <th colspan="1" style="width:20%">Nom du produit</th>
            <th colspan="1" style="width:45%">Image</th>
		        <th colspan="1" style="width:5%">Quantité</th>
		        <th colspan="1" style="width:5%">Prix</th>
		        <th colspan="1" style="width:5%">Poids Unitaire</th>
		      </tr>
		    </thead>
		    <tbody>
        <?php foreach ($orders as $order) { ?>
          <tr>
						<td><b><?php if(!empty($order['product_name'])){echo $order['product_name'];} ?></b></td>
            <td><img class="thumb_cart" src="<?= $this->url('default_home').$order['product_img'] ?>" alt=""</td>
            <td><?php if(!empty($order['cart_qt'])){echo $order['cart_qt'];} ?></td>
            <td><?php if(!empty($order['cart_price'])){echo $order['cart_price'];} ?></td>
            <td><?php if(!empty($order['product_weight'])){echo $order['product_weight'];} ?></td>
          </tr>
        <?php } ?>
        </tbody>
		</table>
    <button onclick="alert('Merci pour votre commande, un email de confirmation vous a été envoyé');" class="btn btn-success modif_categorie" type="submit" name="submit" value="">Valider</button>
	</form>


<!-- <form class="" action="<?= $this->url('confirm_order_action'); ?>" method="post">
  <input type="submit" name="submit" value="Valider">

</form> -->
<?php $this->stop('main_content') ?>
