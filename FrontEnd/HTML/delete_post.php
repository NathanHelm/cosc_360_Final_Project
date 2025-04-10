<?php
session_start();
require_once '../../config.php';


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Access denied. Admins only.'); window.location.href = 'login.php';</script>";
    exit;
}


if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    echo "<script>alert('Invalid product ID.'); window.location.href = 'admin_dashboard.php';</script>";
    exit;
}

$postId = (int)$_GET['post_id'];

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $pdo->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->execute([$postId]);

    
    header("Location: admin.php");
    exit;

} catch (PDOException $e) {
    echo "Error deleting post: " . $e->getMessage();
    exit;
}
