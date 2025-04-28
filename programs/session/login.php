<?php
    header("Cache-Control:no-store,no-cache,must-revalidat");
?>

<!--the code flow
    login > home > about > logout > login
-->
<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <h1>Login to my website</h1>
        <form method="post">
            <input type="text" name="username" placeholder="username" required><br>
            <input type="password" name="password" placeholder="password" required><br>
            <input type="submit" name="submit" value="login">
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                $_SESSION['username']=$_POST['username'];
                $_SESSION['password']=$_POST['password'];
                header("location:home.php");
            }
        ?>
    </body>
</html>