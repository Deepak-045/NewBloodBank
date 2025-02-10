<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT admin_id, password_hash FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["admin_id"] = $id;
            echo "success";  // Send success response to JavaScript
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No admin found";
    }
    $stmt->close();
}
$conn->close();
?>
