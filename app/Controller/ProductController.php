<?php

namespace Controller;

use \Controller\AppController;
use \Controller\ProductAdminController;
use \Controller\CategoriesAdminController;
use \Model\ProductsModel;
use \Model\ImgModel;
use \Service\ValidationTools;
use \Service\Upload;
use \DateTime;

class ProductController extends AppController
{
  // Fonction d'Hermelen qui affiche les produits avec leur image
  public function index()
  {
    $searchImg = new ProductsModel();

    $products = $searchImg->getProductWithImageCat();//changé pour avoir category

    $this->show('products/listproducts', array(
      'products' => $products,
    ));
  }

  public function indexCategory()
  {
    $searchCategory = new ProductsModel();
    $products = $searchCategory->getProductByCategoryWithImage();

    $this->show('products/listproducts', array(
      'products' => $products,
    ));
  }
// affichage page détail
//

  public function showSingleProduct($id)
  {
    $modelSingle = new ProductsModel($id);
    $product = $modelSingle->getSingleProductCat($id);//modifier pour recup category name
    $img = $modelSingle->searchImgSingle($id);

        $this->show('products/singleproduct', array(
      'product'=> $product,
      'img'    => $img,
    ));
  }


}
