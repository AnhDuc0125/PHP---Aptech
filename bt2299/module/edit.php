<?php
    $baseURL = "../";
  include_once("../db/dbhelper.php");
  include_once("../utils/utility.php");
  include_once("../layout/header.php");
      if(!empty($_GET)){
          $id = getGet('id');
          $userQuery = "select * from notes where id = '$id'";
          $note = executeResult($userQuery, true);
      }
      if(!empty($_POST)){
          $title = getPost('title');
          $content = getPost('content');
          $updated_at = date("Y-m-d H:i:s");
          $editQuery  = "update notes set title = '$title', content = '$content', updated_at = '$updated_at' where id = $id";
          execute($editQuery);
          header("Location: ../note.php?id=".$note['user_id']."");
      }
?>

<body>
    <div class="card m-5 mx-auto" style="width: 500px">
        <div class="card-header bg-primary text-white h4">
            Sửa Notes
        </div>
        <div class="card-body">
            <h3 class="mt-2">Vui lòng điền dữ liệu muốn thay đổi</h3>
            <form method="post">
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="title" id="floatingInput"
                        placeholder="name@example.com" value="<?=$note['title']?>">
                    <label for="floatingInput" style="text-transform: capitalize">Tiêu đề</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="content" id="floatingInput"
                        placeholder="name@example.com" value="<?=$note['content']?>">
                    <label for="floatingInput" style="text-transform: capitalize">Nội dung</label>
                </div>
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</body>

</html>