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
			   ' WHERE ' . $app->getConfig('security_email_property') . ' = :email LIMIT 1';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':email', $email);

		if($sth->execute()){
			$foundUser = $sth->fetch();
			if($foundUser){
				return $foundUser;
			}
	  }
  }
}
