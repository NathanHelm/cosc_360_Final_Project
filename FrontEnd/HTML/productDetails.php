<?php
session_start();
require_once 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid product.";
    exit;
}

$productId = (int)$_GET['id'];

// Get product from DB
try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch();

    if (!$product) {
        echo "Product not found.";
        exit;
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit;
}

$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="../CSS/productDetails.css">
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
    <a href="./home.php#products"><button id="backButton">x</button></a>
</section>

<section id="productDetailsPage">
    <div class="productImageContainer">
        <img src="<?= htmlspecialchars($product['product_image']) ?>" alt="product image">
    </div>
    <div class="productInfo">
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <div id="productSeller">
            <h2>By <a><?= htmlspecialchars($product['seller_username']) ?></a></h2>
            <img src="../Images/blankProfilePic.png" alt="Profile picture">
        </div>
        <h3>$<?= htmlspecialchars($product['price']) ?></h3>
        <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>

        <form>
            <label for="quantity">Quantity <span>*</span></label><br>
            <input type="number" placeholder="Enter a quantity" min="1" max="100" name="quantity"/>
        </form>

        <button>Add to cart</button>
    </div>
</section>

<section id="productReviews">
    <hr>
    <h1>Reviews</h1>

    <?php if ($loggedIn): ?>
        <form id="commentForm">
            <textarea name="comment" id="comment" rows="3" placeholder="Leave a comment..."></textarea><br>
            <input type="hidden" name="product_id" value="<?= $productId ?>">
            <button type="submit">Post Comment</button>
        </form>
    <?php else: ?>
        <p><a href="login.php">Log in</a> to leave a comment.</p>
    <?php endif; ?>

    <div id="commentsContainer">
        <!-- Comments loaded here via AJAX -->
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
                <td><a href="./userProfile.php">Profile</a></td>
            </tr>
            <tr>
                <td><a>Terms & Conditions</a></td>
            </tr>
        </table>
        <p id="copyright">&copy Copyright Site</p>
    </footer>

<script>
// Load comments
function loadComments() {
    const container = document.getElementById("commentsContainer");
    fetch("get_comments.php?product_id=<?= $productId ?>")
        .then(res => res.text())
        .then(data => {
            container.innerHTML = data;
        });
}

// Post comment
document.getElementById("commentForm")?.addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch("post_comment.php", {
        method: "POST",
        body: formData
    }).then(res => res.text()).then(() => {
        document.getElementById("comment").value = "";
        loadComments();
    });
});

// Initial and interval comment load
loadComments();
setInterval(loadComments, 30000); 
</script>

</body>
</html>
