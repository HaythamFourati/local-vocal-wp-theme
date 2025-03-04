<?php get_header(); ?>

<main class="flex-grow">
    <!-- 404 Hero Section -->
    <section class="py-20 px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <!-- 404 Icon -->
            <div class="mb-8">
                <svg class="h-32 w-32 mx-auto text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- 404 Content -->
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Page Not Found</h1>
            <p class="text-xl text-gray-600 mb-12">Oops! The page you're looking for doesn't exist or has been moved.</p>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-3xl mx-auto mb-12">
                <a href="<?php echo home_url('/services'); ?>" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <svg class="h-8 w-8 text-indigo-600 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Our Services</h3>
                    <p class="text-gray-600">Explore our digital marketing solutions</p>
                </a>

                <a href="<?php echo home_url('/blog'); ?>" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <svg class="h-8 w-8 text-indigo-600 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Latest Blog Posts</h3>
                    <p class="text-gray-600">Read our marketing insights</p>
                </a>

                <a href="<?php echo home_url('/contact'); ?>" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <svg class="h-8 w-8 text-indigo-600 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Contact Us</h3>
                    <p class="text-gray-600">Get in touch with our team</p>
                </a>
            </div>

            <!-- Back to Home -->
            <a href="<?php echo home_url(); ?>" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Back to Homepage
            </a>
        </div>
    </section>

    
</main>

<?php get_footer(); ?>
