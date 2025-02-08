<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['yourname'];
    $fname = $_POST['fname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['Gender'];
    $address = $_POST['youraddress'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $pin = $_POST['PINcode'];
    $bloodGroup = $_POST['bloodGroup'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password for security
    $lastDonationDate = isset($_POST['lastDonationDate']) ? $_POST['lastDonationDate'] : NULL;

    $sql = "INSERT INTO donorreg (name, father_name, birthdate, gender, address, state, district, pin, blood_group, email, password, last_donation_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssissss", $name, $fname, $birthdate, $gender, $address, $state, $district, $pin, $bloodGroup, $email, $password, $lastDonationDate);
    
    if ($stmt->execute()) {
        header("Location: success.php"); // Redirect to success page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
