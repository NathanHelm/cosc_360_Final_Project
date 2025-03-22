<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
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

  <h2>Admin Dashboard</h2>

  <div class="section">
    <h3>Search Users</h3>
    <form class="search-form">
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
        <tr>
          <td>john_doe</td>
          <td>john@example.com</td>
          <td><span class="status">Active</span></td>
          <td><a href="#" class="btn toggle">Disable</a></td>
        </tr>
        <tr>
          <td>jane_smith</td>
          <td>jane@example.com</td>
          <td><span class="status inactive">Inactive</span></td>
          <td><a href="#" class="btn toggle">Enable</a></td>
        </tr>
        <!-- Add more rows as needed -->
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
        <tr>
          <td>Welcome Post</td>
          <td>This is the first post on the site...</td>
          <td>2024-03-01</td>
          <td>
            <a href="#" class="btn edit">Edit</a>
            <a href="#" class="btn delete">Delete</a>
          </td>
        </tr>
        <tr>
          <td>Second Post</td>
          <td>This is another example post...</td>
          <td>2024-03-10</td>
          <td>
            <a href="#" class="btn edit">Edit</a>
            <a href="#" class="btn delete">Delete</a>
          </td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>

</body>
</html>
