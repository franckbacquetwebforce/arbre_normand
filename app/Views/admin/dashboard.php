<!-- A mettre en forme -->
<?php $this->layout('layout_admin', ['title' => 'Salle de controle']) ?>

<?php $this->start('main_content') ?>

<!-- <?php
echo 'cette page affichera les statistiques du site . pour le moment il y a le nombre de  commandes, le nombre de visites et le nombre d\'utilisateurs inscrits';
echo '<br>';
echo 'visiteurs: ' .$compte;
echo '<br>';
echo 'nombre total de commandes: '.$orders;
echo '<br>';
echo 'utilisateurs inscrits: '.$inscriptions;
echo '<br>';
foreach($stocks as $stock)
{
  echo $stock['name'].' stock restant: '.$stock['stock'];
  echo '<br>';
}
 ?> -->

<body class="home">
  <div class="container-fluid display-table">
    <div class="row display-table-row">
      <div class="user-dashboard">
        <?php if(!empty($w_user)){?>
        <h1>Bienvenue <?php echo $w_user['username']; ?></h1>
        <?php	}?>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 gutter">
            <h2>Nombre de commandes <span class="label label-primary pull-right"><?php echo $orders; ?></span></h2>
            <h2>Nombre de visiteurs <span class="label label-primary pull-right"><?php echo $compte;?></span></h2>
            <h2>Nombre d'utilisateurs <span class="label label-primary pull-right"><?php echo $inscriptions;?></span></h2>
          </div>
          <div class="col-md-5 col-sm-5 col-xs-12">
            <table class="layout display responsive-table">
              <thead>
                <tr>
                  <th style="width:80%">Nom</th>
                  <th colspan="1" style="width:20%">Stock</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($stocks as $stock){ ?>
                <tr>
                  <td><?php echo $stock['name']; ?></th>
                  <td><?php echo $stock['stock']; ?></th>
                </tr>
                <?php }; ?>
              </tbody>
            </table>
          </div>

          <!-- <div class="col-md-3 col-sm-3 col-xs-12 gutter">
            <div class="visitors">

            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 gutter">
            <div class="users">

            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>

 </body>



<?php $this->stop('main_content') ?>
