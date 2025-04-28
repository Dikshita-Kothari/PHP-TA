<?php
function isPrime($n)
{
    if ($n <= 1)
        return 0;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0)
            return 0;
    }
    return 1;
}
echo isPrime(11) ? "Prime" : "Not Prime";
?>