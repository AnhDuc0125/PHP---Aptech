<?php
  if(!empty($_GET)){
      $username = $email = $password = "";
      if(isset($_GET['username'])){
          $username = $_GET['username'];
        }
        if(isset($_GET['email'])){
            $email = $_GET['email'];
        }
        if(isset($_GET['password'])){
            $password = $_GET['password'];
        }

        if(!isset($userList)){
            $userList = [$_GET];
            echo "chưa khai báo";
        } else {
          array_push($userList, $_GET);
          echo "đã khai báo";
        }
    var_dump($userList);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt1616</title>
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
    <div class="input__boxed">
        <div class="card m-5">
            <div class="card-header bg-primary text-light">Input detail information</div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="result__boxed">
        <div class="card m-5">
            <div class="card-header bt-success text-light">Information list</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>