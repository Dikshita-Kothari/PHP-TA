<?php
function printPrimes($start, $end)
{
    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i))
            echo "$i ";
    }
}
printPrimes(10, 20);
?>