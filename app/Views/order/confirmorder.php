<?php $this->layout('layout', ['title' => 'Confirmer la commande']) ?>
<?php $this->start('main_content') ?>

<?php
debug($orders);



 ?>
<form class="" action="<?= $this->url('confirm_order_action'); ?>" method="post">
  <input type="submit" name="submit" value="Valider">

</form>
<?php $this->stop('main_content') ?>
