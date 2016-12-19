<?php

namespace Model;

use \W\Model\Model;
use \Model\UsersModel;
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
    $this->usersmodel = new UsersModel();
  }
  /*
  *findOrder
  *récupère les commandes de l'utilisateur connecté
  */
  public function findOrder()
  {
    $user = $this->usersmodel->getLoggedUser();

    $sql = "SELECT * FROM '.$this->table.' WHERE id_user = :id ORDER BY created_at DESC";
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':id_user', $user['id']);
      $sth->execute();
    return $sth->fetchAll();
  }
  public function findOrderProducts($id)
  {
    $sql = "SELECT * FROM '.$this->table.

    ' WHERE id_user = :id ORDER BY created_at DESC";
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':id_user', $user['id']);
      $sth->execute();
    return $sth->fetchAll();
  }


}
