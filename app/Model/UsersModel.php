<?php
namespace Model;
use  \W\Model\UserModel as UModel;


/**
 *Le modèle concernant les utilisateurs
 */
class UsersModel extends UsersModel
{

  /**
   *Constructeur
   */
  public function __construct()
  {
    $this->setTable('users');
    $this->dbh = ConnectionModel::getDbh();
  }
  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur

   *@return array
   */
  public function selectAdress($id)
  {
    $sql = 'SELECT * FROM users_adress ';
    $sth = $this->dbh->prepare($sql);

    $sth->execute();
    return $sth->fetchAll();
  }


  public function  addAdress(array $data, $stripTags = true)
  {
    $sql = 'INSERT INTO users_adress LEFT JOIN users ON users_adress.id_user = users.id';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
  }

}
