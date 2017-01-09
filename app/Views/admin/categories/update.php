<?php $this->layout('layout_admin', ['title' => 'Modification d\'une catégorie']) ?>

<?php $this->start('main_content') ?>

<!-- Page pour modifier les catégories en back-office
     Mise en forme et CSS (Michèle)-->
<main class="container-fluid ajout">
  <section class="parent">
    <article class="enfant">
      <h1>Modification de la catégorie</h1>
    </article>
  </section>
  <section class="row">
    <form class="responsive modif-form" action="<?= $this->url('admin_categories_update_action',['id' => $cat['id']]) ?>" method="post" enctype="multipart/form-data">
      <div class="col-sm-2"></div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="name"><h4>Nom de la catégorie</h4></label>
          <input class="form-control" type="text" name="name" class="form-control" value="<?php if(!empty($_POST['name'])){ echo $_POST['name'];} else { if(!empty($cat['category_name'])) echo $cat['category_name'];} ?>">
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
        <br><br><button class="btn btn-success modif_categorie" type="submit" name="submit" value="">Modifier la catégorie</button>
      </div>
      <div class="col-sm-2"></div>
	  </form>
	</div>
</main>

<?php $this->stop('main_content') ?>
