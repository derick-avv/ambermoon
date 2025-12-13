<?php
session_start();

// Clear all session variables
$_SESSION = [];
session_unset();

// Destroy the session
session_destroy();

// Redirect to the admin login page through the controller
header('Location: /ambermoon/admin/admin_login.php');
exit;
