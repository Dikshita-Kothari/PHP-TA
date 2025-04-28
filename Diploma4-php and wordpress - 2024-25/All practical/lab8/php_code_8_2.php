<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
</head>
<body>
    <h2>Change Profile Picture</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="profile">Upload Profile Picture:</label><br>
        <input type="file" name="profile" required><br><br>
        <button type="submit" name="update">Update Picture</button>
    </form>
    <?php
    $profile_picture = "default.jpg";
    if (isset($_POST['update'])) {
        $target_dir = "profile_pictures/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["profile"]["name"]);
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            $profile_picture = $target_file;
            echo "<p style='color: green;'>Profile picture updated successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error updating profile picture.</p>";
        }
    }
    echo "<h3>Current Profile Picture:</h3>";
    echo "<img src='$profile_picture' alt='Profile Picture' width='150' height='150'>";
    ?>
</body>
</html>
