<?php
  include_once("db/config.php");
  
  function initDB(){
    $connect = new mysqli(HOST, ROOT, PASSWORD);

    if($connect -> connect_error) {
      die("Failed to connect to DATABASE".$connect -> connect_error);
    }

    $connect -> set_charset("utf8");

    $resultSet = $connect -> query(SQL_CREATE_DATABASE);
 
    $connect -> close();
  }

  function executeResult($query, $isOnly = false){
    $connect = new mysqli(HOST, ROOT, PASSWORD, DATABASE);

    if($connect -> connect_error) {
      die("Failed to connect to DATABASE".$connect -> connect_error);
    }

    $connect -> set_charset("utf8");

    $resultSet = $connect -> query($query);
 
    $connect -> close();
    if($isOnly){
      $data = mysqli_fetch_assoc($resultSet);
    } else {
      $data = [];
      while($rows = mysqli_fetch_assoc($resultSet)){
        $data[] = $rows;
      }
    }
    return $data;
  }

  function execute($query) {
    $connect = new mysqli(HOST, ROOT, PASSWORD, DATABASE);

    if($connect -> connect_error){
      die("Failed to connect to DATABASE".$connect -> connect_error);
    }

    $connect -> set_charset("utf8");

    $connect -> query($query);

    $connect -> close();
  }
?>