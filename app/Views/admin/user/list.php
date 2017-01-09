<?php $this->layout('layout_admin', ['title' => 'liste des utilisateurs']) ?>

<?php $this->start('main_content') ?>

<!-- Page affichant la liste des utilisateurs en back-office
     Mise en forme et CSS (Michèle) -->
<main class="container-fluid">
 <section class="parent">
   <article class="enfant">
     <h1>Liste utilisateurs</h1>
   </article>
 </section>
 <!-- Bouton pour ajouter un administrateur -->
 <a href="<?= $this->url('admin_user_new') ?>"><button type="button" name="add_product">Ajouter un administrateur</button></a>
 <!-- Bouton pour modifier le mot de passe Admin -->
 <a class="pull-right" href="<?= $this->url('admin_user_update',['id' => $w_user['id']]) ?>" class="edit-item" title="Edit"><button type="button" name="button">Modifier votre mot de passe</button></a>
 <table class="layout display responsive-table">
   <thead>
     <tr>
       <th style="width:10%">Pseudo</th>
       <th colspan="1" style="width:15%">Email</th>
       <th colspan="1" style="width:15%">Inscrit le</th>
       <th colspan="1" style="width:15%">Modifié le</th>
       <th colspan="1" style="width:10%">Statut</th>
       <?php if($w_user['role'] == 'admin') {?>
       <th colspan="3" style="width:25%">Action</th>
       <?php } ?>
     </tr>
   </thead>
   <tbody>
     <?php foreach($users as $user){ ?>
     <tr>
       <td><b><?php if(!empty($user['username'])) { echo $user['username'];} ?></b></td>
       <td><?php if(!empty($user['email'])) { echo $user['email'];} ?></td>
       <td><b><?php if(!empty($user['created_at'])) { echo $user['created_at'];} ?></b></td>
       <td><b><?php if(!empty($user['modified_at'])) { echo $user['modified_at'];} ?></b></td>
       <td><b><?php if(!empty($user['role'])) { echo $user['role'];} ?></b><a href="<?= $this->url('admin_user_update',['id' => $user['id']]) ?>" class="edit-item" title="Edit"></a></td>
       <?php if($w_user['role'] === 'admin'){ ?>
         <td class="actions">
           <!-- Bouton pour supprimer un utilisateur -->
         <a href="<?= $this->url('admin_user_delete_action',['id' => $user['id']]) ?>" class="remove-item" title="Remove"><button onclick="return confirm('Êtes-vous sur de vouloir supprimer cet utilisateur?');" type="button" name="button">Supprimer</button></a>
         <!-- Bouton pour modifier le statut admin/user -->
         <a href="<?= $this->url('admin_user_status_update',['id' => $user['id']]) ?>" class="remove-item" title="Remove"><button onclick="return confirm('Êtes-vous sur de vouloir changer le status de cet utilisateur?');" type="button" name="button">Admin/User</button></a>
       <?php } ?>
         </td>
     </tr>
     <?php } ?>
   </tbody>
 </table>
</main>

<?php $this->stop('main_content') ?>
