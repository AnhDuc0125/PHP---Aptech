<?php
  session_start();
  if(!empty($_POST)){
      if(isset($_POST['index'])){
        $index = $_POST['index'];
      }
      if(isset($_POST['action'])){
        $action = $_POST['action'];
        switch ($action) {
            case 'delete':
                array_splice($_SESSION['studentList'], $index, 1);
                break;
        }
      }
  }
?>