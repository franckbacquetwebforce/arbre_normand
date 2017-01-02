<!-- Page single des catégories -->
<?php $this->layout('layout', ['title' => 'Mon profil']) ?>
<?php $this->start('main_content') ?>
<?php

debug($addresses);?>

<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Mon profil</h1>
    </div>
  </div>
  <a href="<?= $this->url('add_new_address') ?>"><button class="btn btn-success modif_product" type="submit" name="submit" value="">Ajouter une adresse</button></a>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:15%">Prénom</th>
          <th colspan="1" style="width:15%">Nom</th>
          <th colspan="1" style="width:10%">Téléphone</th>
          <th colspan="1" style="width:25%">Adresse</th>
          <th colspan="1" style="width:10%">Ville</th>
          <th colspan="1" style="width:10%">Code Postal</th>
          <th colspan="1" style="width:10%">Pays</th>
          <th colspan="1" style="width:10%">Type</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($addresses as $addresse){ ?>
      <tr>
        <td><b><?php echo $addresse['firstname']; ?></b></td>
        <td><b><?php echo $addresse['lastname']; ?></b></td>
        <td><?php echo $addresse['phone']; ?></td>
        <td><?php echo $addresse['address']; ?></td>
        <td><?php echo $addresse['city']; ?></td>
        <td><?php echo $addresse['zip']; ?></td>
        <td><?php echo $addresse['country']; ?></td>
        <td><?php echo $addresse['type']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href=""><button class="btn btn-success modif_product" type="submit" name="submit" value="">Mes commandes</button></a>
</div>



<?php $this->stop('main_content') ?>
