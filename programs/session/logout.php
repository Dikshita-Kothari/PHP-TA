<?php
    header("Cache-Control:no-store,no-cache,must-revalidat");
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    else{
        if(session_destroy()){
            header("location:login.php");
        }
    }
?>