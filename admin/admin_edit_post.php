<?php
require_once "../includes/config.php";
session_start();

// Auth check
if (!isset($_SESSION['admin_logged_in'])) {

    header("Location: " . BASE_URL . "/admin/login");
    exit;
}

// Get post ID from query string
if (!isset($_GET['id'])) {
     header("Location: " . BASE_URL . "/admin/posts");
    exit;
}

$postId = intval($_GET['id']);
$message = "";

// Page Metadata
$pageTitle = "Edit Post";
$adminPage = "posts/edit";

// Fetch post
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
     header("Location: " . BASE_URL . "/admin/posts");
    exit;
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $caption = trim($_POST['caption']);
    $credits = trim($_POST['credits']);
    $category = $_POST['category'];

    // Handle image upload
    $imagePath = $post['image']; // default to existing image
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = BASE_PATH . '/uploads/';
        if (!is_dir($uploadDir)) mkdir($$uploadDir, 0755, true);

        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], BASE_PATH . '/' . $imagePath)) {
            $message = "Failed to upload new image.";
        }
    }

    if (!$message) {
        $stmt = $conn->prepare("UPDATE posts SET title = :title, caption = :caption, credits = :credits, category = :category, image = :image WHERE id = :id");
        $stmt->execute([
            'title' => $title,
            'caption' => $caption,
            'credits' => $credits,
            'category' => $category,
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

include BASE_PATH . "/components/admin/header.php";
?>


<div class="admin-grid-container">
    <?php include BASE_PATH . "/components/admin/admin_sidebar.php"; ?>

    <div class="admin-content">
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
                    // Use the submitted value if POSTed, otherwise the current post category
                    $selectedValue = $_POST['category'] ?? $post['category'];
                    $selected = ($selectedValue === $cat) ? 'selected' : '';
                    echo "<option value='$cat' $selected>$cat</option>";
                }
              ?>
            </select><br><br>


            <label>Current Image</label><br>
            <?php if ($post['image']): ?>
                <img src="<?= BASE_URL . '/' . $post['image'] ?>" alt="Post Image" width="120"><br><br>
            <?php endif; ?>

            <label>Change Image</label><br>
            <input type="file" name="image"><br><br>

            <button type="submit">Update Post</button>
        </form>
    </div>
</div>

<?php include BASE_PATH . "/components/admin/footer.php"; ?>
