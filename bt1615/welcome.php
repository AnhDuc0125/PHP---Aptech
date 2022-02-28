<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcomePage</title>

</head>

<body>
    <h1 style="text-align: center">Thông tin tài khoản</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>Tên tài khoản</th>
            <td><?=$_GET['username']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$_GET['email']?></td>
        </tr>
        <tr>
            <th>Tên tài khoản</th>
            <td><?=$_GET['password']?></td>
        </tr>
    </table>
    <a href="input.php?email=<?=$_GET['email']?>&password=<?=$_GET['password']?>&username=<?=$_GET['username']?>">
        <button>Sửa</button>
    </a>
</body>

</html>