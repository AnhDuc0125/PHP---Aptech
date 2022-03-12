<?php
include_once("config.php");
  $action = getPost('action');
  $id = getPost('id');
  switch($action){
      case 'delete':
        deleteFromDB($id);
        break;
  }

  function deleteFromDB($id){
      $query = "delete from gift where id = $id";
      execute($query);
  }
?>