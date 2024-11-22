<?php
session_start();
include_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];



    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_array($result);
        $hashed_password = $user['password'];

        if(password_verify($password, $hashed_password)) {
            echo "<script>alert('Login Successful');</script>";
            $_SESSION['user_id'] = $username;
            header("Location: dashboard.php");
        exit;
        }else {
            echo "<script>alert('Invalid Password');</script>";
        }
    }else{
        echo "<script>alert('Username Not Found')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Don't have an account? Register here</a>
</div>


</body>
</html>
