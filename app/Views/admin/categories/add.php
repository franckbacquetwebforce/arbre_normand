<?php $this->layout('layout_admin', ['title' => 'Création d\'une catégorie']) ?>

<?php $this->start('main_content') ?>

<!-- Formulaire d'ajout d'une catégorie en back-office
     Mise en forme et CSS (Michèle)-->
<main class="container-fluid" style="margin-top: 30px">
  <section class="parent">
    <article class="enfant">
      <h1>Ajout d'une catégorie</h1>
    </article>
  </section>
  <section class="container-fluid ajout">
    <div class="row">
      <form class="responsive modif-form" action="<?= $this->url('admin_categories_new_action') ?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name"><h4>Nom de la catégorie</h4></label>
            <input class="form-control" type="text" name="name" class="form-control" value="<?php if(!empty($_POST['name'])){ echo $_POST['name'];} ?>">
            <span class="help-block"><?php if(!empty($errors['name'])){ echo $errors['name'];} ?></span>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="status"><h4>Status de la catégorie</h4></label>
            <select class="form-control" name="status">
              <option value="0">non visible</option>
              <option value="1">visible</option>
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <br><br><button class="btn btn-success modif_categorie" type="submit" name="submit" value="">Ajouter la catégorie</button>
        </div>
        <div class="col-sm-2"></div>
  	  </form>
  	</div>
  </section>
</main>

<?php $this->stop('main_content') ?>
