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
{
  public function showProducts()
  {
    $this->show('products/listproducts');
  }
  // listing en back-office des produits jointure des deux tables Products et img
  public function index()
  {
    $searchImg = new ProductsModel();

    $products = $searchImg->getProductWithImage();

    $this->show('products/listproducts', array(
      'products' => $products,
    ));
  }
// affichage de la page product
// affichage page détail


}
