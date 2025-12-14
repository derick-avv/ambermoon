<?php
require_once "../includes/config.php";
session_start();

$pageTitle = "Create Post";
$adminPage = "posts/create";

// Auth Check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: " . BASE_URL . "/admin/login");
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $caption = trim($_POST['caption']);
    $credits = trim($_POST['credits']);
    $category = $_POST['category'];
    $created_at = $_POST['created_at'] ?? date('Y-m-d H:i:s');

  
    // Handle image upload
     $imagePath = null;
    if (!empty($_FILES['image']['name'])) {
        // Use absolute path for saving
        $uploadDir = BASE_PATH . '/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Save relative path in DB
            $imagePath = 'uploads/' . $imageName;
        } else {
            $message = "Failed to upload image.";
        }
    } else {
        $message = "Image is required. Please upload an image for the post.";
    }

    if (!$message) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO posts (title, image, caption, credits, category, created_at) VALUES (:title, :image, :caption, :credits, :category, :created_at)");
        $stmt->execute([
            'title' => $title,
            'image' => $imagePath,
            'caption' => $caption,
            'credits' => $credits,
            'category' => $category,
            'created_at' => $created_at
        ]);

        $message = "Post created successfully!";
    }
}
?>

<?php
include BASE_PATH . "/components/admin/header.php";
?>

<div class="admin-grid-container">
    <?php include BASE_PATH . "/components/admin/admin_sidebar.php"; ?>

    <div class="admin-content">
        <h2>Create New Post</h2>
        <?php if ($message) echo "<p style='color:green;'>$message</p>"; ?>

        <form method="POST" enctype="multipart/form-data">
            <label>Title</label><br>
            <input type="text" name="title" required><br><br>

            <label>Image</label><br>
            <input type="file" name="image" required><br><br>

            <label>Caption</label><br>
            <textarea name="caption" rows="5" required></textarea><br><br>

            <label>Category</label><br>
            <select name="category" required>
                <option value="">-- Select Category --</option>
                <option value="Editorial">Editorial</option>
                <option value="Lifestyle">Lifestyle</option>
                <option value="Swimwear">Swimwear</option>
                <option value="Runway">Runway</option>
                <option value="Video-Reel">Video-Reel</option>
            </select><br><br>

            <label>Credits</label><br>
            <input type="text" name="credits"><br><br>

            <button type="submit">Create Post</button>
        </form>
    </div>
</div>

<?php include BASE_PATH . "/components/admin/footer.php"; ?>
