<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/headerfooter.css">
</head>
<script>
   
</script>
<body>
  <header>
    <nav>
        <a href="./home.php#home">
            <img src="../Images/homeIcon.png" alt="Home" width="25px" height="25px">
        </a>

        <p class="logo">Mosaic</p>

        <ul>
            <li class="basic"><a href="./home.php#products">Products</a></li>
            <li class="basic"><a href="./createProduct.html">Sell</a></li>
            <li class="basic"><a href="./aboutUs.php">About us</a></li>
            <li class="basic"><a href="./contact.php">Contact</a></li>
            <li><a href="./cart.html"><img src="../Images/cart.png" alt="cart" width="25px" height="25px"></a></li>
            <?php if (isset($_SESSION['username'])): ?>
            <li>
             <form action="logout.php" method="POST" style="display:inline;">
            <button type="submit" id="signOut">Log out</button>
            </form>
            </li>
            <?php else: ?>
            <li><a href="./login.html"><button id="signIn">Sign in</button></a></li>
            <li><a href="./signup.php"><button id="register">Register</button></a></li>
            <?php endif; ?>

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
            <h1 class="signup_title">login</h1>
            
      
                <!--when you click sumbit, you are taken to home page (and you are signed up)-->
                <form method="POST" action="login_process.php" class="flex_column signup_box">
                    <p>Username
                    </p>
                    <input name="username" type="input" placeholder="enter username here." required/>
                    <br>
                    <p>Password</p>
                    <input name="password" type="input" placeholder="enter password here." required/>
                    <br>
                    <button type="submit" class="submit">Log in</button>
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
              <td><a href="./aboutUs.php">About us</a></td>
              <td><a href="./home.php">Home</a></td>
          </tr>

          <tr>
              <td><a href="./contact.php">Contact</a></td>
              <td><a href="./profile.php">Profile</a></td>
          </tr>

          <tr>
              <td><a>Terms & Conditions</a></td>
          </tr>
      </table>

      <p id="copyright">&copy Copyright Site</p>

  </footer>

</body>
</html>