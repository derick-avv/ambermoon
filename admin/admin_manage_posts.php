<?php
require_once "../includes/config.php";
session_start();

$pageTitle = "Posts";
$adminPage = "posts";

// Auth check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: " . BASE_URL . "/admin/login");
    exit;
}

// Handle delete action via POST (more secure)
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $postId = intval($_POST['delete_id']);
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $postId]);
    $message = "Post deleted successfully.";
}

// Fetch all posts
$stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Include header
include BASE_PATH . "/components/admin/header.php";
?>

<div class="admin-grid-container">
    <?php include BASE_PATH . "/components/admin/admin_sidebar.php"; ?>

    <div class="admin-content">
        <h2>Manage Posts</h2>

        <!-- Message -->
        <?php if (!empty($message)): ?>
            <p style="color:green;"><?= $message ?></p>
        <?php endif; ?>

        <!-- Posts Table -->
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
                                <img src="<?= BASE_URL . '/' . $post['image'] ?>" alt="Post Image" width="80">
                            <?php endif; ?>
                        </td>
                        <td><?= $post['created_at'] ?></td>
                        <td>
                            <!-- Edit link (clean URL) -->
                            <a href="<?= BASE_URL ?>/admin/posts/edit/<?= $post['id'] ?>">Edit</a>

                            <!-- Delete form (POST) -->
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this post?');">
                                <input type="hidden" name="delete_id" value="<?= $post['id'] ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include BASE_PATH . "/components/admin/footer.php"; ?>
