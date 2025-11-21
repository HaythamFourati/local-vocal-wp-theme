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

// Add custom menu item for Funnel + CRM Offer
function add_crm_offer_menu_item($items, $args) {
    // Only add to primary menu
    if ($args->theme_location == 'primary') {
        $crm_item = '<li class="menu-item" style="position: relative; padding-right: 0.5rem;"><a href="' . home_url('/website-crm-offer') . '"><span class="text-gray-900 hover:text-blue-600 transition-colors">Funnel + CRM</span></a><span style="position: absolute; top: -1.4rem; right: -4rem; background-color: #ef4444; color: white; font-size: 0.625rem; font-weight: 700; padding: 0.1rem 0.25rem; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.025em; white-space: nowrap; box-shadow: 0 4px 6px rgba(239, 68, 68, 0.3); animation: pulse-bubble 2s ease-in-out infinite;">Limited Offer</span></li>
        <style>
        @keyframes pulse-bubble {
            0%, 100% { transform: scale(1); box-shadow: 0 4px 6px rgba(239, 68, 68, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 6px 12px rgba(239, 68, 68, 0.4); }
        }
        </style>';
        $items .= $crm_item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_crm_offer_menu_item', 10, 2);