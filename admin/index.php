<?php
require_once "../includes/config.php";

$page = $_GET['page'] ?? 'dashboard';

$routes = [
    'dashboard'     => 'admin_dashboard.php',
    'posts'         => 'admin_manage_posts.php',
    'create'  => 'admin_create_post.php',
    'edit'    => 'admin_edit_post.php',
    'login'         => 'admin_login.php',
];

if (!array_key_exists($page, $routes)) {
    http_response_code(404);
    exit('Admin page not found');
}

require __DIR__ . "/" . $routes[$page];
