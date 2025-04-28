<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name must contain only letters and spaces.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate course
    if (empty($course)) {
        $errors[] = "Course is required.";
    }

    // Display errors or success message
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        echo "<p style='color: green;'>Registration successful!</p>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Course: $course</p>";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form action="controller.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <label for="gender">Gender:</label><br>
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label><br><br>

    <label for="subjects">Select Subjects:</label><br>
    <input type="checkbox" name="subjects[]" value="Mathematics">Mathematics<br>
    <input type="checkbox" name="subjects[]" value="Science">Science<br>
    <input type="checkbox" name="subjects[]" value="History">History<br>
    <input type="checkbox" name="subjects[]" value="Art">Art<br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Submit">
</form>
<?php
// Using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $subjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];

    echo "<h3>Data Retrieved Using POST Method:</h3>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Age: " . htmlspecialchars($age) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Subjects: " . implode(', ', array_map('htmlspecialchars', $subjects)) . "<br><br>";
}

// Using GET method
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $age = isset($_GET['age']) ? $_GET['age'] : '';
    $gender = isset($_GET['gender']) ? $_GET['gender'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $subjects = isset($_GET['subjects']) ? $_GET['subjects'] : [];

    echo "<h3>Data Retrieved Using GET Method:</h3>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Age: " . htmlspecialchars($age) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Subjects: " . implode(', ', array_map('htmlspecialchars', $subjects)) . "<br><br>";
}

// Using REQUEST method (it handles both GET and POST)
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$age = isset($_REQUEST['age']) ? $_REQUEST['age'] : '';
$gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$subjects = isset($_REQUEST['subjects']) ? $_REQUEST['subjects'] : [];

echo "<h3>Data Retrieved Using REQUEST Method:</h3>";
echo "Name: " . htmlspecialchars($name) . "<br>";
echo "Age: " . htmlspecialchars($age) . "<br>";
echo "Gender: " . htmlspecialchars($gender) . "<br>";
echo "Email: " . htmlspecialchars($email) . "<br>";
echo "Subjects: " . implode(', ', array_map('htmlspecialchars', $subjects)) . "<br>";
?>


</body>
</html>

