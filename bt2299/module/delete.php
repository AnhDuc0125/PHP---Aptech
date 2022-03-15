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
          $answer = getPost('answer');
          if($answer == 'yes'){
              $deleteQuery = "delete from notes where id = '$id'";
              execute($deleteQuery);
              header("Location: ../note.php?id=".$note['user_id']);
          }
      }
?>

<body>
    <div class="card m-5 mx-auto" style="width: 700px">
        <div class="card-header bg-primary text-white h4">
            Xóa Notes
        </div>
        <div class="card-body">
            <h3 class="mt-2">Bạn có chắc chắn muốn xóa ghi chú này không?</h3>
            <?php
              echo '<div class="card m-3" style="width: 400px">
                        <div class="card-header bg-primary text-white h4">'.$note['title'].'</div>
                        <div class="card-body">
                            '.$note['content'].'
                        </div>
                        <div class="card-footer">
                                <form method="post">
                                    <a href="../note.php?id='.$note['user_id'].'"><button class="btn btn-warning" type="button">Không</button></a>
                                    <button class="btn btn-danger" name="answer" value="yes">Có</button>
                                </form>
                        </div>
                    </div>';
            ?>
        </div>
    </div>
</body>

</html>