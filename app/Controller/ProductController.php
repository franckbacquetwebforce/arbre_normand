<?php

namespace Controller;

use \Controller\AppController;
use \Controller\ProductAdminController;
use \Model\ProductsModel;
use \Model\ImgModel;
use \Service\ValidationTools;
use \Service\Upload;
use \DateTime;

class ProductController extends AppController
{ // Affichage de la page "products/listproducts"
  public function showProducts()
  {
    $this->show('products/listproducts');
  }
  // Fonction d'Hermelen qui affiche les produits avec leur image 
  public function index()
  {
    $searchImg = new ProductsModel();

    $products = $searchImg->getProductWithImage();

    $this->show('products/listproducts', array(
      'products' => $products,
    ));
  }
// affichage page détail


}
