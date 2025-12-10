<?php
require_once '../includes/config.php';

$category = $_GET['category'] ?? 'All';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
$offset = ($page - 1) * $limit;

// Count total posts
if ($category === 'All') {
    $countStmt = $conn->query("SELECT COUNT(*) FROM posts");
} else {
    $countStmt = $conn->prepare("SELECT COUNT(*) FROM posts WHERE category = :category");
    $countStmt->bindParam(':category', $category);
    $countStmt->execute();
}
$totalPosts = $countStmt->fetchColumn();
$totalPages = max(1, ceil($totalPosts / $limit));

// Fetch posts
if ($category === 'All') {
    $stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
} else {
    $stmt = $conn->prepare("SELECT * FROM posts WHERE category = :category ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':category', $category);
}
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Build HTML output
ob_start();
if (empty($posts)) {
    echo "<p class='no-posts-msg'>No posts available in this category.</p>";
} else {
    foreach ($posts as $post): ?>
        <div class="portfolio-card" data-category="<?= htmlspecialchars($post['category']) ?>">
            <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>">
        </div>
    <?php endforeach;
}
$html = ob_get_clean();

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'html' => $html,
    'current_page' => $page,
    'total_pages' => $totalPages
]);
