<?php
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

?>