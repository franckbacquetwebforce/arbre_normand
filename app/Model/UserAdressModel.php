<?php
namespace Model;
use  \W\Model\UserModel as UModel;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel;
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
    $this->authentification = new AuthentificationModel();
  }
  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur
   *@return array contenant toutes les adresses de l'utilisateur
   */
  public function getUserAdress()
  {
    $user = $this->authentification->getLoggedUser();

    $sql = 'SELECT * FROM '.$this->table.' WHERE id_user = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $user['id']);
    $sth->execute();
    return $sth->fetchAll();
  }

  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur
   *@return array contenant toutes les adresses de l'utilisateur
   */
  public function  addUserAdress()
  {
    $user = $this->authentification->getLoggedUser();
  //   $sql = 'INSERT INTO '.$this->table.' (id_user, lastname, firstname, phone, adress, city, zip, country, type) VALUES(:id, :lastname, :firstname, :phone, :adress, :city, :zip, :country, :type)';
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->bindValue(':id', $id);
  //   $sth->bindValue(':lastname', $data[]);
  //   $sth->bindValue(':firstname', );
  //   $sth->bindValue(':phone', );
  //   $sth->bindValue(':adress', );
  //   $sth->bindValue(':city', );
  //   $sth->bindValue(':zip', );
  //   $sth->bindValue(':type', );
  //   $sth->execute();
  // }


}
