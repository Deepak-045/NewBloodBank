<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Here, you should compare the password with stored password (hashed in a real-world application)
    $result = $conn->query("SELECT * FROM donors WHERE email = '$email'");

    if ($result->num_rows > 0) {
        // Simulating successful login
        echo "Welcome back, " . $email;
    } else {
        echo "Invalid credentials.";
    }
}
?>
