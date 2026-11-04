<?php
/**
 * Submission endpoint: POST /wp-json/lvm-intake/v1/submit
 *
 * Public by design. Guarded by a same-origin check, a honeypot, a minimum
 * fill time and a per-IP rate limit; every value is validated against the
 * field schema before anything is stored.
 *
 * No nonce on purpose: a nonce baked into the page goes stale under page
 * caching (SiteGround Speed Optimizer on live), and REST drops logged-in
 * users to user 0 without an X-WP-Nonce header, so a user-bound nonce
 * never verifies for admins. CSRF protection isn't meaningful for an
 * anonymous public form anyway.
 *
 * @package LVM_SEO_Intake
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const LVMI_MIN_SECONDS = 4;  // faster than this is a bot
const LVMI_RATE_LIMIT  = 5;  // submissions per IP per hour

add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'lvm-intake/v1',
			'/submit',
			array(
				'methods'             => 'POST',
				'callback'            => 'lvmi_handle_submit',
				'permission_callback' => '__return_true',
			)
		);
	}
);

/**
 * Validate, store and notify.
 *
 * @param WP_REST_Request $req Request.
 * @return WP_REST_Response|WP_Error
 */
function lvmi_handle_submit( WP_REST_Request $req ) {
	$p = $req->get_json_params();
	if ( ! is_array( $p ) ) {
		return new WP_Error( 'lvmi_bad_request', __( 'Something went wrong. Please try again.', 'lvm-seo-intake' ), array( 'status' => 400 ) );
	}

	// Posted from another site? Browsers always send Origin on a cross-site POST.
	$from = get_http_origin() ?: wp_get_referer();
	if ( $from && wp_parse_url( $from, PHP_URL_HOST ) !== wp_parse_url( home_url(), PHP_URL_HOST ) ) {
		return new WP_Error( 'lvmi_origin', __( 'Please submit the form from our website.', 'lvm-seo-intake' ), array( 'status' => 403 ) );
	}

	// Bots: filled the hidden field, or answered four steps in a blink. Pretend it worked.
	// _ms is measured in the browser (open → submit), so clock skew can't trip it.
	$elapsed = (int) ( $p['_ms'] ?? 0 ) / 1000;
	if ( ! empty( $p['_hp'] ) || $elapsed < LVMI_MIN_SECONDS ) {
		return rest_ensure_response( array( 'ok' => true ) );
	}

	$ip_key = 'lvmi_rl_' . md5( (string) ( $_SERVER['REMOTE_ADDR'] ?? '' ) . wp_salt( 'nonce' ) );
	$hits   = (int) get_transient( $ip_key );
	if ( $hits >= LVMI_RATE_LIMIT ) {
		return new WP_Error( 'lvmi_rate', __( 'You’ve sent a few requests already — we’ll be in touch soon.', 'lvm-seo-intake' ), array( 'status' => 429 ) );
	}

	$clean  = array();
	$errors = array();
	foreach ( lvmi_fields() as $key => $f ) {
		$raw = $p[ $key ] ?? '';
		switch ( $f['type'] ) {
			case 'email':
				$val = sanitize_email( (string) $raw );
				if ( '' !== $raw && ! is_email( $val ) ) {
					$errors[ $key ] = __( 'Enter a valid email address.', 'lvm-seo-intake' );
				}
				break;
			case 'url':
				$val = trim( (string) $raw );
				if ( '' !== $val && ! preg_match( '#^https?://#i', $val ) ) {
					$val = 'https://' . $val;
				}
				$val = esc_url_raw( $val );
				break;
			case 'textarea':
				$val = mb_substr( sanitize_textarea_field( (string) $raw ), 0, 2000 );
				break;
			case 'choice':
				$val = is_string( $raw ) && isset( $f['options'][ $raw ] ) ? $raw : '';
				break;
			case 'choices':
				$val = array_values( array_intersect( array_filter( (array) $raw, 'is_string' ), array_keys( $f['options'] ) ) );
				break;
			default:
				$val = mb_substr( sanitize_text_field( (string) $raw ), 0, 200 );
		}
		if ( ! empty( $f['required'] ) && ( '' === $val || array() === $val ) && ! isset( $errors[ $key ] ) ) {
			$errors[ $key ] = __( 'This one’s required.', 'lvm-seo-intake' );
		}
		$clean[ $key ] = $val;
	}

	if ( $errors ) {
		return new WP_Error( 'lvmi_invalid', __( 'A few answers need another look.', 'lvm-seo-intake' ), array( 'status' => 422, 'fields' => $errors ) );
	}

	$post_id = wp_insert_post(
		array(
			'post_type'   => LVMI_CPT,
			'post_status' => 'publish',
			'post_title'  => $clean['business'] . ' — ' . $clean['name'],
		),
		true
	);
	if ( is_wp_error( $post_id ) ) {
		return new WP_Error( 'lvmi_save', __( 'We couldn’t save that. Please call us at (443) 852-1000.', 'lvm-seo-intake' ), array( 'status' => 500 ) );
	}

	foreach ( $clean as $key => $val ) {
		update_post_meta( $post_id, '_lvmi_' . $key, $val );
	}
	update_post_meta( $post_id, '_lvmi_status', 'new' );
	update_post_meta( $post_id, '_lvmi_source', esc_url_raw( (string) ( $p['_page'] ?? '' ) ) );
	set_transient( $ip_key, $hits + 1, HOUR_IN_SECONDS );

	lvmi_notify( $post_id, $clean );

	return rest_ensure_response( array( 'ok' => true ) );
}
