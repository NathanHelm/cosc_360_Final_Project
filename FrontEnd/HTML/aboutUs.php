<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>About us</title>
        <link rel="stylesheet" href="../CSS/aboutUs.css">
        <link rel="stylesheet" href="../CSS/headerfooter.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="./home.php#home">
                    <img src="../Images/homeIcon.png" alt="Home" width="25px" height="25px">
                </a>

                <p class="logo">Mosaic</p>

                <ul>
                    <li class="basic"><a href="./home.php#products">Products</a></li>
                    <li class="basic"><a href="./createProduct.php">Sell</a></li>
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
            <li><a href="./login.php"><button id="signIn">Sign in</button></a></li>
            <li><a href="./signup.php"><button id="register">Register</button></a></li>
        <?php endif; ?>
                </ul>
            </nav>
        </header>

        <section id="back">
            <a href="./home.php"><button id="backButton">x</button></a>
        </section>

        <section id="about">
            <div id="info">
                <h1>About Mosaic</h1>
                <p>
                    Welcome to Mosaic, your vibrant marketplace for buying and selling unique artisan goods. Our mission is to connect talented artisans with customers who appreciate the beauty and craftsmanship of handmade creations. From intricate jewelry to handwoven textiles, each item on Mosaic is crafted with passion and care, representing a blend of tradition and innovation. Whether you're looking for a special gift or a one-of-a-kind piece for your home, you'll find something truly unique here. At Mosaic, we believe in the power of creativity to bring people together, and we’re committed to supporting independent makers from around the world. Join us in celebrating artistry and craftsmanship, and discover the perfect piece to complete your story.
                </p>
            </div>

        </section>

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