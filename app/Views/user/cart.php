<?php $this->layout('layout', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>


<form method="post" action="cart.php">
<table style="width: 400px">
	<tr>
		<td colspan="4">Votre panier</td>
	</tr>
	<tr>
		<td>Libellé</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Action</td>
	</tr>
	<?php
		$nbArticles=count($_SESSION['cart']['id_product']);
		if ($nbArticles <= 0)
		echo "<tr><td>Votre panier est vide </ td></tr>";
		else
		{
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['cart']['id_product'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart']['qt_product'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['cart']['price_product'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&l=".rawurlencode($_SESSION['cart']['id_product'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal();
			echo "</td></tr>";

			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

			echo "</td></tr>";

	?>
</table>
</form>

<?php

$erreur = false;

$action = (isset($_GET['action'])? $_GET['action']: /*(isset($_GET['action'])? $_GET['action']:*/null ) ;
if($action !== null){
   if(!in_array($action,array('ajout', 'suppression', 'refresh'))){
   $erreur=true;


   //récuperation des variables en POST ou GET
   $i = (isset($_GET['i'])? $_GET['i']: null ) ; /*(isset($_GET['q'])? $_GET['q']:*/
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
} ?>
<?php $this->stop('main_content') ?>
