<?php
session_start();
require_once '../../config.php';

// Establish database connection
try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage();
    exit;
}

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
    $imageName = uniqid() . "_" . basename($image["name"]);
    $targetFilePath = $targetDir . $imageName;

    // Upload image
    if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
        $seller = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; // Optional seller tracking
        $sql = "INSERT INTO products (name, description, quantity, price, product_image, seller_username) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productName, $desc, 1, $price, $targetFilePath, $seller]);

        echo "<script>alert('Product added successfully!'); window.location.href = 'home.php';</script>";
    } else {
        echo "<script>alert('Error uploading image.'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="../CSS/createProduct.css">
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

    <section id="createAProduct">
        <h1>Create a Product</h1>
        <form method="post" action="createProduct.php" enctype="multipart/form-data">
            <div class="inputField">
                <label>Product Name <span>*</span></label><br>
                <input type="text" name="productName" placeholder="Product name" required>
            </div>

            <div class="inputField">
                <label>Product Description <span>*</span></label><br>
                <textarea name="desc" placeholder="Add a description" required></textarea>
            </div>

            <div class="inputField">
                <label>Price <span>*</span></label><br>
                <label>$</label>
                <input type="number" name="price" min="0.00" max="10000.00" step="0.01" required>
            </div>

            <div class="inputField">
                <label>Upload Image <span>*</span></label><br>
                <input type="file" name="image" accept="image/*" required>
            </div>

            <button type="submit">Create Product</button>
            <button type="reset">Clear</button>
        </form>
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

    <script src="../Scripts/createProduct.js"></script>
</body>
</html>
