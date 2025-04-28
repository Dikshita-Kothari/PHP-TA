<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET['name'] ?? 'Not provided';
    $email = $_GET['email'] ?? 'Not provided';
    $course = $_GET['course'] ?? 'Not provided';

    echo "<h3>Data Retrieved Using GET Method</h3>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Course: $course</p>";
}

// post
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'] ?? 'Not provided';
//     $email = $_POST['email'] ?? 'Not provided';
//     $course = $_POST['course'] ?? 'Not provided';

//     echo "<h3>Data Retrieved Using POST Method</h3>";
//     echo "<p>Name: $name</p>";
//     echo "<p>Email: $email</p>";
//     echo "<p>Course: $course</p>";
// }

// request

// $name = $_REQUEST['name'] ?? 'Not provided';
// $email = $_REQUEST['email'] ?? 'Not provided';
// $course = $_REQUEST['course'] ?? 'Not provided';

// echo "<h3>Data Retrieved Using REQUEST Method</h3>";
// echo "<p>Name: $name</p>";
// echo "<p>Email: $email</p>";
// echo "<p>Course: $course</p>";




?>

