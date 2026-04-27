<?php
/**
 * Template Name: Digital Marketing Service Page
 * Description: Template for displaying Digital Marketing service details
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          Digital Marketing Solutions
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Data-driven strategies to grow your online presence
        </p>
        <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'" 
                class="bg-indigo-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-indigo-700 transition-colors">
          Start Growing Now
        </button>
      </div>
    </div>
  </section>

  <!-- Marketing Services Grid -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Marketing Services</h2>
        <p class="mt-4 text-xl text-gray-600">Comprehensive solutions to boost your digital presence</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- SEO Service -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">SEO Optimization</h3>
          <p class="text-gray-600">Improve search rankings and organic visibility</p>
        </div>

        <!-- Social Media Marketing -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Social Media Management</h3>
          <p class="text-gray-600">Engage audiences across social platforms</p>
        </div>

        <!-- PPC Advertising -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">PPC Advertising</h3>
          <p class="text-gray-600">Targeted paid campaigns for instant results</p>
        </div>
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



  <!-- Marketing Process -->
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Marketing Process</h2>
        <p class="mt-4 text-xl text-gray-600">A strategic approach to digital success</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card 1: Research & Analysis -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">1. Research & Analysis</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Market research and competitive analysis</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Audience segmentation and insights</span>
            </li>
          </ul>
        </div>

        <!-- Card 2: Strategy Development -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">2. Strategy Development</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Creating tailored digital strategies</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Budgeting and ROI forecasts</span>
            </li>
          </ul>
        </div>

        <!-- Card 3: Campaign Execution -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">3. Campaign Execution</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Developing and launching campaigns</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Content creation and ad placements</span>
            </li>
          </ul>
        </div>

        <!-- Card 4: Performance Monitoring -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">4. Performance Monitoring</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Tracking campaign KPIs</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Continuous optimization and reporting</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl text-white font-bold mb-4">Ready to Grow Your Business?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let's create a customized marketing strategy that delivers real results.
      </p>
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'" 
              class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Start Marketing Now
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>