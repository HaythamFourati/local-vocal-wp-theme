<?php
/**
 * Template Name: Single Page Layout
 * Description: A full-width single page template with no sidebar
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 ">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          <?php the_title(); ?>
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8">
          <?php echo get_post_meta(get_the_ID(), 'page_subtitle', true); ?>
        </p>
        <button class="bg-gray-800 text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-600 transition-colors">
          Get Started
        </button>
      </div>
    </div>
  </section>

  <!-- Main Content Section -->
  <section class="py-16 px-4">
    <div class="max-w-4xl mx-auto prose prose-lg">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          the_content();
        }
      }
      ?>
    </div>
  </section>

  <!-- Features Section -->
  <section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Key Features</h2>
        <p class="mt-4 text-xl text-gray-600">Everything you need to know about our services</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        // Feature 1
        ?>
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Fast Performance</h3>
          <p class="text-gray-600">Optimized for speed and efficiency to deliver the best results for your business.</p>
        </div>

        <?php
        // Feature 2
        ?>
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Secure & Reliable</h3>
          <p class="text-gray-600">Built with security in mind, ensuring your data is always protected and available.</p>
        </div>

        <?php
        // Feature 3
        ?>
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Full Support</h3>
          <p class="text-gray-600">Our dedicated support team is available to help you with any questions or concerns.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">What Our Clients Say</h2>
        <p class="mt-4 text-xl text-gray-600">Hear from the people who trust our services</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-white p-8 rounded-lg shadow border border-gray-200">
          <div class="flex items-center mb-6">
            <div class="text-yellow-400 flex">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              <?php endfor; ?>
            </div>
          </div>
          <blockquote class="text-gray-600 mb-4">
            "The team at Local Vocal has been instrumental in growing our business. Their dedicated approach and innovative strategies have helped us reach new heights."
          </blockquote>
          <div class="font-medium text-gray-900">Sarah Johnson</div>
          <div class="text-gray-500 text-sm">CEO, Johnson Enterprises</div>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-white p-8 rounded-lg shadow border border-gray-200">
          <div class="flex items-center mb-6">
            <div class="text-yellow-400 flex">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              <?php endfor; ?>
            </div>
          </div>
          <blockquote class="text-gray-600 mb-4">
            "Working with Local Vocal has been a game-changer for our online presence. Their expertise in digital marketing is unmatched."
          </blockquote>
          <div class="font-medium text-gray-900">Michael Thompson</div>
          <div class="text-gray-500 text-sm">Owner, Thompson's Bakery</div>
        </div>

        <!-- Testimonial 3 -->
        <div class="bg-white p-8 rounded-lg shadow border border-gray-200">
          <div class="flex items-center mb-6">
            <div class="text-yellow-400 flex">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              <?php endfor; ?>
            </div>
          </div>
          <blockquote class="text-gray-600 mb-4">
            "Local Vocal delivered results beyond our expectations. Their attention to detail and strategic planning has made a significant impact on our ROI."
          </blockquote>
          <div class="font-medium text-gray-900">Amanda Wilson</div>
          <div class="text-gray-500 text-sm">Marketing Director, Wilson Group</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-bold mb-4 text-white">Ready to Get Started?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Join our satisfied clients and experience the difference<br/> our services can make for your business.
      </p>
      <button class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Contact Us Today
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
