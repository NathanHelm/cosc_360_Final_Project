<?php 
    require_once 'config.php';
    
    try{
        $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();

        if($res = $stmt->fetch()){
            //start a session here;
            if(password_verify($password, $res['password'])){
                header("Location: ./home.html");
            } else {
                echo "Invalid password";
                sleep(2);
                header("Location: ./login.html");
                exit;
            }

        } else {
            echo "Invalid username";
            sleep(2);
            header("Location: ./home.html");
            exit;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        sleep(2);
        header("Location: ./home.html");
        exit;
    }
?>