<?php
session_start();
require_once '../../config.php'; 


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];


$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

try {
    
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

    
    header("Location: profile.php");
    exit();

} catch (PDOException $e) {
    echo "Error updating profile: " . $e->getMessage();
    
}
?>
