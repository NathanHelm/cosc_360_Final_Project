<?php 
    require_once 'config.php';
    
    try{
        $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = pdo->quote($_POST['username']);
        $password = pdo->quote($_POST['password']);
        $sql = "";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        if($res = $stmt->fetch()){
            if($res['password'] == $password){
                header("Location: ./home.php");
            } else {
                echo "Invalid password";
                sleep(2);
                header("Location: ./login.php");
            }

        } else {
            echo "Invalid username";
            sleep(2);
            header("Location: ./home.php");
        }
    }catch(PDOException $e){
        header("Location: ./home.php");
    }
?>