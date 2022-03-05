<?php
session_start();
    if(!empty($_SESSION['currentAcc'])){
        header("Location: welcomePage.php");
        die();
    }

    $email = $password = "";
    if(!empty($_POST)){
      if(isset($_POST['email'])){
          $email = $_POST['email'];
      }
      if(isset($_POST['password'])){
          $password = $_POST['password'];
      }
      foreach ($_SESSION['accountList'] as $user) {
          if($user['email'] == $email && $user['password'] == $password){
              $_SESSION['currentAcc'] = $user;
              header("Location: welcomePage.php");
              die();
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
    <title>Login Page</title>
    <!--bootstrap 5 and Jquery cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="loginPageStyle.css">
</head>

<body>
    <div class="login">
        <div class="login--header">Login</div>
        <div class="login--body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
        <div class="box__register--footer">
            Chưa có tài khoản? <a href="registerPage.php" class="loginPage">Register</a>
        </div>
    </div>
</body>

</html>