<?php
session_start();
include 'db.php'; // Database connection

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $patientName = trim($_POST['patientName']);
    $hospitalName = trim($_POST['hospitalName']);
    $medicalCase = trim($_POST['medicalCase']);
    $location = trim($_POST['location']);
    $bloodGroup = $_POST['bloodGroup'];
    $unitsNeeded = $_POST['unitsNeeded'];
    $contactNo = trim($_POST['contactNo']);

    // Validate inputs
    if (empty($patientName) || empty($hospitalName) || empty($medicalCase) || empty($location) ||
        empty($bloodGroup) || empty($unitsNeeded) || empty($contactNo)) {
        die("Error: All fields are required.");
    }

    // Validate phone number (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $contactNo)) {
        die("Error: Invalid contact number.");
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO requests (patient_name, hospital_name, medical_case, location, blood_group, units_needed, contact_no) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssis", $patientName, $hospitalName, $medicalCase, $location, $bloodGroup, $unitsNeeded, $contactNo);

    if ($stmt->execute()) {
        header("Location: blood_request_success.php"); // Redirect to success page
        exit();
    } else {
        die("Error inserting request: " . $stmt->error);
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>