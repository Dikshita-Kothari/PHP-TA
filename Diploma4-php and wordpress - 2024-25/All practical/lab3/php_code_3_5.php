<?php
$letter = 'a';
if (in_array(strtolower($letter), ['a', 'e', 'i', 'o', 'u']))
    echo "Vowel";
else
    echo "Consonant";
?>