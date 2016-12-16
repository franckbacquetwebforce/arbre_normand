<?php
namespace Model;

use \W\Model\Model;


class CategoriesModel extends Model
{
  /**
   *Constructeur
   */
  public function __construct()
  {
    $this->setTable('categories');
    $this->dbh = ConnectionModel::getDbh();

  }
  

}
