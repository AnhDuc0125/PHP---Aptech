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
    $action = getPost('action');
    if($action == 'remove'){
        if(!empty($cateID)){
            $deleteQuery = "delete from categories where id = '$cateID'";
            execute($deleteQuery);
            header("Location: ../admin/admin_cat.php");
        }
    
        if(!empty($proID)){
            $deleteQuery = "delete from products where id = '$proID'";
            execute($deleteQuery);
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
</head>

<body>
    <?php
      include_once("../layout/nav.php");
    ?>
    <div class="card m-5" style="height: 600px">
        <h1 class="m-4">Confirm to remove:
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
            <button class="btn btn-danger mb-2" name="action" value="remove">Remove</button>
            <br>
            <a href="../admin/admin_cat.php" style="color: #696cff">Back to Admin Page</a>
        </form>
    </div>
</body>

</html>