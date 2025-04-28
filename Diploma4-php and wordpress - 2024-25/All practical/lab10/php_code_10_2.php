<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Account Data</title>
</head>
<body>
    <h2>Bank Account Details</h2>
    <table border="1">
        <tr>
            <th>Account Number</th>
            <th>Balance</th>
            <th>Branch</th>
        </tr>
        <?php
        function connectDB() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bank";
            return mysqli_connect($servername, $username, $password, $dbname);
        }

        function fetchAccountData($conn) {
            $sql = "SELECT * FROM Account";
            return mysqli_query($conn, $sql);
        }

        $conn = connectDB();
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = fetchAccountData($conn);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['AccountNumber']}</td>
                        <td>{$row['Balance']}</td>
                        <td>{$row['Branch']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
