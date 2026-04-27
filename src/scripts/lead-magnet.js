document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('seo-audit-form');
  
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form data
      const formData = new FormData(form);
      const data = Object.fromEntries(formData);
      
      // Show loading state
      const submitButton = form.querySelector('button[type="submit"]');
      const originalText = submitButton.textContent;
      submitButton.textContent = 'Sending...';
      submitButton.disabled = true;
      
      // Here you would typically send the data to your email service
      // For now, we'll simulate a successful submission
      setTimeout(() => {
        // Show success message
        form.innerHTML = `
          <div class="bg-white rounded-lg p-6 text-center">
            <div class="text-green-500 text-5xl mb-4">✓</div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Thank You!</h3>
            <p class="text-gray-600 mb-4">Your free SEO audit request has been received.</p>
            <p class="text-sm text-gray-500">We'll review your website and send your personalized audit within 24-48 hours.</p>
          </div>
        `;
        
        // Track conversion (optional - add your analytics code here)
        if (typeof gtag !== 'undefined') {
          gtag('event', 'conversion', {
            'event_category': 'Lead Magnet',
            'event_label': 'SEO Audit Signup'
          });
        }
      }, 1500);
      
      // Example: Send to a real service (uncomment and modify as needed)
      /*
      fetch('https://your-email-service.com/api/subscribe', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          name: data.name,
          email: data.email,
          website: data.website,
          phone: data.phone,
          list: 'seo-audit-leads'
        })
      })
      .then(response => response.json())
      .then(result => {
        // Handle success
        form.innerHTML = successMessage;
      })
      .catch(error => {
        // Handle error
        submitButton.textContent = originalText;
        submitButton.disabled = false;
        alert('Something went wrong. Please try again.');
      });
      */
    });
  }
});
