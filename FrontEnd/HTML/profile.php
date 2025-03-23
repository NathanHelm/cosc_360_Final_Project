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
                <li><a href="./login.php"><button id="signIn">Sign in</button></a></li>
                <li><a href="./signup.html"><button id="register">Register</button></a></li>
            </ul>
        </nav>
    </header>
       
    <div class="profile-container">
        <div class="profile-header">
            <img src="../Images/blankProfilePic.png" alt="User Avatar" class="avatar">
            <h2>John Doe</h2>
            <p>@johndoe</p>
        </div>
        <!-- <div class="profile-details">
            <h3>Profile Information</h3>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
            <p><strong>Address:</strong> 123 Main Street, City, Country</p>
        </div> -->
        <div class="profile-actions">
            <button class="edit-btn">Edit Profile</button>
            <button class="logout-btn">Logout</button>
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