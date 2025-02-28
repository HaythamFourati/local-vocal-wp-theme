<?php
/**
 * Template Name: Services Page
 * Description: A template for displaying the services offered.
 */

get_header(); ?>

<main class="single-page-layout">
  <!-- Hero Section -->
  <section class="bg-gray-200 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 ">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-2xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-800">
          <!-- <?php the_title(); ?> --> Our Expertise
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mb-8">
          <?php echo get_post_meta(get_the_ID(), 'page_subtitle', true); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h3 class="text-4xl text-gray-800">Digital Solutions for Your Business</h3>
        <p class="mt-4 text-xl text-gray-600">Comprehensive solutions tailored to your business needs</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        // Define the services
        $services = [
            [
                'title' => 'Development',
                'description' => 'Custom web development solutions tailored to your specific needs.',
                'slug' => 'development',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>'
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Strategic digital marketing solutions tailored to your business goals.',
                'slug' => 'digital-marketing',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>'
            ],
            [
                'title' => 'SEO Optimization',
                'description' => 'Improve your search engine rankings and drive organic traffic.',
                'slug' => 'seo-optimization',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" /></svg>'
            ],
            [
                'title' => 'Content Creation',
                'description' => 'Engaging and valuable content that resonates with your audience.',
                'slug' => 'content-creation',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>'
            ],
            [
                'title' => 'Social Media Management',
                'description' => 'Strategic social media presence to connect with your audience.',
                'slug' => 'social-media-management',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>'
            ],
            [
                'title' => 'Analytics & Reporting',
                'description' => 'Comprehensive data analysis to make informed decisions.',
                'slug' => 'analytics-reporting',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>'
            ]
        ];

        // Display each service
        foreach ($services as $service) :
            // Check if a page with this slug exists
            $service_page = get_page_by_path($service['slug']);
            $service_url = $service_page ? get_permalink($service_page) : '#';
        ?>
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="text-indigo-600 mb-4">
            <?php echo $service['icon']; ?>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($service['title']); ?></h3>
          <p class="text-gray-600 mb-4"><?php echo esc_html($service['description']); ?></p>
          <a href="<?php echo esc_url($service_url); ?>" class="text-indigo-600 font-medium hover:text-indigo-800 transition-colors">
            Learn More →
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


 <!-- Main Content Section -->
 <section class="py-16 px-4">
    <div class="max-w-6xl mx-auto prose prose-lg">
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


  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-bold mb-4 text-white">Ready to Boost Your Business?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto">
        Let our expert team help you achieve your business goals<br/> with our comprehensive service offerings.
      </p>
      <button class="bg-black text-indigo-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-800 transition-colors">
        Contact Us Today
      </button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
