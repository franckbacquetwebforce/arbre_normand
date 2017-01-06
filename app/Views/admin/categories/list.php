<!-- Pages listant les catégories -->

<?php $this->layout('layout', ['title' => 'Liste des categories']) ?>
<?php $this->start('main_content') ?>

 <table>
   <thead>
     <tr>
       <th>Nom</th>
       <th>slug</th>
       <th>Date de création</th>
       <th>Status</th>
     </tr>
   </thead>
   <tbody>
     <?php foreach($categories as $cat){ ?>

     <tr>
       <!-- Lien menant vers la page single de la catégorie sélectionnée -->
       <td><a href="<?php echo $this->url('category_single', ['id' => $cat['id']]); ?>"><?php echo $cat['category_name']; ?></a></td>
       <!-- echo des colonnes des catégories -->
       <td><?php echo $cat['slug'] ?></td>
       <td><?php echo $cat['created_at'] ?></td>
       <td><?php echo $cat['status'] ?></td>
       <!-- Bouton pour éditer la catégorie -->
       <td><a href="<?= $this->url('admin_categories_update', ['id' => $cat['id']]) ?>"><button type="button" name="button">Editer</button></a></td>
       <!-- Bouton pour supprimer la catégorie -->
       <td><a href="<?= $this->url('admin_categories_delete_action', ['id' => $cat['id']]) ?>"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer cet article?');" type="button" name="button">Supprimer</button></a></td>

     </tr>
<?php  } ?>

   </tbody>
 </table>


<?php $this->stop('main_content') ?>
