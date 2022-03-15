<?php
include_once("db/config.php");
include_once("db/dbhelper.php");

  if(!empty($_POST)){
      if(isset($_POST['action'])){
          $action = $_POST['action'];
          if($action == 'init'){
            initDB(SQL_CREATE_DATABASE);
            execute(SQL_CREATE_TABLE_USERS);
            execute(SQL_CREATE_TABLE_NOTES);
            header("Location: login.php");
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Init Page</title>
    <!--bootstrap 5 and Jquery cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
    * {
        overflow: hidden;
    }

    body {
        height: 100vh;
        background-image: linear-gradient(to right bottom, #2193b0, #2193b0);
    }
    </style>
</head>

<body>
    <h1 style="margin-top: 50px">
        <center>INIT PAGE</center>
    </h1>
    <form method="post">
        <center><button class="btn btn-warning" name="action" value="init">INIT</button></center>
    </form>
</body>

</html>