<?php 
    require_once 'config.php';
    
    try{
        $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->execute();
        

        if($res = $stmt->fetch()){
            session_start();
           
            if (password_verify($password, $res['password']) || $password == $res['password']) {
                $_SESSION['user_id'] = $res['user_id'];
                $_SESSION['username'] = $res['username'];
                $_SESSION['name'] = $res['name'] ?? ''; // fallback if null
                $_SESSION['user_image'] = $res['user_image'];
                $_SESSION['role'] = $res['role'];
                $_SESSION['email'] = $res['email'];
                $_SESSION['isActive'] = $res['is_active'];

                if ($_SESSION['role'] == 'admin') {
                    $_SESSION['isActive'] = 1;
                    header("Location: ./admin.php");
                    exit;
                } else {
                    header("Location: ./home.html");
                    exit;
                }
                
                
            } else {
                
                echo "Invalid password";
                sleep(2);
                header("Location: ./login.html");
                exit;
            }

        } else {
           
            echo "Invalid username";
            sleep(2);
            header("Location: ./cart.html");
            exit;
        }
        
    }catch(PDOException $e){
        
        echo "Error: " . $e->getMessage();
        sleep(2);
        header("Location: ./signup.html");
        exit;
    }
?>