<?php
// Hermelen en cours
namespace Controller;

use \Controller\AppController;
use \Model\ProductsModel;
use \Model\ImgModel;
use \Service\ValidationTools;
use \Service\Upload;
use \DateTime;


class ProductAdminController extends AppController
{

  // listing en back-office des produits jointure des deux tables Products et img
  public function index()
  {
    $searchImg = new ProductsModel();

    $products = $searchImg->getProductWithImage();

    $this->show('admin/product/product', array(//modifié suite changement de place du fichier product.php
      'products' => $products,
    ));
  }

  // ajout d'un produit
  public function addNew()
  {
    $this->show('admin/product/product_new');//modifié suite changement de place du fichier product_new.php
  }

  public function addNewAction()
  {
    $error = array();

    $addProduct = new ProductsModel();
    $modelImage = new ImgModel();
    $validation = new ValidationTools();
    $dateTimeModel = new DateTime();
    $upload = new Upload();

    // striptags géré par INSERT
    $product_name = trim($_POST['product_name']);
    $description  = trim($_POST['description']);
    $price_ht     = trim($_POST['price_ht']);
		$weight       = trim($_POST['weight']);
    $stock        = trim($_POST['stock']);
    $id_category  = trim($_POST['id_category']);

     $error['product_name']  = $validation->textValid($product_name, 'product_name',  3, 50);
     $error['description']   = $validation->textValid($description, 'description',  3, 1000);
     $error['price_ht']      = $validation->numberValid($price_ht, 'price_ht',  0, 100000);
     $error['weight']        = $validation->numberValid($weight, 'weight',  0, 10000);
     $error['stock']         = $validation->numberValid($stock, 'stock',  0, 10000);
     $error['id_category']   = $validation->numberValid($id_category, 'id_category',  1, 50);

// IMAGE PRINCIPALE
$validImage = $validation->imgValid('image');
if(is_array($validImage)) {
      $extension = $validImage['ext'];
      $file_tmp  = $validImage['file_tmp'];
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
      $file_tmp  = $validImageSecondaire1['file_tmp'];
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
      $file_tmp  = $validImageSecondaire2['file_tmp'];
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
      $file_tmp  = $validImageSecondaire3['file_tmp'];
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
        'stock'        => $stock,
        'id_category'  => $id_category,
        'created_at'   => $dateTimeModel->format('Y-m-d H:i:s'),
        'created_by'   => '',//$_SESSION['email'],
      );
      $idProduct = $addProduct->insert($data);
      //$idProduct = $addProduct->lastInsertId();
      $idProductreal = $idProduct['id'];


// IMAGE PRINCIPALE
        if($image){
            $upload->UploadProduct($file_tmp,$extension);
            $name = $upload->getNewName($_FILES['image']['name']);
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
// IMAGE SECONDAIRE 1
        if($imageSecondaire1){
            $upload->UploadProduct($file_tmp,$extension,'1');
            $nameSecondaire1 = $upload->getNewName($_FILES['imageSecondaire1']['name'],'1');
            $pathSecondaire1 = $upload->getPath();
            // debug($_FILES);

            $dataSecondaireImg1 = array(
                  'id_product'    => $idProductreal,
                  'original_name' => $_FILES['imageSecondaire1']['name'],
                  'name'          => $nameSecondaire1,
                  'path'          => $pathSecondaire1,
                  'status_img'    => 2,
                  'mim_type'      => $_FILES['imageSecondaire1']['type'],
              );
              $modelImage->insert($dataSecondaireImg1);
        }

// IMAGE SECONDAIRE 2
        if($imageSecondaire2){
            $upload->UploadProduct($file_tmp,$extension,'2');
            $nameSecondaire2 = $upload->getNewName($_FILES['imageSecondaire2']['name'],'2');
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
                // IMAGE SECONDAIRE 3
        if($imageSecondaire3){
            $upload->UploadProduct($file_tmp,$extension,'3');
            $nameSecondaire3 = $upload->getNewName($_FILES['imageSecondaire3']['name'],'3');
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
// debug($_POST);
// debug($_FILES);

              $modelImage->insert($dataSecondaireImg3);
        }
      // redirection
        $this->redirectToRoute('admin_product');
    }
    else {
      debug($error);
         // refaire afficher la vue avec les errore passé en parametre de cette vue
         $this->show('admin/product/product_new',array (
           'error' => $error,
         ));
     }
  }


  public function update($id)
  {
    $model = new ProductsModel();
    $product = $model->find($id);
    if(!empty($product)) {
      $this->show('admin/product/product_modified', array(
        'product'   => $product
      ));
    }
    else {
      $this->showNotFound();
    }

  }
  // A REVOIR PAR HERMELEN
  public function updateAction($id)
  {
    $model = new ProductsModel();
    $product = $model->find($id);
    if(!empty($product)){
      $error = array();

      $addProduct = new ProductsModel();
      $modelImage = new ImgModel();
      $validation = new ValidationTools();
      $dateTimeModel = new DateTime();
      $upload = new Upload();

      // striptags géré par INSERT
      $product_name = trim($_POST['product_name']);
      $description  = trim($_POST['description']);
      $price_ht     = trim($_POST['price_ht']);
  		$weight       = trim($_POST['weight']);
      $stock        = trim($_POST['stock']);
      $id_category  = trim($_POST['id_category']);

       $error['product_name']  = $validation->textValid($product_name, 'product_name',  3, 50);
       $error['description']   = $validation->textValid($description, 'description',  3, 1000);
       $error['price_ht']      = $validation->numberValid($price_ht, 'price_ht',  0, 100000);
       $error['weight']        = $validation->numberValid($weight, 'weight',  0, 10000);
       $error['stock']         = $validation->numberValid($stock, 'stock',  0, 10000);
       $error['id_category']   = $validation->numberValid($id_category, 'id_category',  1, 50);

  // IMAGE PRINCIPALE
  $validImage = $validation->imgValid('image');
  debug($validImage);
  die('dede');
  if(is_array($validImage)) {
        $extension = $validImage['ext'];
        $file_tmp  = $validImage['file_tmp'];
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
        $file_tmp  = $validImageSecondaire1['file_tmp'];
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
        $file_tmp  = $validImageSecondaire2['file_tmp'];
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
        $file_tmp  = $validImageSecondaire3['file_tmp'];
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
          'stock'        => $stock,
          'id_category'  => $id_category,
          'created_at'   => $dateTimeModel->format('Y-m-d H:i:s'),
          'created_by'   => '',//$_SESSION['email'],
        );
        $idProduct = $addProduct->update($data,$product['id']);
        //$idProduct = $addProduct->lastInsertId();
        $idProductreal = $idProduct['id'];


  // IMAGE PRINCIPALE
          if($image){
              $upload->UploadProduct($file_tmp,$extension);
              $name = $upload->getNewName($_FILES['image']['name']);
              $path = $upload->getPath();
              debug($_FILES);

              $dataMainImg = array(
                    'id_product'    => $idProductreal,
                    'original_name' => $_FILES['image']['name'],
                    'name'          => $name,
                    'path'          => $path,
                    'status_img'    => 1,
                    'mim_type'      => $_FILES['image']['type'],
                );
                $modelImage->update($dataMainImg,$image['id_product']);
          }
  // IMAGE SECONDAIRE 1
          if($imageSecondaire1){
              $upload->UploadProduct($file_tmp,$extension,'1');
              $nameSecondaire1 = $upload->getNewName($_FILES['imageSecondaire1']['name'],'1');
              $pathSecondaire1 = $upload->getPath();
              debug($_FILES);

              $dataSecondaireImg1 = array(
                    'id_product'    => $idProductreal,
                    'original_name' => $_FILES['imageSecondaire1']['name'],
                    'name'          => $nameSecondaire1,
                    'path'          => $pathSecondaire1,
                    'status_img'    => 2,
                    'mim_type'      => $_FILES['imageSecondaire1']['type'],
                );
                $modelImage->update($dataSecondaireImg1,$imageSecondaire1['id_product']);
          }

  // IMAGE SECONDAIRE 2
          if($imageSecondaire2){
              $upload->UploadProduct($file_tmp,$extension,'2');
              $nameSecondaire2 = $upload->getNewName($_FILES['imageSecondaire2']['name'],'2');
              $pathSecondaire2 = $upload->getPath();
              debug($_FILES);

              $dataSecondaireImg2 = array(
                    'id_product'    => $idProductreal,
                    'original_name' => $_FILES['imageSecondaire2']['name'],
                    'name'          => $nameSecondaire2,
                    'path'          => $pathSecondaire2,
                    'status_img'    => 2,
                    'mim_type'      => $_FILES['imageSecondaire2']['type'],
                );
                $modelImage->update($dataSecondaireImg2,$imageSecondaire2['id_product']);
          }
                  // IMAGE SECONDAIRE 3
          if($imageSecondaire3){
              $upload->UploadProduct($file_tmp,$extension,'3');
              $nameSecondaire3 = $upload->getNewName($_FILES['imageSecondaire3']['name'],'3');
              $pathSecondaire3 = $upload->getPath();
              debug($_FILES);

              $dataSecondaireImg3 = array(
                    'id_product'    => $idProductreal,
                    'original_name' => $_FILES['imageSecondaire3']['name'],
                    'name'          => $nameSecondaire3,
                    'path'          => $pathSecondaire3,
                    'status_img'    => 2,
                    'mim_type'      => $_FILES['imageSecondaire3']['type'],
                );
  debug($_POST);
  debug($_FILES);
                $modelImage->update($dataSecondaireImg3,$imageSecondaire3['id_product']);
          }
        // redirection
          // $this->redirectToRoute('admin_product');

      }

      else {
        debug($error);
           // refaire afficher la vue avec les errore passé en parametre de cette vue
           $this->show('admin/product/product_modified',array (
             'error' => $error,
           ));
       }
    }


  }

  public function deleteAction($id)
  {
    $model = new ProductsModel();
    $product = $model->find($id);
    if(!empty($product)){
      $model->delete($id);
      $this->redirectToRoute('admin_product');
    }else {
      $this->showNotFound();
    }
  }

}
