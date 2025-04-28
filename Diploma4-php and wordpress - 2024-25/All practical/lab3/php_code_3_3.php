<?php
$num1 = 10;
$num2 = 5;
$operator = '+';
switch ($operator) {
    case '+':
        echo $num1 + $num2;
        break;
    case '-':
        echo $num1 - $num2;
        break;
    case '*':
        echo $num1 * $num2;
        break;
    case '/':
        echo ($num2 != 0) ? $num1 / $num2 : "Division by zero";
        break;
    default:
        echo "Invalid operator";
}
?>