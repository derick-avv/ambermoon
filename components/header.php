<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'My Site'; ?></title>

  <!-- main styles -->
  <link rel="stylesheet" href="/ambermoon/assets/css/style.css?v=<?php echo filemtime('assets/css/style.css'); ?>">

  <!-- root avriables -->
  <link rel="stylesheet" href="/ambermoon/assets/css/root.css?v=<?php echo filemtime('assets/css/root.css'); ?>">

  <!-- navbar styles -->
  <link rel="stylesheet" href="/ambermoon/assets/css/navbar.css?v=<?php echo filemtime('assets/css/navbar.css'); ?>">

   <!-- typography styles -->
  <link rel="stylesheet" href="/ambermoon/assets/css/typography.css?v=<?php echo filemtime('assets/css/typography.css'); ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Page-specific CSS -->
    <?php
    $pageCssFile = "assets/css/pages/{$page}.css";
    if (file_exists($pageCssFile)) {
        echo "<link rel='stylesheet' href='{$pageCssFile}'>";
    }
    ?>

    <!-- Optional: JS libraries in head -->
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
