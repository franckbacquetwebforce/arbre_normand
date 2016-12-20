<?php
namespace Model;
use \W\Model\Model;
use \W\Model\ConnectionModel;

/**
 *
 */
class ProductsModel extends Model
{

  private $tableimage = 'img';
  function __construct()
  {
    $this->setTable('products');
    $this->dbh = ConnectionModel::getDbh();
  }


// Récupération des produits
  // id_category = 1 => Champignons
  // id-category = 2 => Champignon table
  // id_category = 3 => Palissades
public function getProductWithImage()
{
  // SELECT products.*(selectionne tout de la table product), i.name,  i.path, i.status_img (selectionne name, path et status de img as i=>voir LEFT JOIN)
  // FROM $this->table (FROM table du Model)
  // LEFT JOIN img as i (jointure pour la table img "renommée" i)
  // ON products.id = i.id_product (condition de la selection id de la table products.id = id_product de la table img)
  // WHERE i.status_img = 1"; (condition staus_img = 1)

  $sql = "SELECT products.*, i.name,  i.path, i.status_img
          FROM $this->table
          LEFT JOIN img as i
      		ON products.id = i.id_product
          WHERE i.status_img = 1";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  return $query->fetchAll();

}

public function getProductByCategoryWithImage()
{
  // SELECT products.*(selectionne tout de la table product), i.name,  i.path, i.status_img (selectionne name, path et status de img as i=>voir LEFT JOIN)
  // FROM $this->table (FROM table du Model)
  // LEFT JOIN img as i (jointure pour la table img "renommée" i)
  // ON products.id = i.id_product (condition de la selection id de la table products.id = id_product de la table img)
  // WHERE i.status_img = 1"; (condition staus_img = 1)
  $category = $_GET['id_category'];
  $sql = "SELECT products.*, i.name,  i.path, i.status_img
          FROM $this->table
          LEFT JOIN img as i
      		ON products.id = i.id_product
          WHERE i.status_img = 1 AND products.id_category=$category";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}
public function getsingleProduct($id)
  {
    $modelSingle = new ProductsModel($id);
    $product = $modelSingle->find($id);
    $this->show('products/singleproduct', array(
      'product' => $product
    ));
  }
  
  // Liste le nom des produits ainsi que leur stock
  public function showStock()
  {
    $sql = "SELECT product_name as name, stock FROM products ORDER BY stock ASC";
    $query = $this->dbh->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  // function searchImg() //pas utile pour le moment
  // {
  //   $sql = "SELECT products.id AS products_id ,
	// 	-- products.product_name AS products_name ,
  //   -- products.description AS products_description ,
	// 	-- products.price_ht AS products_price ,
	// 	-- products.id_category AS products_category ,
  //   products.created_at AS products_created ,
	// 	img.id_product AS img_id_product,
  //   img.name AS img_name,
	// 	img.path AS img_path,
  //   img.status_img AS img_status
	// 	FROM products
	// 	LEFT JOIN img
	// 	ON products.id = img.id_product
	// 	ORDER BY products_created";
	// 	$query = $this->dbh->prepare($sql);
	// 	$query->execute();
	// 	return $query->fetchAll();
  // }

}
