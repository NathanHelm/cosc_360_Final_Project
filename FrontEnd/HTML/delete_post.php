<?php
session_start();
require_once '';

// 1. Check if user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Access denied. Admins only.'); window.location.href = 'login.php';</script>";
    exit;
}

//2. Validate post_id
if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    echo "<script>alert('Invalid product ID.'); window.location.href = 'admin_dashboard.php';</script>";
    exit;
}

$postId = (int)$_GET['post_id'];

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Delete the product
    $stmt = $pdo->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->execute([$postId]);

    // 4. Redirect back to admin dashboard
    header("Location: admin_dashboard.php?delete=success");
    exit;

} catch (PDOException $e) {
    echo "Error deleting post: " . $e->getMessage();
    exit;
}
