<?php 
define('DB_CONNSTR', 'mysql:host=localhost;dbname=test_database'); // Corrected the connection string
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('USER_IMAGE_PATH', "../../user_img/"); //path to user img

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->query("use mmridul");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); 
}

?>