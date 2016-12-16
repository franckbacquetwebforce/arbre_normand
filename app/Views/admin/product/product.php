<?php $this->layout('layout_admin', ['title' => 'Products']) ?>

<?php $this->start('main_content') ?>

<a href="<?= $this->url('admin_product_new') ?>"><button type="button" name="add_product">add_product</button></a>


<?php $this->stop('main_content') ?>
