<!-- Page single des catégories -->
<?php $this->layout('layout', ['title' => 'Liste des categories']) ?>
<?php $this->start('main_content') ?>
<!-- echo $cat['nom de la colonne ']pour récuperer les données -->
<?php echo $cat['category_name']; ?>
<?php $this->stop('main_content') ?>
