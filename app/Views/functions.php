<?php


function findAll($table, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
{
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=arbre_normand', "root", "", array(
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

         $sql = 'SELECT * FROM '.$table.' WHERE status = 1';
         if (!empty($orderBy)){

           //sécurisation des paramètres, pour éviter les injections SQL
           if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
             die('Error: invalid orderBy param');
           }
           $orderDir = strtoupper($orderDir);
           if($orderDir != 'ASC' && $orderDir != 'DESC'){
             die('Error: invalid orderDir param');
           }
           if ($limit && !is_int($limit)){
             die('Error: invalid limit param');
           }
           if ($offset && !is_int($offset)){
             die('Error: invalid offset param');
           }

           $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
           if($limit){
             $sql .= ' LIMIT '.$limit;
             if($offset){
               $sql .= ' OFFSET '.$offset;
             }
           }
         }
         $sth = $pdo->prepare($sql);
         $sth->execute();

         return $sth->fetchAll();

       }
       catch (PDOException $e) {
           echo 'Erreur de connexion : ' . $e->getMessage();
       }
}


function findAllProd($table, $id_category, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
{
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=arbre_normand', "root", "", array(
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

         $sql = 'SELECT * FROM '.$table.' WHERE id_category = '.$id_category;
         if (!empty($orderBy)){

           //sécurisation des paramètres, pour éviter les injections SQL
           if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
             die('Error: invalid orderBy param');
           }
           $orderDir = strtoupper($orderDir);
           if($orderDir != 'ASC' && $orderDir != 'DESC'){
             die('Error: invalid orderDir param');
           }
           if ($limit && !is_int($limit)){
             die('Error: invalid limit param');
           }
           if ($offset && !is_int($offset)){
             die('Error: invalid offset param');
           }

           $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
           if($limit){
             $sql .= ' LIMIT '.$limit;
             if($offset){
               $sql .= ' OFFSET '.$offset;
             }
           }
         }
         $sth = $pdo->prepare($sql);
         $sth->execute();

         return $sth->fetchAll();

       }
       catch (PDOException $e) {
           echo 'Erreur de connexion : ' . $e->getMessage();
       }
       }
