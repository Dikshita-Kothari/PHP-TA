<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Cookies Example</title>
</head>
<body>
    <?php
    // Set a cookie
    if (!isset($_COOKIE['user'])) {
        setcookie('user', 'JohnDoe', time() + (86400 * 30), "/"); // 30 days
        echo "Cookie 'user' is set!<br>";
    } else {
        echo "Welcome back, " . $_COOKIE['user'] . "!<br>";
    }
    ?>
</body>
</html>
