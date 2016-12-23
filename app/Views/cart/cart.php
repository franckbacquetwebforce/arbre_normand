<?php $this->layout('layout', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>
<?php debug($_SESSION['cart']); ?>

<form method="post" action="cart.php">
<table>
	<h2 colspan="4">Votre panier</h2> <?php
		$nbArticles=count($_SESSION['cart']['id_product']);
		if ($nbArticles <= 0){
			echo "<p class='empty_cart'>Votre panier est vide</p>";
		}else{ ?>
	<tr>
		<td class="cart_table_cell">Libellé</td>
		<td class="cart_table_cell">Image</td>
		<td class="cart_table_cell">Quantité</td>
		<td class="cart_table_cell">Prix Unitaire</td>
		<td class="cart_table_cell">Poids Unitaire</td>
		<td class="cart_table_cell">Action</td>
	</tr>
	<?php

			for ($i=0; $i < $nbArticles; $i++){?>
			<tr>
				<td><?= $infoPanier[$i]['product_name'] ?></ td>
				<td><img class="thumb_cart" src="../../public/<?= $infoPanier[$i]['product_img'] ?>" alt="<?= $infoPanier[$i]['product_name'] ?>"></td>
				<td><a href="<?= $this->url('user_cart_add', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1,'p'=> $infoPanier[$i]['cart_price']]); ?>"><button type="button" name="button">+</button></a></br>
					<?= $infoPanier[$i]['cart_qt']?></br>
					<a href="<?= $this->url('user_cart_substrat', ['l'=> $infoPanier[$i]['product_id'],'q'=> 1]); ?>"><button type="button" name="button">-</button></a></td>
				<td><?= $infoPanier[$i]['cart_price']?> €</td>
				<td><?= $infoPanier[$i]['product_weight']?> kg</td>
				<td><a href="<?= $this->url('user_cart_remove', ['l'=> $infoPanier[$i]['product_id']]); ?>"><button type="button" name="button">Supprimer du panier</button></a></td>
			</tr>
			<?php } ?>
		  <tr>
		  	<td colspan=\"3\"> </td>
		  	<td colspan=\"3\">Total: <?= $total ?> €</td>
		  </tr>
		}


</table>
</form>
<a href="<?= $this->url('confirm_order'); ?>"><button type="button" name="button">Passer la commande</button></a>

<?php
// suite non-utilisée pour le moment
$erreur = false;

$action = (isset($_GET['action'])? $_GET['action']: /*(isset($_GET['action'])? $_GET['action']:*/null ) ;
if($action !== null){
   if(!in_array($action,array('ajout', 'suppression', 'refresh'))){
   $erreur=true;


   //récuperation des variables en POST ou GET
   $l = (isset($_GET['l'])? $_GET['l']: null ) ; /*(isset($_GET['l'])? $_GET['l']:*/
   $p = (isset($_GET['p'])? $_GET['p']: null ) ; /*(isset($_GET['p'])? $_GET['p']:*/
   $q = (isset($_GET['q'])? $_GET['q']: null ) ; /*(isset($_GET['q'])? $_GET['q']:*/

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier

   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   } else
   $q = intval($q);
   }
}

if (!$erreur){
   switch($action){
      case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      case "suppression":
         supprimerArticle($l);
         break;

      case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['cart']['id_product'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
    }
  }
}
 ?>
<?php $this->stop('main_content') ?>
