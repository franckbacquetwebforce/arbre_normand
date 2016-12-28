<!-- Page single des catégories -->
<?php $this->layout('layout', ['title' => 'Mon profil']) ?>
<?php $this->start('main_content') ?>
<?php

debug($addresses);

 ?>
<a href="<?= $this->url('add_new_address') ?>"><button type="button" name="button">Ajouter une adresse</button></a>
<?php $this->stop('main_content') ?>
