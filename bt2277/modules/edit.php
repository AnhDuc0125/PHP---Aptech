<?php
  include_once("../db/dbhelper.php");
  include_once("../utils/utility.php");
  
  $cate = "";
  if(!empty($_GET)){
    $cateID = getGet('cat_id');
    $proID = getGet('pro_id');

    if(!empty($cateID)){
        $selectQuery = "select * from categories where id = '$cateID'";
        $category = executeResult($selectQuery, true);
    }

    if(!empty($proID)){
        $selectQuery = "select * from products where id = '$proID'";
        $product = executeResult($selectQuery, true);
    }
 }
 if(!empty($_POST)){
    $updatedAt = date("Y-m-d H:i:s");  
    $action = getPost('action');
    if($action == 'edit'){
        if(!empty($cateID)){
            $name_cat = getPost('name');
            $updateQuery = "update categories set name_cat = '$name_cat', updated_at = '$updatedAt' where id = '$cateID'";
            execute($updateQuery);
            header("Location: ../admin/admin_cat.php");
        }
        if(!empty($proID)){
            $title = getPost('title');
            $price = getPost('price');
            $thumbnail = getPost('thumbnail');
            $updateQuery = "update products set title = '$title', price = '$price', thumbnail = '$thumbnail', updated_at = '$updatedAt' where id = '$proID'";
            execute($updateQuery);
            header("Location: ../admin/admin_pro.php");
        }
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <?php
      include_once("../layout/nav.php");
    ?>
    <div class="card m-5" style="min-height: 600px">
        <h1 class="m-4">Edit category:
            <u style="color: #696cff">
                <?php
                        if(!empty($cateID)) {
                            echo $category['name_cat'];
                        }
                        if(!empty($proID)) {
                            echo $product['title'];
                        }
                ?>
            </u>
        </h1>
        <form method="post" class="m-4">
            <?php
              if(!empty($cateID)) {
                  echo '<div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="name" id="floatingInput"
                                placeholder="Type name of category">
                            <label for="floatingInput" style="text-transform: capitalize" value="'.$category['name_cat'].'">name</label>
                        </div>';
              }
              if(!empty($proID)) {
                echo '<div class="form-floating mb-3">
                        <input required type="text" class="form-control" name="title" id="floatingInput"
                            placeholder="Type title of product" value="'.$product['title'].'">
                        <label for="floatingInput" style="text-transform: capitalize">title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="number" class="form-control" name="price" id="floatingInput"
                            placeholder="Type price of product" value="'.$product['price'].'">
                        <label for="floatingInput" style="text-transform: capitalize">price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="text" class="form-control" name="thumbnail" id="floatingInput"
                            placeholder="Type thumbnail of product" value="'.$product['thumbnail'].'">
                        <label for="floatingInput" style="text-transform: capitalize">thumbnail</label>
                    </div>
                    <img style="width: 200px" id="img" src="'.$product['thumbnail'].'">
                    <br>';
              }
            ?>
            <button class="btn btn-success mb-2" name="action" value="edit">Edit</button>
            <br>
            <a href="../admin/admin_cat.php" style="color: #696cff">Back to categories Page</a>
        </form>
    </div>

</body>

</html>