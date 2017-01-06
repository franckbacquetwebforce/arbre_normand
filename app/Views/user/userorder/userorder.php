<?php $this->layout('layout_product', ['title' => 'Mes commandes']) ?>
<?php $this->start('main_content') ?>
<?php
debug($orders);
?>
<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Mes commandes</h1>
    </div>
  </div>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:15%">Ref</th>
          <th colspan="1" style="width:15%">Date commande</th>
          <th></th>
          <th colspan="1" style="width:20%">Statut</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order){ ?>
        <tr>
          <td><?php echo $order['ref']; ?></td>
          <td><?php echo $order['date_order']; ?></td>

          <td>
            <table class="layout display responsive-table">
          <?php foreach ($order['produits'] as $key => $value){ ?>
            <tr>
              <th>Produits</th>
              <th>Qté</th>
              <th>Prix TTC</th>
            </tr>
              <tr>
                <td><?php echo $value['product_name']; ?></td>
                <td><?php echo $value['qt_product']; ?></td>
                <td><?php echo $value['price_product']; ?></td>
              </tr>
          <?php } ?>
            </table>
          </td>
          <td><button type="button" name="button"><?php echo $order['status']; ?></button></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>





<?php $this->stop('main_content') ?>
