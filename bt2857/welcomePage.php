<?php
  session_start();
  if(empty($_SESSION['currentAcc'])){
      header("Location: loginPage.php");
      die();
    } else {
        $currentAcc = $_SESSION['currentAcc'];  
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
    <center>
        <h1>Welcome</h1>
    </center>
    <table class="table table-bordered container">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Password</th>
            <th></th>
        </tr>
        <?php
            if(!empty($currentAcc)){
                echo '  <tr>
                            <td>'.$currentAcc['username'].'</td>
                            <td>'.$currentAcc['email'].'</td>
                            <td>'.$currentAcc['address'].'</td>
                            <td>'.$currentAcc['password'].'</td>
                            <td><a href="editPage.php"><button class="btn btn-warning">Edit Account</button></a></td>
                        </tr>';
            }
        ?>
    </table>
</body>

</html>