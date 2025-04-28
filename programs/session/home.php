<?php
    header("Cache-Control:no-store,no-cache,must-revalidat");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    else{
        echo "welcome ".$_SESSION['username'];
        echo "<a href='logout.php'>logout page</a><br>";
    }
?>