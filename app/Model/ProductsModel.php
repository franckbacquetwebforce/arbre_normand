<?php
namespace Model
use \W\Model\Model;
use \W\Model\ConnectionModel;
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
