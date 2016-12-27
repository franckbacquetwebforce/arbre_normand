<?php

namespace Service;

class UpdateImage
{
  // fonction update image pour admin product update
  public function updateImg(array $data, $id, $position, $stripTags = true)
  {
    if (!is_numeric($id)){
      return false;
    }
      $id_img = $image[$position]['id'];
      $sql = 'UPDATE img SET ';
      foreach($data as $key => $value){
        $sql .= "`$key` = :$key, ";
      }
      // Supprime les caractères superflus en fin de requète
      $sql = substr($sql, 0, -2);
      $sql .= ' WHERE id_product = :id AND id = $id_img';

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
}
