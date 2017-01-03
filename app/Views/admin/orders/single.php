<?php $this->layout('layout_admin', ['title' => 'Edition commande']) ?>
<?php $this->start('main_content')
debug($singleOrder);
die('dede');

 ?>

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Liste des commandes</h1>
    </div>
  </div>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:10%">Ref</th>
          <th style="width:10%">Nom</th>
          <th style="width:10%">Prénom</th>
          <th style="width:20%">Adresse</th>
          <th colspan="1" style="width:10%">Date commande</th>
          <th colspan="1" style="width:10%">Statut</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!-- <td><?php echo $order['ref']; ?></td> -->
        <td></td>
        <td></td>
        <td></td>
        <!-- <td><b><?php echo $order['date_order']; ?></b></td> -->
        <!-- <td><b></b></td> -->
      </tr>
    </tbody>
  </table>
</div>
<?php $this->stop('main_content') ?>
