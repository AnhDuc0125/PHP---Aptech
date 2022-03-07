<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT1635</title>
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
    <?php
      $bookList = [];
      $num = rand(2, 10);
      for ($i=1; $i<=$num; $i++){
          $bookList[] = array(
            'name' => "book $i",
            'author' => "author $i",
            'price' => "price $i"
          );
      }
      ?>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Book List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
                <?php
                      if(!empty($bookList)){
                          $index = 0;
                          foreach($bookList as $book){
                              echo "<tr>
                                        <td>".(++$index)."</td>
                                        <td>".$book['name']."</td>
                                        <td>".$book['author']."</td>
                                        <td>".$book['price']."</td>
                                    </tr>";
                          }
                      }
                    ?>
            </table>
        </div>
    </div>
</body>

</html>