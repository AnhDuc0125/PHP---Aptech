<?php
  function getMD5code($value){
    $value = md5("ducanhvu".$value."vuducanh");
    return $value;
  }

  function getPost($key, $slash = "\'") {
    if(isset($_POST[$key])){
      //Get value from POST method
      $OriginValue = $_POST[$key];

      //Fix syntax value
      $perfectValue = str_replace($slash, "\\".$slash, $OriginValue);
  
      return $perfectValue;
    }
  return;
  }

  function getGet($key, $slash = "\'") {
    if(isset($_GET[$key])){
      //Get value from GET method
      $OriginValue = $_GET[$key];

      //Fix syntax value
      $perfectValue = str_replace($slash, "\\".$slash, $OriginValue);

      return $perfectValue;
    }
    return;
  }

  function validateLogin(){
    if(isset($_SESSION['currentUser'])){
      return $_SESSION['currentUser'];
    }

    if(isset($_COOKIE['token'])){
      $token = $_COOKIE['token'];
      $query = "select * from users where token = '$token'";
      $currentUser = executeResult($query, true);
      if($currentUser != null){
        $_SESSION['currentUser'] = $currentUser;
        return $currentUser;
      }
    }
    return null;
  }
?>