<?php

namespace Controller;

use \Controller\AppController;

class CartController extends AppController
{

	/**
	 * Page d'accueil par défaut
	 */
	 function creationPanier(){

 	   if (!isset($_SESSION['cart'])){
 	      $_SESSION['cart']=array();
 	      $_SESSION['cart']['id_product'] = array();
 	      $_SESSION['cart']['qt_product'] = array();
 	      $_SESSION['cart']['price_product'] = array();
 	   }
 	   return true;

		 $this->show('user/cart');
 	}

	function MontantGlobal(){
 	   $total=0;
 	   for($i = 0; $i < count($_SESSION['cart']['id_product']); $i++)
 	   {
 	      $total += $_SESSION['cart']['qt_product'][$i] * $_SESSION['cart']['price_product'][$i];
 	   }
 	   return $total;
 	}


 	function ajouterArticle($id_product, $qt_product, $price_product){
 	   //Si le panier existe
 	   if ($this->creationPanier())
 	   {
 	      //Si le produit existe déjà on ajoute seulement la quantité
 	      $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);

 	      if ($positionProduct !== false)
 	      {
 	         $_SESSION['cart']['qt_product'][$positionProduct] += $qt_product ;
 	      }
 	      else
 	      {
 	         //Sinon on ajoute le produit
 	         array_push( $_SESSION['cart']['id_product'],$id_product);
 	         array_push( $_SESSION['cart']['qt_product'],$qt_product);
 	         array_push( $_SESSION['cart']['price_product'],$price_product);
 	      }
 	   }else{
 	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	 }

	 $total = $this->MontantGlobal();
	 $this->show('user/cart', array(
		 'total'=>$total
	 ));
 	}

 	function supprimerArticle($id_product){
 	   //Si le panier existe
 	   if ($this->creationPanier())
 	   {
 	      //Nous allons passer par un panier temporaire
 	      $tmp=array();
 	      $tmp['id_product'] = array();
 	      $tmp['qt_product'] = array();
 	      $tmp['price_product'] = array();
 	      $tmp['cart'] = $_SESSION['cart']['cart'];

 	      for($i = 0; $i < count($_SESSION['cart']['id_product']); $i++)
 	      {
 	         if ($_SESSION['cart']['id_product'][$i] !== $id_product)
 	         {
 	            array_push( $tmp['id_product'],$_SESSION['cart']['id_product'][$i]);
 	            array_push( $tmp['qt_product'],$_SESSION['cart']['qt_product'][$i]);
 	            array_push( $tmp['price_product'],$_SESSION['cart']['price_product'][$i]);
 	         }

 	      }
 	      //On remplace le panier en session par notre panier temporaire à jour
 	      $_SESSION['cart'] =  $tmp;
 	      //On efface notre panier temporaire
 	      unset($tmp);
 	   }
 	   else
 	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 	}

 	function modifierQTeArticle($id_product,$qt_product){
 	   //Si le panier éxiste
 	   if ($this->creationPanier())
 	   {
 	      //Si la quantité est positive on modifie sinon on supprime l'article
 	      if ($qt_product > 0)
				{
 	         //Recharche du produit dans le panier
 	         $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);

 	         if ($positionProduct !== false)
 	         {
 	            $_SESSION['cart']['qt_product'][$positionProduct] = $qt_product ;
 	         }
 	      }
 	      else
 	      supprimerArticle($id_product);
 	   }
 	   else
 	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 	}



	function compterArticles()
{
   if (isset($_SESSION['cart']))
   return count($_SESSION['cart']['id_product']);
   else
   return 0;
}

function supprimePanier(){
   unset($_SESSION['cart']);
}
}
