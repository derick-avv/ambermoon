<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? 'Admin Login'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/admin/admin_login.css?v=<?= filemtime(BASE_PATH . '/assets/css/admin/admin_login.css') ?>">
</head>
<body>
