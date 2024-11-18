<?php
session_start();
include_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];

    // Get IP Address
    $ip_address = $_SERVER['REMOTE_ADDR'];



    $query = "INSERT INTO messages (message, ip_address, mac_address) VALUES ('$message', '$ip_address', '$mac_address')";
    if (mysqli_query($conn, $query)) {

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Message</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <h2>Post a Message</h2>
    <form method="POST">
        <textarea name="message" placeholder="Type your message..." required></textarea>
        <button type="submit">Post Message</button>
        <button type="submit" style="margin-top: 10px" ><a href="login.php" style="list-style: none;color: #fff;">Login</a> </button>
    </form>
</div>


</body>
</html>
