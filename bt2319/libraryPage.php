<?php
  include_once("db/config.php");
  include_once("db/dbhelper.php");
  include_once("utils/utility.php");

  $query = "select * from books";
  $bookList = executeResult($query);

  if(!empty($_POST)){
      if(isset($_POST['bookName'])){
          $bookName = $_POST['bookName'];
      }
      $query = "select * from books where title like '%$bookName%';";
      $bookList = executeResult($query);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
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
    <h1>
        <center>Library Management</center>
    </h1>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Find books</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="bookName" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Search books by name</label>
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Books List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 100px">Book ID</th>
                    <th style="width: 100px">Author ID</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th style="width: 300px">Publish Date</th>
                    <th style="width: 50px">Available</th>
                </tr>
                <?php
                  foreach($bookList as $book){
                      echo "<tr>
                                <td>".$book['bookid']."</td>
                                <td>".$book['authorid']."</td>
                                <td>".$book['title']."</td>
                                <td>".$book['ISBN']."</td>
                                <td>".$book['pub_year']."</td>
                                <td>".$book['available']."</td>
                            </tr>";
                  }
                ?>
            </table>
        </div>
    </div>
</body>

</html>