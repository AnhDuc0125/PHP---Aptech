<?php
      $username = $email = $password = "";
  if(!empty($_POST)){
      if(isset($_POST['Username'])){
        $username = $_POST['Username'];
      }
      if(isset($_POST['Email'])){
        $email = $_POST['Email'];
      }
      if(isset($_POST['Password'])){
        $password = $_POST['Password'];
      }
      if($username == "AnhDuc0125" && $password == "chainuocngot"){
          header("Location: welcome.php?email=$email&password=$password&username=$username");
          die();
      }
  }
  if(!empty($_GET)){
    if(isset($_GET['username'])){
      $username2 = $_GET['username'];
    }
    if(isset($_GET['email'])){
      $email2 = $_GET['email'];
    }
    if(isset($_GET['password'])){
      $password2 = $_GET['password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inputPage</title>
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
        <div class="card-header bg-primary text-light">Input default information</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="Username" id="floatingInput"
                        placeholder="name@example.com" value="<?=$username2?>">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="Email" id="floatingInput"
                        placeholder="name@example.com" value="<?=$email2?>">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="Password" id="floatingPassword"
                        placeholder="name@example.com" value="<?=$password2?>">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>