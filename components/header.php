<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title change -->
    <title><?php echo isset($pageTitle) ? $pageTitle : 'My Site'; ?></title> 

  <!-- main styles -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css?v=<?= filemtime(BASE_PATH . '/assets/css/style.css') ?>">

  <!-- root variables -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/root.css?v=<?= filemtime(BASE_PATH . '/assets/css/root.css') ?>">

  <!-- navbar styles -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/navbar.css?v=<?= filemtime(BASE_PATH . '/assets/css/navbar.css') ?>">

   <!-- typography styles -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/typography.css?v=<?= filemtime(BASE_PATH . '/assets/css/typography.css') ?>">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page-specific CSS (client-side only) -->
    <?php
    if (isset($page)) {
        $pageCssFile = BASE_PATH . "/assets/css/pages/{$page}.css";
        if (file_exists($pageCssFile)) {
            echo "<link rel='stylesheet' href='" . BASE_URL . "/assets/css/pages/{$page}.css'>";
        }
    }
    ?>
    <!-- End of Page-specific CSS -->

    <!-- Optional: JS libraries in head -->
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
