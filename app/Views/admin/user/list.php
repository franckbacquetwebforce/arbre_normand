<?php
// Page listant les utilisateurs
// A Mettre en forme avec un lien détail?
$this->layout('layout_admin', ['title' => 'liste des utilisateurs']) ?>

<?php $this->start('main_content') ?>
<thead>
  <tr>
    <th>email</th>
  </tr>
</thead>
<tbody>
  <?php foreach($users as $user){ ?>

  <tr>
    <td><?php echo $user['email']; ?></td>
  </tr>
<?php  } ?>

</tbody>
</table>
<?php $this->stop('main_content') ?>
