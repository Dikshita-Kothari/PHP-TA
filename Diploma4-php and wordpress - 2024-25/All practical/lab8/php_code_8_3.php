<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Students</title>
</head>
<body>
    <h2>Enter Student Names</h2>
    <form method="POST" action="">
        <textarea name="names" rows="5" cols="30" placeholder="Enter names separated by new lines" required></textarea><br><br>
        <button type="submit" name="save">Save Names</button>
    </form>
    <?php
    if (isset($_POST['save'])) {
        $names = $_POST['names'];
        file_put_contents("students.txt", $names);
        echo "<p style='color: green;'>Student names saved in 'students.txt'.</p>";
    }
    ?>
</body>
</html>
