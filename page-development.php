<?php
/**
 * Template Name: Development Service Page
 * Description: A template for displaying the Development service details
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          Web Development
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Custom web solutions tailored to your business needs
        </p>
        <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'" class="bg-indigo-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-indigo-700 transition-colors">
          Start Your Project
        </button>
      </div>
    </div>
  </section>

  <!-- Development Services Grid -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-2xl font-bold text-gray-900">Our Development Solutions</h2>
        <p class="mt-4 text-xl text-gray-600">Comprehensive web development services to grow your business</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Custom Website Development -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Website Development</h3>
          <p class="text-gray-600">Tailored websites that perfectly match your brand and business requirements.</p>
        </div>

        <!-- E-commerce Solutions -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">E-commerce Solutions</h3>
          <p class="text-gray-600">Powerful online stores with seamless shopping experiences and secure payments.</p>
        </div>

        <!-- WordPress Development -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">WordPress Development</h3>
          <p class="text-gray-600">Custom WordPress themes and plugins tailored to your specific needs.</p>
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


  <!-- Development Process -->
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Development Process</h2>
        <p class="mt-4 text-xl text-gray-600">A systematic approach to delivering quality solutions</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">1. Discovery & Planning</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Requirements gathering and analysis</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Project scope definition</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Technology stack selection</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Timeline and milestone planning</span>
            </li>
          </ul>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">2. Design & Development</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">UI/UX design creation</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Frontend development</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Backend implementation</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Database architecture</span>
            </li>
          </ul>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">3. Testing & QA</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Functionality testing</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Performance optimization</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Security testing</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Cross-browser compatibility</span>
            </li>
          </ul>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">4. Launch & Support</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Deployment preparation</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Go-live execution</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Post-launch monitoring</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Ongoing maintenance</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Technologies -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Technologies We Use</h2>
        <p class="mt-4 text-xl text-gray-600">Modern tools and frameworks for robust solutions</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
        <div class="p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Frontend</h4>
          <ul class="space-y-2">
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">React</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Vue.js</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Angular</span>
            </li>
          </ul>
        </div>
        
        <div class="p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Backend</h4>
          <ul class="space-y-2">
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">PHP</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Node.js</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Python</span>
            </li>
          </ul>
        </div>
        
        <div class="p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Database</h4>
          <ul class="space-y-2">
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">MySQL</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">MongoDB</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">PostgreSQL</span>
            </li>
          </ul>
        </div>
        
        <div class="p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">CMS</h4>
          <ul class="space-y-2">
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">WordPress</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Drupal</span>
            </li>
            <li class="flex items-center justify-center">
              <span class="h-1.5 w-1.5 bg-indigo-600 rounded-full mr-2"></span>
              <span class="text-gray-600">Custom</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl text-white font-bold mb-4">Ready to Start Your <br/>Development Project?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let's discuss your project requirements and create a solution<br/> that perfectly fits your needs.
      </p>
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'" class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Contact Us Today
      </button>
    </div>
  </section>

  
</main>

<?php get_footer(); ?>
