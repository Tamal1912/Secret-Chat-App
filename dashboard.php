<?php
session_start();
include_once 'conn.php';


if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}


$query = "SELECT * FROM messages ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages Dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>


<div class="container dashboard">

    <h2> Messages</h2>
    <?php while ($row = mysqli_fetch_array($result)): ?>
        <div class="message-box" style="background-color:#caf0f8;">
            <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
        </div>
    <?php endwhile; ?>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>


</body>
</html>
