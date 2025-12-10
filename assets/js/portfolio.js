document.addEventListener('DOMContentLoaded', () => {
  const grid = document.querySelector('.portfolio-grid');
  const tabs = document.querySelectorAll('.tab-btn');
  const prevBtn = document.querySelector('.prev-page');
  const nextBtn = document.querySelector('.next-page');
  const pageInfo = document.querySelector('.page-info');

  let currentCategory = 'All';
  let currentPage = 1;

  async function loadPosts(category = 'All', page = 1) {
    grid.innerHTML = "<p class='loading-msg'>Loading...</p>";

    const url = `pages/fetch_posts.php?category=${encodeURIComponent(
      category
    )}&page=${page}`;
    const response = await fetch(url);
    const data = await response.json();

    grid.innerHTML =
      data.html || "<p class='no-posts-msg'>No posts available.</p>";

    // Update pagination
    pageInfo.textContent = `Page ${data.current_page} of ${data.total_pages}`;
    prevBtn.disabled = data.current_page <= 1;
    nextBtn.disabled = data.current_page >= data.total_pages;
  }

  // Category click
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      tabs.forEach((t) => t.classList.remove('active'));
      tab.classList.add('active');
      currentCategory = tab.dataset.category;
      currentPage = 1;
      loadPosts(currentCategory, currentPage);
    });
  });

  // Pagination buttons
  prevBtn.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      loadPosts(currentCategory, currentPage);
    }
  });

  nextBtn.addEventListener('click', () => {
    currentPage++;
    loadPosts(currentCategory, currentPage);
  });

  // Initial load
  loadPosts();
});

const overlay = document.getElementById('overlay');
const overlayImg = document.getElementById('overlay-img');
const overlayTitle = document.getElementById('overlay-title');
const overlayCaption = document.getElementById('overlay-caption');
const overlayCredits = document.getElementById('overlay-credits');
const overlayDate = document.getElementById('overlay-date');
const closeBtn = document.querySelector('.close');

document.querySelectorAll('.portfolio-card').forEach((card) => {
  card.addEventListener('click', () => {
    overlayImg.src = card.dataset.image;
    overlayTitle.textContent = card.dataset.title;
    overlayCaption.textContent = card.dataset.caption;
    overlayCredits.textContent = card.dataset.credits;
    overlayDate.textContent = new Date(card.dataset.date).toLocaleDateString();
    overlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });
});

closeBtn.addEventListener('click', () => {
  overlay.style.display = 'none';
  document.body.style.overflow = '';
});

overlay.addEventListener('click', (e) => {
  if (e.target === overlay) {
    overlay.style.display = 'none';
    document.body.style.overflow = '';
  }
});