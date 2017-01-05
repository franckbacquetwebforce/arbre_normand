<?php $this->layout('layout_admin', ['title' => 'Liste des commandes']) ?>
<?php $this->start('main_content') ?>
<!-- <?php debug($adminorders);
?> -->

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
          <th style="width:10%">
            Ref
          </th>
          <th style="width:10%">
            Nom
          </th>
          <th style="width:10%">
            Prénom
          </th>
          <th style="width:10%">
            Ville
          </th>
          <th style="width:10%">
            Code Postal
          </th>
          <th style="width:10%">
            Tel
          </th>
          <th colspan="1" style="width:10%">
            Date commande
          </th>
          <th colspan="1" style="width:10%">
            Statut
          </th>
      </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
      <?php foreach ($adminorders as $key => $value) {
        echo $key;
         echo $value['client']['lastname'];
      } ?>
      <?php foreach ($adminorders as $key => $value) { ?>
      <tr>
        <td><?php echo $value['ref']; ?></td>
        <td><?php echo $value['client']['lastname']; ?></td>
        <td><?php echo $value['client']['firstname']; ?></td>
        <td><?php echo $value['client']['city']; ?></td>
        <td><?php echo $value['client']['zip']; ?></td>
        <td><?php echo $value['client']['phone']; ?></td>
        <td><?php echo $value['date_order']; ?></td>
        <td>
          <a href="<?= $this->url('order_single', ['id' => $key]); ?>" class="edit-item" title="Edit"><button type="button" name="button"><?php echo $value['status']; ?></button></a>
        </td>
        <td>

        </td>
      </tr>
      <?php } ?>
=======

<?php if(!empty($adminorders)){
        foreach ($adminorders as $key => $value) {
        } ?>
        <?php foreach ($adminorders as $key => $value) { ?>
        <tr>
          <td><?php echo $value['ref']; ?></td>
          <td><?php echo $value['client']['lastname']; ?></td>
          <td><?php echo $value['client']['firstname']; ?></td>
          <td><?php echo $value['client']['city']; ?></td>
          <td><?php echo $value['client']['zip']; ?></td>
          <td><?php echo $value['client']['phone']; ?></td>
          <td><?php echo $value['date_order']; ?></td>
          <td><a href="<?= $this->url('order_single', ['id' => $key]) ?>" class="edit-item" title="Edit"><button type="button" name="button"><?php echo $value['status']; ?></button></a>
          </td>
        </tr>
        <?php } ?>
<?php } ?>

>>>>>>> 176b7b7813e1d9e978d8c4630b152cd33ec4b062
    </tbody>
  </table>
</div>

<<<<<<< HEAD
<?php
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
=======
>>>>>>> 176b7b7813e1d9e978d8c4630b152cd33ec4b062


<?php $this->stop('main_content') ?>
