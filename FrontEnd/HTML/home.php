<?php
require_once 'config.php';

$sql = "SELECT * FROM products"; 
$result = $pdo->query($sql);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
        <title>Home</title>
        <link rel="stylesheet" href="../CSS/homeStyle.css">
        <link rel="stylesheet" href="../CSS/headerfooter.css">
    </head>
    <body id="home">
        <header>
            <nav>
                
                <a href="./home.html#home">
                    <img src="../Images/homeIcon.png" alt="Home" width="25px" height="25px">
                </a>

                    <p class="logo">Mosaic</p>

                <ul>
                    <li class="basic"><a href="#products">Products</a></li>
                    <li class="basic"><a href="./createProduct.html">Sell</a></li>
                    <li class="basic"><a href="./aboutUs.php">About us</a></li>
                    <li class="basic"><a href="./contact.php">Contact</a></li>
                    <li><a href="./cart.html"><img src="../Images/cart.png" alt="cart" width="25px" height="25px"></a></li>
                    <li><a href="./login.php"><button id="signIn">Sign in</button></a></li>
                    <li><a href="./signup.php"><button id="register">Register</button></a></li>
                </ul>
            </nav>
        </header>

        <section id="bannerContainer">

            <img src="../Images/banner1.png" alt="music artwork" id="banner1">

            <h1>art is everywhere</h1>

            <img src="../Images/banner2.png" alt="van gogh" id="banner2">

            <h1>buy and sell it here</h1>

            <img src="../Images/banner3.jpg" alt="fashion artwork" id="banner3">

            <div id="products"> </div>

            <div id="searchBar">
                <input type="search" placeholder="Search">

                <ul>
                    <li>All</li>
                    <li>Clothing</li>
                    <li>Artwork</li>
                    <li>Accessories</li>
                    <li>Other</li>
                </ul>
            </div>
        </section>

        <!-- <div id="searchBar">
            <input type="search" placeholder="Search">

            <ul>
                <li>All</li>
                <li>Clothing</li>
                <li>Artwork</li>
                <li>Accessories</li>
                <li>Other</li>
            </ul>
        </div> -->

        <section id="productsContainer">

                <!-- <div class="card">
                    <a href="./productDetails.html">
                        <img src="../Images/skirt.png" alt="skirt">
                    </a>
                    <div class="cardText">
                        <h3><a href="./productDetails.html">Vintage skirt</a></h3>
                        <p>By <a>JaneDoe43</a></p>
                        <p>$5.00</p>
                        <button>Add to cart</button>
                    </div>
                </div> -->

                <?php
        // Check if there are products
        if ($result->rowCount() > 0) {
            // Loop through each product and display it
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card">';
                echo '<a href="./productDetails.php?id=' . $row['product_id'] . '">'; // Link to product details page
                echo '<img src="' . $row['product_image'] . '" alt="' . $row['name'] . '">'; // Display product image
                echo '</a>';
                echo '<div class="cardText">';
                echo '<h3><a href="./productDetails.php?id=' . $row['product_id'] . '">' . htmlspecialchars($row['name']) . '</a></h3>'; // Display product name
                echo '<p>$' . htmlspecialchars($row['price']) . '</p>'; // Display product price
                echo '<button>Add to cart</button>'; // Add to cart button
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }
        ?>

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
                    
    </body>
</html>