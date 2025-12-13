</div> <!-- end admin-layout -->

<footer class="admin-footer">
    <p>&copy; <?= date('Y'); ?> Amber Moon Admin</p>
</footer>

<!-- Page-specific admin JS -->
<?php
if (isset($adminPage)) {
    $adminJs = BASE_PATH . "/assets/js/admin/{$adminPage}.js";
    if (file_exists($adminJs)) {
        echo "<script src='" . BASE_URL . "/assets/js/admin/{$adminPage}.js?v=" . filemtime($adminJs) . "' defer></script>";
    }
}
?>

</body>
</html>
