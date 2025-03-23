<?php 
define('DB_CONNSTR', 'mysql:host=localhost;dbname=cost'); // Corrected the connection string
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>