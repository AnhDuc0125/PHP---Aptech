<?php
  include_once("../db/dbhelper.php");
  include_once("../utils/utility.php");
  
  $selectQuery = "select * from categories";
  $catList = executeResult($selectQuery);
  
  $name = "";
  if(!empty($_POST)){
      $name = getPost('name');

      $selectQuery = "select * from categories where name_cat = '$name'";
      $sameName = executeResult($selectQuery);

      if(count($sameName) == 0){
          $createdAt = $updatedAt = date("Y-m-d H:i:s");  
          $addQuery = "insert into categories(name_cat, created_at, updated_at) values ('$name', '$createdAt', '$updatedAt')";
          execute($addQuery);
    
          header("refresh:0");
      } 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <script src="../../assets/vendor/js/helpers.js"></script>

    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <?php
      include_once("../layout/nav.php");
    ?>
    <div class="card m-5">
        <div class="card-header bg-primary text-white h4 mb-3">Category Control</div>
        <div class="card-body" style="min-height: 600px">
            <div class="row">
                <div class="col-7">
                    <table class="table table-bordered" style="width: 550px">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th style="width: 350px">Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $index = 0;
                              foreach($catList as $item){
                                  echo "<tr>
                                            <td>".++$index."</td>
                                            <td style='text-transform: capitalize'>".$item['name_cat']."</td>
                                            <td><a href='../modules/edit.php?cat_id=".$item['id']."'><button class='btn btn-warning'>Edit</button></a></td>
                                            <td><a href='../modules/remove.php?cat_id=".$item['id']."'><button class='btn btn-danger'>Remove</button></a></td>
                                        </tr>";
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header bg-success text-white h4 mb-3 p-3">Add Categories</div>
                        <div class="card-body">
                            <form method="POST">
                                <p><?php
                                  if(!empty($_POST)){
                                      echo "<h5 style='color: red'>Already have this category!</h5>";
                                  }
                                ?></p>
                                <div class="form-floating mb-3">
                                    <input required type="text" class="form-control" name="name" id="floatingInput"
                                        placeholder="Type name of category">
                                    <label for="floatingInput" style="text-transform: capitalize">name</label>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>