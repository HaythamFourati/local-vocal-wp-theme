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
        <a  href="tel:(443) 852-1000" class="custom-button flex items-start">
          <svg class="h-6 w-6 mr-2 mr-2 " fill="none" viewBox="0 0 24 24" stroke="white">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
          Call (443) 852-1000 
          
        </a>
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
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl text-gray-900">Why Choose Local Vocal Marketing?</h2>
        <p class="mt-4 text-xl text-gray-600">Your Trusted Digital Partner in Maryland</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Maryland Local Business -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Maryland-Based Business</h3>
          <p class="text-gray-600">Proudly headquartered in Maryland, serving the DMV area with local expertise and understanding of your market.</p>
        </div>

        <!-- American Owned -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">American-Owned Company</h3>
          <p class="text-gray-600">Founded and owned by an American entrepreneur, committed to delivering excellence in digital services.</p>
        </div>

        <!-- Global Excellence -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Global Perspective</h3>
          <p class="text-gray-600">Combining local insights with international expertise to deliver innovative digital solutions for your business.</p>
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
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'" class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Contact Us Today
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
