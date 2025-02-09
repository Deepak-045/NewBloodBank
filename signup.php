<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $blood_type = $_POST['blood_type'];
    $phone = $_POST['phone'];
    $password = $_POST['password']

    $stmt = $conn->prepare("INSERT INTO donors (name, email, blood_type, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $blood_type, $phone, $password);

    if ($stmt->execute()) {
        echo "You have successfully signed up as a blood donor.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
