<?php $this->layout('layout_admin', ['title' => 'Salle de controle']) ?>

<?php $this->start('main_content') ?>

<!-- Page d'accueil du dashboard en back-office
     Mise en forme et CSS (Michèle et modif apportées par Hermelen) -->

<body class="home">
  <section class="container-fluid display-table">
    <div class="row display-table-row">
      <div class="user-dashboard">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12 gutter container-fluid" style="min-height:264px;">
      <?php if(!empty($w_user)){?>
              <h3 style="margin-left:30px;color:#5d5926;margin-bottom:40px;">Bienvenue <?php echo $w_user['username']; ?></h3>
      <?php	}?>
            <h4 style="margin-left:30px;color:#0d786b;">Nombre de commandes <span class="label label-primary pull-right" style="width:80px;"><?php echo $orders; ?></span></h4>
            <h4 style="margin-left:30px;color:#0d786b;">Nombre de visiteurs <span class="label label-primary pull-right" style="width:80px;"><?php echo $compte;?></span></h4>
            <h4 style="margin-left:30px;color:#0d786b;">Nombre d'utilisateurs <span class="label label-primary pull-right" style="width:80px;"><?php echo $inscriptions;?></span></h4>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1"></div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <h4 style="margin-left:30px;color:#0d786b;text-align:center;margin-bottom:10px;margin-top:15px;">Stock par produits</h4>
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
        </div>
      </div>
    </div>
  </section>
</body>

<?php $this->stop('main_content') ?>
