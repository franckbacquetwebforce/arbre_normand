<?php $this->layout('layout_admin', ['title' => 'Edition commande']) ?>

<?php $this->start('main_content');?>

<!-- <?php debug($oneOrder); ?> -->

<!-- Page affichant le détail d'une commande en back-office
     Mise en forme et CSS (Michèle) -->
<section class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Détail de la commande</h1>
    </article>
  </section>
  <table class="layout display responsive-table">
    <thead>
      <tr>
        <th style="width:75%"></th>
        <th colspan="2" style="width:25%">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <table class="layout display responsive-table">
            <th>Produits</th>
            <th>Qté</th>
            <th>Longueur</th>
            <th>Largeur</th>
            <th>Hauteur</th>
            <th>Poids</th>
            <th>Prix Total TTC</th>
    <?php foreach ($oneOrder[$id]['produits'] as $key => $value) { ?>
        <tr>
          <td><span class="product"><?php echo $value['product_name']; ?></span></td>
          <td><span class="dim"><?php echo $value['qt_product']; ?></span></td>
          <td><span class="dim"><?php echo $value['length']; ?></span></td>
          <td><span class="dim"><?php echo $value['width']; ?></span></td>
          <td><span class="dim"><?php echo $value['height']; ?></span></td>
          <td><span class="dim"><?php echo $value['weight']; ?></span></td>
          <?php
            // calcul du prix TTC
            $priceht = $value['price_ht'];
            $tva = 0.2;
            $priceTva = $priceht*$tva;
            $pricettc = $priceht + $priceTva;
            $prixTotTtc = $pricettc*$value['qt_product'];
            ?>
          <td><?php echo number_format($prixTotTtc, 2, ',', ' '); ?></td>
        </tr>
    <?php } ?>
          </table>
        <td>
          <!-- Bouton pour valider la commande -->
          <a href="<?= $this->url('admin_order_update_action', ['id' => $id]); ?>" class="edit-item" title="Edit"><button type="button" name="button">valider</button></a>
        </td>
        <td>
          <!-- Bouton pour supprimer la commande -->
          <a href="<?= $this->url('admin_order_delete_action', ['id' => $id]) ?>" class="edit-item" title="Edit"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer cette commande ?');" type="button" name="button">Supprimer</button></a>
        </td>
      </tr>
    </tbody>
  </table>
</main>

<?php $this->stop('main_content') ?>
