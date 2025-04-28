<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Sessions Example</title>
</head>
<body>
    <?php
    session_start(); // Start the session

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = 'JaneDoe'; // Set session variable
        echo "Session 'user' is set!<br>";
    } else {
        echo "Hello, " . $_SESSION['user'] . "! Welcome back!<br>";
    }
    ?>
</body>
</html>
