<?php
include_once("db/helper_db.php");
include_once("utils/utility.php");
session_start();
$currentUser = validateLogin();
  if($currentUser != null){
    header("Location: welcome.php");
    die();
  }
  $email = $password = $token = "";
  if(!empty($_POST)){
        $email = getPost('email');
        $password = getPost('password');
        $password = getMD5code($password);
    $query = "select * from users where email = '$email'";    
    $resultSet = executeResult($query);
    if($resultSet != null){
        if(count($resultSet) == 1 && $resultSet[0]['password'] == $password){
            $_SESSION['currentUser'] = $resultSet[0];
        } else if(count($resultSet) > 1){
            foreach($resultSet as $singleResult){
                if($singleResult['password'] == $password){
                    $_SESSION['currentUser'] = $singleResult;      
                }
            }
        }   
        $token = getMD5code($email.date("d/m/Y"));
        $query = "update users set token = '$token' where id = '".$_SESSION['currentUser']['id']."'";
        execute($query);
        // echo $query;

        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        
        header("Location: welcome.php");
        die();
    }
    echo "<h3><center style='color: red'>Wrong Password!!!</center></h3>";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!--bootstrap 5 and Jquery cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <h1>
        <center>LOGIN PAGE</center>
    </h1>
    <div class="card m-5">
        <div class="card-header bg-primary text-light">Input default information</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput" style="text-transform: capitalize">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword" style="text-transform: capitalize">password</label>
                </div>
                <button type="submit" class="btn btn-success mb-3">Login</button>
                <br>
                <a href="input.php">Go to Register Page</a>
            </form>
        </div>
    </div>
</body>

</html>