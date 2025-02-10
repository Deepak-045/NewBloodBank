<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: Sign_in.html");
    exit();
}
?>








<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>
            Blood Circle
        </title>
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
                 Logout  <i class="fa-solid fa-right-from-bracket"></i>
            </button>
            </a>
        </header>
        <div class="conatiner">
            <aside class="sidebar">
                <nav class="nav">
                    <ul>
                        <li class="nav-item active">
                            <i class="fa-solid fa-house"></i>
                            <span>Home</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-user"></i>
                            <span>Donor</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-regular fa-user"></i>
                            <span>patient</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-retweet"></i>
                            <span>Donation</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-regular fa-clock"></i>
                            <span>Blood Request</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-bell"></i>
                            <span>Blood History</span>
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span>Blood Stock</span>
                        </li>
                    </ul>
                </nav>
            </aside>
            <main class="main-content">
                <div class="grid">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">A+</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">B+</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">O+</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">AB+</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">A-</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">B-</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">O-</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">AB-</span>
                            <i class="fa-solid fa-droplet" style="color: #ff0000;"></i>
                        </div>
                        <div class="card-value">1</div>
                    </div>
                </div>
                <div class="grid mt-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Donars</span>
                            <i class="fa-thin fa-people-group"></i>
                        </div>
                        <div class="card-value">3</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Total Requests</span>
                            <i class="fa-light fa-clock-rotate-left"></i>
                        </div>
                        <div class="card-value">3</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Approved Requests</span>
                            <i class="fa-solid fa-person-circle-check"></i>
                        </div>
                        <div class="card-value">3</div>
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
