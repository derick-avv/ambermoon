<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /ambermoon/admin/admin_login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: /ambermoon/admin/admin_manage_posts.php');
    exit;
}

$postId = intval($_GET['id']);
$message = '';

// Fetch the post
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('Location: /ambermoon/admin/admin_manage_posts.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $caption = trim($_POST['caption']);
    $credits = trim($_POST['credits']);

    // Handle image upload
    $imagePath = $post['image']; // default to existing image
    if (!empty($_FILES['image']['name'])) {
        $targetDir = 'uploads/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

        $imagePath = $targetDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $message = "Failed to upload new image.";
        }
    }

    if (!$message) {
        $stmt = $conn->prepare("UPDATE posts SET title = :title, caption = :caption, credits = :credits, image = :image WHERE id = :id");
        $stmt->execute([
            'title' => $title,
            'caption' => $caption,
            'credits' => $credits,
            'image' => $imagePath,
            'id' => $postId
        ]);
        $message = "Post updated successfully!";
        // Refresh the post data
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute(['id' => $postId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<?php
include "../components/admin_header.php";
?>

<div class="admin-grid-container">
  <?php
  include "../components/admin_sidebar.php";
  ?>

  <h2>Edit Post</h2>
  
  <?php if ($message) echo "<p style='color:green;'>$message</p>"; ?>
  <form method="POST" enctype="multipart/form-data">
    <label>Title</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br><br>
    <label>Caption</label><br>
    <textarea name="caption" rows="5" required><?= htmlspecialchars($post['caption']) ?></textarea><br><br>
    <label>Credits</label><br>
    <input type="text" name="credits" value="<?= htmlspecialchars($post['credits']) ?>"><br><br>
    <label>Category</label><br>
    <select name="category" required>
      <option value="">-- Select Category --</option>
      <?php
        $categories = ['Editorial', 'Lifestyle', 'Swimwear', 'Runway', 'Video-Reel'];
        foreach ($categories as $cat) {
          $selected = ($post['category'] === $cat) ? 'selected' : '';
          echo "<option value='$cat' $selected>$cat</option>";
        }
      ?>
    </select><br><br>
    <label>Current Image</label><br>
      <?php if ($post['image']): ?>
        <img src="<?= $post['image'] ?>" alt="Post Image" width="120"><br><br>
      <?php endif; ?>
    <label>Change Image</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update Post</button>
  </form>
</div>
