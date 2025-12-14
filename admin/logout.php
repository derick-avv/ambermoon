<?php
require_once '../includes/config.php';

session_start();

// Clear all session variables
$_SESSION = [];
session_unset();

// Destroy the session
session_destroy();

// Redirect to the admin login page through the controller
header("Location: " . BASE_URL . "/admin/login");
exit;
