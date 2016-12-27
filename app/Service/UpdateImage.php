<?php

namespace Service;
use \W\Model\ConnectionModel;

class UpdateImage
{
  // fonction update image pour admin product update
  public function updateImg(array $data, $id, $stripTags = true)
  {
      if (!is_numeric($id)){
        return false;
      }
      $sql = 'UPDATE img SET ';
      foreach($data as $key => $value){
        $sql .= "`$key` = :$key, ";
      }
      // Supprime les caractères superflus en fin de requète
      $sql = substr($sql, 0, -2);
      $sql .= ' WHERE id = :id';

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
