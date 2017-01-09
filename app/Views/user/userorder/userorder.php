<?php $this->layout('layout_product', ['title' => 'Mes commandes']) ?>

<?php $this->start('main_content') ?>


<?php debug($orders); ?>

<!-- Page affichant la liste des commandes du client en front-office -->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Mes commandes</h1>
    </article>
  </section>
  <table class="layout display responsive-table">
    <thead>
      <tr>
        <th>Ref</th>
        <th>Date commande</th>
        <th></th>
        <th>Statut</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($orders)){ ?>
<?php foreach($orders as $order){ ?>
        <tr>
          <td><?php echo $order['ref']; ?></td>
          <td><?php echo $order['date_order']; ?></td>
          <td>
            <table class="layout display responsive-table">
              <tr>
                <th>Produits</th>
            <?php foreach ($order['produits'] as $key => $value){ ?>
                    <td><?php echo $value['product_name']; ?></td>
            <?php } ?>
              </tr>
              <tr>
                <th>Qté</th>
            <?php foreach ($order['produits'] as $key => $value){ ?>
                  <td><?php echo $value['qt_product']; ?></td>
            <?php } ?>
              </tr>
              <tr>
                <th>Prix HT</th>
            <?php foreach ($order['produits'] as $key => $value){ ?>
                  <td><?php echo number_format($value['price_product'], 2, ',', ' ');
                    ?></td>
            <?php } ?>
              </tr>
            </table>
          </td>
  <?php if($order['status'] == "en_attente") { ?>
          <td><p class="button"><b>En attente de validation</b></p></td>
  <?php }else{ ?>
          <td><p class="button"><b>Commande validée</b></p></td>
  <?php } ?>
        </tr>
      <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</main>

<?php $this->stop('main_content') ?>
