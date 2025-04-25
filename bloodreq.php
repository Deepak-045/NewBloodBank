<?php
session_start();
include 'db.php'; // Database connection

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

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

    if (!preg_match("/^[0-9]{10}$/", $contactNo)) {
        die("Error: Invalid contact number.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO requests (patient_name, hospital_name, medical_case, location, blood_group, units_needed, contact_no) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $patientName, $hospitalName, $medicalCase, $location, $bloodGroup, $unitsNeeded, $contactNo);

    if ($stmt->execute()) {
        // Fetch all admin emails
        $adminEmails = [];
        $result = $conn->query("SELECT username FROM admins");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $adminEmails[] = $row['username'];
            }
        }

        // Send email if admins exist
        if (!empty($adminEmails)) {
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'anildazlerbgr70799@gmail.com'; // Gmail
                $mail->Password   = 'neep hbor acwy ddry';   // Gmail App Password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Sender info
                $mail->setFrom('anildazlerbgr70799@gmail.com', 'Blood Bank System');

                // Add all admin recipients
                foreach ($adminEmails as $username) {
                    $mail->addAddress($username);
                }

                // Email content
                $mail->isHTML(false);
                $mail->Subject = 'New Blood Request Submitted';
                $mail->Body    = "A new blood request has been submitted:\n\n"
                               . "Patient Name: $patientName\n"
                               . "Hospital: $hospitalName\n"
                               . "Medical Case: $medicalCase\n"
                               . "Location: $location\n"
                               . "Blood Group: $bloodGroup\n"
                               . "Units Needed: $unitsNeeded\n"
                               . "Contact No: $contactNo\n";

                $mail->send();
            } catch (Exception $e) {
                // Optional: Log or show mail error
                error_log("Mailer Error: " . $mail->ErrorInfo);
            }
        }

        // Redirect after email is sent
        header("Location: blood_request_success.php");
        exit();
    } else {
        die("Error inserting request: " . $stmt->error);
    }

    // Close DB stuff
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>
