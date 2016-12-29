<?php

namespace Controller;
use \Model\ImgModel;
use \W\Model\ConnectionModel;
use \Controller\AppController;

class ImageController extends AppController
{
  // fonction update image pour admin product update
  public function updateImg(array $data, $id, $stripTags = true)//à supprimer Hermelen
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
