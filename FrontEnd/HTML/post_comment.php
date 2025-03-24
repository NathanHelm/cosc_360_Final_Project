<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['username']) || empty($_POST['comment'])) {
    exit("Unauthorized or empty comment.");
}

$username = $_SESSION['username'];
$comment = trim($_POST['comment']);
$productId = (int)$_POST['product_id'];

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $stmt = $pdo->prepare("INSERT INTO comments (username, comment, product_id, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$username, $comment, $productId]);
    echo "success";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
