<?php
/**
 * Template Name: SEO Optimization Service Page
 * Description: A template for displaying SEO Optimization service details
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          SEO Optimization
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Enhance your online visibility and drive organic traffic
        </p>
        <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
                class="bg-indigo-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-indigo-700 transition-colors">
          Get Started
        </button>
      </div>
    </div>
  </section>

  <!-- Service Details Section -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our SEO Services</h2>
        <p class="mt-4 text-xl text-gray-600">Improve your search engine rankings and drive organic traffic with proven strategies</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- On-page SEO -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16v-2a4 4 0 118 0v2" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">On-Page SEO</h3>
          <p class="text-gray-600">Optimize website content, meta tags, and structure for better rankings</p>
        </div>
        
        <!-- Off-Page SEO -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16c0-1.657 1.343-3 3-3h4c1.657 0 3 1.343 3 3m-8 0v-4a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h.01M12 20h.01M12 20a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Off-Page SEO</h3>
          <p class="text-gray-600">Build authority and trust through quality backlinks and content marketing</p>
        </div>
        
        <!-- Technical SEO -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3m10 0h3a1 1 0 001-1V7m-4 5v6m-6-6v6" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Technical SEO</h3>
          <p class="text-gray-600">Improve site performance, mobile-friendliness, and security for optimal crawlability</p>
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

  <!-- SEO Process Section -->
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our SEO Process</h2>
        <p class="mt-4 text-xl text-gray-600">A systematic approach to improving your website's visibility</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card 1: SEO Audit -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">1. SEO Audit</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Comprehensive website analysis</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Identifying technical and content issues</span>
            </li>
          </ul>
        </div>
        
        <!-- Card 2: Strategy & Planning -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">2. Strategy & Planning</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Developing a customized SEO strategy</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Setting clear KPI targets</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 3: Implementation -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">3. Implementation</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">On-page and technical optimizations</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Content enhancements and link building</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 4: Reporting & Optimization -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">4. Reporting & Optimization</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Detailed performance reports</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Continuous optimization based on insights</span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl text-white font-bold mb-4">Ready to Elevate Your SEO?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let's work together to skyrocket your website's visibility and organic traffic.
      </p>
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
              class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Contact Us Today
      </button>
    </div>
  </section>

<?php get_footer(); ?>
