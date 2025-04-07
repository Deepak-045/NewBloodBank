<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: Sign_in.html");
    exit();
}

include('db.php');

$sql = "SELECT * FROM blood_inventory";
$result = $conn->query($sql);

// Create an array to hold blood data
$bloodData = array();

if ($result->num_rows > 0) {
    // Fetch data row by row
    while($row = $result->fetch_assoc()) {
        $bloodData[$row['blood_group']] = $row['quantity'];
    }
} else {
    echo "0 results";
}

// Fetch total number of donors
$donorsQuery = "SELECT COUNT(*) AS total_donors FROM donorreg"; 
$donorsResult = $conn->query($donorsQuery);
$donorsData = $donorsResult->fetch_assoc();
$totalDonors = $donorsData['total_donors'];

// Fetch total number of requests
$requestsQuery = "SELECT COUNT(*) AS total_requests FROM requests"; 
$requestsResult = $conn->query($requestsQuery);
$requestsData = $requestsResult->fetch_assoc();
$totalRequests = $requestsData['total_requests'];

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Blood Circle</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="script.js">
    </head>
    <body>
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
        <div class="container">
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
            <main class="main-content">
                <div class="grid">
                <?php
                $bloodTypes = ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'];
                foreach ($bloodTypes as $bloodType) {
                    $stock = isset($bloodData[$bloodType]) ? $bloodData[$bloodType] : 0;
                    echo "
                    <div class='card'>
                        <div class='card-header'>
                            <span class='card-title'>$bloodType</span>
                            <i class='fa-solid fa-droplet' style='color: #ff0000;'></i>
                        </div>
                        <div class='card-value'>$stock</div>
                    </div>";
                }
                ?>
                </div>
                <div class="grid mt-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Donors</span>
                            <i class="fa-thin fa-people-group"></i>
                        </div>
                        <div class="card-value"><?php echo $totalDonors; ?></div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Requests</span>
                            <i class="fa-light fa-clock-rotate-left"></i>
                        </div>
                        <div class="card-value"><?php echo $totalRequests; ?></div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Approved Requests</span>
                            <i class="fa-solid fa-person-circle-check"></i>
                        </div>
                        <div class="card-value">2</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Blood Unit (in ml)</span>
                            <i class="fa-solid fa-droplet" style="color: #f4014a;"></i>
                        </div>
                        <div class="card-value">3</div>
                    </div>
                </div>
            </main>            
        </div>  
    </body>
</html>
