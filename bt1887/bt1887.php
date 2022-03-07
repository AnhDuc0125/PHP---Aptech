<?php
  $actionList = array('add', 'edit', 'remove');
  $studentList = array('Vũ Đức Anh', 'Mai Hiểu Minh', 'Vũ Diễm Quỳnh', 'Hà Quang Bách');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action List</title>
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
    <button class="btn btn-success m-5" onclick="genRand()">Random Action</button>
    <?php
      echo "<p>Action: </p>"
    ?>

    <div class="card m-5">
        <div class="card-header bg-primary text-light">Student List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 50px">No</th>
                    <th>Student</th>
                </tr>
                <?php
                $index = 0;
                foreach($studentList as $student){
                      echo "<tr>
                                <td>".++$index."</td>
                                <td>$student</td>
                            </tr>";
                  }
                ?>
            </table>
        </div>
    </div>
    <script>
    $('.button').click(function() {
        $.ajax({
            type: "POST",
            url: "ajax_api.php",
            data: {
                name: "John"
            }
        }).done(function(msg) {
            alert("Data Saved: " + msg);
        });
    });
    </script>
</body>

</html>