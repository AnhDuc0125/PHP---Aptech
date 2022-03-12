<?php
  session_start();
  if(!isset($_SESSION['studentList'])){
      $_SESSION['studentList'] = [];
  }

  if(!empty($_POST)){
      if(isset($_POST['index'])){
          $index = $_POST['index'];
        }
      if(isset($_POST['fullname'])){
          $fullname = $_POST['fullname'];
        }
      if(isset($_POST['age'])){
            $age = $_POST['age'];
        }
      if(isset($_POST['address'])){
            $address = $_POST['address'];
        }

      if($index == ""){
        $_SESSION['studentList'][] = array(
          'fullname' => $fullname,
          'age' => $age,
          'address' => $address
        );
      } else {
        $_SESSION['studentList'][$index] = array(
            'fullname' => $fullname,
            'age' => $age,
            'address' => $address
        );
      }
    header("Refresh:0");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
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
        <div class="card-header bg-primary text-light">Quản Lý Sinh Viên</div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="index" style="display: none">
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="fullname" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="number" class="form-control" name="age" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Tuổi</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="address" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Địa chỉ</label>
                </div>
                <button type="submit" class="btn btn-success">Đồng Ý</button>
            </form>
        </div>
    </div>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Danh Sách Thông Tin Sinh Viên</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Họ và tên</th>
                    <th>Tuổi</th>
                    <th>Địa Chỉ</th>
                    <th style="width: 100px"></th>
                    <th style="width: 100px"></th>
                </tr>
                <?php
                $index = 0;
                foreach($_SESSION['studentList'] as $student)
                  echo "<tr>
                            <td>".++$index."</td>
                            <td>".$student['fullname']."</td>
                            <td>".$student['age']."</td>
                            <td>".$student['address']."</td>
                            <td><button class='btn btn-warning' onclick='editStudent(".($index-1).", \"".$student['fullname']."\", \"".$student['age']."\", \"".$student['address']."\")'>Sửa</button></td>
                            <td><button class='btn btn-danger' onclick='deleteStudent(".($index-1).")'>Xóa</button></td>
                        </tr>";
                ?>
            </table>
        </div>
    </div>
</body>
<script>
function deleteStudent(index) {
    var alertUser = confirm("Bạn có chắc muốn xóa dữ liệu này chứ???");
    if (alertUser) {
        $.post('method.php', {
            'index': index,
            'action': 'delete'
        }, function(data) {
            location.reload();
        })
    }
}

function editStudent(index, fullname, age, address) {
    $('[name = index]').val(index);
    $('[name = fullname]').val(fullname);
    $('[name = age]').val(age);
    $('[name = address]').val(address);
}
</script>

</html>