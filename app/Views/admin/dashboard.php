<!-- Formulaire de modification d'un compte administrateur -->
<!-- A mettre en forme -->
<?php $this->layout('layout_admin', ['title' => 'Salle de controle']) ?>

<?php $this->start('main_content') ?>
<?php
echo 'cette page affichera les statistiques du site . pour le moment il y a le nombre de  commandes, le nombre de visites et le nombre d\'utilisateurs inscrits';
echo '<br>';
echo 'visiteurs: ' .$compte;
echo '<br>';
echo 'nombre total de commandes: '.$orders;
echo '<br>';
echo 'utilisateurs inscrits: '.$inscriptions;
 ?>
<?php $this->stop('main_content') ?>
