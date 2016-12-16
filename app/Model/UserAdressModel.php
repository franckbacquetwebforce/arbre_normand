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
    $this->setTable('users_adress');
    $this->dbh = ConnectionModel::getDbh();
  }
  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur
   *@return array contenant toutes les adresses de l'utilisateur
   */
  public function getUserAdress($id)
  {
    $sql = 'SELECT * FROM '.$this->table.' WHERE id_user = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $id);
    $sth->execute();
    return $sth->fetchAll();
  }

  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur
   *@return array contenant toutes les adresses de l'utilisateur
   */
  public function  addUserAdress(array $data, $id, $stripTags = true)
  {


    $sql = 'INSERT INTO '.$this->table.' (id_user, lastname, firstname, phone, adress, city, zip, country, type) VALUES(:id, :lastname, :firstname, :phone, :adress, :city, :zip, :country, :type)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $id);
    $sth->bindValue(':lastname', $data[]);
    $sth->bindValue(':firstname', );
    $sth->bindValue(':phone', );
    $sth->bindValue(':adress', );
    $sth->bindValue(':city', );
    $sth->bindValue(':zip', );
    $sth->bindValue(':type', );
    $sth->execute();
  }


}
