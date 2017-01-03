<?php $this->layout('layout_admin', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>


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
          <th style="width:10%">Ref</th>
          <th style="width:10%">Nom</th>
          <th style="width:10%">Prénom</th>
          <th style="width:20%">Adresse</th>
          <th colspan="1" style="width:10%">Date commande</th>
          <th colspan="1" style="width:10%">Statut</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($adminorders as $adminorder){ ?>
      <tr>
        <td><?php echo $adminorder['ref']; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $adminorder['date_order']; ?></td>
        <td><a href="<?= $this->url('order_single', ['id' => $adminorder['id']]) ?>" class="edit-item" title="Edit"><button type="button" name="button"><?php echo $adminorder['status']; ?></button></a>
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
