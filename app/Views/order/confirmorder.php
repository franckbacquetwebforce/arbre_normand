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
          <th colspan="1" style="width:20%">Image</th>
	        <th colspan="1" style="width:20%">Nom du produit</th>
	        <th colspan="1" style="width:5%"></th>
          <th colspan="1" style="width:10%"></th>
	        <th colspan="1" style="width:10%"></th>
	      </tr>
	    </thead>
	    <tbody>
  <?php if(!empty($orders)) {
          foreach ($orders as $order) { ?>
            <tr>
              <td class="valid"><img class="thumb_cart" src="<?= $this->url('default_home').$order['product_img'] ?>" alt=""></td>
  						<td class="valid"><b><?php if(!empty($order['product_name'])){echo $order['product_name'];} ?></b></td>
              <td class="valid"><b>Qté : </b><?php if(!empty($order['cart_qt'])){echo $order['cart_qt'];} ?></td>
              <td class="valid"><b>Poids : </b><?php if(!empty($order['product_weight'])){echo $order['product_weight'];} ?> kg</td>
              <td class="valid"><b><h4>Total : </b><b><?php if(!empty($order['cart_price'])){echo $order['cart_price'];} ?> €</h4></b></td>
            </tr>
    <?php } ?>
          <th colspan="5"><p class="button"><button <?php if(!empty($w_user)) {?> onclick="alert('Merci pour votre commande, un email de confirmation vous a été envoyé');" <?php } ?> class="btn btn-success" type="submit" name="submit" value="">Valider</button></p></th>
<?php  } ?>
      </tbody>
	  </table>
  </form>
</main>

<?php $this->stop('main_content') ?>
