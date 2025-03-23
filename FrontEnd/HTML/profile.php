<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('You must be logged in to view your profile.'); window.location.href='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../CSS/user.css">
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
                <li class="basic"><a href="./aboutUs.html">About us</a></li>
                <li class="basic"><a href="./contact.html">Contact</a></li>
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

    <div class="profile-container">
        <div class="profile-header">
            <img src="../Images/blankProfilePic.png" alt="User Avatar" class="avatar">
            <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
        </div>

        <div class="profile-actions">
            <button class="edit-btn">Edit Profile</button>
            <form action="logout.php" method="POST" style="display:inline;">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="edit-profile-form" style="display:none; margin-top: 20px;">
            <h3>Edit Profile</h3>
            <form action="updateProfile.php" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" 
                       value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" 
                       value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required><br><br>

                <label for="password">New Password:</label><br>
                <input type="password" name="password" id="password"><br><br>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <footer>
        <table>
            <tr>
                <td><a href="./aboutUs.html">About us</a></td>
                <td><a href="./home.html">Home</a></td>
            </tr>
            <tr>
                <td><a href="./contact.html">Contact</a></td>
                <td><a href="./userProfile.php">Profile</a></td>
            </tr>
            <tr>
                <td><a>Terms & Conditions</a></td>
            </tr>
        </table>
        <p id="copyright">&copy Copyright Site</p>
    </footer>

    <script>
        const editBtn = document.querySelector('.edit-btn');
        const editForm = document.querySelector('.edit-profile-form');

        editBtn.addEventListener('click', () => {
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>
