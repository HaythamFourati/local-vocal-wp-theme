document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenuClose = document.getElementById('mobile-menu-close');
  const mobileMenu = document.getElementById('mobile-menu');
  const body = document.body;

  // Only proceed if mobile menu elements exist
  if (!mobileMenu || !mobileMenuButton) return;

  // Initially hide the menu
  mobileMenu.style.display = 'none';

  function openMobileMenu() {
    // First make it visible
    mobileMenu.style.display = 'block';
    
    // Then add active class for animations (if needed)
    setTimeout(() => {
      mobileMenu.classList.add('active');
      body.classList.add('mobile-menu-open');
    }, 10);
  }

  function closeMobileMenu() {
    // Remove active class
    mobileMenu.classList.remove('active');
    
    // Wait for animation to complete, then hide
    setTimeout(() => {
      mobileMenu.style.display = 'none';
      body.classList.remove('mobile-menu-open');
    }, 300);
  }

  function toggleMobileMenu() {
    if (mobileMenu.classList.contains('active')) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }

  // Button event listeners
  mobileMenuButton.addEventListener('click', toggleMobileMenu);
  
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', closeMobileMenu);
  }

  // Close menu when clicking outside
  mobileMenu.addEventListener('click', function(e) {
    // Only close if clicking on the background overlay, not on the menu itself
    if (e.target === mobileMenu) {
      closeMobileMenu();
    }
  });

  // Close menu when pressing Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
      closeMobileMenu();
    }
  });
});