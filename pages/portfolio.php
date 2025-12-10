<?php
// Optional: set a custom page title for header
$pageTitle = "Portfolio - Amber Moon";

// Categories set for portfolio tabs
$categories = ['All', 'Editorial', 'Lifestyle', 'Swimwear', 'Runway', 'Video-Reel'];
?>

<!-- ///==================== PORTFOLIO PAGE HTML STRUCTURE ====================\\\ -->

<main class='portfolio'>
  <!-- ///===== MAIN PORTFOLIO SECTION =====\\\ -->
  <section class="portfolio-section">
    <h2>My Portfolio</h2>
    <!-- Category Tabs -->
    <div class="portfolio-tabs">
      <?php foreach ($categories as $cat): ?>
        <button class="tab-btn" data-category="<?= $cat ?>"><?= $cat ?></button>
      <?php endforeach; ?>
    </div>
    <!-- Posts Grid -->
    <div class="portfolio-grid">   
    </div>
    <!-- Pagination -->
    <div class="pagination">
      <button class="prev-page" disabled>Prev</button>
      <span class="page-info">Page 1</span>
      <button class="next-page">Next</button>
    </div>
  </section>
  <!-- ///===== END OF MAIN PORTFOLIO SECTION =====\\\ -->
</main>

