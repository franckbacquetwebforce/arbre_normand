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
public function getProductWithImage()//a supprimer
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

public function getProductWithImageCat()//remplace getProductWithImage nouvelle jointure pour récup category name
{
  $sql = "SELECT products.*, i.id_product, i.name,  i.path, i.status_img, cat.id, cat.category_name
          FROM $this->table
          LEFT JOIN img as i ON products.id = i.id_product
          LEFT JOIN categories as cat ON products.id_category = cat.id
          WHERE i.status_img = 1";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  return $query->fetchAll();

}

public function getCartProductWithImage($cart_id_product)
{
    $sql = "SELECT products.*, i.name,  i.path, i.status_img
            FROM $this->table
            LEFT JOIN img as i
            ON products.id = i.id_product
            WHERE i.status_img = 1 AND products.id = $cart_id_product";
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
  $sql = "SELECT products.*, i.id_product, i.name,  i.path, i.status_img, cat.id, cat.category_name
          FROM $this->table
          LEFT JOIN img as i ON products.id = i.id_product
          LEFT JOIN categories as cat ON products.id_category = cat.id
          WHERE i.status_img = 1 AND products.id_category=$category";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}



    public function getSingleProductCat($id)//remplace getsingleProduct avec ajout de category
    {
      $sql = "SELECT products.*, products.id as prod_id, cat.id, cat.category_name
      FROM $this->table
      LEFT JOIN categories as cat ON products.id_category = cat.id
      WHERE products.id = $id";
      $product = $this->dbh->prepare($sql);
      $product->execute();
      return $product->fetch();

      // $modelSingle = new ProductsModel($id);
      // $product = $modelSingle->find($id);
      // $this->show('products/singleproduct', array(
      //   'product' => $product
      // ));
    }
  // Liste le nom des produits ainsi que leur stock
  public function showStock()
  {
    $sql = "SELECT product_name as name, stock FROM products ORDER BY stock ASC";
    $query = $this->dbh->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  function searchImgSingle($id)
  {
    $sql = "SELECT *
    FROM img
    WHERE id_product = $id
		ORDER BY status_img ";
		$query = $this->dbh->prepare($sql);
		$query->execute();
		return $query->fetchAll();
  }

}
