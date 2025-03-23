<?php
session_start();
require_once 'config.php'; // adjust path as needed

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Sanitize & get form inputs
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

try {
    // Build SQL dynamically based on whether password is set
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET username = :username, email = :email, password = :password WHERE user_id = :id";
    } else {
        $sql = "UPDATE user SET username = :username, email = :email WHERE user_id = :id";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    
    if (!empty($password)) {
        $stmt->bindParam(':password', $hashedPassword);
    }

    $stmt->execute();
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    // Redirect back to profile or success page
    header("Location: profile.php");
    exit();

} catch (PDOException $e) {
    echo "Error updating profile: " . $e->getMessage();
    // Optionally log error in production
}
?>
