<?php $this->layout('layout_product', ['title' => 'Confirmer la commande']) ?>
<?php $this->start('main_content') ?>


<!-- <?php debug($orders); ?> -->

<!-- Formulaire de validation de commande en front-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Validation de la commande</h1>
    </article>
  </section>
	<form method="post" action="<?= $this->url('confirm_order_action'); ?>">
		<table class="layout display responsive-table">
	    <thead>
	      <tr>
          <th colspan="1" style="width:10%">Image</th>
	        <th colspan="1" style="width:10%">Nom du produit</th>
	        <th colspan="1" style="width:15%"></th>
          <th colspan="1" style="width:15%"></th>
	        <th colspan="1" style="width:30%"></th>
	      </tr>
	    </thead>
	    <tbody>
  <?php if(!empty($orders)) {
          foreach ($orders as $order) { ?>
            <tr>
              <td><img class="thumb_cart" src="<?= $this->url('default_home').$order['product_img'] ?>" alt=""></td>
  						<td><b><?php if(!empty($order['product_name'])){echo $order['product_name'];} ?></b></td>
              <td><b>Qté : </b><?php if(!empty($order['cart_qt'])){echo $order['cart_qt'];} ?></td>
              <td><b>Poids : </b><?php if(!empty($order['product_weight'])){echo $order['product_weight'];} ?> kg</td>
              <td><b><h4>Total : </b><b><?php if(!empty($order['cart_price'])){
                $priceht = $order['cart_price'];
                $tva = $order['cart_price']*0.2;
                $pricettc = $priceht + $tva;
                $qt = $order['cart_qt'];
                $total = $pricettc * $qt;
                echo number_format($total, 2, ',', ' ');
              } ?> €</h4></b></td>

            </tr>
    <?php } ?>
          <th colspan="5"><p class="button"><button <?php if(!empty($w_user)) {?> onclick="alert('Merci pour votre commande, un email de confirmation vous a été envoyé');" <?php } ?> class="btn btn-success" type="submit" name="submit" value="">Valider</button></p></th>
<?php  } ?>
      </tbody>
	  </table>
  </form>
</main>

<?php $this->stop('main_content') ?>
