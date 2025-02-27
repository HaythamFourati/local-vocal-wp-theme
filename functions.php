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