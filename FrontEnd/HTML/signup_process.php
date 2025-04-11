<?php 
require_once '../../config.php';
//making a basic connection to database
try{
   
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->query("use test_db"); //for some reason, this code is nessecary to make proper connection on my end :/ 

    $username = $_POST['username'];
    $password = $_POST['password'];
    $userImage = $_FILES['user_image']['name'];
    $email = $_POST['email'];

  
    if(!isset($username) || !isset($password) || !isset($email) || !isset($userImage))
    {
        echo "reading null values";
        exit;
      //  header("location: signup.php"); //some internal error, this should not happen after js validation.
    }
    $sql = "select * from user where username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    
    if(IsDuplicateUsername(count($rows)))
    {
        
        header("location: signup.php?duplicate=true");
        exit;
    }
    if(!AddUserImageToFolder())
    {
        
        header("location: signup.php?uploadErr=true");
        exit;

    }

    //insert values
    $password = HashPassword($password);

    $sql = "INSERT INTO user (username, password, user_image, role, isActive, email) 
    VALUES(:username, :password, :userImage, 'user', 1, :email)";
    
    /*"INSERT INTO user (username, password, user_image, role, isActive, email) 
    VALUES($username, $password, $userImage, 'user', 1, $email)";*/

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":username", $username);
    $stmt->bindValue(":password", $password);
    $stmt->bindValue(":userImage", $userImage);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    
    
    session_start();

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['user_image'] = $userImage;

   

    header("location: profile.php");
    $pdo = null;
}
catch(PDOException $e)
{
    echo "Database error: " . $e->getMessage();
    exit();
}

function IsDuplicateUsername($rowCount)
{
    if($rowCount > 0)
    {
        return true;
    }
    return false;

}
function HashPassword($password)
{
    $hash = password_hash($password, 
    PASSWORD_DEFAULT);
    return $hash;
}
function AddUserImageToFolder()
{
    $userImage = $_FILES['user_image']['name'];
    if(!isset($userImage))
    {
        echo "null";
        return false;
    }
    if(empty($userImage))
    {
        echo "empty";
        return false;
    }
    if($_FILES['user_image']['error'] !== UPLOAD_ERR_OK)
    {
        return false;
    }
    if(!file_exists(USER_IMAGE_PATH))
    {
        echo "file does not exist"; 
        return false;
    }
    if (!is_uploaded_file($_FILES['user_image']['tmp_name'])) {
        echo "Not a valid uploaded file.";
        return false;
    }
    if (!is_writable(USER_IMAGE_PATH)) {
        echo "Destination directory is not writable.";
        return false;
    }
   
    if(move_uploaded_file($_FILES['user_image']['tmp_name'], USER_IMAGE_PATH . $userImage))
    {
        echo "file successfully uploaded";
        return true;
    }
    else
    {
        
        return false;
    }
    
}

 
?>