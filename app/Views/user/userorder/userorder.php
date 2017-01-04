<?php $this->layout('layout_product', ['title' => 'Mes commandes']) ?>
<?php $this->start('main_content') ?>
<?php
// debug($orders);
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
          <th style="width:30%">Ref</th>
          <th colspan="1" style="width:10%">Date commande</th>
          <th colspan="1" style="width:10%">Statut</th>
          <th style="width:10%"><span class="product">Produits</span><span class="product">Qté</span><span class="product">Prix TTC</span></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order){ ?>
        <tr>
          <td><?php echo $order['ref']; ?></td>
          <td><?php echo $order['date_order']; ?></td>
          <td><button type="button" name="button"><?php echo $order['status']; ?></button></td>
          <td>
            <table class="layout display responsive-table">
          <?php foreach ($order['produits'] as $key => $value){ ?>
              <tr>
                <td><span class="product"><?php echo $value['product_name']; ?></span></td>
                <td><span class="product"><?php echo $value['qt_product']; ?></span></td>
                <td><span class="product"><?php echo $value['price_product']; ?></span></td>
              </tr>
          <?php } ?>
            </table>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>





<?php $this->stop('main_content') ?>
