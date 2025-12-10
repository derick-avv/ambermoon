<?php
// INDEX.PHP - FRONT CONTROLLER

// Include Config File
include 'includes/config.php';

// Determine requested page from URL parameter, default to 'home'
$page = $_GET['page'] ?? 'home';

// Get the page title, pass current page to header
$pageTitle = ucfirst($page) . " - My Site";

// Sanitize page name to prevent directory traversal
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);


// DYNAMIC DOM CONTROLLER ------------------------------------------

// Include HEADER SECTION
include 'components/header.php';
include 'components/navbar.php';

// Route to the requested page - PAGE DISPLAY
$page_file = "pages/$page.php";
if (file_exists($page_file)) {
    include $page_file;
} else {
    include 'pages/404.php';
}

// Include FOOTER SECTION
include 'components/footer.php';

// -----------------------------------------------------------------