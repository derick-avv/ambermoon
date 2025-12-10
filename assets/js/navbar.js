const menuToggle = document.querySelector('.menu-btn');
const navLinks = document.querySelector('.nav-links');

menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('mobile-menu');
});
