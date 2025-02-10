<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request Submitted</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .container { max-width: 500px; margin: auto; padding: 20px; border: 2px solid green; border-radius: 10px; background-color: #f2fff2; }
        .btn { display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: green; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background-color: darkgreen; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Blood Request Submitted!</h2>
        <p>Your blood request has been successfully recorded. We will contact you soon.</p>
        <a href="index.html" class="btn">Return to Home</a>
    </div>
</body>
</html>
