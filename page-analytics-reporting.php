<?php
/**
 * Template Name: Analytics & Reporting Service Page
 * Description: A template for displaying Analytics & Reporting service details
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          Analytics & Reporting
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Turn data into actionable insights for your business growth
        </p>
        <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
                class="bg-indigo-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-indigo-700 transition-colors">
          Start Analyzing
        </button>
      </div>
    </div>
  </section>

  <!-- Service Details Section -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Analytics Services</h2>
        <p class="mt-4 text-xl text-gray-600">Comprehensive data analysis and reporting solutions</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Data Collection -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Data Collection</h3>
          <p class="text-gray-600">Comprehensive tracking and data gathering across platforms</p>
        </div>
        
        <!-- Performance Analysis -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Performance Analysis</h3>
          <p class="text-gray-600">In-depth analysis of key performance indicators</p>
        </div>
        
        <!-- Custom Reporting -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Reporting</h3>
          <p class="text-gray-600">Tailored reports and dashboards for your needs</p>
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


  <!-- Analytics Process -->
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Analytics Process</h2>
        <p class="mt-4 text-xl text-gray-600">A data-driven approach to measuring success</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card 1: Setup & Integration -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">1. Setup & Integration</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Analytics tools implementation</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Custom tracking setup</span>
            </li>
          </ul>
        </div>
        
        <!-- Card 2: Data Collection -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">2. Data Collection</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Comprehensive data gathering</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Data validation and cleaning</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 3: Analysis -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">3. Analysis</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Performance metrics analysis</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Trend identification and insights</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 4: Reporting & Recommendations -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">4. Reporting & Recommendations</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Custom report generation</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Strategic recommendations</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl text-white font-bold mb-4">Ready to Make Data-Driven Decisions?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let's transform your data into actionable insights that drive growth.
      </p>
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
              class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Start Analyzing Today
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
