<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="../CSS/contact.css">
        <link rel="stylesheet" href="../CSS/headerfooter.css">
    </head>
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

        <section id="back">
            <a href="./home.html"><button id="backButton">x</button></a>
        </section>

        <section id="contactForm">
            <h1>Contact us with questions or concerns</h1>

            <form method="post"
            action="http://www.randyconnolly.com/tests/process.php"
            novalidate id="formContact">
                <br>
                <label>Message <span>*</span></label>
                <br>
                <textarea maxlength="500" placeholder="Enter a message" name="message" required></textarea>

                <br>

                <label>Email contact <span>*</span></label>
                <br>
                <input type="email" name="email" placeholder="example@email.com" required>
                <br>
                <button type="reset" id="reset">Clear</button>
                <button type="submit">Submit</button>
            </form>
        </section>

        
        <footer>
            <table>
                <tr>
                    <td><a href="./aboutUs.php">About us</a></td>
                    <td><a href="./home.html">Home</a></td>
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

        <script src="../Scripts/contact.js"></script>

    </body>
</html>
