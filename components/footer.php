<footer>
    <p>&copy; <?php echo date('Y'); ?> Amber Moon. All rights reserved.</p>
</footer>

<!-- Page-specific JS (client-side only) -->
<?php
if (isset($page)) {
    $pageJsFile = BASE_PATH . "/assets/js/{$page}.js";
    if (file_exists($pageJsFile)) {
        echo "<script src='" . BASE_URL . "/assets/js/{$page}.js'></script>";
    }
}
?>

<!-- Global JS -->
<script src="<?= BASE_URL ?>/assets/js/navbar.js" defer></script>
<script src="<?= BASE_URL ?>/assets/js/main.js" defer></script>


</body>
</html>
