<?php
function simpleInterest($p, $r, $t)
{
    return ($p * $r * $t) / 100;
}
echo simpleInterest(1000, 5, 2);
?>