<?php
  function getPost($key, $slash = '\''){
    if(isset($_POST[$key])){   
        $value = $_POST[$key];
        $value = str_replace($slash, "\\".$slash, $value);
    }
    return $value;
  }

  function getMD5code($value) {
    $value = md5("ducnhaskljdfkfj".$value."ducnhaskljdfkfj");
    return $value;
  }

  function executes($query){
     //Step 1: connect to DB:
     $con = mysqli_connect(HOST, ROOT, PASSWORD, DATABASE);

     if(mysqli_connect_errno()) {
         echo "Fail to connect to MySQL".mysqli_connect_error();
         die();
     }
     //Step 2: Set charset:
     mysqli_set_charset($con, 'utf8');
     
     //Step 3: Write queries:
     mysqli_query($con, $query);
 
     //Step 4: Close DB:
     mysqli_close($con);
  }
?>