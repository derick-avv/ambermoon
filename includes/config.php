<?php
// CONFIG.PHP - DATABASE CONFIGURATION

// Database credentials
if (!defined('DB_HOST')) define('DB_HOST', 'localhost'); #-----HOST
if (!defined('DB_USER')) define('DB_USER', 'root'); #-----USER
if (!defined('DB_PASS')) define('DB_PASS', ''); #-----PASSWORD
if (!defined('DB_NAME')) define('DB_NAME', 'ambermoon'); #-----DATABASE NAME

// Create database connection
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Define global BASE_PATH + BASE_URL
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ambermoon');
define('BASE_URL', '/ambermoon');
