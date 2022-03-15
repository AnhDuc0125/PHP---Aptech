<?php
include_once("db/helper_db.php");
include_once("utils/utility.php");
session_start();
  $id = $method = "";
  if(!empty($_POST)){
    $id = getPost('id');
    $method = getPost('method');
    switch ($method) {
        case 'delete':
            $query = "delete from users where id = '$id'";
            execute($query);
            break;
    }
  }
?>