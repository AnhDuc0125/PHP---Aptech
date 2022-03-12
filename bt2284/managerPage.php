<?php
    include_once("config.php");
    $title = $content = $price = "";

    $query = "select * from gift";
    $giftList = executeResult($query);

    

  if(!empty($_POST)){
    $title = getPost('title');
    $content = getPost('content');
    $price = getPost('price');

    $query = "insert into gift(title, content, price) values ('$title', '$content', '$price')";

    execute($query);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Product Page</title>
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
        <div class="card-header bg-primary text-light">Control Product</div>
        <div class="card-body">
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="content" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Content</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="floatingPassword"
                        placeholder="name@example.com">
                    <label for="floatingPassword">Price</label>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Management Product</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Price</th>
                    <th style='width: 50px'></th>
                    <th style='width: 50px'></th>
                </tr>
                <?php
                  foreach($giftList as $item){
                      echo "<tr>
                                <th>".$item['id']."</th>
                                <th>".$item['title']."</th>
                                <th>".$item['content']."</th>
                                <th>".$item['price']."</th>            
                                <th><a href='editPage.php?id=".$item['id']."'><button class='btn btn-warning' onclick='editGift(".$item['id'].")'>Edit</button></a></th>
                                <th><button class='btn btn-danger' onclick='deleteGift(".$item['id'].")'>Delete</button></th>
                            </tr>";
                  }
                ?>
            </table>
        </div>
    </div>
</body>
<script>
function editGift(id) {

}

function deleteGift(id) {
    option = confirm("Confirm to delete this product?");
    if (!option) {
        return;
    }
    $.post("db_api.php", {
        'id': id,
        'action': 'delete'
    }, function(data) {
        location.reload();
    })
}
</script>

</html>