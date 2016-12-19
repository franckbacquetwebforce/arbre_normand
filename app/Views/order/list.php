

<?php $this->layout('layout', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>

<?php
debug($orders);
debug($inters);
debug($products);
die();
  // table orders
  foreach($orders as $order){
    echo 'ref: ' .$order['ref'];
    echo '<br>';
    echo 'date: '.$order['date_order'];
    echo '<br>';

  }
  // table orders_products
  foreach($inters as $inter){
    echo 'quantité: ' .$inter['qt_product'];
    echo '<br>';
    echo 'prix ttc: '.$inter['price_product'];
    echo '<br>';

  }

  foreach($products as $product){
    echo 'nom du produit: '.$product['product_name'];
    echo '<br>';
    echo 'prix ht: '.$product['price_ht'];
    echo '<br>';

    echo 'poids: '.$product['weight'];
    echo '<br>';

    echo 'stock: '.$product['stock'];
    echo '<br>';

  }
 ?>

<?php $this->stop('main_content') ?>
