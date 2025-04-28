<?php
$multi = [["name" => "John", "age" => 25], ["name" => "Jane", "age" => 28]];
foreach ($multi as $person)
    echo $person["name"] . " is " . $person["age"] . " years old. ";
?>