<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Students</title>
</head>
<body>
    <h2>Student Names</h2>
    <?php
    $filename = "students.txt";
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo "<pre>$content</pre>";
    } else {
        echo "<p style='color: red;'>File 'students.txt' does not exist.</p>";
    }
    ?>
</body>
</html>
