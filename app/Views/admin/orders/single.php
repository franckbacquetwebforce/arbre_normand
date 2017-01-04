<?php $this->layout('layout_admin', ['title' => 'Edition commande']) ?>
<?php $this->start('main_content');
debug($oneOrder);


 ?>

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Détail de la commande</h1>
    </div>
  </div>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:40%"><span class="product">Produits</span><span class="dim">Qté</span><span class="dim">Longueur</span><span class="dim">Largeur</span><span class="dim">Hauteur</span><span class="dim">Poids</span></th>
          <th style="width:10%">Prix TTC</th>
          <th colspan="2" style="width:25%">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <table class="layout display responsive-table">
        <?php foreach ($oneOrder[$id]['produits'] as $key => $value) { ?>
            <tr>
              <td><span class="product"><?php echo $value['product_name']; ?></span></td>
              <td><span class="dim"><?php echo $value['qt_product']; ?></span></td>
              <td><span class="dim"><?php echo $value['length']; ?></span></td>
              <td><span class="dim"><?php echo $value['width']; ?></span></td>
              <td><span class="dim"><?php echo $value['height']; ?></span></td>
              <td><span class="dim"><?php echo $value['weight']; ?></span></td>
            </tr>
        <?php } ?>
          </table>
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<?php $this->stop('main_content') ?>
