<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .success-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 2px solid green;
            border-radius: 10px;
            background-color: #f2fff2;
        }
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h2>Registration Successful!</h2>
        <p>Thank you for registering as a donor. Your details have been successfully saved.</p>
        <a href="index.html" class="btn">Go Back</a>
    </div>
</body>
</html>