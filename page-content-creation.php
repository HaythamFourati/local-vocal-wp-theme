<?php
/**
 * Template Name: Content Creation Service Page
 * Description: A template for displaying Content Creation service details
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          Content Creation
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8 text-gray-600">
          Engaging content that tells your story and connects with your audience
        </p>
        <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
                class="bg-indigo-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-indigo-700 transition-colors">
          Start Creating
        </button>
      </div>
    </div>
  </section>

  <!-- Service Details Section -->
  <section class="py-16 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Content Services</h2>
        <p class="mt-4 text-xl text-gray-600">Professional content creation services tailored to your brand voice</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Blog & Article Writing -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Blog & Article Writing</h3>
          <p class="text-gray-600">SEO-optimized blog posts and articles that inform and engage</p>
        </div>
        
        <!-- Social Media Content -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Social Media Content</h3>
          <p class="text-gray-600">Engaging posts that build community and drive engagement</p>
        </div>
        
        <!-- Website Copy -->
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Website Copy</h3>
          <p class="text-gray-600">Compelling website content that converts visitors into customers</p>
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

  <!-- Content Creation Process -->
  <section class="py-16 px-4 bg-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Our Content Creation Process</h2>
        <p class="mt-4 text-xl text-gray-600">A strategic approach to creating engaging content</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card 1: Research & Planning -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">1. Research & Planning</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Understanding your brand voice and goals</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Topic research and content strategy</span>
            </li>
          </ul>
        </div>
        
        <!-- Card 2: Content Development -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">2. Content Development</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Creating engaging, SEO-friendly content</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Incorporating brand messaging and keywords</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 3: Review & Optimization -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">3. Review & Optimization</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Quality assurance and editing</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">SEO optimization and formatting</span>
            </li>
          </ul>
        </div>
 
        <!-- Card 4: Publication & Analysis -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-xl font-bold text-gray-900 mb-4">4. Publication & Analysis</h3>
          <ul class="space-y-4">
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Strategic content distribution</span>
            </li>
            <li class="flex items-start group">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mt-2.5 mr-3 flex-shrink-0 group-hover:scale-125 transition-transform"></span>
              <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Performance tracking and optimization</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl text-white font-bold mb-4">Ready to Create Engaging Content?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let's work together to tell your story and connect with your audience.
      </p>
      <button onclick="window.location.href='<?php echo get_page_link(get_page_by_path('contact')->ID); ?>'"
              class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Start Your Content Journey
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
