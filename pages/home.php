<?php
// Custom page title for header
$pageTitle = "Home - Amber Moon";

require_once "includes/config.php"; // make sure $conn is PDO

//// Fetch 3 most recent posts
// $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $recentPosts = $stmt->fetchAll(PDO::FETCH_ASSOC); 
//// returns an array
?>

<!-- ///==================== HOME PAGE HTML STRUCTURE ====================\\\ -->

<main class="home">

    <!-- ///===== HERO SECTION =====\\\ -->
    <section class="hero">
        <div class="banner-left"><img src="assets/images/IMG_HOME.JPG" alt=""></div>
        <div class="hero-content"><h1>Amber Moon</h1><p>UGC Creator, Artist and Model</p><a href="index.php?page=portfolio">See More from Amber</a></div>
        <div class="banner-right"><img src="assets/images/IMG_5383.JPG" alt=""></div>
    </section>
    <!-- ///===== END OF HERO SECTION =====\\\ -->

    <!-- ///===== PARTNER SECTION =====\\\ -->
    <section class='partners'>
      <div class="partner-card">
        <img src="assets/images/amazon-logo.png" alt="">
      </div>
      <div class="partner-card">
        <img src="assets/images/maps-logo.png" alt="">
      </div>
      <div class="partner-card">
        <img src="assets/images/shein-logo.png" alt="">
      </div>
      <div class="partner-card">
        <img src="assets/images/temu-logo.png" alt="">
      </div>
    </section>
    <!-- ///===== END OF PARTNER SECTION =====\\\ -->

    <!-- ///===== CATEGORIES SECTION =====\\\ -->
    <section class='categories'>
      <div class="categories-title">
        <h2>Categories</h2>
      </div>
      <div class="grid-section">
        <div class="grid-container">
          <div class="category-images">
            <a href='index.php?page=portfolio' class="cat-img-card"><img src="assets/images/IMG_HOME.JPG" alt=""></a>
            <a href='index.php?page=portfolio' class="cat-img-card"><img src="assets/images/IMG_HOME.JPG" alt=""></a>
            <a href='index.php?page=portfolio' class="cat-img-card"><img src="assets/images/IMG_HOME.JPG" alt=""></a>
            <a href='index.php?page=portfolio' class="cat-img-card"><img src="assets/images/IMG_HOME.JPG" alt=""></a>
            <a href='index.php?page=portfolio' class="cat-img-card"><img src="assets/images/IMG_HOME.JPG" alt=""></a>
          </div>
        </div>
      </div>
    </section>
    <!-- ///===== END OF CATEGORIES SECTION =====\\\ -->

    <!-- ///===== ABOUT SECTION =====\\\ -->
    <section class="about">
      <div class="abt-img">
        <img src="assets/images/IMG_5385.JPG" alt="">
      </div>
      <div class="abt-content">
        <h2>About Me</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate aspernatur consequatur facilis in sint! Dolorem inventore, unde voluptas consequatur vitae ratione repellendus obcaecati iusto, pariatur quam mollitia corrupti quas minima?</p>
        <a href="">About Amber Moon</a>
      </div>
    </section>
    <!-- ///===== END OF ABOUT SECTION =====\\\ -->
 
    <!-- ///===== CTA SECTION =====\\\ -->
    <section class="call-to-action">
      <h2>Get Started Today!</h2>
      <a href="index.php?page=contact" class="btn">Contact Us</a>
    </section>
    <!-- ///===== END OF CTA SECTION =====\\\ -->

</main>
