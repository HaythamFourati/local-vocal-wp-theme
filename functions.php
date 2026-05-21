<?php

/**
 * Local Vocal Marketing — theme functions
 */

function lvm_load_assets() {
  // Legacy assets (still needed for service pages until they are migrated)
  if ( file_exists( get_theme_file_path( '/build/index.js' ) ) ) {
    wp_enqueue_script( 'ourmainjs', get_theme_file_uri( '/build/index.js' ), array( 'wp-element', 'react-jsx-runtime' ), '1.0', true );
  }
  if ( file_exists( get_theme_file_path( '/build/index.css' ) ) ) {
    wp_enqueue_style( 'ourmaincss', get_theme_file_uri( '/build/index.css' ), array(), '1.0' );
  }

  // Mobile menu (legacy)
  wp_enqueue_script( 'mobile-menu', get_theme_file_uri( '/src/scripts/mobilemenu.js' ), array(), '1.0', true );

  // Local Vocal redesign — load globally so the new header/footer styles apply
  $css_path = get_theme_file_path( '/src/lvm-redesign.css' );
  $js_path  = get_theme_file_path( '/src/scripts/lvm-redesign.js' );
  wp_enqueue_style(
    'lvm-redesign',
    get_theme_file_uri( '/src/lvm-redesign.css' ),
    array(),
    file_exists( $css_path ) ? filemtime( $css_path ) : '1.0'
  );
  wp_enqueue_script(
    'lvm-redesign',
    get_theme_file_uri( '/src/scripts/lvm-redesign.js' ),
    array(),
    file_exists( $js_path ) ? filemtime( $js_path ) : '1.0',
    true
  );
}
add_action( 'wp_enqueue_scripts', 'lvm_load_assets' );

function lvm_theme_support() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'local-vocal' ),
    'footer'  => __( 'Footer Menu', 'local-vocal' ),
    'mobile'  => __( 'Mobile Menu', 'local-vocal' ),
  ) );
}
add_action( 'after_setup_theme', 'lvm_theme_support' );

// Contact Form 7 custom styles
function lvm_enqueue_cf7_styles() {
  if ( function_exists( 'wpcf7_contact_form' ) ) {
    wp_enqueue_style( 'cf7-custom', get_template_directory_uri() . '/src/contact-form.css', array(), '1.0.0' );
  }
}
add_action( 'wp_enqueue_scripts', 'lvm_enqueue_cf7_styles' );

// Post navigation styles (single posts)
function lvm_enqueue_post_navigation_styles() {
  if ( is_single() ) {
    wp_enqueue_style( 'post-navigation', get_template_directory_uri() . '/src/post-navigation.css', array(), '1.0.0' );
  }
}
add_action( 'wp_enqueue_scripts', 'lvm_enqueue_post_navigation_styles' );

// Add lvm-redesign class to body on the homepage so the redesign CSS scope
// applies. The header.php passes 'lvm-redesign' to body_class() globally so
// the new nav/footer also inherit it; this keeps things consistent.
function lvm_body_class( $classes ) {
  if ( ! in_array( 'lvm-redesign', $classes, true ) ) {
    $classes[] = 'lvm-redesign';
  }
  return $classes;
}
add_filter( 'body_class', 'lvm_body_class' );

// Custom homepage title
function lvm_document_title( $title ) {
  if ( is_front_page() ) {
    $title['title'] = 'Local Vocal Marketing | Maryland Web Design & SEO for Local Businesses';
  }
  return $title;
}
add_filter( 'document_title_parts', 'lvm_document_title', 10, 1 );
