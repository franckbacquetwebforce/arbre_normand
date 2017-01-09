<?php $this->layout('layout_admin', ['title' => 'Liste des categories']) ?>

<?php $this->start('main_content') ?>

<!-- Page listant les catégories en back-office
     Mise en forme et CSS (Michèle)-->
<main class="container-fluid">
  <!-- Centrage vertical et horizontal des titres de pages -->
  <section class="parent">
    <article class="enfant">
      <h1>Liste catégories</h1>
    </article>
  </section>
  <section class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Bouton pour ajouter une catégorie menant à la page categories/add.php -->
      <a href="<?= $this->url('admin_categories_new') ?>"><button type="button" name="add_category">Ajouter une catégorie</button></a>
      <table class="layout display responsive-table">
        <thead>
          <tr>
              <th colspan="1" style="width:15%">Nom</th>
              <th colspan="1" style="width:5%">Slug</th>
              <th colspan="1" style="width:15%">Date de création</th>
              <th colspan="1" style="width:5%">Status</th>
              <th colspan="2" style="width:25%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($categories as $cat){ ?>
          <tr>
            <td><?php echo $cat['category_name']; ?></td>
            <td><?php echo $cat['slug'] ?></td>
            <td><?php echo $cat['created_at'] ?></td>
            <td><?php echo $cat['status'] ?></td>
            <td class="actions">
              <!-- Bouton pour éditer la catégorie menant vers la page categories/update.php -->
              <a href="<?= $this->url('admin_categories_update', ['id' => $cat['id']]) ?>"><button type="button" name="button">Editer</button></a>
              <!-- Bouton pour supprimer la catégorie -->
              <a href="<?= $this->url('admin_categories_delete_action', ['id' => $cat['id']]) ?>"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer cette catégorie ?');" type="button" name="button">Supprimer</button></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-2"></div>
  </section>
</main>

<?php $this->stop('main_content') ?>
