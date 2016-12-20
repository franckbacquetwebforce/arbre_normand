

<?php $this->layout('layout', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>

<?php
// liste des données récupérées dans le OrderModel
//probleme de date non prise en compte

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

 ?>

<?php $this->stop('main_content') ?>
