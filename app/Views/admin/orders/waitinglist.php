<?php $this->layout('layout_admin', ['title' => 'Liste des commandes en attente']) ?>
<?php $this->start('main_content') ?>

<!-- 8 -->

les commandes en attente
<?php
if(!empty($orders)){

  debug($orders);
}


?>

<?php $this->stop('main_content') ?>
