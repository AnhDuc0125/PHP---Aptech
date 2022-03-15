<?php
$baseURL = "";
include_once("db/dbhelper.php");
include_once("utils/utility.php");
include_once("layout/header.php");

  if(!empty($_POST)){
      $fullname = getPost('fullname');
      $email = getPost('email');
      $birthday = getPost('birthday');
      $address = getPost('address');
      $password = getPost('password');
      $CFpassword = getPost('CFpassword');

      //lấy code md5
      $password = getMD5code($password);
      $CFpassword = getMD5code($CFpassword);

      //check email đã tồn tại hay chưa
      $emailQuery = "select email from users where email = '$email'";
      $emailsResult = executeResult($emailQuery);
      $haveEmail = false;
      if(count($emailsResult) > 0){
          $haveEmail = true;
      }
        //kiểm tra mật khẩu có trùng không
        if($password == $CFpassword && $haveEmail == false){
            $query = "insert into users (fullname, email, birthday, address, password) values ('$fullname', '$email', '$birthday', '$address', '$password')";
            execute($query);
            header("Location: login.php");
            die();
        }  
  }
?>

<body>
    <div class="card m-5 mx-auto" style="width: 400px">
        <div class="card-header">
            <h2>Đăng ký</h2>
            <?php
                if(!empty($_POST)){
                    if($haveEmail == true){
                        echo "<h4 style='color: red'>Email này đã tồn tại!</h4>";
                    } else {
                        echo "<h4 style='color: red'>Mật khẩu không khớp!</h4>";
                    };
                }
            ?>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="fullname" id="floatingInput"
                        placeholder="VD: Vũ Đức Anh">
                    <label for="floatingInput" style="text-transform: capitalize">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput" style="text-transform: capitalize">Tài khoản email</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="date" class="form-control" name="birthday" id="floatingInput">
                    <label for="floatingInput" style="text-transform: capitalize">Ngày tháng sinh</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="address" id="floatingInput"
                        placeholder="Điền địa chỉ của bạn">
                    <label for="floatingInput" style="text-transform: capitalize">Địa chỉ</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="Điền mật khẩu">
                    <label for="floatingPassword" style="text-transform: capitalize">Mật khẩu</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" name="CFpassword" id="floatingPassword"
                        placeholder="Điền lại mật khẩu">
                    <label for="floatingPassword" style="text-transform: capitalize">Nhập lại mật khẩu</label>
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%">Register</button>
            </form>
        </div>
        <div class="card-footer">
            Bạn đã có tài khoản rồi?
            <a href="login.php">Đăng nhập</a>
        </div>
    </div>
</body>

</html>