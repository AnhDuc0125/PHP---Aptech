<?php
include_once("db/helper_db.php");
include_once("utils/utility.php");
session_start();
$currentUser = validateLogin();
if($currentUser == null){
  header("Location: Login.php");
  die();
}
  $id = $username = $email = $password = "";
  
  $query = "select * from users";
  $userList = executeResult($query);
  if(!empty($_POST)){
      $id = getPost('id');
      $username = getPost('username');
      $email = getPost('email');
      $password = getPost('password');
      if($password == ""){
          $query = "update users set username = '$username', email = '$email' where id = '$id'";
          execute($query);
      } else {
          $password = getMD5code($password);
          $query = "update users set username = '$username', email = '$email', password = '$password' where id = '$id'";
          execute($query);
      }
      header("Refresh:0");
  }

  if(!empty($_GET)){
      $id = $_GET['id'];
      
      $query = "select * from users where id = '$id'";
      $selectedUser = executeResult($query, true);
      
      $username = $selectedUser['username'];
      $email = $selectedUser['email'];
      $password = $selectedUser['password'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
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
        <center>WELCOME PAGE</center>
    </h1>
    <div class="card m-5">
        <div class="card-header bg-primary text-light">Edit User</div>
        <div class="card-body">
            <form method="POST">
                <input type="number" name="id" value="<?=$id?>" style="display: none">
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control username" name="username" id="floatingInput"
                        placeholder="name@example.com" value="<?=$username?>">
                    <label for="floatingInput" style="text-transform: capitalize">username</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control email" name="email" id="floatingInput"
                        placeholder="name@example.com" value="<?=$email?>">
                    <label for="floatingInput" style="text-transform: capitalize">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control password" name="password" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword" style="text-transform: capitalize">password</label>
                </div>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
    <div class="card m-5">
        <div class="card-header bg-primary text-light">Users' information</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th style="width: 50px"></th>
                    <th style="width: 50px"></th>
                </tr>
                <?php
                  if(!empty($userList)){
                      foreach($userList as $user){
                          echo "<tr>
                                    <td>".$user['username']."</td>
                                    <td>".$user['email']."</td>
                                    <td>".$user['password']."</td>
                                    <td><button class='btn btn-warning' onclick='editUser(".$user['id'].")'>Edit</button></td>
                                    <td><button class='btn btn-danger' onclick='removeUser(".$user['id'].")'>Delete</button></td>
                                </tr>";
                      }
                  }
                ?>
            </table>
        </div>
    </div>
</body>
<script>
function removeUser(id) {
    var confirmUser = confirm("Are you sure to delete this user?");
    if (confirmUser) {
        $.post('method.php', {
            'id': id,
            'method': 'delete'
        }, function(data) {
            location.reload();
        })
    } else {
        return
    }
}

function editUser(id) {
    window.location.replace("welcome.php?id=" + id);
}
</script>

</html>