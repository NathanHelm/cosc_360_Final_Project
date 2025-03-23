<?php
session_start(); // Uncomment if you want session protection
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit;
}

require_once 'config.php';

$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

try {
    $pdo = new PDO(DB_CONNSTR, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username LIKE ? OR email LIKE ?");
    $stmt->execute([$search, $search]);
    $users = $stmt->fetchAll();

    $posts = $pdo->query("SELECT * FROM products ORDER BY price DESC")->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../CSS/admin.css">
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

<h2>Admin Dashboard</h2>

<div class="section">
  <h3>Search Users</h3>
  <form class="search-form" method="GET">
    <input type="text" name="search" placeholder="Search by username or email" />
    <button type="submit">Search</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user['username']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
          <td>
            <span class="status <?= $user['isActive'] ? '' : 'inactive' ?>">
              <?= $user['isActive'] ? 'Active' : 'Inactive' ?>
            </span>
          </td>
          <td>
            <a class="btn toggle <?= $user['isActive'] ? 'red' : 'green' ?>"
               href="toggle_user.php?id=<?= $user['user_id'] ?>&status=<?= $user['isActive'] ? 0 : 1 ?>">
              <?= $user['isActive'] ? 'Disable' : 'Enable' ?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div class="section">
  <h3>Manage Posts</h3>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Content Preview</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $post): ?>
        <tr>
          <td><?= htmlspecialchars($post['title']) ?></td>
          <td><?= htmlspecialchars(substr($post['content'], 0, 60)) ?>...</td>
          <td><?= $post['created_at'] ?></td>
          <td>
            <a class="btn edit" href="edit_post.php?post_id=<?= $post['product_id'] ?>">Edit</a>
            <a class="btn delete" href="delete_post.php?post_id=<?= $post['product_id'] ?>"
               onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<footer>
    <table>
        <tr>
            <td><a href="./aboutUs.html">About us</a></td>
            <td><a href="./home.html">Home</a></td>
        </tr>
        <tr>
            <td><a href="./contact.html">Contact</a></td>
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
