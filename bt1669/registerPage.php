<?php
  if(!empty($_POST)){
      $username = $email = $password = $address = "";
      if(isset($_POST['username'])){
          $username = $_POST['username'];
      }
      if(isset($_POST['email'])){
          $email = $_POST['email'];
      }
      if(isset($_POST['password'])){
          $password = $_POST['password'];
      }
      if(isset($_POST['address'])){
          $address = $_POST['address'];
      }
      setcookie("username_COOKIE", $username, time() + 24*60*60, "/");
      setcookie("email_COOKIE", $email, time() + 24*60*60, "/");
      setcookie("password_COOKIE", $password, time() + 24*60*60, "/");
      setcookie("address_COOKIE", $address, time() + 24*60*60, "/");

      header("Location: loginPage.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body class="container">
    <h1 style="text-align: center">REGISTER PAGE</h1>
    <form action="" method="post">
        <div class="form-group m-2">
            <label for="username" class="label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group m-2">
            <label for="email" class="label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group m-2">
            <label for="password" class="label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group m-2">
            <label for="address" class="label">Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group m-2">
            <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>
</body>

</html>