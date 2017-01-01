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
		        <th style="width:15%">Ref</th>
		        <th colspan="1" style="width:20%">Nom du produit</th>
            <th colspan="1" style="width:45%">Image</th>
		        <th colspan="1" style="width:5%">Quantité</th>
		        <th colspan="1" style="width:5%">Prix</th>
		        <th colspan="1" style="width:5%">Poids Unitaire</th>
		      </tr>
		    </thead>
		    <tbody>
					<tr>
						<td><b></b></td>
            <td><b></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
		</table>
    <button class="btn btn-success modif_categorie" type="submit" name="submit" value="">Valider</button>
	</form>


<!-- <form class="" action="<?= $this->url('confirm_order_action'); ?>" method="post">
  <input type="submit" name="submit" value="Valider">

</form> -->
<?php $this->stop('main_content') ?>
