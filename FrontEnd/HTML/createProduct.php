<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $image = $_FILES['image'];  

    if (empty($productName) || empty($desc) || empty($price) || empty($image['name'])) {
        echo "<script>alert('Please fill in all fields!'); window.history.back();</script>";
        exit;
    }

    $targetDir = "uploads/"; 
    $imageName = basename($image["name"]);
    $targetFilePath = $targetDir . $imageName;

   
    if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO products (name, quantity, price, product_image) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productName, 1, $price, $targetFilePath]);

        echo "<script>alert('Product added successfully!'); window.location.href = 'home.php';</script>";
    } else {
        echo "<script>alert('Error uploading image.'); window.history.back();</script>";
    }
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create product</title>
        <link rel="stylesheet" href="../CSS/createProduct.css">
        <link rel="stylesheet" href="../CSS/headerfooter.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="./home.html#home">
                    <img src="../Images/website_mockup_ecomerce/clothing items/" alt="Home" width="25px" height="25px">
                </a>

                <p class="logo">Mosaic</p>

                <ul>
                    <li class="basic"><a href="./home.html#products">Products</a></li>
                    <li class="basic"><a href="./createProduct.html">Sell</a></li>
                    <li class="basic"><a href="./aboutUs.php">About us</a></li>
                    <li class="basic"><a href="./contact.php">Contact</a></li>
                    <li><a href="./cart.html"><img src="../Images/cart.png" alt="cart" width="25px" height="25px"></a></li>
                    <li><a href="./login.php"><button id="signIn">Sign in</button></a></li>
                    <li><a href="./signup.php"><button id="register">Register</button></a></li>
                </ul>
            </nav>
        </header>

        <section id="back">
            <a href="./home.html"><button id="backButton">x</button></a>
        </section>

        <section id="createAProduct">
        <h1>Create a product</h1>
        <form method="post" action="createProduct.php" enctype="multipart/form-data">
            <div class="inputField">
                <label>Product Name <span>*</span></label>
                <br>
                <input type="text" name="productName" placeholder="Product name" required>
            </div>

            <div class="inputField">
                <label>Product Description <span>*</span></label>
                <br>
                <textarea name="desc" placeholder="Add a description" required></textarea>
            </div>

            <div class="inputField">
                <label>Price <span>*</span></label>
                <br>
                <label>$</label> 
                <input type="number" name="price" min="0.00" max="10000.00" step="0.01" required>
            </div>

            <div class="inputField">
                <label>Upload Image <span>*</span></label>
                <br>
                <input type="file" name="image" accept="image/*" required>
            </div>

            <button type="submit">Create Product</button>
            <button type="reset">Clear</button>
        </form>
    </section>

        <!-- <section id="createAProduct">
            <h1>Create a product</h1>

            <form method="post"
            action="http://www.randyconnolly.com/tests/process.php"
            novalidate id="createForm">
                <div class="inputField">
                    <label>Add a product name <span>*</span></label>
                    <br>
                    <input type="text" maxlength="50" id="productName" placeholder="Product name"
                    name="productName" required>
                </div>

                <div class="inputField">
                    <label>Product description <span>*</span></label>
                    <br>
                    <textarea id="desc" placeholder="Add a description" maxlength="500" 
                    name="desc" required></textarea>
                </div>

                <div class="inputField">
                    <label>Price <span>*</span></label>
                    <br>
                   <label>$</label> <input type="number" min="0.00" max="10000.00" id="price" placeholder="0.00"
                   name="price" required/>

                </div>

                <div class="inputField"> 
                    <label>Add an image <span>*</span></label>
                    <br>
                    <input type="file" name="image" required>
                </div> -->

                <!-- <button type="submit" id="submit">Create product</button>
                <button type="reset" id="reset">Clear</button> -->
            <!-- </form>
            <button type="reset" id="reset" form="createForm">Clear</button>
            <button type="submit" id="submit" form="createForm">Create product</button>
        </section> -->

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

        <script src="../Scripts/createProduct.js"></script>

    </body>
</html>