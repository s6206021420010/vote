<?php
// Create connection
/**
 *
 */
class db
{

  function __construct()
  {

    }
  function connect(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "db_product";
      return $conn = new mysqli($servername, $username, $password, $db);
  }
  function select($field,$table,$where){
    $db = new db();
    if($where==""){
      $sql = "SELECT $field FROM $table";
    }else{
      $sql = "SELECT $field FROM $table where $where";
    }
    // echo $sql;
    $result = $db->connect()->query($sql);
    return $result;
  }
}

 ?>
