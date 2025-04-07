<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: Sign_in.html");
    exit();
}

include('db.php');

// Fetch the blood history details (e.g., date of donation, blood group, quantity, etc.)
/*$historyQuery = "SELECT * FROM blood_history ORDER BY donation_date DESC"; 
$historyResult = $conn->query($historyQuery);*/
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Blood History | Blood Circle</title>
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

                        <!-- Donation Link -->
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

                        <!-- Blood History Link (Active) -->
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
                <h2>Blood Donation History</h2>
                <div class="grid mt-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Blood Donation History</span>
                            <i class="fa-solid fa-history"></i>
                        </div>
                        <div class="card-value">
                            <?php
                           /* if ($historyResult->num_rows > 0) {
                                echo "<table class='history-table'>
                                        <thead>
                                            <tr>
                                                <th>Blood Group</th>
                                                <th>Quantity (ml)</th>
                                                <th>Donor Name</th>
                                                <th>Donation Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                while($row = $historyResult->fetch_assoc()) {
                                    echo "
                                    <tr>
                                        <td>" . $row['blood_group'] . "</td>
                                        <td>" . $row['quantity'] . "</td>
                                        <td>" . $row['donor_name'] . "</td>
                                        <td>" . $row['donation_date'] . "</td>
                                    </tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "No blood donation history found.";
                            }*/
                            ?>
                        </div>
                    </div>
                </div>
            </main>            
        </div>
    </body>
</html>
