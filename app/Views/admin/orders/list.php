<?php $this->layout('layout_admin', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>
<?php debug($adminorders);
?>

<!-- // liste des données récupérées dans le OrderModel
//probleme de date non prise en compte -->

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Liste des commandes</h1>
    </div>
  </div>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:25%">Ref</th>
          <th colspan="1" style="width:20%">Date commande</th>
          <th colspan="1" style="width:10%">id de l'utilisateur</th>
          <th colspan="1" style="width:10%">Statut</th>
          <th colspan="3" style="width:35%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($adminorders as $adminorder){ ?>
      <tr>
        <td><?php echo $adminorder['ref']; ?></td>
        <td><b><?php echo $adminorder['date_order']; ?></b></td>
        <td><?php echo $adminorder['id_user']; ?></td>
        <td><b><?php echo $adminorder['status']; ?></b></td>
        <td class="actions">
          <a href="<?= $this->url('waiting_orders',['id' => $adminorder['id']])?>" class="edit-item" title="Edit"><button type="button" name="button">Editer</button></a>
          <a href="<?= $this->url('valid_orders',['id' => $adminorder['id']])?>" class="valid-item" title="Valid"><button type="button" name="button">Valider</button></a>
          <a href="<?= $this->url('admin_order_delete_action',['id' => $adminorder['id']])?>" class="remove-item" title="Remove"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer la commande ?');" type="button" name="button">Supprimer</button></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- <?php
// orders_products.id as order_product,
// orders_products.qt_product as quantity,
// orders_products.price_product as pricettc,
// orders.id as orders,
// orders.date_order as date_order,
// orders.ref as ref,
// products.id as product,
// products.product_name as product_name,
// products.slug as slug,
// products.price_ht as priceht

  foreach($products as $product){
    echo 'ref: ' .$product['ref'];
    echo '<br>';
    echo 'date: '.$product['date_order'];
    echo '<br>';
    echo 'nom du produit: '.$product['product_name'];
    echo '<br>';
    echo 'quantité: ' .$product['quantity'];
    echo '<br>';
    echo 'prix ht: '.$product['priceht'];
    echo '<br>';
    echo 'prix ttc: '.$product['pricettc'];
    echo '<br>';
    echo '<br>';

  }

 ?> -->

<?php $this->stop('main_content') ?>
