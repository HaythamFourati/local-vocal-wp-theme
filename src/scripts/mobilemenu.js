document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const body = document.body;
  
    function toggleMobileMenu() {
      mobileMenu.classList.toggle('active');
      body.classList.toggle('mobile-menu-open');
    }
  
    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    mobileMenuClose.addEventListener('click', toggleMobileMenu);
  
    // Close menu when clicking outside
    mobileMenu.addEventListener('click', function(e) {
      if (e.target === mobileMenu) {
        toggleMobileMenu();
      }
    });
  
    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
        toggleMobileMenu();
      }
    });
  });