<?php
require_once "includes/config.php";
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php?page=admin_login');
    exit;
}
?>

<?php
include "components/admin_header.php";
?>

<div class="admin-grid-container">
  <?php
  include "components/admin_sidebar.php"
  ?>
</div>

<p>You are logged in successfully.</p>


