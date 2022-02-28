<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt2837</title>
</head>
<body>
    <?php
        $n = rand(3, 15);
        $bookList = [];
        for($i=0; $i<$n; $i++){
            $book = [
                "title" => "sách ".$i+1,
                "thumbnail" => "thumnail ".$i+1,
                "price" => "giá ".$i+1
            ];
            array_push($bookList, $book);
        }
    ?>
    <table border="1", cellpadding="5">
        <tr>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>Price</th>
        </tr>
    <?php
        foreach ($bookList as $singleBook) {
            echo "<tr>";
                foreach ($singleBook as $name => $value) {
                    echo "<td>".$value."</td>";
                };
            echo "</tr>";
        };
    ?>
    </table>
</body>
</html>