<?php
require_once("config.php");
require_once("library.php");
$email = $password = "";
  if(!empty($_POST)){
      $email = getPost('email');
      $password = getPost('password');
      $password = getMD5pw($password);

      $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
      mysqli_set_charset($connect, 'utf8');
      
      $queryAhihi = "select * from Users where email = '$email' and password = '$password'";
      $resultSet = mysqli_query($connect, $queryAhihi);

      $data = [];
      while(($row = mysqli_fetch_array($resultSet, 1)) != null){
          $data[] = $row;
      };
      mysqli_close($connect);
      
      if(count($data) == 1){
          //success login
          header("Location: welcome.php");
          die();
      } else {
          echo "Đăng nhập thất bại!";
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

</head>

<body>
    <div class="card m-5">
        <div class="card-header bg-primary text-light">Login Form</div>
        <div class="card-body">
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
    </div>
</body>

</html>