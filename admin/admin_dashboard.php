<?php
require_once "../includes/config.php";
$pageTitle = "Dashboard";
$adminPage = "dashboard";

include BASE_PATH . "/components/admin/header.php";


if (!isset($_SESSION['admin_logged_in'])) {
     header("Location: " . BASE_URL . "/admin/login");
    exit;
}
?>

<?php
include BASE_PATH . "/components/admin/header.php";
?>

<div class="admin-grid-container">
  <?php
  include "../components/admin/admin_sidebar.php"
  ?>
</div>

<p>You are logged in successfully.</p>

<?php include BASE_PATH . "/components/admin/footer.php"; ?>

