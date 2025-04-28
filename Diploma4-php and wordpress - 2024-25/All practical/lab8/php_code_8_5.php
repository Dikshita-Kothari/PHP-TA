<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
</head>
<body>
    <h2>Enter Employee Details</h2>
    <form method="POST" action="">
        <label for="empno">Employee Number:</label>
        <input type="text" id="empno" name="empno" required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" required><br><br>
        <button type="submit" name="save">Save Employee</button>
    </form>

    <?php
    $file = "employee.txt";

    if (isset($_POST['save'])) {
        $empno = $_POST['empno'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];

        $data = "EmpNo: $empno, Name: $name, Gender: $gender, Mobile: $mobile\n";

        file_put_contents($file, $data, FILE_APPEND);
        echo "<p style='color: green;'>Employee data saved successfully in 'employee.txt'.</p>";
    }

    echo "<h2>Employee Data:</h2>";
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo "<pre>$content</pre>";
    } else {
        echo "<p style='color: red;'>No employee data available.</p>";
    }
    ?>
</body>
</html>
