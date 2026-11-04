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
  // General Sans (display + logo) and Onest (body), on every page
  wp_enqueue_style( 'lvm-home-fonts-display', 'https://api.fontshare.com/v2/css?f[]=general-sans@300,400,500,600&display=swap', array(), null );
  wp_enqueue_style( 'lvm-home-fonts-body', 'https://fonts.googleapis.com/css2?family=Onest:wght@400;500;600&display=swap', array(), null );
  // Site layer: dark chrome + inner pages on the homepage system
  $site_css = get_theme_file_path( '/src/site.css' );
  wp_enqueue_style( 'lvm-site', get_theme_file_uri( '/src/site.css' ), array( 'lvm-redesign' ), filemtime( $site_css ) );
  // Homepage design system (all rules scoped under .lvh): every page, since
  // the shared closing CTA (template-parts/cta.php) uses it. Same for its shader.
  $home_css = get_theme_file_path( '/src/home.css' );
  $shader   = get_theme_file_path( '/src/scripts/shader.js' );
  wp_enqueue_style( 'lvm-home', get_theme_file_uri( '/src/home.css' ), array( 'lvm-site' ), filemtime( $home_css ) );
  wp_enqueue_script( 'lvm-shader', get_theme_file_uri( '/src/scripts/shader.js' ), array(), filemtime( $shader ), true );
  if ( is_front_page() ) {
    $home_js = get_theme_file_path( '/src/scripts/home.js' );
    wp_enqueue_script( 'lvm-home', get_theme_file_uri( '/src/scripts/home.js' ), array(), filemtime( $home_js ), true );
  }
  wp_enqueue_script(
    'lvm-redesign',
    get_theme_file_uri( '/src/scripts/lvm-redesign.js' ),
    array(),
    file_exists( $js_path ) ? filemtime( $js_path ) : '1.0',
    true
  );
}
add_action( 'wp_enqueue_scripts', 'lvm_load_assets' );

/**
 * Local Vocal MD logo (inline SVG, shared by header and footer).
 * Wordmark uses currentColor; the pin uses --logo-accent. Animation
 * lives in lvm-redesign.css (.lvlogo*): one cycle on load, loops on hover.
 */
function lvm_logo( $class = '' ) {
  // Squircle tile + pin with voice bars, then a two-tone wordmark.
  // textLength pins the wordmark width so a fallback font can't overflow the viewBox.
  ?>
  <svg class="lvlogo <?php echo esc_attr( $class ); ?>" viewBox="0 0 178 40" role="img" aria-label="Local Vocal Marketing">
    <rect class="lvlogo__tile" width="40" height="40" rx="11"/>
    <rect width="40" height="40" rx="11" fill="url(#lvlogo-sheen)"/>
    <rect x=".5" y=".5" width="39" height="39" rx="10.5" fill="none" stroke="#fff" stroke-opacity=".22"/>
    <g class="lvlogo__pin">
      <path d="M20 7a10 10 0 0 0-10 10c0 6.3 5.2 10.7 10 15 4.8-4.3 10-8.7 10-15A10 10 0 0 0 20 7z" fill="#0E0E0C"/>
      <g class="lvlogo__bars">
        <rect class="lvlogo__bar lvlogo__bar--a" x="14.4" y="14" width="2.4" height="6" rx="1.2"/>
        <rect class="lvlogo__bar lvlogo__bar--c" x="18.8" y="11.5" width="2.4" height="11" rx="1.2"/>
        <rect class="lvlogo__bar lvlogo__bar--b" x="23.2" y="13" width="2.4" height="8" rx="1.2"/>
      </g>
    </g>
    <text class="lvlogo__word" x="52" y="27.6" font-size="21.5" textLength="124" lengthAdjust="spacingAndGlyphs">Local <tspan class="lvlogo__dim">Vocal</tspan></text>
    <defs>
      <linearGradient id="lvlogo-sheen" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0" stop-color="#fff" stop-opacity=".3"/>
        <stop offset=".55" stop-color="#fff" stop-opacity="0"/>
      </linearGradient>
    </defs>
  </svg>
  <?php
}

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

// SEO: titles, descriptions, social tags and JSON-LD from one data file.
// Works with Rank Math (feeds its filters) or without it (prints the tags).
require_once get_theme_file_path( '/inc/seo-data.php' );
require_once get_theme_file_path( '/inc/seo.php' );
// Free SEO Review intake. Skipped if the old lvm-seo-intake plugin is still active (it loads first);
// deactivate that plugin after switching to this theme.
if ( ! defined( 'LVMI_VERSION' ) ) {
	require_once get_theme_file_path( '/inc/intake/intake.php' );
}

/**
 * Pages whose slug differs between sites (live About is
 * /maryland-digital-marketing-agency/), found by their template instead.
 */
function lvm_page_templates() {
	return array( 'contact' => 'contact.php', 'about-us' => 'page-about-us.php' );
}

/**
 * URL of the Contact or About page, wherever it lives; /{key}/ otherwise.
 *
 * @param string $key 'contact' or 'about-us'.
 * @return string
 */
function lvm_url( $key ) {
	static $cache = array();
	if ( ! isset( $cache[ $key ] ) ) {
		$tpl           = lvm_page_templates()[ $key ] ?? '';
		$ids           = $tpl ? get_posts( array( 'post_type' => 'page', 'post_status' => 'publish', 'meta_key' => '_wp_page_template', 'meta_value' => $tpl, 'numberposts' => 1, 'fields' => 'ids' ) ) : array(); // phpcs:ignore WordPress.DB.SlowDBQuery
		$cache[ $key ] = $ids ? get_permalink( $ids[0] ) : home_url( '/' . $key . '/' );
	}
	return $cache[ $key ];
}

/**
 * Is this the Contact or About page (by slug or by template)?
 *
 * @param string $key 'contact' or 'about-us'.
 * @return bool
 */
function lvm_is_page( $key ) {
	return is_page( $key ) || is_page_template( lvm_page_templates()[ $key ] ?? '' );
}

/**
 * Platform app icons: official marks and colours, used by the homepage and
 * inner pages. [label, tile background, svg (24 box), glyph size %]
 *
 * @return array<string,array>
 */
function lvm_platforms() {
  return array(
    'facebook'  => array( 'Facebook',        '#0866FF', '<path fill="#fff" d="M15.12 5.32H17V2.14A26.1 26.1 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.03.28-1.73 1.76-1.73z"/>', 62 ),
    'instagram' => array( 'Instagram',       'radial-gradient(circle at 30% 107%,#fdf497 0%,#fdf497 5%,#fd5949 45%,#d6249f 60%,#285AEB 90%)', '<rect x="3.2" y="3.2" width="17.6" height="17.6" rx="5.2" fill="none" stroke="#fff" stroke-width="2"/><circle cx="12" cy="12" r="4.2" fill="none" stroke="#fff" stroke-width="2"/><circle cx="17.4" cy="6.6" r="1.25" fill="#fff"/>', 64 ),
    'youtube'   => array( 'YouTube',         '#ffffff', '<path fill="#FF0000" d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81z"/><path fill="#fff" d="M9.55 15.57V8.43L15.82 12z"/>', 70 ),
    'google'    => array( 'Google Business', '#ffffff', '<g transform="scale(.5)"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></g>', 58 ),
    'linkedin'  => array( 'LinkedIn',        '#0A66C2', '<path fill="#fff" d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zm1.78 13.02H3.56V9h3.56v11.45z"/>', 58 ),
    'tiktok'    => array( 'TikTok',          '#000000', '<path fill="#25F4EE" transform="translate(-.7 -.6)" d="M16.6 5.82A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5 2.6 2.6 0 0 1-2.6-2.6 2.6 2.6 0 0 1 3.4-2.47V9.67a5.73 5.73 0 0 0-.8-.05A5.68 5.68 0 0 0 4.18 15.3a5.68 5.68 0 0 0 9.67 4.03 5.65 5.65 0 0 0 1.68-4.03V9.01a7.33 7.33 0 0 0 4.29 1.38V7.32a4.28 4.28 0 0 1-3.22-1.5z"/><path fill="#FE2C55" transform="translate(.7 .6)" d="M16.6 5.82A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5 2.6 2.6 0 0 1-2.6-2.6 2.6 2.6 0 0 1 3.4-2.47V9.67a5.73 5.73 0 0 0-.8-.05A5.68 5.68 0 0 0 4.18 15.3a5.68 5.68 0 0 0 9.67 4.03 5.65 5.65 0 0 0 1.68-4.03V9.01a7.33 7.33 0 0 0 4.29 1.38V7.32a4.28 4.28 0 0 1-3.22-1.5z"/><path fill="#fff" d="M16.6 5.82A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5 2.6 2.6 0 0 1-2.6-2.6 2.6 2.6 0 0 1 3.4-2.47V9.67a5.73 5.73 0 0 0-.8-.05A5.68 5.68 0 0 0 4.18 15.3a5.68 5.68 0 0 0 9.67 4.03 5.65 5.65 0 0 0 1.68-4.03V9.01a7.33 7.33 0 0 0 4.29 1.38V7.32a4.28 4.28 0 0 1-3.22-1.5z"/>', 64 ),
  );
}

/**
 * One platform icon tile (.lvh-app, styled in src/home.css).
 *
 * @param string $key   facebook | instagram | youtube | google | linkedin | tiktok
 * @param string $class Extra classes, e.g. lvh-app--sm.
 * @return string
 */
function lvm_app_icon( $key, $class = '' ) {
  $p = lvm_platforms()[ $key ];
  return '<span class="lvh-app ' . esc_attr( $class ) . '" style="--app:' . esc_attr( $p[1] ) . ';--g:' . (int) $p[3] . '%" title="' . esc_attr( $p[0] ) . '"><svg viewBox="0 0 24 24" aria-hidden="true">' . $p[2] . '</svg></span>';
}
