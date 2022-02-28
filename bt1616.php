<?php
$username = $email = $password = [];
  if(!empty($_POST)){
      //Nếu có dữ liệu ở url thì đổi biến -> array
      if(!empty($_GET)){
        if(isset($_GET['a'])){
            $username = array($_GET['a']);
            array_push($username,  $_POST['username']);
        }
        if(isset($_GET['b'])){
            $email = array($_GET['b']);
            array_push($email,  $_POST['email']);
        }
        if(isset($_GET['c'])){
            $password = array($_GET['c']);
            array_push($password,  $_POST['password']);
        }
        //Mục tiêu: array -> string  
            $usernameList = implode(",",$username);// $username = [a;b;c] --> $usernameList = "a,b,c"
            // explode(",",$usernameList);// $usernameList = "a,b,c"  --> [a;b;c]

            $emailList = implode(",",$email);
            // explode(",",$emailList);

            $passwordList = implode(",",$password);
            // explode(",",$passwordList);

            header("Location: bt1616.php?a=$usernameList&b=$emailList&c=$passwordList");
      } else { //Nếu không thì add vào bthg
          if(isset($_POST['username'])){
              $username = $_POST['username'];

          }
          if(isset($_POST['email'])){
              $email = $_POST['email'];

          }
          if(isset($_POST['password'])){
              $password = $_POST['password'];

          }
            header("Location: bt1616.php?a=$username&b=$email&c=$password");
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
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
        <div class="card-header bg-success text-light">Input Student Information</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
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
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Output Student Information</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                <?php
  if(!empty($_GET)){
      $nameListGet = $_GET['a'];
      $emailListGet = $_GET['b'];
      $pwdListGet = $_GET['c'];
      
      $userArray = explode(",",$nameListGet);
      $emailArray = explode(",",$emailListGet);
      $passwordArray = explode(",",$pwdListGet);
        
        if(is_array($userArray)){
            for($i=0; $i<count($userArray); $i++){
                echo "<tr><td>".($i+1)."</td><td>".$userArray[$i]."</td><td>".$emailArray[$i]."</td><td>".$passwordArray[$i]."</td></tr>";
            }
        } else {
            echo "<tr><td>1</td><td>".$nameListGet."</td><td>".$emailListGet."</td><td>".$pwdListGet."</td></tr>";
        }
    }
                ?>
            </table>
        </div>
    </div>
</body>

</html>