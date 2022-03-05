<?php
//function fix SQL injection
  function getPost($key, $slash = '\''){
    $value = "";
    if(isset($_POST[$key])){
        $value = $_POST[$key];
        $value = str_replace($slash, "\\".$slash, $value);
    }
    return $value;
  }

//security password
function getMD5pw($password){
    $encrypt = md5($password);
    $encrypt = md5('ashfujisghjgnv'.$password.'kldsfjlsdkfdsf');

    return $encrypt;
}

//open SQL, run query and close SQL
function execute($query){
    $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
      mysqli_set_charset($connect, 'utf8');

      mysqli_query($connect, $query);
    
      mysqli_close($connect);
}
?>