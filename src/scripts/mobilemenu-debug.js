// This script helps debug mobile menu issues
// Add to footer temporarily, then remove when fixed
document.addEventListener('DOMContentLoaded', function() {
  // Log elements
  console.log('Mobile Menu Button:', document.getElementById('mobile-menu-button'));
  console.log('Mobile Menu Close:', document.getElementById('mobile-menu-close'));
  console.log('Mobile Menu:', document.getElementById('mobile-menu'));
  
  // Check for CSS
  const allStyles = document.styleSheets;
  let foundMobileMenuCSS = false;
  
  for (let i = 0; i < allStyles.length; i++) {
    try {
      const sheet = allStyles[i];
      const rules = sheet.cssRules || sheet.rules;
      for (let j = 0; j < rules.length; j++) {
        if (rules[j].selectorText && rules[j].selectorText.includes('#mobile-menu')) {
          console.log('Found mobile menu CSS:', rules[j].cssText);
          foundMobileMenuCSS = true;
        }
      }
    } catch (e) {
      // CORS issues with some stylesheets
      console.log('Could not read stylesheet:', e);
    }
  }
  
  if (!foundMobileMenuCSS) {
    console.warn('Mobile menu CSS not found in loaded stylesheets!');
  }
  
  // Add test button
  const testButton = document.createElement('button');
  testButton.textContent = 'Test Mobile Menu';
  testButton.style.position = 'fixed';
  testButton.style.bottom = '10px';
  testButton.style.right = '10px';
  testButton.style.zIndex = '10000';
  testButton.style.padding = '10px';
  testButton.style.backgroundColor = 'red';
  testButton.style.color = 'white';
  testButton.style.border = 'none';
  testButton.style.borderRadius = '5px';
  
  testButton.addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu) {
      // Toggle display
      if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
        mobileMenu.style.display = 'block';
        mobileMenu.classList.add('active');
      } else {
        mobileMenu.style.display = 'none';
        mobileMenu.classList.remove('active');
      }
      console.log('Mobile menu toggled, current style:', mobileMenu.style.display);
    } else {
      console.error('Mobile menu element not found!');
    }
  });
  
  document.body.appendChild(testButton);
});
