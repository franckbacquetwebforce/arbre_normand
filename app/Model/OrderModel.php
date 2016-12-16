<?php

namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;


class OrderModel extends Model
{
  /**
   *Constructeur
   */
  public function __construct()
  {
    $this->setTable('orders');
    $this->dbh = ConnectionModel::getDbh();

  }

}
