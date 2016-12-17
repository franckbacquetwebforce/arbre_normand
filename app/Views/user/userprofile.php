<?php $this->layout('layout_admin', ['title' => 'Votre compte']) ?>

<?php $this->start('main_content') ?>
<?= $user['email']; ?>
<?php $this->stop('main_content') ?>
