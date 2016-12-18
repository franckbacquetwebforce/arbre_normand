<!-- Page single des catégories -->
<?php $this->layout('layout', ['title' => 'Mon profil']) ?>
<?php $this->start('main_content') ?>
<?php
debug($user);
debug($addresses);

 ?>
<button type="button" name="button"><a href="<?= $this->url('add_new_address') ?>">Ajouter une adresse</a></button>
<?php $this->stop('main_content') ?>
