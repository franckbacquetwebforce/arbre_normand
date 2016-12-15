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

  	/**
  	 * Modifie une ligne en fonction d'un identifiant
  	 * @param array $data Un tableau associatif de valeurs à insérer
  	 * @param mixed $id L'identifiant de la ligne à modifier
  	 * @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
  	 * @return mixed false si erreur, les données mises à jour sinon
  	 */
  	public function update(array $data, $id, $stripTags = true)
  	{
  		if (!is_numeric($id)){
  			return false;
  		}

  		$sql = 'UPDATE ' . $this->table . ' SET ';
  		foreach($data as $key => $value){
  			$sql .= "`$key` = :$key, ";
  		}
  		// Supprime les caractères superflus en fin de requète
  		$sql = substr($sql, 0, -2);
  		$sql .= ' WHERE ' . $this->primaryKey .' = :id';

  		$sth = $this->dbh->prepare($sql);
  		foreach($data as $key => $value){
  			$value = ($stripTags) ? strip_tags($value) : $value;
  			$sth->bindValue(':'.$key, $value);
  		}
  		$sth->bindValue(':id', $id);

  		if(!$sth->execute()){
  			return false;
  		}
  		return $this->find($id);
  	}

}
