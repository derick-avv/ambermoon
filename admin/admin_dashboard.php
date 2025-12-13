<?php
require_once "../includes/config.php";
$pageTitle = "Dashboard";
$adminPage = "admin_dashboard";

include BASE_PATH . "/components/admin/header.php";


if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /ambermoon/admin/admin_login.php');
    exit;
}
?>

<?php
include "../components/admin/admin_header.php";
?>

<div class="admin-grid-container">
  <?php
  include "../components/admin/admin_sidebar.php"
  ?>
</div>

<p>You are logged in successfully.</p>

<?php include BASE_PATH . "/components/admin/footer.php"; ?>

