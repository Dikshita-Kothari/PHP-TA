<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Information Form</title>
</head>
<body>
    <h2>Employee Information Form</h2>
    <?php
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "company";
        return mysqli_connect($servername, $username, $password, $dbname);
    }

    function createEmployeeTable($conn) {
        $sql = "CREATE TABLE IF NOT EXISTS Employee (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(100) NOT NULL,
            Age INT NOT NULL,
            Department VARCHAR(50) NOT NULL,
            Salary FLOAT NOT NULL
        )";
        if (!mysqli_query($conn, $sql)) {
            echo "Error creating table: " . mysqli_error($conn) . "<br>";
        }
    }

    function insertEmployeeData($conn, $name, $age, $department, $salary) {
        $stmt = mysqli_prepare($conn, "INSERT INTO Employee (Name, Age, Department, Salary) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sisi", $name, $age, $department, $salary);
        if (mysqli_stmt_execute($stmt)) {
            echo "Employee record added successfully!<br>";
        } else {
            echo "Error: " . mysqli_error($conn) . "<br>";
        }
        mysqli_stmt_close($stmt);
    }

    $conn = connectDB();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    createEmployeeTable($conn);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];

        insertEmployeeData($conn, $name, $age, $department, $salary);
    }

    mysqli_close($conn);
    ?>

    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" required><br>
        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
