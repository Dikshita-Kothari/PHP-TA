<?php
function isPrimeRecursive($n, $i = 2)
{
    if ($n <= 2)
        return ($n == 2) ? 1 : 0;
    if ($n % $i == 0)
        return 0;
    if ($i * $i > $n)
        return 1;
    return isPrimeRecursive($n, $i + 1);
}
echo isPrimeRecursive(11) ? "Prime" : "Not Prime";
?>