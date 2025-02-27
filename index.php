<?php
get_header(); ?>

<main class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12 mt-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Our Blog</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Insights, news, and updates from the Local Vocal Marketing team<br/> to help grow your business.</p>
        </div>

        <?php
        // Check if there are any posts
        if (have_posts()) : ?>

            <?php
            // Get the most recent post for the featured section
            $featured_args = array(
                'posts_per_page' => 1,
                'post__in' => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1
            );
            
            // If there are no sticky posts, just get the latest post
            if (empty(get_option('sticky_posts'))) {
                $featured_args = array('posts_per_page' => 1);
            }
            
            $featured_query = new WP_Query($featured_args);
            
            // If we have a featured post
            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
            ?>
                <!-- Featured Post -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-12">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="h-56 w-full md:w-64 md:h-full object-cover">
                                    <?php the_post_thumbnail('large', array('class' => 'h-full w-full object-cover')); ?>
                                </div>
                            <?php else : ?>
                                <div class="h-56 w-full md:w-64 md:h-full bg-indigo-100 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="block mt-1 text-2xl font-semibold text-gray-900 hover:text-indigo-600 transition-colors duration-200"><?php the_title(); ?></a>
                            <p class="mt-2 text-gray-600">
                                <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
                            </p>
                            <div class="mt-4 flex items-center">
                                <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', array('class' => 'w-10 h-10 rounded-full mr-4')); ?>
                                <div>
                                    <p class="text-sm font-medium text-gray-900"><?php the_author(); ?></p>
                                    <p class="text-sm text-gray-500">
                                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> • 
                                        <?php echo round(str_word_count(strip_tags(get_the_content())) / 250); ?> min read
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Blog Post Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Skip the featured post if it's a sticky post
                if (!empty(get_option('sticky_posts'))) {
                    $args = array(
                        'post__not_in' => get_option('sticky_posts')
                    );
                    query_posts($args);
                }

                // The Loop
                while (have_posts()) : the_post();
                ?>
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block h-48 overflow-hidden">
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                            </a>
                        <?php else : ?>
                            <div class="h-48 bg-indigo-100 flex items-center justify-center">
                                <svg class="h-12 w-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="flex items-center text-sm mb-2">
                                <span class="text-indigo-500 font-medium">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                                <span class="mx-2">•</span>
                                <time datetime="<?php echo get_the_date('c'); ?>" class="text-gray-500"><?php echo get_the_date(); ?></time>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-3">
                                <a href="<?php the_permalink(); ?>" style="color: rgb(0, 0, 38);" class="text-gray-900"><?php the_title(); ?></a>
                            </h4>
                            <p class="text-gray-600 mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <div class="flex items-center">
                                <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', array('class' => 'w-8 h-8 rounded-full mr-3')); ?>
                                <span class="text-sm text-gray-700"><?php the_author(); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <nav class="flex justify-center">
                    <div class="flex rounded-md shadow-sm">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>',
                            'next_text' => '<span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>',
                            'class' => 'px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50',
                        ));
                        ?>
                    </div>
                </nav>
            </div>

        <?php else : ?>
            <!-- No posts found -->
            <div class="bg-white p-10 rounded-lg shadow-md text-center">
                <svg class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-700 mb-4">No Posts Found</h2>
                <p class="text-gray-500 mb-6">It seems we can't find what you're looking for. Perhaps checking the menu above or searching can help.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Return to Homepage
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>