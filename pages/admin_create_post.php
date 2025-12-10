<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php?page=admin_login');
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
        $targetDir = 'uploads/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

        $imagePath = $targetDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $message = "Failed to upload image.";
        }
    } else {
        $message = "Image is required. Please upload an image for the post.";
    }

    if (!$message) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO posts (title, image, caption, credits, category) VALUES (:title, :image, :caption, :credits, :category)");
        $stmt->execute([
            'title' => $title,
            'image' => $imagePath,
            'caption' => $caption,
            'credits' => $credits,
            'category' => $category,
        ]);

        $message = "Post created successfully!";
    }
}
?>

<?php
include "components/admin_header.php";
?>

<div class="admin-grid-container">
    <!-- ///===== SIDEBAR INCLUDE =====\\\ -->
    <?php
        include "components/admin_sidebar.php"
    ?>
    <!-- ///===== END OF SIDEBAR INCLUDE =====\\\ -->


    <!-- ///===== PAGE SPECIFIC CRUD =====\\\ -->
    <h2>Create New Post</h2>
    <?php if ($message) echo "<p style='color:green;'>$message</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Title</label><br>
        <input type="text" name="title" required><br><br>

        <label>Image</label><br>
        <input type="file" name="image" ><br><br>

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

