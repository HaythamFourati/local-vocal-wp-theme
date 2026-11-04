<?php
/**
 * Free SEO Review intake: multi-step pop-up + inline form, submissions
 * stored as a private post type under SEO Review Intake in the admin,
 * with email and Microsoft Teams notifications.
 *
 * Ships with the theme (was the lvm-seo-intake plugin). Open the pop-up
 * from any link or button with a data-lvm-intake attribute, or a link
 * whose href ends in #free-seo-review. Keep a real href on those links.
 *
 * @package Local_Vocal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LVMI_VERSION', '1.1.0' );
define( 'LVMI_PATH', get_theme_file_path( '/inc/intake/' ) );
define( 'LVMI_URL', get_theme_file_uri( '/inc/intake/' ) );
define( 'LVMI_CPT', 'lvm_intake' );

require_once LVMI_PATH . 'includes/fields.php';
require_once LVMI_PATH . 'includes/submit.php';
require_once LVMI_PATH . 'includes/admin.php';
require_once LVMI_PATH . 'includes/notify.php';
require_once LVMI_PATH . 'includes/frontend.php';

/**
 * Submissions are a private post type: stored in wp_posts / wp_postmeta,
 * never public, and not creatable by hand (they only come from the form).
 */
function lvmi_register_cpt() {
	register_post_type(
		LVMI_CPT,
		array(
			'labels'          => array(
				'name'               => __( 'SEO Review Intake', 'lvm-seo-intake' ),
				'singular_name'      => __( 'Intake', 'lvm-seo-intake' ),
				'menu_name'          => __( 'SEO Review Intake', 'lvm-seo-intake' ),
				'all_items'          => __( 'All requests', 'lvm-seo-intake' ),
				'edit_item'          => __( 'Review request', 'lvm-seo-intake' ),
				'search_items'       => __( 'Search requests', 'lvm-seo-intake' ),
				'not_found'          => __( 'No requests yet.', 'lvm-seo-intake' ),
				'not_found_in_trash' => __( 'No requests in the trash.', 'lvm-seo-intake' ),
			),
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => false,
			'menu_position'   => 26,
			'menu_icon'       => 'dashicons-clipboard',
			'supports'        => array( 'title' ),
			'capability_type' => 'post',
			'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'    => true,
			'rewrite'         => false,
			'query_var'       => false,
		)
	);
}
add_action( 'init', 'lvmi_register_cpt' );
