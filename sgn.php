<?php
// Include database connection
include('db.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Sanitize and trim the inputs
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        // Ensure the username is not empty
        if (empty($username) || empty($password)) {
            echo "Username and password cannot be empty.";
            exit;
        }

        // Sanitize the username (for security)
        $username = filter_var($username, FILTER_SANITIZE_STRING);

        // Prepare the SQL query to fetch user data from the database
        $sql = "SELECT admin_id, username, password_hash FROM admins WHERE username = ?";
        
        // Prepare and bind the SQL query
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo "Error preparing SQL query.";
            exit;
        }

        // Bind the parameters
        $stmt->bind_param("s", $username);

        // Execute the query
        $stmt->execute();

        // Bind the result
        $stmt->bind_result($admin_id, $stored_username, $stored_password_hash);

        if ($stmt->fetch()) {
            // Directly compare the entered password with the stored password
            if ($password == $stored_password_hash) {
                // Start a session
                session_start();
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['username'] = $stored_username;

                // Redirect to a dashboard or the admin page
                echo "Welcome, " . htmlspecialchars($stored_username);
                header('Location: dashboard.php'); // Redirect to the admin page or dashboard
                exit;
            } else {
                echo "Invalid credentials.";
            }
        } else {
            echo "No user found with that username.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please provide both username and password.";
    }
} else {
    echo "Invalid request method.";
}
?>
