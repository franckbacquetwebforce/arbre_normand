<?php $this->layout('layout_admin', ['title' => 'Liste des commandes']) ?>

<?php $this->start('main_content') ?>

<!-- <?php debug($adminorders);?> -->

<!-- Page listant les commandes en back-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Liste des commandes</h1>
    </article>
  </section>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:10%">Ref</th>
          <th style="width:10%">Nom</th>
          <th style="width:10%">Prénom</th>
          <th style="width:10%">Ville</th>
          <th style="width:10%">Code Postal</th>
          <th style="width:10%">Tel</th>
          <th colspan="1" style="width:10%">Date commande</th>
          <th colspan="1" style="width:10%">Statut</th>
      </tr>
    </thead>
    <tbody>
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
          <!-- Bouton pour afficher le statut en attente ou validé avec lien menant vers la page orders/single.php-->
          <a href="<?= $this->url('order_single', ['id' => $key]); ?>" class="edit-item" title="Edit"><button type="button" name="button"><?php echo $value['status']; ?></button></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</main>


<?php $this->stop('main_content') ?>
