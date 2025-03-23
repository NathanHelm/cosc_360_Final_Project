<?php 
    require_once 'config.php';
    
    try{
        $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        if($res = $stmt->fetch()){
            //start a session here;
            if (password_verify($password, $res['password'])) {
                session_start();
                $_SESSION['username'] = $res['username'];
                $_SESSION['name'] = $res['name'] ?? ''; // fallback if null
                $_SESSION['user_image'] = $res['user_image'];
                $_SESSION['role'] = $res['role'];
                $_SESSION['email'] = $res['email'];
                $_SESSION['isActive'] = $res['is_active'];
                header("Location: ./home.html");
                exit;
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
        pdo = null;
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        sleep(2);
        header("Location: ./home.html");
        exit;
    }
?>