<?php
  include_once("../db/dbhelper.php");
  include_once("../utils/utility.php");
  
  //fill data of table product from database
  $selectQuery = "select * from products";
  $proList = executeResult($selectQuery);
  
  //get date of table category to fill the select 
  $selectQuery = "select * from categories";
  $cateList = executeResult($selectQuery);

  $name = "";
  if(!empty($_POST)){
      $title = getPost('title');

      $selectQuery = "select * from products where title = '$title'";
      $sameName = executeResult($selectQuery);

      if(count($sameName) == 0){
          $price = getPost('price');
          $thumbnail = getPost('thumbnail');
          $createdAt = $updatedAt = date("Y-m-d H:i:s");  
          $addQuery = "insert into products(title, price, thumbnail, content, created_at, updated_at, id_cat) values ('$title', '$price', '$thumbnail', '$content', '$createdAt', '$updatedAt', '$catID')";
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
        <div class="card-header bg-primary text-white h4 mb-3">Products Control</div>
        <div class="card-body" style="min-height: 600px">
            <div class="row">
                <div class="col-7">
                    <table class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th style="width: 170px">Title</th>
                                <th style="width: fit-content">Thumbnail</th>
                                <th style="width: fit-content">Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $index = 0;
                              foreach($proList as $item){
                                  echo "<tr>
                                            <td>".++$index."</td>
                                            <td style='text-transform: capitalize'>".$item['title']."</td>
                                            <td style='text-transform: capitalize'><img style='width: 150px' src='".$item['thumbnail']."'></td>
                                            <td style='text-transform: capitalize'>".$item['price']." $</td>
                                            <td><a href='../modules/edit.php?pro_id=".$item['id']."'><button class='btn btn-warning'>Edit</button></a></td>
                                            <td><a href='../modules/remove.php?pro_id=".$item['id']."'><button class='btn btn-danger'>Remove</button></a></td>
                                        </tr>";
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header bg-success text-white h4 mb-3 p-3">Add Product</div>
                        <div class="card-body">
                            <form method="POST">
                                <p><?php
                                  if(!empty($_POST)){
                                      echo "<h5 style='color: red'>Already have this product!</h5>";
                                  }
                                ?></p>
                                <div class="form-floating">
                                    <div class="form-floating mb-3">
                                        <input required type="text" class="form-control" name="title" id="floatingInput"
                                            placeholder="Type title of product">
                                        <label for="floatingInput" style="text-transform: capitalize">title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input required type="number" class="form-control" name="price"
                                            id="floatingInput" placeholder="Type price of product">
                                        <label for="floatingInput" style="text-transform: capitalize">price</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input required type="text" class="form-control" name="thumbnail"
                                            id="floatingPassword" placeholder="Type thumbnail of product">
                                        <label for="floatingPassword"
                                            style="text-transform: capitalize">thumbnail</label>
                                    </div>
                                </div>
                                <select name="catID" class="form-select mb-3">
                                    <option value="">Choose Category</option>
                                    <?php
                                      foreach($cateList as $cate){
                                          echo "<option value='".$cate['name_cat']."'>".$cate['name_cat']."</option>";
                                      }
                                    ?>

                                </select>
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