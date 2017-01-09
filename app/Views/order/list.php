

<?php $this->layout('layout', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>

<?php

if(empty($products)){
  echo 'Vous n\'avez rien commandé';

  } else {
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

}

 ?>

<?php $this->stop('main_content') ?>
