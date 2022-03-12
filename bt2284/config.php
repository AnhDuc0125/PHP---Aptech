<?php
  define("HOST", "localhost");
  define("ROOT", "anhduc0125");
  define("PASSWORD", "PVGphznRP[JNt_OH");
  define("DATABASE", "gift_db");
  
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

  function getGet($key, $slash = "\'") {
    if(isset($_GET[$key])){
      //Get value from GET method
      $OriginValue = $_GET[$key];
    }

    //Fix syntax value
    $perfectValue = str_replace($slash, "\\".$slash, $OriginValue);

    return $perfectValue;
  }

  function getPost($key, $slash = "\'") {
    if(isset($_POST[$key])){
      //Get value from POST method
      $OriginValue = $_POST[$key];
    }

    //Fix syntax value
    $perfectValue = str_replace($slash, "\\".$slash, $OriginValue);

    return $perfectValue;
  }

  function getMD5code($value) {
    return $value = md5("anhyeu".$value."maihieuminh");
  }
?>