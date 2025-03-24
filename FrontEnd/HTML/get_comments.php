<?php
require_once 'config.php';

$productId = (int)$_GET['product_id'];

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE product_id = ? ORDER BY created_at DESC");
    $stmt->execute([$productId]);
    $comments = $stmt->fetchAll();

    foreach ($comments as $c) {
        echo "<div class='review'>";
        echo "<p>" . htmlspecialchars($c['comment']) . "</p>";
        echo "<div class='productReviewer'>";
        echo "<img src='../Images/blankProfilePic.png' alt='profile pic'>";
        echo "<p><a>" . htmlspecialchars($c['username']) . "</a> - " . $c['created_at'] . "</p>";
        echo "</div></div>";
    }
} catch (PDOException $e) {
    echo "Error loading comments.";
}
