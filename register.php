<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['yourname'];
    $father_name = $_POST['fname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['Gender'];
    $address = $_POST['youraddress'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $pin = $_POST['PINcode'];
    $blood_group = $_POST['bloodGroup'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $last_donation_date = $_POST['lastDonationDate'] ?? NULL;
    $has_donated = $_POST['D'];

    // Prepare SQL query
    $sql = "INSERT INTO donorreg
        (name, father_name, birthdate, gender, address, state, district, pin, blood_group, password, has_donated, last_donation_date) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssisssd", 
        $name, $father_name, $birthdate, $gender, $address, $state, $district, $pin, $blood_group, $password, $last_donation_date, $has_donated
    );

    // Execute statement
    if ($stmt->execute()) {
        echo "Donor registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
