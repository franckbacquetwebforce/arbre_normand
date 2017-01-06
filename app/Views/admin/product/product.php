<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content');?>

<?php debug($products);
?>
<table>
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
</table>


<a href="<?= $this->url('admin_product_new') ?>"><button type="button" name="add_product">add_product</button></a>


<?php $this->stop('main_content') ?>
