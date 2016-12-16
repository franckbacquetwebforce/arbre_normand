<?php
namespace Model;



use \W\Model\UsersModel as UModel;
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

  /**
	 * Récupère un utilisateur en fonction de son email
	 * @param string $userEmail l'email d'un utilisateur
	 * @return mixed L'utilisateur, ou false si non trouvé
	 */
  public function getUserByEmail($email)
	{

		$sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
    		$dbh = ConnectionModel::getDbh();
    		$sth = $dbh->prepare($sql);
    		$sth->bindValue(':email', $email);
      	$sth->execute();
      	$foundUser = $sth->fetch();
    return $foundUser;

	}
  /**
	 * Vérifie qu'une combinaison d'email et mot de passe (en clair) sont présents en bdd et valides
	 * @param  string $userEmail l'email à tester
	 * @param  string $plainPassword Le mot de passe en clair à tester
	 * @return int  0 si invalide, l'identifiant de l'utilisateur si valide
	 */
  public function isValidEmailInfo($userEmail, $plainPassword)
	{
		$usersModel = new UsersModel();
		$userEmail = strip_tags(trim($userEmail));
		$foundUser = $usersModel->getUserByEmail($userEmail);
		if(!$foundUser){
			return 0;
		}
		if(password_verify($plainPassword, $foundUser['password'])){
			return $foundUser['id'];
		}
    return 0;
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
