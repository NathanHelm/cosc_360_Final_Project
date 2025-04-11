<?php
session_start();              

session_unset();              
session_destroy();            

require_once '../../config.php';    
$pdo = null;                 

header("Location: login.php"); 
exit;
?>