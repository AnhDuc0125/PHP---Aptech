<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>

<body>
    <table border="1" cellpadding="5">
        <?php
            if(isset($_POST)){
                $data = $_POST;
                foreach ($_POST as $key => $value) {
                    echo "<tr><th>".$key."</th><td>".$_POST[$key]."</td></tr>";
                }
            }
        ?>
    </table>
    <a href="bt1615.php">Edit</a>
</body>

</html>