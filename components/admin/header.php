<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: " . BASE_URL . "/admin/admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? 'Admin Panel'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Global admin CSS -->
    <link rel="stylesheet"
          href="<?= BASE_URL ?>/assets/css/admin/admin_sidebar.css?v=<?= filemtime(BASE_PATH . '/assets/css/admin/admin_sidebar.css') ?>">

    <!-- Page-specific admin CSS -->
    <?php
    if (isset($adminPage)) {
        $adminCss = BASE_PATH . "/assets/css/admin/{$adminPage}.css";
        if (file_exists($adminCss)) {
            echo "<link rel='stylesheet' href='" . BASE_URL . "/assets/css/admin/{$adminPage}.css?v=" . filemtime($adminCss) . "'>";
        }
    }
    ?>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
