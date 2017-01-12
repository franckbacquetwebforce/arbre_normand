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
 	      $_SESSION['cart']                  = array();
 	      $_SESSION['cart']['id_product']    = array();
 	      $_SESSION['cart']['qt_product']    = array();
 	      $_SESSION['cart']['price_product'] = array();
 	   }
 	   return true;

		 $this->show('cart/cart');
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
					$product_stock = $product[0]['stock'];
					$cart_qt = $_SESSION['cart']['qt_product'][$i];
					$cart_price = $_SESSION['cart']['price_product'][$i];
					$infoPanier[$i]= array(
					'product_id'    => $product_id,
					'product_name'  => $product_name,
					'product_img'   => $product_img,
					'cart_qt'       => $cart_qt,
					'cart_price'    => $cart_price,
					'product_weight'=> $product_weight,
					'product_stock' => $product_stock,
					);
// debug($product);
// debug($cart_id_product);
				}return $infoPanier;
		}
	}
	public function afficherPanier()
	{
		// $_SESSION['cart'] = array();
		// unset($_SESSION['cart']);
		$infoPanier = $this->infoProduitPanier();
		$total = $this->MontantGlobal();
		$this->show('cart/cart', array(
 		 'total'=>$total,
		 'infoPanier'=>$infoPanier,
 	 ));
	}

 // 	function ajouterNouvelArticle($id_product, $qt_product, $price_product){
	// 	$this->creationPanier();
 // 	      //Si le produit existe déjà on ajoute seulement la quantité
 // 	      $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);
 // 	      	if ($positionProduct !== false){
	// 					$_SESSION['cart']['qt_product'][$positionProduct] += $qt_product ;
	// 				}else{
 // 	         //Sinon on ajoute le produit
 // 	         array_push( $_SESSION['cart']['id_product'],$id_product);
 // 	         array_push( $_SESSION['cart']['qt_product'],$qt_product);
 // 	         array_push( $_SESSION['cart']['price_product'],$price_product);
 // 	    	  }
	// 				$this->redirectToRoute('singleproduct', array('id' => $id_product));
 // 	}

	function ajouterNouvelArticle(){
		$this->creationPanier();
		$id_product=$_GET['prod_id'];
		$qt_product=$_GET['qt_prod'];
		$price_product=$_GET['price_ht'];

		$newProductModel = new ProductsModel;
		$prod = $newProductModel->find($id_product);

 	      //Si le produit existe déjà on ajoute seulement la quantité
 	      $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);
 	      	if ($positionProduct !== false){
						$_SESSION['cart']['qt_product'][$positionProduct] += $qt_product ;
						$qt=$_SESSION['cart']['qt_product'][$positionProduct];
						$error='1 article ajouté au panier';
						$response = array(
							'stock'=>$prod['stock'],
							'qt'=>$qt,
							'error'=>$error,
							'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
						);
						$this->showJson($response);
					}else{
 	         //Sinon on ajoute le produit
 	         array_push( $_SESSION['cart']['id_product'],$id_product);
 	         array_push( $_SESSION['cart']['qt_product'],$qt_product);
 	         array_push( $_SESSION['cart']['price_product'],$price_product);
					 $qt=$_SESSION['cart']['qt_product'][$positionProduct];
					 $error='Produit ajouté au panier';
					 $response = array(
						 'stock'=>$prod['stock'],
						 'qt'=>$qt,
						 'error'=>$error,
						 'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
					 );
					 $this->showJson($response);
 	    	  }
					$this->redirectToRoute('singleproduct', array('id' => $id_product));
 	}


	function ajouterArticle(){
		$id_product = $_GET['id_product'];
		$error = array();
		$total = $this->MontantGlobal();
		$infoPanier = $this->infoProduitPanier();
		$total = $this->MontantGlobal()*1.2;
 	      $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);//on verifie si le produit existe bien dans le panier
				if ($positionProduct !== false){
					if($_SESSION['cart']['qt_product'][$positionProduct] < $infoPanier[$positionProduct]['product_stock']){
 	        	$qt_product=$_SESSION['cart']['qt_product'][$positionProduct] += 1 ;
						$total_price_product=$qt_product*$infoPanier[$positionProduct]['cart_price']*1.2;
						$error = "1 article ajouté au panier";
						$response = array(//prepare les data
								 'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
								 'total'=>$total ,
								 'stock'=>$infoPanier[$positionProduct]['product_stock'],
								 'error'=>$error ,
								 'qt_product'=>$qt_product,
								 'total_price_product'=>$total_price_product,
			      );
						$this->showJson($response);
					}else{
						$qt_product=$_SESSION['cart']['qt_product'][$positionProduct];
						$total_price_product=$qt_product*$infoPanier[$positionProduct]['cart_price']*1.2;
						$error = "Stock insuffisant, contactez le vendeur.";
						$response = array(//prepare les data
								 'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
								 'total'=>$total ,
								 'stock'=>$infoPanier[$positionProduct]['product_stock'],
								 'error'=>$error ,
								 'qt_product'=>$qt_product,
								 'total_price_product'=>$total_price_product,
			      );
						$this->showJson($response);
					}
				}else{
					$error  = "Un problème est survenu veuillez contacter l'administrateur du site.";
					$response = array(//prepare les data
							 'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
						'total'=>$total ,
						'error'=>$error ,
					);
					$this->showJson($response);
				}
				// faire un isAjax
				//  $this->show('cart/cart', array(
				// 	 'total'=>$total ,
				// 	 'infoPanier'=>$infoPanier ,
				// 	 'error'=>$error ,
				// 	 'success'=>$success,
				//  ));
 	}


	function retrancherArticle(){
		$id_product = $_GET['id_product'];
		$error = array();
		$total = $this->MontantGlobal();
		$infoPanier = $this->infoProduitPanier();
		$total = $this->MontantGlobal();

		$positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);
		if ($positionProduct !== false){
			if($_SESSION['cart']['qt_product'][$positionProduct]>1){
 	    	$qt_product=$_SESSION['cart']['qt_product'][$positionProduct] -= 1 ;
				$total_price_product=$qt_product*$infoPanier[$positionProduct]['cart_price']*1.2;
				$error  = "1 article retiré du panier";
				$success = 'true';
				$response = array(//prepare les data
					'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
					'total'=>$total ,
					'infoPanier'=>$infoPanier ,
					'stock'=>$infoPanier[$positionProduct]['product_stock'],
					'error'=>$error ,
					'success'=>$success,
					'qt_product'=>$qt_product,
					'total_price_product'=>$total_price_product,
				);
				$this->showJson($response);
 	   	}else{
				$error  = "Produit supprimé du panier";
				$response = array(//prepare les data
					'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
					'total'=>$total ,
					'infoPanier'=>$infoPanier ,
					'stock'=>$infoPanier[$positionProduct]['product_stock'],
					'error'=>$error ,
					'success'=>$success,
					'qt_product'=>$qt_product,
					'total_price_product'=>$total_price_product,
				);
			 $this->supprimerArticle($id_product);
			 $this->showJson($response);
	 	 	}
		}else{
			$error  = "Un problème est survenu veuillez contacter l'administrateur du site.";
			$success = 'false';
			$response = array(//prepare les data
					 'total_qt_product' => array_sum($_SESSION['cart']['qt_product']),
					 'total'=>$total ,
					 'infoPanier'=>$infoPanier ,
					 'error'=>$error ,
					 'success'=>$success,
			);
			$this->showJson($response);
		}
		// faire un isAjax
 		// 	$this->show('cart/cart', array(
 		// 		 'total'=>$total ,
 		// 		 'infoPanier'=>$infoPanier ,
 		// 		 'error'=>$error ,
 		// 	 ));
 	}

	function supprimerArticle($id_product){
	      //Nous allons passer par un panier temporaire
	      $tmp=array();
	      $tmp['id_product'] = array();
	      $tmp['qt_product'] = array();
	      $tmp['price_product'] = array();
	      $tmp['cart'] = $_SESSION['cart'];
				// debug($tmp);
				// debug($_SESSION);
				// die();
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
	      unset($_SESSION['cart']['cart']);
				$total = $this->MontantGlobal();
				$products = $this->afficherPanier();

				$this->show('cart/cart', array(
					'total'=>$total , 'products'=>$products
				));
	}
	// public function cartOrder







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
