<?php

namespace Model;
use \W\Model\Model;
use \W\Model\ConnectionModel;


class ImgModel extends Model
{
  /**
   *Constructeur
   */
   function __construct()
   {
     $this->setTable('img');
     $this->dbh = ConnectionModel::getDbh();
   }


}
