<?php 
define('DB_CONNSTR', 'mysql:host=localhost;dbname=mmridul'); // Corrected the connection string
define('DB_USERNAME', 'mmridul');
define('DB_PASSWORD', 'mmridul');

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->query("use mmridul");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>