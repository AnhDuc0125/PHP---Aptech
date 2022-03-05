<?php
  session_start();
  if(empty($_SESSION['currentAcc'])){
    header("Location: loginPage.php");
    die();}
  $username = $email = $address = $password = "";
  if(!empty($_SESSION['currentAcc'])){
      $currentAcc = $_SESSION['currentAcc'];
      if(isset($currentAcc['username'])){
        $username = $currentAcc['username'];
      }
      if(isset($currentAcc['email'])){
        $email = $currentAcc['email'];
      }
      if(isset($currentAcc['address'])){
        $address = $currentAcc['address'];
      }
      if(isset($currentAcc['password'])){
        $password = $currentAcc['password'];
      }
    }
    if(!empty($_POST)){
        $_SESSION['currentAcc'] = array (
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'password' => $_POST['password']
        );
        header("Location: welcomePage.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <!--bootstrap 5 and Jquery cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="editPageStyle.css">
</head>

<body>
    <center>
        <h1>Edit Account Page</h1>
    </center>
    <div class="edit">
        <div class="edit--body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" id="floatingInput"
                        placeholder="name@example.com" value="<?=$username?>">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com" value="<?=$email?>">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="address" class="form-control" name="address" id="floatingPassword"
                        placeholder="name@example.com" value="<?=$address?>">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
</body>

</html>