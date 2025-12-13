<?php
// Make sure the session is active (auth)
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    
    header('Location: /ambermoon/admin/admin_login.php');
    exit;
}

// Define sidebar items (title => page)
$sidebarItems = [
    'Dashboard' => 'admin_dashboard',
    'Create Post' => 'admin_create_post',
    'Manage Posts' => 'admin_manage_posts',
    'Logout' => 'logout'
];
?>

<div class="admin-sidebar">
    <ul>
        <?php foreach ($sidebarItems as $title => $page): ?>
            <li>
                <a href="/ambermoon/admin/<?= $page ?>.php" 
                   class="<?= ($_GET['page'] ?? 'admin_dashboard') === $page ? 'active' : '' ?>">
                    <?= $title ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
