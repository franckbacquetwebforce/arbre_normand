<?php $this->layout('layout_product', ['title' => 'Mes commandes']) ?>

<?php $this->start('main_content') ?>
<<<<<<< HEAD
<?php
// debug($orders);
?>
<div class="container-fluid">
=======

<!-- <?php debug($orders); ?> -->

<!-- Page affichant la liste des commandes du client en front-office -->
<!-- Mise en forme et CSS (Michèle) -->

<section class="container-fluid">
>>>>>>> 1cd2b352c3625755b6563dc171ce3100efbcaf49
  <div class="parent">
    <div class="enfant">
      <h1>Mes commandes</h1>
    </div>
  </div>
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
                 <th>Prix TTC</th>
                 <?php foreach ($order['produits'] as $key => $value){ ?>
                 <td><?php echo $value['price_product']; ?></td>
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
    </tbody>
  </table>
</section>





<?php $this->stop('main_content') ?>
