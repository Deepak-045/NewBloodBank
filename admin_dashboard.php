<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: index.html");
    exit();
}
echo "<h1>Welcome, Admin</h1>";
?>
<a href="logout.php">Logout</a>
