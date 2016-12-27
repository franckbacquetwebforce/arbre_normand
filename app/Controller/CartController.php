<?php

namespace Controller;

use \Controller\AppController;
use \Model\ProductsModel;

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


	function infoProduitPanier()
	{
		$this->creationPanier();
		// session_destroy();
		$newProductModel = new ProductsModel;
		$infoPanier = array();

			$nbArticles=count($_SESSION['cart']['id_product']);
			if ($nbArticles <= 0){
			}else{
				for ($i=0; $i < $nbArticles; $i++){
					$cart_id_product = $_SESSION['cart']['id_product'][$i];
					$product = $newProductModel->getCartProductWithImage($cart_id_product);

					$product_name = $product[0]['product_name'];
					$product_id = $product[0]['id'];
					$product_img = $product[0]['path'].$product[0]['name'];
					$product_weight = $product[0]['weight'];
					$cart_qt = $_SESSION['cart']['qt_product'][$i];
					$cart_price = $_SESSION['cart']['price_product'][$i];
					$infoPanier[$i]= array(
					'product_id'   => $product_id,
					'product_name' => $product_name,
					'product_img'  => $product_img,
					'cart_qt'      => $cart_qt,
					'cart_price'   => $cart_price,
					'product_weight'  => $product_weight
					);
debug($product);
debug($cart_id_product);
				}
				return $infoPanier;

			}
		}

	public function afficherPanier()
	{
		$infoPanier = $this->infoProduitPanier();
		$total = $this->MontantGlobal();
		$this->show('user/cart', array(
 		 'total'=>$total,'infoPanier'=>$infoPanier
 	 ));
	}



 	function ajouterArticle($id_product, $qt_product, $price_product){
		$infoPanier = array();
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
 	      }$infoPanier['add']  = "Produit ajouté au panier";
 	   }else{
			 $infoPanier['add']  = "Un problème est survenu veuillez contacter l'administrateur du site.";
	 }

	 $total = $this->MontantGlobal();
	 $products = $this->afficherPanier();
	 $this->show('user/cart', array(
		 'total'=>$total , 'products'=>$products
	 ));
 	}


	function retrancherArticle($id_product, $qt_product){
		$infoPanier = array();

		$positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);
		if ($positionProduct !== false){
			if($_SESSION['cart']['qt_product'][$positionProduct]>1){
 	    	$_SESSION['cart']['qt_product'][$positionProduct] -= $qt_product ;
				$infoPanier['add']  = "1 produit retranché au panier";
 	   	}else{
			 $this->supprimerArticle($id_product);
	 	 	}
		}else{
			$infoPanier['add']  = "Un problème est survenu veuillez contacter l'administrateur du site.";
		}

	 $total = $this->MontantGlobal();
	 $products = $this->afficherPanier();
	 $this->show('user/cart', array(
		 'total'=>$total , 'products'=>$products
	 ));
 	}

	function supprimerArticle($id_product){
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
				$total = $this->MontantGlobal();
				$products = $this->afficherPanier();
				$this->show('user/cart', array(
					'total'=>$total , 'products'=>$products
				));
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
