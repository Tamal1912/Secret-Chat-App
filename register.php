<?php
include_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert user data into database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registration Completed, Now You Can Login')</script>";
        header('Location: login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Enter Username" required><br><br>
    <input type="password" name="password" placeholder="Enter Password" required><br><br>
    <button type="submit">Register</button>

</form>
</div>
</body>
</html>