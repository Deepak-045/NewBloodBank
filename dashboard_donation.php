<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: Sign_in.html");
    exit();
}

include('db.php'); 

// Fetch total number of donations
/*$donationsQuery = "SELECT COUNT(*) AS total_donations FROM donations"; // Adjust the table name if necessary
$donationsResult = $conn->query($donationsQuery);
$donationsData = $donationsResult->fetch_assoc();
$totalDonations = $donationsData['total_donations'];

// Fetch details of donations (e.g., donor, blood group, date)
$donationDetailsQuery = "SELECT donor_name, blood_group, donation_date FROM donations"; // Adjust the table and fields as needed
$donationDetailsResult = $conn->query($donationDetailsQuery);*/
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Donation | Blood Circle</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="script.js">
    </head>
    <body>
        <!-- Header Section -->
        <header class="header">
            <div class="header-content">
                <h1 class="title">Blood Circle</h1>
            </div>
            <a href="logout.php">
                <button class="logout-button">
                    Logout <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </a>
        </header>
        
        <!-- Main Container -->
        <div class="container">
            <!-- Sidebar Navigation -->
            <aside class="sidebar">
                <nav class="nav">
                    <ul>
                        <!-- Home Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                            <a href="dashboard.php">
                                <i class="fa-solid fa-house"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <!-- Donor Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'b_donor.php' ? 'active' : ''; ?>">
                            <a href="b_donor.php">
                                <i class="fa-solid fa-user"></i>
                                <span>Donor</span>
                            </a>
                        </li>

                        <!-- Patient Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_patient.php' ? 'active' : ''; ?>">
                            <a href="dashboard_patient.php">
                                <i class="fa-regular fa-user"></i>
                                <span>Patient</span>
                            </a>
                        </li>

                        <!-- Donation Link (Active) -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_donation.php' ? 'active' : ''; ?>">
                            <a href="dashboard_donation.php">
                                <i class="fa-solid fa-retweet"></i>
                                <span>Donation</span>
                            </a>
                        </li>

                        <!-- Blood Request Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_blood_request.php' ? 'active' : ''; ?>">
                            <a href="dashboard_blood_request.php">
                                <i class="fa-regular fa-clock"></i>
                                <span>Blood Request</span>
                            </a>
                        </li>

                        <!-- Blood History Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_blood_history.php' ? 'active' : ''; ?>">
                            <a href="dashboard_blood_history.php">
                                <i class="fa-solid fa-bell"></i>
                                <span>Blood History</span>
                            </a>
                        </li>

                        <!-- Blood Stock Link -->
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_blood_stock.php' ? 'active' : ''; ?>">
                            <a href="dashboard_blood_stock.php">
                                <i class="fa-solid fa-boxes-stacked"></i>
                                <span>Blood Stock</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content Section -->
            <main class="main-content">
                <h2>Donation Management</h2>
                <div class="grid mt-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Donations</span>
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="card-value"><?php //echo $totalDonations;// ?></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Donation Details</span>
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <div class="card-value">
                            <?php
                            /*if ($donationDetailsResult->num_rows > 0) {
                                while($donation = $donationDetailsResult->fetch_assoc()) {
                                    echo "
                                        <div class='donation-info'>
                                            <p><strong>Donor Name:</strong> " . $donation['donor_name'] . "</p>
                                            <p><strong>Blood Group:</strong> " . $donation['blood_group'] . "</p>
                                            <p><strong>Donation Date:</strong> " . $donation['donation_date'] . "</p>
                                        </div>
                                        <hr>";
                                }
                            } else {
                                echo "No donation data found.";
                            }*/
                            ?>
                        </div>
                    </div>
                </div>
            </main>            
        </div>
    </body>
</html>
