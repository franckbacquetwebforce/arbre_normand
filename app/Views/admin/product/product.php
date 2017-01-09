<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>

<!-- <?php debug($products);?> -->

<!-- Page affichant la liste des produits en back-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
  <section class="parent">
    <article class="enfant">
      <h1>Liste produits</h1>
    </article>
  </section>
  <!-- Bouton pour ajouter un produit menant vers la page product/product_new.php -->
   <a href="<?= $this->url('admin_product_new') ?>"><button type="button" name="add_product">Ajouter un produit</button></a>
  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:10%">Image principale</th>
          <th colspan="1" style="width:20%">Nom</th>
          <th colspan="1" style="width:35%">Description</th>
          <th colspan="1" style="width:10%">Prix HT</th>
          <th colspan="1" style="width:5%">Catégorie</th>
          <th colspan="1" style="width:5%">Poids</th>
          <th colspan="2" style="width:10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($products as $product){ ?>
      <tr>
        <td><img class="img-responsive" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" /></td>
        <td><b><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></b></td>
        <td><?php if(!empty($product['description'])) { echo $product['description'];} ?></td>

        <td><b><?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</b></td>
        <td><b><?php if(!empty($product['category_name'])) { echo $product['category_name'];} ?></b></td>
        <td><b><?php if(!empty($product['weight'])) { echo $product['weight'];} ?> Kg</b></td>
        <td class="actions">
          <!-- Bouton pour supprimer un produit -->
          <p><a href="<?= $this->url('admin_product_update',['id' => $product['id_product']])?>" class="edit-item" title="Edit"><button style="width:80px;" type="button" name="button">Modifier</button></a></p>
          <p><a href="<?= $this->url('admin_product_delete_action',['id' => $product['id_product']])?>" class="remove-item" title="Remove"><button style="width:80px;" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet article?');" type="button" name="button">Supprimer</button></a></p>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</main>

<?php $this->stop('main_content') ?>
