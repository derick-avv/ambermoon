<footer>
    <p>&copy; <?php echo date('Y'); ?> Amber Moon. All rights reserved.</p>
</footer>

<!-- JS at the bottom loaded for requested page -->
<?php
    $pageJsFile = "assets/js/{$page}.js";
    if (file_exists($pageJsFile)) {
        echo "<script  src='{$pageJsFile}'></script>";
    }
?>
<script src='assets/js/navbar.js' defer></script>
<script src='assets/js/main.js' defer></script>


</body>
</html>
