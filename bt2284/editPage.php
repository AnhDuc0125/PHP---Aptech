<?php
    include_once("config.php");
    if(!empty($_GET)){
        $id = getGet('id');

        $query = "select * from gift where id = '$id'";

        $result = executeResult($query, true);
    }

    $title = $content = $price = "";
    if(!empty($_POST)){
        $title = getPost('title');
        $content = getPost('content');
        $price = getPost('price');

        $query = "update gift set title = '$title', content = '$content', price = '$price' where id = '$id'";
        execute($query);
        header("Location: managerPage.php");
        die();
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
                        placeholder="name@example.com" value='<?=$result['title']?>'>
                    <label for="floatingInput">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="content" id="floatingInput"
                        placeholder="name@example.com" value='<?=$result['content']?>'>
                    <label for="floatingInput">Content</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="floatingPassword"
                        placeholder="name@example.com" value='<?=$result['price']?>'>
                    <label for="floatingPassword">Price</label>
                </div>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>


</body>
<script>
</script>

</html>