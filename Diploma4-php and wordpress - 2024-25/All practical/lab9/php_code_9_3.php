<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with Cookie</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Static username and password
        if ($username === 'admin' && $password === '1234') {
            setcookie('logged_in', $username, time() + (86400), "/");
            echo "Login successful!<br>";
        } else {
            echo "Invalid credentials!<br>";
        }
    } elseif (isset($_COOKIE['logged_in'])) {
        echo "Welcome back, " . $_COOKIE['logged_in'] . "!<br>";
    }
    ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
