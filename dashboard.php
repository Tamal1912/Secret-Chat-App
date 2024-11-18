<?php
session_start();
require_once 'conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Fetch messages from the database
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
    <a href="logout.php" class="logout-btn">Logout</a>
    <h2>Public Messages</h2>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="message-box">
            <p><strong>Message:</strong> <?php echo htmlspecialchars($row['message']); ?></p>
            <p><strong>IP Address:</strong> <?php echo htmlspecialchars($row['ip_address']); ?></p>
            <p><strong>MAC Address:</strong> <?php echo htmlspecialchars($row['mac_address']); ?></p>
        </div>
    <?php endwhile; ?>
</div>


</body>
</html>
