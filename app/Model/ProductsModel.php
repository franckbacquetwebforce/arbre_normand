<?php
namespace Model
use \W\Model\Model;
/**
 *
 */
class ProductsModel extends Model
{
  function __construct()
  {
    $this->setTable('products');
    $this->dbh = ConnectionModel::getDbh();
  }
}
