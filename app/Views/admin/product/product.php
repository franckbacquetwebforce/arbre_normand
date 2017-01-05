<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>

<!-- <?php debug($products);?> -->
<div class="container-fluid">
  <div class="parent">
    <div class="enfant">
      <h1>Liste produits</h1>
    </div>
  </div>
 <a href="<?= $this->url('admin_product_new') ?>"><button type="button" name="add_product">Ajouter un produit</button></a>

  <table class="layout display responsive-table">
    <thead>
      <tr>
          <th style="width:10%">Image principale</th>
          <th colspan="1" style="width:15%">Nom</th>
          <th colspan="1" style="width:40%">Description</th>
          <th colspan="1" style="width:5%">Prix HT</th>
          <th colspan="1" style="width:5%">Catégorie</th>
          <th colspan="1" style="width:5%">Poids</th>
          <th colspan="2" style="width:20%">Action</th>
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
          <p><a href="<?= $this->url('admin_product_update',['id' => $product['id_product']])?>" class="edit-item" title="Edit"><button style="width:80px;" type="button" name="button">Modifier</button></a></p>
          <p><a href="<?= $this->url('admin_product_delete_action',['id' => $product['id_product']])?>" class="remove-item" title="Remove"><button style="width:80px;" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet article?');" type="button" name="button">Supprimer</button></a></p>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>



<!-- <table>
=======
<!-- <table> commenté suite nouveau tableau product par Michèle.
>>>>>>> 561a780c83a1736a4682e3de7d6d29126841342e
    <tr>
      <th>Produit</td>
      <th>Description</td>
      <th>Prix HT</td>
      <th>Catégorie</td>
      <th>Image Principale</td>
      <th>Edit</td>
    </tr>
    <?php foreach($products as $product){ ?>
    <tr class="produit_thumbnail_back">
      <td class="product_title_thumbnail_back"><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></td>
      <td class="product_description_thumbnail_back"><?php if(!empty($product['description'])) { echo $product['description'];} ?></td>
      <td class="product_price_ht_thumbnail_back"><?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</td>
      <td class="product_category_thumbnail_back"><?php if(!empty($product['id_category'])) { echo $product['id_category'];} ?></td>
      <td class="product_img_thumbnail_back"><img class="img_thumbnail_back" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" /></td>
      <td class="product_img_thumbnail_back">
        <a href="<?= $this->url('admin_product_update',['id' => $product['id']])?>"><button type="button" name="button">Modifier</button></a>
        <a href="<?= $this->url('admin_product_delete_action',['id' => $product['id']])?>"><button type="button" name="button">Supprimer</button>
      </td>
    </tr>
    <?php } ?>
</table> -->




<!-- <a href="<?= $this->url('admin_product_new') ?>"><button type="button" name="add_product">add_product</button></a> -->



<?php $this->stop('main_content') ?>
