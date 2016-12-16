<?php
<<<<<<< HEAD

namespace Model;

=======
namespace ProductsModel
>>>>>>> ddb3b10d3294fa574e15814aa3cd9196d3a8b622
use  \W\Model\Model;

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
