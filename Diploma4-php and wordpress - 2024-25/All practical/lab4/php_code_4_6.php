<?php
$nums = [3, 5, 10, 15, 20];
$sum = 0;
foreach ($nums as $num)
    if ($num % 3 == 0 || $num % 5 == 0)
        $sum += $num;
echo "Sum: $sum";
?>