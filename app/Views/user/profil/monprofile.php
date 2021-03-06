<!-- Page single des catégories -->
<?php $this->layout('layout_product', ['title' => 'Mon profil']) ?>
<?php $this->start('main_content') ?>

<!-- <?php debug($addresses); ?> -->

<!-- Page affichant le profil client en front-office -->
<!-- Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Mon profil</h1>
    </article>
  </section>
  <a href="<?= $this->url('add_new_address') ?>"><button class="btn btn-success modif_product" type="submit" name="submit" value="">Ajouter une adresse</button></a>
  <a href="<?= $this->url('user_orders') ?>"><button class="btn btn-success modif_product pull-right" type="submit" name="submit" value="">Mes commandes</button></a><br>
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
</main>



<?php $this->stop('main_content') ?>
