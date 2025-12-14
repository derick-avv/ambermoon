<?php
// Sidebar assumes auth is already handled by admin header

// Add Sidebar items for pages added. 'Title' => 'Path'
$sidebarItems = [
    'Dashboard'    => 'dashboard',
    'Create Post'  => 'posts/create',
    'Posts' => 'posts',
    'Blog Posts' => 'blogs', // added on update
    'Write' => 'blogs/create', // added on update
];
?>

<div class="admin-sidebar">
    <ul>
        <?php foreach ($sidebarItems as $title => $path): ?>
            <?php
                // Determine active state
                $isActive = isset($adminPage) && str_starts_with($adminPage, basename($path));
            ?>
            <li>
                <a href="<?= BASE_URL ?>/admin/<?= $path ?>" class="<?= $adminPage === $path ? 'active' : '' ?>"> <?= $title ?> </a>
            </li>
        <?php endforeach; ?>

        <li>
            <a href="<?= BASE_URL ?>/admin/logout">Logout</a>
        </li>
    </ul>
</div>
