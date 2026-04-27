<?php
/**
 * Template Name: Contact Page
 * Description: A stylish and elegant contact page template.
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-2xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          Let's Connect
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Reach out to us for innovative solutions tailored to your business needs.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact Information Cards -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Email Card -->
        <div class="bg-gray-50 rounded-lg p-8 text-center shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
          <div class="text-indigo-600 mb-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
          <p class="text-gray-600 mb-4">Our team is here to help with any questions</p>
          <a href="mailto:info@localvocalmarketing.com" class="text-indigo-600" style="color: #4F39F6">
            info@localvocalmarketing.com
          </a>
        </div>
        
        <!-- Phone Card -->
        <div class="bg-gray-50 rounded-lg p-8 text-center shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
          <div class="text-indigo-600 mb-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
          <p class="text-gray-600 mb-4">We're available Monday-Friday, 9am-5pm</p>
          <a href="tel:+1(443)852-1000" class="text-indigo-600 font-medium" style="color: #4F39F6">
          (443) 852-1000
          </a>
        </div>
        
        <!-- Location Card -->
        <div class="bg-gray-50 rounded-lg p-8 text-center shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
          <div class="text-indigo-600 mb-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Us</h3>
          <p class="text-gray-600 mb-4">Come by our office in Maryland</p>
          <address class="not-italic text-indigo-600 font-medium">
          209 Central Ave,<br>
          Glyndon, MD 21071,<br>
          United States
          </address>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
          <!-- Form -->
          <div class="p-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
            <p class="text-gray-600 mb-8">We'd love to hear from you. Fill out the form and we'll get back to you as soon as possible.</p>
            
            <?php
            // Check if Contact Form 7 is active
            if (function_exists('wpcf7_contact_form')) {
              // Display the form with ID 123 (replace with your form ID)
              echo do_shortcode('[contact-form-7 id="1570408" title="Contact Form"]');
            } else {
              // Fallback custom form
            ?>
            <form class="space-y-6" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
              
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
              
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
              
              <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                <textarea name="message" id="message" rows="4" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
              </div>
              
              <div>
                <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                  Send Message
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </button>
              </div>
              
              <input type="hidden" name="action" value="submit_contact_form">
              <?php wp_nonce_field('contact_form_submit'); ?>
            </form>
            <?php } ?>
          </div>
          
          <!-- Map/Image -->
          <div class="bg-indigo-900 relative overflow-hidden flex items-center justify-center" style="background-image: url('<?php echo get_theme_file_uri('assets/images/baltimore-skyline.jpg'); ?>'); background-size: cover; background-position: center;">
            
            <!-- Content -->
            <div class="relative px-8 py-12 text-center">
              <div class="mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-white mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-white mb-4">Our Maryland Office</h3>
              <p class="text-indigo-100 mb-6">Centrally located in Baltimore's vibrant business district</p>
              <a href="https://maps.app.goo.gl/eio3U1s7NzCkutyf8" target="_blank" style="display: inline-flex; align-items: center; padding: 0.75rem 1.5rem; border: 1px solid transparent; font-size: 1rem; font-weight: 500; border-radius: 0.375rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); color: #4f46e5; background-color: #ffffff; transition: all 0.2s;">
                View on Google Maps
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
        <p class="mt-4 text-xl text-gray-600">Find answers to common questions about our services</p>
      </div>

      <!-- Tab Navigation -->
      <div class="flex flex-wrap justify-center gap-4 mb-8">
        <button onclick="openTab('general')" class="tab-button active px-6 py-2 rounded-lg font-medium" style="background-color: #4F39F6; color: white;">
          General Questions
        </button>
        <button onclick="openTab('services')" class="tab-button px-6 py-2 rounded-lg font-medium bg-gray-200 text-gray-700">
          Our Services
        </button>
        <button onclick="openTab('pricing')" class="tab-button px-6 py-2 rounded-lg font-medium bg-gray-200 text-gray-700">
          Pricing & Plans
        </button>
      </div>

      <!-- Tab Content -->
      <div class="tab-content" id="general" style="display: block;">
        <div class="space-y-8">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">What makes Local Vocal Marketing different?</h3>
            <p class="text-gray-600">We combine local expertise with global insights to deliver personalized digital marketing solutions that drive real results for your business.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">How do I get started?</h3>
            <p class="text-gray-600">Simply reach out through our contact form or give us a call. We'll schedule a consultation to understand your needs and create a tailored strategy.</p>
          </div>
        </div>
      </div>

      <div class="tab-content" id="services" style="display: none;">
        <div class="space-y-8">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">What services do you offer?</h3>
            <p class="text-gray-600">We offer a comprehensive suite of digital marketing services including SEO, social media management, content creation, web development, and analytics reporting.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Can you customize services for my business?</h3>
            <p class="text-gray-600">Yes! We create custom strategies tailored to your specific industry, goals, and target audience to ensure maximum impact.</p>
          </div>
        </div>
      </div>

      <div class="tab-content" id="pricing" style="display: none;">
        <div class="space-y-8">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">How is pricing structured?</h3>
            <p class="text-gray-600">We offer flexible pricing options based on your needs and budget. Contact us for a custom quote tailored to your requirements.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Do you offer package deals?</h3>
            <p class="text-gray-600">Yes, we offer bundled service packages that provide comprehensive digital marketing solutions at competitive rates.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openTab(tabName) {
      // Hide all tab content
      var tabContents = document.getElementsByClassName('tab-content');
      for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
      }

      // Remove active class from all buttons
      var tabButtons = document.getElementsByClassName('tab-button');
      for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].style.backgroundColor = '#e5e7eb';
        tabButtons[i].style.color = '#374151';
      }

      // Show the selected tab content
      document.getElementById(tabName).style.display = 'block';

      // Add active class to the clicked button
      var activeButton = document.querySelector(`[onclick="openTab('${tabName}')"]`);
      activeButton.style.backgroundColor = '#4F39F6';
      activeButton.style.color = 'white';
    }
  </script>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-bold mb-4 text-white">Ready to Boost Your Business?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let our expert team help you achieve your business goals with our comprehensive service offerings.
      </p>
      <a href="tel:(443) 852-1000" class="bg-black text-white font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors inline-flex items-center">
        Call (443) 852-1000 Today
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>
