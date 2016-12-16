<?php
namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;



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
