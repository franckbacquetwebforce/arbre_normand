<?php
namespace Model;

use  \W\Model\UsersModel as UModel;
use \W\Model\ConnectionModel;
/**
 *
 */
class UsersModel extends UModel
{

  public function __construct()
{
  parent::__construct();
  $this->setTable('users');
  $this->dbh = ConnectionModel::getDbh();
}
}
