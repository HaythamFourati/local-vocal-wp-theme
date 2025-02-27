<?php
get_header(); ?>

<article class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Post Header -->
        <header class="mb-10">
            <!-- Category -->
            <div class="mb-6">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="inline-block bg-indigo-100 text-indigo-800 py-1 px-3 rounded-full text-sm font-medium hover:bg-indigo-200 transition-colors">' . esc_html($categories[0]->name) . '</a>';
                }
                ?>
            </div>

            <!-- Title -->
            <h1 style="font-size: 3em;" class="sm:text-5xl font-bold text-gray-900 mb-4">
                <?php the_title(); ?>
            </h1>

            <!-- Post Meta -->
            <div class="flex items-center space-x-4 text-sm text-gray-600 mb-8">
                <div class="flex items-center">
                    <?php echo get_avatar(get_the_author_meta('ID'), 36, '', '', array('class' => 'w-9 h-9 rounded-full mr-2')); ?>
                    <span><?php the_author(); ?></span>
                </div>
                <span>•</span>
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                <span>•</span>
                <span><?php echo round(str_word_count(strip_tags(get_the_content())) / 250); ?> min read</span>
            </div>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="rounded-lg overflow-hidden mb-10">
                    <?php the_post_thumbnail('full', array('class' => 'w-full h-auto')); ?>
                </div>
            <?php endif; ?>
        </header>

        <!-- Post Content -->
        <div class="prose prose-lg max-w-none prose-indigo">
            <?php 
            if (have_posts()) : 
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif; 
            ?>
        </div>
        

        <!-- CTA Section -->
  <section class="bg-indigo-600 text-white my-6 py-6">
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


        <!-- Post Footer -->
        <footer class="mt-12 pt-8 border-t border-gray-200">
            <!-- Tags -->
            <?php
            $tags = get_the_tags();
            if (!empty($tags)) : ?>
                <div class="mb-8">
                    <h4 class="text-sm text-gray-500 uppercase tracking-wide font-medium mb-3">Tags</h4>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Author Bio -->
            <?php
            $author_id = get_the_author_meta('ID');
            $author_bio = get_the_author_meta('description');
            if (!empty($author_bio)) : ?>
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <div class="flex items-start">
                        <?php echo get_avatar($author_id, 64, '', '', array('class' => 'w-16 h-16 rounded-full mr-4')); ?>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">About <?php the_author(); ?></h4>
                            <p class="text-gray-600"><?php echo esc_html($author_bio); ?></p>
                            <?php 
                            $author_website = get_the_author_meta('user_url');
                            if (!empty($author_website)) : ?>
                                <a href="<?php echo esc_url($author_website); ?>" class="inline-block mt-2 text-indigo-600 hover:text-indigo-800 font-medium">Visit Website</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Post Navigation -->
            <nav class="flex flex-col sm:flex-row justify-between gap-4 py-6 border-t border-b border-gray-200">
                <?php
                $prev_post = get_previous_post();
                if (!empty($prev_post)) : ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="group flex-1 flex items-center p-4 bg-white rounded-lg border border-gray-200 hover:border-indigo-500 hover:shadow-md transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <div>
                            <span class="block text-sm text-gray-500 mb-1">Previous Post</span>
                            <span class="font-medium text-gray-900 group-hover:text-indigo-600"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                        </div>
                    </a>
                <?php else : ?>
                    <div class="flex-1"></div>
                <?php endif; ?>

                <?php
                $next_post = get_next_post();
                if (!empty($next_post)) : ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="group flex-1 flex items-center justify-end p-4 bg-white rounded-lg border border-gray-200 hover:border-indigo-500 hover:shadow-md transition-all">
                        <div class="text-right">
                            <span class="block text-sm text-gray-500 mb-1">Next Post</span>
                            <span class="font-medium text-gray-900 group-hover:text-indigo-600"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-gray-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                <?php else : ?>
                    <div class="flex-1"></div>
                <?php endif; ?>
            </nav>
        </footer>
    </div>

    <!-- Related Posts Section -->
    <div class="mt-16 bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-8">Related Posts</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $categories = get_the_category();
                $category_ids = array();
                foreach ($categories as $category) {
                    $category_ids[] = $category->term_id;
                }
                
                $related_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => $category_ids,
                    'orderby' => 'rand'
                );
                
                $related_query = new WP_Query($related_args);
                
                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post();
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
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full mb-2">
                                <?php
                                $post_categories = get_the_category();
                                if (!empty($post_categories)) {
                                    echo esc_html($post_categories[0]->name);
                                }
                                ?>
                            </span>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-indigo-600 transition-colors"><?php the_title(); ?></a>
                            </h4>
                            <div class="flex items-center text-sm text-gray-500">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <span class="mx-2">•</span>
                                <span><?php echo round(str_word_count(strip_tags(get_the_content())) / 250); ?> min read</span>
                            </div>
                        </div>
                    </article>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : 
                ?>
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-600">No related posts found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


</article>

<?php get_footer(); ?>