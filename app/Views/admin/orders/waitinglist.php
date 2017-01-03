<?php $this->layout('layout_admin', ['title' => 'Liste des commandes en attente']) ?>
<?php $this->start('main_content') ?>

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Liste des commandes en attente</h1>
    </div>
  </div>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:15%">Ref</th>
          <th colspan="1" style="width:15%">Date commande</th>
          <th colspan="1" style="width:20%">Nom client</th>
          <th colspan="1" style="width:20%">Email client</th>
          <th colspan="1" style="width:10%">Nom du produit</th>
          <th colspan="1" style="width:10%">Qté</th>
          <th colspan="1" style="width:10%">Prix HT</th>
          <th colspan="1" style="width:10%">Prix TTC</th>
          <th colspan="2" style="width:35%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($products as $product){ ?>
      <tr>
        <td><?php echo $product['ref']; ?></td>
        <td><b><?php echo $product['date_order']; ?></b></td>
        <td></td>
        <td></td>
        <td><b><?php echo $product['product_name']; ?></b></td>
        <td><b><?php echo $product['quantity']; ?></b></td>
        <td><b><?php echo $product['priceht']; ?></b></td>
        <td><b><?php echo $product['pricettc']; ?></b></td>
        <td class="actions">
          <a href="<?= $this->url('valid_orders',['id' => $product['order_product']])?>" class="valid-item" title="Valid"><button type="button" name="button">Valider</button></a>
          <a href="<?= $this->url('admin_order_delete_action',['id' => $product['order_product']])?>" class="remove-item" title="Remove"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer la commande ?');" type="button" name="button">Supprimer</button></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>


les commandes en attente
<?php
debug($orders);


?>

<?php $this->stop('main_content') ?>
