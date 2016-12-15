<?php
namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;


/**
 *
 */
class ProductsModel extends Model
{
  function __construct()
  {
    $this->setTable('products');
    $this->dbh = ConnectionModel::getDbh();
  }

  public function insertImg(array $data, $table , $stripTags = true) //$table = $this->table
	{
		$colNames = array_keys($data);
		$colNamesEscapes = $this->escapeKeys($colNames);
		$colNamesString = implode(', ', $colNamesEscapes);

		$sql = 'INSERT INTO ' . $table . ' (' . $colNamesString . ') VALUES (';
		foreach($data as $key => $value){
			$sql .= ":$key, ";
		}
		// Supprime les caractères superflus en fin de requète
		$sql = substr($sql, 0, -2);
		$sql .= ')';

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}

		if (!$sth->execute()){
			return false;
		}
		return $this->find($this->lastInsertId());
	}
}
