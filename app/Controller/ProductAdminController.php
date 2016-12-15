<?php
// Hermelen en cours
namespace Controller;

use \Controller\AppController;
use \Model\ProductsModel;
use \Service\ValidationTools;
use \DateTime;


class ProductAdminController extends AppController
{

  // listing en back-office des user
  public function index()
  {
    $this->show('admin/product');
  }

  public function addNew()
  {
    $this->show('admin/product_new');
  }

  public function addNewAction()
  {
    $error = array();

    $addProduct = new ProductsModel();
    $validation = new ValidationTools();
    $dateTimeModel = new DateTime();

    $product_name = $_POST['product_name'];
    $description  = $_POST['description'];
    $price_ht     = $_POST['price_ht'];
		$weight       = $_POST['weight'];
    $stock        = $_POST['stock'];
    $id_category  = $_POST['id_category'];

    // $error['product_name']  = $validation->textValid($product_name, 'product_name',  3, 50);
    // $error['description']   = $validation->textValid($description, 'description',  3, 1000);
    // $error['price_ht']      = $validation->numberValid($price_ht, 'price_ht',  0, 100000);
    // $error['weight']        = $validation->numberValid($weight, 'weight',  0, 10000);
    // $error['stock']         = $validation->numberValid($stock, 'stock',  0, 10000);
    // $error['id_category']   = $validation->numberValid($id_category, 'id_category',  1, 50);


    if($validation->IsValid($error)) {
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
      $addProduct->insert($data);

      if($validation->imgValid('image') == true){
        $data = array(
          'id_product'    => ,
          'original_name' => $_FILES['image']['name'],
        //   'name'          =>,
        //   'path'          =>,
        //   'status_img'    =>,
        //   'mim_type'      =>,
      );
      print_r($data);
        echo $validation->imgValid($this->dest_fichier);
      }
      // if($success == true){
      //
      // }
      // redirection
        // $this->redirectToRoute('admin_product');
    }
    else {
         // refaire afficher la vue avec les errore passé en parametre de cette vue
         $this->show('admin/product_new',array (
           'error' => $error,
         ));
     }
  }


  public function update($id)
  {

  }

  public function updateAction($id)
  {

  }

  public function deleteAction($id)
  {

  }

}
