<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Admin access only.'); window.location.href = 'login.php';</script>";
    exit();
}

require_once 'config.php';

if (!isset($_GET['id']) || !isset($_GET['status'])) {
    echo "Invalid request.";
    exit();
}

$userId = (int)$_GET['id'];
$newStatus = (int)$_GET['status']; // 0 = inactive, 1 = active

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("UPDATE user SET isActive = :status WHERE user_id = :id");
    $stmt->bindParam(':status', $newStatus, PDO::PARAM_INT);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: admin.php");
    exit();

} catch (PDOException $e) {
    echo "Error updating user: " . $e->getMessage();
}
?>
