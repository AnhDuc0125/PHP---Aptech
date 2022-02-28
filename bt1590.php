<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt1590</title>
</head>
<body>
    <?php
        $name = 'Vũ Đức Anh';
        $age = 18;
        $address = 'Hoàng Mai - Hà Nội';
        $email = 'vuducanh0125@gmail.com';
        $phone_number = '0975502334';
        echo "<table border=1>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SĐT</th>
            </tr>
            <tr>
                <td>$name</td>
                <td>$age</td>
                <td>$address</td>
                <td>$email</td>
                <td>$phone_number</td>
            </tr>
        </table>"
    ?>
</body>
</html>