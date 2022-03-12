<?php
    $result = "";
    if(!empty($_POST)){
        if(isset($_POST['firstNum'])){
            $firstNum =  $_POST['firstNum'];
        }
        if(isset($_POST['operator'])){
            $operator =  $_POST['operator'];
        }
        if(isset($_POST['secondNum'])){
            $secondNum =  $_POST['secondNum'];
        }

        switch ($operator) {
            case '+':
                 $result = $firstNum + $secondNum;
                break;
            case '-':
                 $result = $firstNum - $secondNum;
                break;
            case 'x':
                 $result = $firstNum * $secondNum;
                break;
            case '/':
                 $result = $firstNum / $secondNum;
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST">
        <div class="calcSystem" style="display: none">
            <input type="number" id="firstNum" name="firstNum">
            <input type="text" id="operator" name="operator">
            <input type="number" id="secondNum" name="secondNum">
        </div>
        <div class="calc">
            <div class="calc--header">
                <input type="text" class="calc--currentNum" style="color: white" value="">
                <input type="number" class="calc--currentResult" disabled value="<?=$result?>" style="color: white">
            </div>
            <div class="calc--body">
                <input type="button" value="AC" class="btn--action">
                <input type="button" value="+/-" class="btn--action">
                <input type="button" value="%" class="btn--action">
                <input type="button" value="/" class="btn--calc">
                <input type="button" value="7">
                <input type="button" value="8">
                <input type="button" value="9">
                <input type="button" value="x" class="btn--calc">
                <input type="button" value="4">
                <input type="button" value="5">
                <input type="button" value="6">
                <input type="button" value="-" class="btn--calc">
                <input type="button" value="1">
                <input type="button" value="2">
                <input type="button" value="3">
                <input type="button" value="+" class="btn--calc">
                <input type="button" value="0" style="grid-column: 1/3">
                <input type="button" value=".">
                <input type="submit" value="=" class="btn--calc">
            </div>
        </div>
    </form>
</body>
<script>
var calc = document.querySelector("form");
var numButtons = document.querySelectorAll("input[type='button']");
var calcCurrentNum = document.querySelector(".calc--currentNum");
var firstNum = document.querySelector("#firstNum");
var secondNum = document.querySelector("#secondNum");
var operator = document.querySelector("#operator");

numButtons.forEach((numButton) => {
    numButton.onclick = function() {
        switch (numButton.value) {
            case '+':
            case '-':
            case 'x':
            case '/':
                operator.value = numButton.value;
                calcCurrentNum.value += numButton.value;
                break;
            default:
                if (operator.value) {
                    secondNum.value += numButton.value;
                    calcCurrentNum.value += numButton.value;

                } else {
                    firstNum.value += numButton.value;
                    calcCurrentNum.value += numButton.value;
                }
                break;
        }
    }
})
</script>

</html>