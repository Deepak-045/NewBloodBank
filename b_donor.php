<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: Sign_in.html");
    exit();
}

include('db.php');

// Fetch the list of all donors from the database
$sql = "SELECT * FROM donorreg";
$result = $conn->query($sql);

// Create an array to hold donor data
$donorsData = array();

if ($result->num_rows > 0) {
    // Fetch data row by row
    while ($row = $result->fetch_assoc()) {
        $donorsData[] = $row;
    }
} else {
    echo "No donors found.";
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donor Management | Blood Circle</title>
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
                        
                        <!-- Donor Link (Active) -->
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

            <!-- Main Content Section -->
            <main class="main-content">
                <h2>Donor Management</h2>
                <div class="donor-table">
                    <table>
                        <thead>
                            <tr>
                            
                                <th>Name</th>
                                <th>Email</th>
                                <th>Blood Group</th>
                               <!-- <th>Phone Number</th>-->
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($donorsData as $donor) {
                                echo "<tr>";
                                
                                echo "<td>" . $donor['NAME'] . "</td>";
                                echo "<td>" . $donor['email'] . "</td>";
                                echo "<td>" . $donor['blood_group'] . "</td>";
                               // echo "<td>" . $donor['phone_number'] . "</td>";
                                echo "<td>" . $donor['address'] . "</td>";
                               /* echo "<td>
                                        <a href='edit_donor.php?donor_id=" . $donor['donor_id'] . "'><i class='fa-solid fa-edit'></i> Edit</a> |
                                        <a href='delete_donor.php?donor_id=" . $donor['donor_id'] . "'><i class='fa-solid fa-trash'></i> Delete</a>
                                      </td>";*/
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>
