<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php?page=admin_login');
    exit;
}
// Handle delete action
if (isset($_GET['delete'])) {
    $postId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $postId]);
    $message = "Post deleted successfully.";
}
// Fetch all posts
$stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include "components/admin_header.php";
?>

<div class="admin-grid-container">
  <?php 
  // Admin Sidebar
    include "components/admin_sidebar.php"
  ?>

  <h2>Manage Posts</h2>

  <!-- ///===== PAGE SPECIFIC CRUD =====\\\ -->
  <?php if (!empty($message)): ?>
      <p style="color:green;"><?= $message ?></p>
  <?php endif; ?>

  <!-- ///===== POSTS TABLE =====\\\ -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Caption</th>
        <th>Credits</th>
        <th>Category</th> 
        <th>Image</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $post): ?>
        <tr>
          <td><?= $post['id'] ?></td>
          <td><?= htmlspecialchars($post['title']) ?></td>
          <td><?= htmlspecialchars($post['caption']) ?></td>
          <td><?= htmlspecialchars($post['credits']) ?></td>
          <td><?= htmlspecialchars($post['category']) ?></td>
          <td>
            <?php if ($post['image']): ?>
              <img src="<?= $post['image'] ?>" alt="Post Image" width="80">
            <?php endif; ?>
          </td>
          <td><?= $post['created_at'] ?></td>
          <td>
            <a href="index.php?page=admin_edit_post&id=<?= $post['id'] ?>">Edit</a> |
            <a href="index.php?page=admin_manage_posts&delete=<?= $post['id'] ?>" onclick="return confirm('Delete this post?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
