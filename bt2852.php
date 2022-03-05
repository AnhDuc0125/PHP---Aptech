<?php
  session_start();
  
    $username = $email = $password = "";

  if(!empty($_POST)){
      if(isset($_POST['username'])){
        $username = $_POST['username'];
      }
      if(isset($_POST['email'])){
        $email = $_POST['email'];
      }
      if(isset($_POST['password'])){
        $password = $_POST['password'];
      }

      if(!isset($_SESSION['studentList'])){
          $_SESSION['studentList'] = [];
      }
      
      $_SESSION['studentList'][] = [
          'username' => $username,
          'email' => $email,
          'password' => $password
      ];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management with SESSION</title>
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
        <div class="card-header bg-primary text-light">Input information</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="username" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Student Management</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Options</th>
                </tr>
                <?php
                  if(!empty($_SESSION)){
                      $index = 1;
                      foreach($_SESSION['studentList'] as $student){
                          echo "<tr>
                                    <td>".$index++."</td>
                                    <td>".$student['username']."</td>
                                    <td>".$student['email']."</td>
                                    <td>".$student['password']."</td>
                                    <td><button class='btn btn-warning mx-2'>Edit</button><button class='btn btn-danger'>Delete</button></td>
                                </tr>";
                      }
                  }
                ?>
            </table>
        </div>
    </div>
    <script>
    $.post()
    </script>
</body>

</html>