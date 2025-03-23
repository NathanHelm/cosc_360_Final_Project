<?php 
$duplication = $_GET["duplicate"];
$username = $_SESSION["username"];
if(isset($duplication))
{
  if($duplication == "true")
  {
    echo "<script> alert(\"username $username already taken \" ); </script>";
  }
  
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/headerfooter.css">
</head>
<script type="module" src="../Scripts/signupvalidation.js">
</script>
<body>
  <header>
    <nav>
        <a href="./home.html#home">
            <img src="../Images/homeIcon.png" alt="Home" width="25px" height="25px">
        </a>

        <p class="logo">Mosaic</p>

        <ul>
            <li class="basic"><a href="./home.html#products">Products</a></li>
            <li class="basic"><a href="./createProduct.html">Sell</a></li>
            <li class="basic"><a href="./aboutUs.html">About us</a></li>
            <li class="basic"><a href="./contact.html">Contact</a></li>
            <li><a href="./cart.html"><img src="../Images/cart.png" alt="cart" width="25px" height="25px"></a></li>
            <li><a href="./login.php"><button id="signIn">Sign in</button></a></li>
            <li><a href="./signup.html"><button id="register">Register</button></a></li>
        </ul>
    </nav>
</header>

   <main>
     <div class="flexbox_main">
     <figure class="flexbox_child">
       <img src="../Images/website_mockup_ecomerce/clothing items/shirt_cover.jpg">
     </figure>

     <figure class="flexbox_child">
        <div class="flex_column">
            <h1 class="signup_title">signup</h1>
            
      
                <!--when you click sumbit, you are taken to home page (and you are signed up)-->
                <form method="post" action="./signup_process.php" class="flex_column signup_box">
                    <p>email
                    </p>
                    <input id="email" name="email" type="email" placeholder="enter name here." required/>
                    <br>
                    <p>User Name
                    </p>
                    <input id="username" name="username" type="input" placeholder="enter user-name here." required/>
                    <br>
                    <p>Password</p>
                    <input id="password" name="password" type="input" placeholder="enter password here." required/>
                    <br>
                    <p>Profile Image
                        
                    </p>
                    <input id="user_image" type="file" name="user_image" accept="image/*" required />
                    <br>
                    <p>
                      user error message
                    </p>
                    <br>
                    <button type="submit" class="submit" id="signupbutton">Sign up</button>
                   
                </form>
           
        </div>
      </figure>

      <figure class="flexbox_child">
        <img src="../Images/website_mockup_ecomerce/clothing items/art.jpg">
      </figure>
    </div>

    </main>
    <footer>
      <table>
          <tr>
              <td><a href="./aboutUs.html">About us</a></td>
              <td><a href="./home.html">Home</a></td>
          </tr>

          <tr>
              <td><a href="./contact.html">Contact</a></td>
              <td><a href="./userProfile.html">Profile</a></td>
          </tr>

          <tr>
              <td><a>Terms & Conditions</a></td>
          </tr>
      </table>

      <p id="copyright">&copy Copyright Site</p>

  </footer>

</body>
</html>