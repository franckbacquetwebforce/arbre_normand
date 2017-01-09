<?php
// Hermelen en cours
namespace Controller;

use \Controller\AppController;
use \Controller\CategoriesAdminController;
use \Model\ProductsModel;
use \Model\ImgModel;
use \Controller\ImageController;
use \Service\ValidationTools;
use \Service\Upload;
use \Service\UpdateImage;
use \DateTime;


class ProductAdminController extends AppController
{

  // listing en back-office des produits jointure des deux tables Products et img
  public function index()
  {
    if($this->allowTo('admin')){
      $searchImg = new ProductsModel();

      $products = $searchImg->getProductWithImageCat();

      $this->show('admin/product/product', array(//modifié suite changement de place du fichier product.php
        'products' => $products,
      ));
    }
  }

  // ajout d'un produit
  public function addNew()
  {
    if($this->allowTo('admin')){
    $CategoriesAdmin = new CategoriesAdminController();
    $categories = $CategoriesAdmin->getAllCat();

      $this->show('admin/product/product_new', array(
        'categories'=> $categories
      ));//modifié suite changement de place du fichier product_new.php

    }
  }

  public function addNewAction()
  {
    if($this->allowTo('admin')){

      $error = array();

      $addProduct = new ProductsModel();
      $modelImage = new ImgModel();
      $validation = new ValidationTools();
      $dateTimeModel = new DateTime();
      $upload = new Upload();
      $CategoriesAdmin = new CategoriesAdminController();

      $categories = $CategoriesAdmin->getAllCat();

      // striptags géré par INSERT
      $product_name = trim($_POST['product_name']);
      $description  = trim($_POST['description']);
      $price_ht     = trim($_POST['price_ht']);
      $weight       = trim($_POST['weight']);
      $width       = trim($_POST['width']);
      $length       = trim($_POST['length']);
      $height       = trim($_POST['height']);
      $stock        = trim($_POST['stock']);
      $id_category  = trim($_POST['id_category']);

      $error['product_name']  = $validation->textValid($product_name, 'produit',  3, 50);
      $error['description']   = $validation->textValid($description, 'description',  3, 1000);
      $error['price_ht']      = $validation->numberValid($price_ht, 'prix HT',  0, 100000);
      $error['weight']        = $validation->numberValid($weight, 'poids',  0, 10000);
      $error['width']         = $validation->numberValid($width, 'largeur',  0, 10000);
      $error['length']        = $validation->numberValid($length, 'longueur',  0, 10000);
      $error['height']        = $validation->numberValid($height, 'hauteur',  0, 10000);
      $error['stock']         = $validation->numberValid($stock, 'stock',  0, 10000, true);
      $error['id_category']   = $validation->numberValid($id_category, 'id de la catégorie',  1, 50);

      // IMAGE PRINCIPALE
      $validImage = $validation->mainImgValid('image');
      if(is_array($validImage)) {
        $extension = $validImage['ext'];
        $file_tmp_main  = $validImage['file_tmp'];
      } else {
        $error['image'] = $validImage;
      }

      if(!empty($error['image'])) {
        $image = false;
      } else {$image = true;}

      // IMAGE SECONDAIRE 1
      $validImageSecondaire1 = $validation->imgValid('imageSecondaire1');
      if(is_array($validImageSecondaire1)) {
        $extension = $validImageSecondaire1['ext'];
        $file_tmp_1  = $validImageSecondaire1['file_tmp'];
      } else {
        $error['imageSecondaire1'] = $validImageSecondaire1;
      }

      if(!empty($error['imageSecondaire1'])) {
        $imageSecondaire1 = false;
      } else {$imageSecondaire1 = true;}

      // IMAGE SECONDAIRE 2
      $validImageSecondaire2 = $validation->imgValid('imageSecondaire2');
      if(is_array($validImageSecondaire2)) {
        $extension = $validImageSecondaire2['ext'];
        $file_tmp_2  = $validImageSecondaire2['file_tmp'];
      } else {
        $error['imageSecondaire2'] = $validImageSecondaire2;
      }

      if(!empty($error['imageSecondaire2'])) {
        $imageSecondaire2 = false;
      } else {$imageSecondaire2 = true;}

      // IMAGE SECONDAIRE 3
      $validImageSecondaire3 = $validation->imgValid('imageSecondaire3');
      if(is_array($validImageSecondaire3)) {
        $extension = $validImageSecondaire3['ext'];
        $file_tmp_3  = $validImageSecondaire3['file_tmp'];
      } else {
        $error['imageSecondaire3'] = $validImageSecondaire3;
      }

      if(!empty($error['imageSecondaire3'])) {
        $imageSecondaire3 = false;
      } else {$imageSecondaire3 = true;}


      if($validation->IsValid($error)) {
        // SLUG et CREATED BY à FINIR
        $data = array(
        'slug'         => $product_name,
        'product_name' => $product_name,
        'description'  => $description,
        'price_ht'     => $price_ht,
        'weight'       => $weight,
        'width'        => $width,
        'length'       => $length,
        'height'        => $height,
        'stock'        => $stock,
        'id_category'  => $id_category,
        'created_at'   => $dateTimeModel->format('Y-m-d H:i:s'),
        'created_by'   => $_SESSION['user']['username'],
        );
        $idProduct = $addProduct->insert($data);
        //$idProduct = $addProduct->lastInsertId();
        $idProductreal = $idProduct['id'];

        // IMAGE PRINCIPALE
        if(!empty($_FILES['image']['name'])){
          if($image){
            $upload->UploadProduct($file_tmp_main,$extension,'_principale');
            $name = $upload->getNewName($_FILES['image']['name'],'_principale');
            $path = $upload->getPath();
            // debug($_FILES);

            $dataMainImg = array(
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['image']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 1,
            'mim_type'      => $_FILES['image']['type'],
            );
            $modelImage->insert($dataMainImg);
          }
        }
        // IMAGE SECONDAIRE 1
        if(!empty($_FILES['imageSecondaire1']['name'])){
          if($imageSecondaire1){
            $upload->UploadProduct($file_tmp_1,$extension,'_secondaire_1');
            $name = $upload->getNewName($_FILES['imageSecondaire1']['name'],'_secondaire_1');
            $path = $upload->getPath();
            // debug($_FILES);
            $dataMainImg = array(
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire1']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire1']['type'],
            );
            $modelImage->insert($dataMainImg);
          }
        }
        // IMAGE SECONDAIRE 2
        if(!empty($_FILES['imageSecondaire2']['name'])){
          if($imageSecondaire2){
            $upload->UploadProduct($file_tmp_2,$extension,'_secondaire_2');
            $nameSecondaire2 = $upload->getNewName($_FILES['imageSecondaire2']['name'],'_secondaire_2');
            $pathSecondaire2 = $upload->getPath();
            // debug($_FILES);
            $dataSecondaireImg2 = array(
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire2']['name'],
            'name'          => $nameSecondaire2,
            'path'          => $pathSecondaire2,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire2']['type'],
            );
            $modelImage->insert($dataSecondaireImg2);
          }
        }
        // IMAGE SECONDAIRE 3
        if(!empty($_FILES['imageSecondaire3']['name'])){
          if($imageSecondaire3){
            $upload->UploadProduct($file_tmp_3,$extension,'_secondaire_3');
            $nameSecondaire3 = $upload->getNewName($_FILES['imageSecondaire3']['name'],'_secondaire_3');
            $pathSecondaire3 = $upload->getPath();
            // debug($_FILES);
            $dataSecondaireImg3 = array(
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire3']['name'],
            'name'          => $nameSecondaire3,
            'path'          => $pathSecondaire3,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire3']['type'],
            );
            $modelImage->insert($dataSecondaireImg3);
          }
        }
        //redirection
        // debug($_FILES);
        $this->redirectToRoute('admin_product');
      }
      else {

        // debug($error);
        // refaire afficher la vue avec les errore passé en parametre de cette vue
        // ajouter l'array categorie
        $this->show('admin/product/product_new',array (
        'error' => $error,

        'categories' => $categories,
        ));
      }
    }
  }


  public function update($id)
  {
    if($this->allowTo('admin')){

      $model = new ProductsModel();
      $product = $model->find($id);
      $imageProduct = $model->searchImgSingle($id);

      $CategoriesAdmin = new CategoriesAdminController();
      $categories = $CategoriesAdmin->getAllCat();




      if(!empty($product)) {
        $this->show('admin/product/product_modified', array(
          'product'   => $product,
          'categories'=> $categories,
          'imageProduct'=> $imageProduct
        ));
      }
      else {
        $this->showNotFound();
      }
    }

  }
  // A REVOIR PAR HERMELEN
  public function updateAction($id)
  {
    if($this->allowTo('admin')){

      $error = array();

      $addProduct = new ProductsModel();
      $modelImage = new ImgModel();
      $validation = new ValidationTools();
      $dateTimeModel = new DateTime();
      $upload = new Upload();
      $CategoriesAdmin = new CategoriesAdminController();

      $product     = $addProduct->find($id);
      $imageProduct= $addProduct->searchImgSingle($id);

      $categories = $CategoriesAdmin->getAllCat();



      // striptags géré par INSERT
      $product_name = trim($_POST['product_name']);
      $description  = trim($_POST['description']);
      $price_ht     = trim($_POST['price_ht']);
      $weight       = trim($_POST['weight']);
      $width       = trim($_POST['width']);
      $length       = trim($_POST['length']);
      $height       = trim($_POST['height']);
      $stock        = trim($_POST['stock']);
      $id_category  = trim($_POST['id_category']);

      $error['product_name']  = $validation->textValid($product_name, 'produit',  3, 50);
      $error['description']   = $validation->textValid($description, 'description',  3, 1000);
      $error['price_ht']      = $validation->numberValid($price_ht, 'prix HT',  0, 100000);
      $error['weight']        = $validation->numberValid($weight, 'poids',  0, 10000);
      $error['width']         = $validation->numberValid($width, 'largeur',  0, 10000);
      $error['length']        = $validation->numberValid($length, 'longueur',  0, 10000);
      $error['height']        = $validation->numberValid($height, 'hauteur',  0, 10000);
      $error['stock']         = $validation->numberValid($stock, 'stock',  0, 10000, true);
      $error['id_category']   = $validation->numberValid($id_category, 'id de la catégorie',  1, 50);

      // IMAGE PRINCIPALE
      $validImage = $validation->imgValid('image');
      if(is_array($validImage)) {
        $extension = $validImage['ext'];
        $file_tmp_main  = $validImage['file_tmp'];
      } else {
        $error['image'] = $validImage;
      }

      if(!empty($error['image'])) {
        $image = false;
      } else {$image = true;}

      // IMAGE SECONDAIRE 1
      $validImageSecondaire1 = $validation->imgValid('imageSecondaire1');
      if(is_array($validImageSecondaire1)) {
        $extension = $validImageSecondaire1['ext'];
        $file_tmp_1  = $validImageSecondaire1['file_tmp'];
      } else {
        $error['imageSecondaire1'] = $validImageSecondaire1;
      }

      if(!empty($error['imageSecondaire1'])) {
        $imageSecondaire1 = false;
      } else {$imageSecondaire1 = true;}

      // IMAGE SECONDAIRE 2
      $validImageSecondaire2 = $validation->imgValid('imageSecondaire2');
      if(is_array($validImageSecondaire2)) {
        $extension = $validImageSecondaire2['ext'];
        $file_tmp_2  = $validImageSecondaire2['file_tmp'];
      } else {
        $error['imageSecondaire2'] = $validImageSecondaire2;
      }

      if(!empty($error['imageSecondaire2'])) {
        $imageSecondaire2 = false;
      } else {$imageSecondaire2 = true;}

      // IMAGE SECONDAIRE 3
      $validImageSecondaire3 = $validation->imgValid('imageSecondaire3');
      if(is_array($validImageSecondaire3)) {
        $extension = $validImageSecondaire3['ext'];
        $file_tmp_3  = $validImageSecondaire3['file_tmp'];
      } else {
        $error['imageSecondaire3'] = $validImageSecondaire3;
      }

      if(!empty($error['imageSecondaire3'])) {
        $imageSecondaire3 = false;
      } else {$imageSecondaire3 = true;}


      if($validation->IsValid($error)) {
        // SLUG et CREATED BY à FINIR

        $data = array(
        'slug'         => $product_name,
        'product_name' => $product_name,
        'description'  => $description,
        'price_ht'     => $price_ht,
        'weight'       => $weight,
        'width'        => $width,
        'length'       => $length,
        'height'        => $height,
        'stock'        => $stock,
        'id_category'  => $id_category,
        'modified_at'   => $dateTimeModel->format('Y-m-d H:i:s'),
        'modified_by'   => $_SESSION['user']['username'],
        );
        $idProduct = $addProduct->update($data, $id);
        //$idProduct = $addProduct->lastInsertId();
        $idProductreal = $idProduct['id'];


        // IMAGE PRINCIPALE
        if(!empty($_FILES['image']['name'])){
          if($image){
            $upload->UploadProduct($file_tmp_main,$extension,'_principale');//upload de l'image
            $name = $upload->getNewName($_FILES['image']['name'],'_principale');
            $path = $upload->getPath();

            $data = array(//datas à updater dans la base
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['image']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 1,
            'mim_type'      => $_FILES['image']['type'],
            );
            if(!empty($imageProduct[0]['id'])){//s'il existe déjà une image UPDATE
            $id   = $imageProduct[0]['id'];
            $modelImage->update($data,$id);//update data la colonne image concernée
            $oldFile = $imageProduct[0]['path'].$imageProduct[0]['name'];//recupération de l'ancienne image.
            unlink('../public/'.$oldFile);//suppression de l'ancienne image dans upload
            }else{
            $modelImage->insert($data);//si pas encore d'image INSERT
            }
          }
        }
        // IMAGE SECONDAIRE 1
        if(!empty($_FILES['imageSecondaire1']['name'])){
          if($imageSecondaire1){
            $upload->UploadProduct($file_tmp_1,$extension,'_secondaire_1');//upload de l'image
            $name = $upload->getNewName($_FILES['imageSecondaire1']['name'],'_secondaire_1');
            $path = $upload->getPath();

            $data = array(//datas à updater dans la base
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire1']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire1']['type'],
            );
            if(!empty($imageProduct[1]['id'])){//s'il existe déjà une image UPDATE
            $id   = $imageProduct[1]['id'];
            $modelImage->update($data,$id);//update data la colonne image concernée
            $oldFile = $imageProduct[1]['path'].$imageProduct[1]['name'];//recupération de l'ancienne image.
            unlink('../public/'.$oldFile);//suppression de l'ancienne image dans upload
            }else{
            $modelImage->insert($data);//si pas encore d'image INSERT
            }
          }
        }

        // IMAGE SECONDAIRE 2
        if(!empty($_FILES['imageSecondaire2']['name'])){
          if($imageSecondaire2){
            $upload->UploadProduct($file_tmp_2,$extension,'_secondaire_2');//upload de l'image
            $name = $upload->getNewName($_FILES['imageSecondaire2']['name'],'_secondaire_2');
            $path = $upload->getPath();

            $data = array(//datas à updater dans la base
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire2']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire2']['type'],
            );

            if(!empty($imageProduct[2]['id'])){//s'il existe déjà une image UPDATE
            $id   = $imageProduct[2]['id'];
            $modelImage->update($data,$id);//update data la colonne image concernée
            $oldFile = $imageProduct[2]['path'].$imageProduct[2]['name'];//recupération de l'ancienne image.
            unlink('../public/'.$oldFile);//suppression de l'ancienne image dans upload
            }else{
            $modelImage->insert($data);//si pas encore d'image INSERT
            }
          }
        }
        // IMAGE SECONDAIRE 3
        if(!empty($_FILES['imageSecondaire3']['name'])){
          if($imageSecondaire3){
            $upload->UploadProduct($file_tmp_3,$extension,'_secondaire_3');//upload de l'image
            $name = $upload->getNewName($_FILES['imageSecondaire3']['name'],'_secondaire_3');
            $path = $upload->getPath();

            $data = array(//datas à updater dans la base
            'id_product'    => $idProductreal,
            'original_name' => $_FILES['imageSecondaire3']['name'],
            'name'          => $name,
            'path'          => $path,
            'status_img'    => 2,
            'mim_type'      => $_FILES['imageSecondaire3']['type'],
            );
            if(!empty($imageProduct[3]['id'])){//s'il existe déjà une image UPDATE
            $id   = $imageProduct[3]['id'];
            $modelImage->update($data,$id);//update data la colonne image concernée
            $oldFile = $imageProduct[3]['path'].$imageProduct[3]['name'];//recupération de l'ancienne image.
            unlink('../public/'.$oldFile);//suppression de l'ancienne image dans upload
            }else{
            $modelImage->insert($data);//si pas encore d'image INSERT
            }
          }
        }
        //redirection
        $this->redirectToRoute('admin_product');
      }
      else {
        // debug($error);
        // refaire afficher la vue avec les errore passé en parametre de cette vue
        $this->show('admin/product/product_modified',array (
        'product'      => $product,
        'categories'   => $categories,
        'imageProduct' => $imageProduct,
        'error'        => $error
        ));
      }
    }
  }


  public function deleteAction($id)
  {
    if($this->allowTo('admin')){

      $ProductModel = new ProductsModel();
      $ImgModel = new ImgModel();
      $product = $ProductModel->find($id);

      $imageProducts= $ProductModel->searchImgSingle($id);
      if(!empty($imageProducts)){
        foreach($imageProducts as $imageProduct){
          $ImgModel->delete($imageProduct['id']);
          unlink('../public/'.$imageProduct['path'].$imageProduct['name']);
        }
      }else {
        $this->showNotFound();
      }

      if(!empty($product)){
        $ProductModel->delete($id);
        $this->redirectToRoute('admin_product');
      }else {
        $this->showNotFound();
      }
    }
  }


}
