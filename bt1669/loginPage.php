<?php
  if(!empty($_POST)){
      $email = $password = "";
      if(isset($_POST['email'])){
          $email = $_POST['email'];
      }
      if(isset($_POST['password'])){
          $password = $_POST['password'];
      }
    if($email == $_COOKIE['email_COOKIE'] && $password == $_COOKIE['password_COOKIE']){
        header("Location: welcomePage.php");
    } else {
        echo "Sai thông tin đăng nhập!!!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body class="container">
    <h1 style="text-align: center">LOGIN PAGE</h1>
    <form action="" method="post">
        <div class="form-group m-2">
            <label for="email" class="label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group m-2">
            <label for="password" class="label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group m-2">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
    </form>
</body>

</html>