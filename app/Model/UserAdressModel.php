<?php
namespace Model;
use  \W\Model\UserModel as UModel;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel;
/**
 *Le modèle concernant les utilisateurs
 */
class UserAdressModel extends UsersModel
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
    $loggeduser = $this->authentification->getLoggedUser();
    $sql = 'SELECT * FROM '.$this->table.' WHERE id_user = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $loggeduser['id']);
    $sth->execute();
    return $sth->fetchAll();
  }

  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur + les champs du formulaire newaddress
   *@return
   */
  //  il y a surment une faute d'orthographe mais je sais pas où
  public function  addUserAdress($string1,$string2,$string3,$string4,$string5,$string6,$string7,$string8)
  {
    $user = $this->authentification->getLoggedUser();
    $sql = 'INSERT INTO '.$this->table.' (id_user, lastname, firstname, phone, address, city, zip, country, type) VALUES(:id_user, :lastname, :firstname, :phone, :address, :city, :zip, :country, :type)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id_user', $user['id']);
    $sth->bindValue(':lastname', $string1);
    $sth->bindValue(':firstname',$string2 );
    $sth->bindValue(':phone',$string3 );
    $sth->bindValue(':address',$string4 );
    $sth->bindValue(':city', $string5);
    $sth->bindValue(':zip', $string6);
    $sth->bindValue(':country', $string7);
    $sth->bindValue(':type',$string8 );
    $sth->execute();
  }
}
