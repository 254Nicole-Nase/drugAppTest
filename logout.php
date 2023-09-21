<?php
session_start(); // Start the session

// Check if the user is logged in (You can modify this check as per your authentication logic)
if (isset($_SESSION['admin_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page
    header("Location: index.php"); 
    exit();
} else {
    // If the user is not logged in, you can handle this case accordingly
    echo "You are not logged in.";
}
?>
