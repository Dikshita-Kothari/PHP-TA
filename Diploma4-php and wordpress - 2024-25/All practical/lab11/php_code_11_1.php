<!-- CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    department VARCHAR(50) NOT NULL
);
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD with Prepared Statements</title>
</head>
<body>
    <h2>CRUD Operations on Students Table</h2>

    <?php
    // Database connection function
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school"; // Replace with your database name
        return mysqli_connect($servername, $username, $password, $dbname);
    }

    // Insert student record
    function insertStudent($conn, $name, $age, $department) {
        $stmt = mysqli_prepare($conn, "INSERT INTO students (name, age, department) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sis", $name, $age, $department);
        if (mysqli_stmt_execute($stmt)) {
            echo "Student added successfully!<br>";
        } else {
            echo "Error adding student: " . mysqli_error($conn) . "<br>";
        }
        mysqli_stmt_close($stmt);
    }

    // Update student record
    function updateStudent($conn, $id, $name, $age, $department) {
        $stmt = mysqli_prepare($conn, "UPDATE students SET name = ?, age = ?, department = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sisi", $name, $age, $department, $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Student updated successfully!<br>";
        } else {
            echo "Error updating student: " . mysqli_error($conn) . "<br>";
        }
        mysqli_stmt_close($stmt);
    }

    // Delete student record
    function deleteStudent($conn, $id) {
        $stmt = mysqli_prepare($conn, "DELETE FROM students WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Student deleted successfully!<br>";
        } else {
            echo "Error deleting student: " . mysqli_error($conn) . "<br>";
        }
        mysqli_stmt_close($stmt);
    }

    // Fetch and display all students
    function fetchStudents($conn) {
        $stmt = mysqli_prepare($conn, "SELECT * FROM students");
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Department</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['department']}</td>
                  </tr>";
        }
        echo "</table>";
        mysqli_stmt_close($stmt);
    }

    $conn = connectDB();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handling form submissions
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'];
        if ($action == 'insert') {
            insertStudent($conn, $_POST['name'], $_POST['age'], $_POST['department']);
        } elseif ($action == 'update') {
            updateStudent($conn, $_POST['id'], $_POST['name'], $_POST['age'], $_POST['department']);
        } elseif ($action == 'delete') {
            deleteStudent($conn, $_POST['id']);
        }
    }

    fetchStudents($conn);
    mysqli_close($conn);
    ?>

    <h3>Insert/Update/Delete Student</h3>
    <form method="POST">
        <label for="id">ID (for Update/Delete):</label>
        <input type="number" name="id" id="id"><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" required><br>
        <button type="submit" name="action" value="insert">Insert</button>
        <button type="submit" name="action" value="update">Update</button>
        <button type="submit" name="action" value="delete">Delete</button>
    </form>
</body>
</html>
