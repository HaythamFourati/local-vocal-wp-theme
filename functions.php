<?php

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));

  // Enqueue mobile menu script
  wp_enqueue_script('mobile-menu', get_theme_file_uri('/src/scripts/mobilemenu.js'), array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  // Add menu support
  add_theme_support('menus');

  // Register Navigation Menus
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'local-vocal'),
    'footer' => __('Footer Menu', 'local-vocal'),
    'mobile' => __('Mobile Menu', 'local-vocal')
  ));
}

add_action('after_setup_theme', 'boilerplate_add_support');

// Enqueue Contact Form 7 custom styles
function enqueue_cf7_custom_styles() {
    if (function_exists('wpcf7_contact_form')) {
        wp_enqueue_style('cf7-custom', get_template_directory_uri() . '/src/contact-form.css', array(), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_cf7_custom_styles');

// Enqueue post navigation styles
function enqueue_post_navigation_styles() {
    if (is_single()) {
        wp_enqueue_style('post-navigation', get_template_directory_uri() . '/src/post-navigation.css', array(), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_post_navigation_styles');