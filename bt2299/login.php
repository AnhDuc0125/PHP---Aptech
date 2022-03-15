<?php
  $baseURL = "";
include_once("db/dbhelper.php");
include_once("utils/utility.php");
include_once("layout/header.php");

  if(!empty($_POST)){
      $email = getPost('email');
      $password = getPost('password');
      $password = getMD5code($password);

      $loginQuery = "select * from users where email = '$email' and password = '$password'";  
      $accountResult = executeResult($loginQuery, true);
      if(!empty($accountResult)){
        //login success
        $id = $accountResult['id'];
        header("Location: note.php?id=$id");
        die();
      } 
  }
?>

<body>
    <div class="card m-5 mx-auto shadow" style="width: 400px">
        <div class="card-header">
            <h2>Đăng nhập</h2>
            <?php
               if(!empty($_POST)){
                   echo "<h5 style='color: red'>Vui lòng kiểm tra lại email và mật khẩu!</h5>";
               }
            ?>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="VD: abc@gmail.com">
                    <label for="floatingInput" style="text-transform: capitalize">tài khoản email</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="******">
                    <label for="floatingPassword" style="text-transform: capitalize">mật khẩu</label>
                </div>
                <button type="submit" class="btn btn-success shadow" style="width: 100%">Đăng nhập</button>
            </form>
        </div>
        <div class="card-footer">
            Bạn chưa có tài khoản?
            <a href="register.php">Đăng ký</a>
        </div>
    </div>
</body>