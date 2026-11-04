<?php
/**
 * Admin: SEO Review Intake list (columns, status filter, unread bubble)
 * and the request screen (all answers + status).
 *
 * @package LVM_SEO_Intake
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ---------- List table ---------- */

add_filter(
	'manage_' . LVMI_CPT . '_posts_columns',
	function () {
		return array(
			'cb'       => '<input type="checkbox" />',
			'title'    => __( 'Business', 'lvm-seo-intake' ),
			'contact'  => __( 'Contact', 'lvm-seo-intake' ),
			'website'  => __( 'Website', 'lvm-seo-intake' ),
			'goals'    => __( 'Goals', 'lvm-seo-intake' ),
			'budget'   => __( 'Budget', 'lvm-seo-intake' ),
			'timeline' => __( 'Timeline', 'lvm-seo-intake' ),
			'status'   => __( 'Status', 'lvm-seo-intake' ),
			'date'     => __( 'Received', 'lvm-seo-intake' ),
		);
	}
);

add_action(
	'manage_' . LVMI_CPT . '_posts_custom_column',
	function ( $col, $post_id ) {
		$fields = lvmi_fields();
		$meta   = function ( $k ) use ( $post_id ) {
			return get_post_meta( $post_id, '_lvmi_' . $k, true );
		};
		switch ( $col ) {
			case 'contact':
				echo esc_html( $meta( 'name' ) ) . '<br><a href="mailto:' . esc_attr( $meta( 'email' ) ) . '">' . esc_html( $meta( 'email' ) ) . '</a>';
				if ( $meta( 'phone' ) ) {
					echo '<br><a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $meta( 'phone' ) ) ) . '">' . esc_html( $meta( 'phone' ) ) . '</a>';
				}
				break;
			case 'website':
				$url = $meta( 'website' );
				echo $url ? '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( preg_replace( '#^https?://(www\.)?#', '', untrailingslashit( $url ) ) ) . '</a>' : '—';
				break;
			case 'goals':
			case 'budget':
			case 'timeline':
				echo esc_html( lvmi_display_value( $fields[ $col ], $meta( $col ) ) ?: '—' );
				break;
			case 'status':
				$s = $meta( 'status' ) ?: 'new';
				echo '<span class="lvmi-status lvmi-status--' . esc_attr( $s ) . '">' . esc_html( lvmi_statuses()[ $s ] ?? $s ) . '</span>';
				break;
		}
	},
	10,
	2
);

// Status filter above the list.
add_action(
	'restrict_manage_posts',
	function ( $post_type ) {
		if ( LVMI_CPT !== $post_type ) {
			return;
		}
		$cur = sanitize_key( $_GET['lvmi_status'] ?? '' ); // phpcs:ignore WordPress.Security.NonceVerification
		echo '<select name="lvmi_status"><option value="">' . esc_html__( 'All statuses', 'lvm-seo-intake' ) . '</option>';
		foreach ( lvmi_statuses() as $k => $label ) {
			echo '<option value="' . esc_attr( $k ) . '"' . selected( $cur, $k, false ) . '>' . esc_html( $label ) . '</option>';
		}
		echo '</select>';
	}
);
add_action(
	'pre_get_posts',
	function ( $q ) {
		if ( ! is_admin() || ! $q->is_main_query() || LVMI_CPT !== $q->get( 'post_type' ) ) {
			return;
		}
		$s = sanitize_key( $_GET['lvmi_status'] ?? '' ); // phpcs:ignore WordPress.Security.NonceVerification
		if ( $s && isset( lvmi_statuses()[ $s ] ) ) {
			$q->set( 'meta_query', array( array( 'key' => '_lvmi_status', 'value' => $s ) ) );
		}
	}
);

// No Quick Edit: requests are read-only apart from their status.
add_filter(
	'post_row_actions',
	function ( $actions, $post ) {
		if ( LVMI_CPT === $post->post_type ) {
			unset( $actions['inline hide-if-no-js'] );
			$actions['edit'] = '<a href="' . esc_url( get_edit_post_link( $post->ID ) ) . '">' . esc_html__( 'Open', 'lvm-seo-intake' ) . '</a>';
		}
		return $actions;
	},
	10,
	2
);

// Count of new requests next to the menu item.
add_action(
	'admin_menu',
	function () {
		global $menu;
		$new = (int) ( new WP_Query(
			array(
				'post_type'      => LVMI_CPT,
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'meta_key'       => '_lvmi_status', // phpcs:ignore WordPress.DB.SlowDBQuery
				'meta_value'     => 'new',          // phpcs:ignore WordPress.DB.SlowDBQuery
			)
		) )->found_posts;
		if ( ! $new ) {
			return;
		}
		foreach ( $menu as $i => $item ) {
			if ( 'edit.php?post_type=' . LVMI_CPT === $item[2] ) {
				$menu[ $i ][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $new . '</span></span>'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride
			}
		}
	},
	99
);

/* ---------- Request screen ---------- */

add_action(
	'add_meta_boxes_' . LVMI_CPT,
	function () {
		add_meta_box( 'lvmi_answers', __( 'Answers', 'lvm-seo-intake' ), 'lvmi_render_answers', LVMI_CPT, 'normal', 'high' );
		add_meta_box( 'lvmi_status', __( 'Status', 'lvm-seo-intake' ), 'lvmi_render_status', LVMI_CPT, 'side', 'high' );
	}
);

/**
 * All answers, grouped by step.
 *
 * @param WP_Post $post Request.
 */
function lvmi_render_answers( $post ) {
	echo '<div class="lvmi-answers">';
	foreach ( lvmi_steps() as $step ) {
		echo '<h3>' . esc_html( $step['rail'] ) . '</h3><table class="widefat striped"><tbody>';
		foreach ( $step['fields'] as $key => $f ) {
			$raw = get_post_meta( $post->ID, '_lvmi_' . $key, true );
			$v   = lvmi_display_value( $f, $raw );
			if ( 'email' === $f['type'] && $v ) {
				$cell = '<a href="mailto:' . esc_attr( $v ) . '">' . esc_html( $v ) . '</a>';
			} elseif ( 'url' === $f['type'] && $v ) {
				$cell = '<a href="' . esc_url( $v ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $v ) . '</a>';
			} else {
				$cell = '' === $v ? '<span class="lvmi-empty">—</span>' : nl2br( esc_html( $v ) );
			}
			echo '<tr><th scope="row">' . esc_html( $f['label'] ) . '</th><td>' . $cell . '</td></tr>'; // phpcs:ignore WordPress.Security.EscapeOutput -- $cell escaped above
		}
		echo '</tbody></table>';
	}
	$src = get_post_meta( $post->ID, '_lvmi_source', true );
	echo '<p class="lvmi-meta">' . esc_html(
		sprintf(
			/* translators: 1: date, 2: page URL */
			__( 'Received %1$s from %2$s', 'lvm-seo-intake' ),
			get_the_date( 'M j, Y \a\t g:i a', $post ),
			$src ? $src : __( 'the website', 'lvm-seo-intake' )
		)
	) . '</p></div>';
}

/**
 * Status picker; saved with the Update button.
 *
 * @param WP_Post $post Request.
 */
function lvmi_render_status( $post ) {
	wp_nonce_field( 'lvmi_status', 'lvmi_status_nonce' );
	$cur = get_post_meta( $post->ID, '_lvmi_status', true ) ?: 'new';
	echo '<select name="lvmi_status" style="width:100%">';
	foreach ( lvmi_statuses() as $k => $label ) {
		echo '<option value="' . esc_attr( $k ) . '"' . selected( $cur, $k, false ) . '>' . esc_html( $label ) . '</option>';
	}
	echo '</select><p class="description">' . esc_html__( 'Click Update to save.', 'lvm-seo-intake' ) . '</p>';
}

add_action(
	'save_post_' . LVMI_CPT,
	function ( $post_id ) {
		if ( ! isset( $_POST['lvmi_status_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['lvmi_status_nonce'] ), 'lvmi_status' ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		$s = sanitize_key( $_POST['lvmi_status'] ?? '' );
		if ( isset( lvmi_statuses()[ $s ] ) ) {
			update_post_meta( $post_id, '_lvmi_status', $s );
		}
	}
);

// Small admin styles: status badges and the answers table.
add_action(
	'admin_head',
	function () {
		$screen = get_current_screen();
		if ( ! $screen || LVMI_CPT !== $screen->post_type ) {
			return;
		}
		?>
		<style>
			.lvmi-status { display: inline-block; padding: 3px 9px; border-radius: 999px; font-size: 12px; font-weight: 600; line-height: 1.5; }
			.lvmi-status--new { background: #fdeee2; color: #b4500f; }
			.lvmi-status--contacted { background: #e7f0fd; color: #1d4fa3; }
			.lvmi-status--report { background: #e6f6ec; color: #1f7a3f; }
			.lvmi-status--closed { background: #f0f0f1; color: #50575e; }
			.column-status { width: 110px; } .column-date { width: 140px; } .column-budget, .column-timeline { width: 130px; }
			.lvmi-answers h3 { margin: 18px 0 8px; font-size: 13px; text-transform: uppercase; letter-spacing: .04em; color: #646970; }
			.lvmi-answers h3:first-child { margin-top: 4px; }
			.lvmi-answers th { width: 34%; font-weight: 600; }
			.lvmi-empty { color: #a7aaad; }
			.lvmi-meta { margin-top: 16px; color: #646970; }
			.post-type-<?php echo esc_attr( LVMI_CPT ); ?> #titlediv #title { pointer-events: none; background: #f6f7f7; }
		</style>
		<?php
	}
);
