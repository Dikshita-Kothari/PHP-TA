<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account Table</title>
</head>
<body>
    <?php
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bank";
        return mysqli_connect($servername, $username, $password, $dbname);
    }

    function createAccountTable($conn) {
        $sql = "CREATE TABLE IF NOT EXISTS Account (
            AccountNumber INT PRIMARY KEY,
            Balance FLOAT NOT NULL,
            Branch VARCHAR(50) NOT NULL
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table 'Account' created successfully!<br>";
        } else {
            echo "Error creating table: " . mysqli_error($conn) . "<br>";
        }
    }

    $conn = connectDB();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    createAccountTable($conn);
    mysqli_close($conn);
    ?>
</body>
</html>
