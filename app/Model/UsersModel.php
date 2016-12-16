<?php
namespace Model;



use  \W\Model\UsersModel as UModel;
use \W\Model\ConnectionModel;



/**
 *Le modèle concernant les utilisateurs
 */

class UsersModel extends UModel
{

  public function __construct()
  {
    parent::__construct();
    $this->setTable('users');
    $this->dbh = ConnectionModel::getDbh();
  }

  public function getUserByEmail($email)
	{

    		$app = getApp();

    		$sql = 'SELECT * FROM ' . $this->table .
    			   ' WHERE email = :email';

    		$dbh = ConnectionModel::getDbh();
    		$sth = $dbh->prepare($sql);
    		$sth->bindValue(':email', $email);

    		if($sth->execute()){
    			$foundUser = $sth->fetch();
    			if($foundUser){
    				return $foundUser;
    			}
    		}

    		return false;
  }
  /**
   *Permet de récupérer l'adresse ou les adresses d'un
   *utilisateur
   *@param id de l'utilisateur
   *@return array contenant toutes les adresses de l'utilisateur
   */
  public function getUserAdress($id)
  {
    $sql = 'SELECT * FROM users_adress WHERE id_user = :id';
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
  // public function  addUserAdress(array $data, $id, $stripTags = true)
  // {
  //
  //
  //   $sql = 'INSERT INTO users_adress (id_user, lastname, firstname, phone, adress, city, zip, country, type) VALUES(:id, :lastname, :firstname, :phone, :adress, :city, :zip, :country, :type)';
  //   $sth = $this->dbh->prepare($sql);
  //   $sth->bindValue(':id', $id);
  //   $sth->bindValue(':lastname', $data[]);
  //   $sth->bindValue(':firstname' );
  //   $sth->bindValue(':phone');
  //   $sth->bindValue(':adress' );
  //   $sth->bindValue(':city' );
  //   $sth->bindValue(':zip' );
  //   $sth->bindValue(':type' );
  //   $sth->execute();
  // }
  public function updateUserAddress()
  {


  }
}
