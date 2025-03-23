<?php
session_start();              // Start the session if not already started

session_unset();              // Unset all session variables
session_destroy();            // Destroy the session

require_once 'config.php';    // Include the config file to access the $pdo variable
$pdo = null;                  // Close the database connection

header("Location: login.php"); // Redirect to login page (or home.html)
exit;
?>