<?php
$nums = [1, 2, 3, 4, 5];
$even = $odd = 0;
foreach ($nums as $num)
    $num % 2 == 0 ? $even++ : $odd++;
echo "Even: $even, Odd: $odd";
?>