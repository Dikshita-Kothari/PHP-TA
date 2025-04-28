<?php
function sumOfN($n)
{
    return ($n == 0) ? 0 : $n + sumOfN($n - 1);
}
echo sumOfN(10);
?>