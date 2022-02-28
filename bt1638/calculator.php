<?php
  if(!empty($_POST)){
    if(isset($_POST['a'])){
        $a = $_POST['a'];
    }  
    if(isset($_POST['b'])){
        $b = $_POST['b'];
    }  
    if(isset($_POST['calc'])){
        $calc = $_POST['calc'];
    }  
      $result = "";
      switch($calc){
          case "+":
            $result = $a + $b;
            break;
          case "-":
            $result = $a - $b;
            break;
          case "x":
            $result = $a * $b;
            break;
          case "/":
            $result = $a / $b;
            break;
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <!--bootstrap 5 and Jquery cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
    <?php include "style.css";
    ?>
    </style>
</head>

<body>
    <form action="" method="post">
        <input type="number" name="a" class="firstNumber">
        <input type="number" name="b" class="secondNumber">
        <select name="calc" class="calc">
            <option></option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="x">x</option>
            <option value="/">/</option>
        </select>
        <button type="submit" class="btn btn-success">OK</button>
    </form>
    <?php echo "kết quả: ".$result?>
    <div class="calculator">
        <div class="header">
            <input type="text" id="currentNumber">
        </div>
        <form action="" method="post" class=" body">
            <!-- row 1 -->
            <input type="button" class="btn__common" value="C">
            <input type="button" class="btn__common" value="+/-">
            <input type="button" class="btn__common btn__calc" value="%">
            <input type="button" class="btn__common btn__calc" value="/">
            <!-- row 2 -->
            <input type="button" class="btn__common btn__num" value="7">
            <input type="button" class="btn__common btn__num" value="8">
            <input type="button" class="btn__common btn__num" value="9">
            <input type="button" class="btn__common btn__calc" value="x">
            <!-- row 3 -->
            <input type="button" class="btn__common btn__num" value="4">
            <input type="button" class="btn__common btn__num" value="5">
            <input type="button" class="btn__common btn__num" value="6">
            <input type="button" class="btn__common btn__calc" value="-">
            <!-- row 4 -->
            <input type="button" class="btn__common btn__num" value="1">
            <input type="button" class="btn__common btn__num" value="2">
            <input type="button" class="btn__common btn__num" value="3">
            <input type="button" class="btn__common btn__calc" value="+">
            <!-- row 5 -->
            <input type="button" class="btn__common btn__num" value="0" style="grid-column: 1/3">
            <input type="button" class="btn__common" value=".">
            <button type="submit" class="btn__common">=</button>
        </form>
    </div>
</body>
<script>
$(".btn__common").click(function() {
    var btnValue = $(this).val();
    switch (btnValue) {
        case "+":
        case "-":
        case "x":
        case "/":
            $(".calc").val(btnValue);
            break;
        default:
            if ($(".calc").val() == "") {
                $(".firstNumber").val($(".firstNumber").val() + btnValue)
            } else {
                $(".secondNumber").val($(".secondNumber").val() + btnValue)
            }
            break;
    }
})
</script>

</html>