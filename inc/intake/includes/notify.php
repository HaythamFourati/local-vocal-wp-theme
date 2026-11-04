<?php
/**
 * Notifications for new requests: email (one or more addresses) and a
 * Microsoft Teams channel, set under SEO Review Intake → Notifications.
 *
 * Teams uses the Workflows app ("Send webhook alerts to a channel"), which
 * replaced the retired Office 365 Incoming Webhook connector. The workflow
 * gives a URL; we POST an Adaptive Card to it.
 *
 * @package LVM_SEO_Intake
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Saved settings with defaults.
 *
 * @return array{emails:string,teams_url:string}
 */
function lvmi_notify_settings() {
	return wp_parse_args( (array) get_option( 'lvmi_notify', array() ), array( 'emails' => '', 'teams_url' => '' ) );
}

/**
 * Email and Teams for one request.
 *
 * @param int   $post_id Request ID, 0 for a test.
 * @param array $clean   Clean values keyed by field.
 * @param bool  $wait    Wait for Teams to answer (tests) instead of firing and forgetting.
 * @return array{email:bool,teams:string} What happened, for the test notice.
 */
function lvmi_notify( $post_id, $clean, $wait = false ) {
	$set  = lvmi_notify_settings();
	$link = $post_id ? admin_url( 'post.php?post=' . $post_id . '&action=edit' ) : admin_url( 'edit.php?post_type=' . LVMI_CPT );
	$rows = array();
	foreach ( lvmi_fields() as $key => $f ) {
		$v = lvmi_display_value( $f, $clean[ $key ] ?? '' );
		if ( '' !== $v ) {
			$rows[ $f['label'] ] = $v;
		}
	}
	$subject = sprintf(
		/* translators: %s: business name */
		__( 'New free SEO review request: %s', 'lvm-seo-intake' ),
		$clean['business']
	);
	$out = array( 'email' => false, 'teams' => '' );

	// Email.
	$to = apply_filters( 'lvmi_notify_to', $set['emails'] ? $set['emails'] : get_option( 'admin_email' ) );
	if ( $to ) {
		$lines = array();
		foreach ( $rows as $label => $v ) {
			$lines[] = $label . ': ' . $v;
		}
		$lines[]      = '';
		$lines[]      = __( 'Open in WordPress:', 'lvm-seo-intake' ) . ' ' . $link;
		$out['email'] = wp_mail(
			$to,
			$subject,
			implode( "\n", $lines ),
			array( 'Reply-To: ' . str_replace( array( '"', '<', '>', ',', ';', ':', '@' ), '', $clean['name'] ) . ' <' . $clean['email'] . '>' ) // no extra addresses smuggled in via the name
		);
	}

	// Teams.
	if ( $set['teams_url'] ) {
		// Teams renders markdown in cards; break [text](url) so a visitor can't plant links.
		$md    = fn( $s ) => str_replace( array( '[', ']' ), array( '(', ')' ), $s );
		$facts = array();
		foreach ( $rows as $label => $v ) {
			$facts[] = array( 'title' => $label, 'value' => $md( $v ) );
		}
		$card = array(
			'type'        => 'message',
			'attachments' => array(
				array(
					'contentType' => 'application/vnd.microsoft.card.adaptive',
					'content'     => array(
						'$schema' => 'http://adaptivecards.io/schemas/adaptive-card.json',
						'type'    => 'AdaptiveCard',
						'version' => '1.4',
						'body'    => array(
							array( 'type' => 'TextBlock', 'text' => $post_id ? __( 'New free SEO review request', 'lvm-seo-intake' ) : __( 'Test notification', 'lvm-seo-intake' ), 'size' => 'Medium', 'weight' => 'Bolder', 'color' => 'Accent' ),
							array( 'type' => 'TextBlock', 'text' => $md( $clean['business'] . ' — ' . $clean['name'] ), 'wrap' => true, 'spacing' => 'None' ),
							array( 'type' => 'FactSet', 'facts' => $facts ),
						),
						'actions' => array(
							array( 'type' => 'Action.OpenUrl', 'title' => __( 'Open in WordPress', 'lvm-seo-intake' ), 'url' => $link ),
							array( 'type' => 'Action.OpenUrl', 'title' => __( 'Reply by email', 'lvm-seo-intake' ), 'url' => 'mailto:' . rawurlencode( $clean['email'] ) . '?subject=' . rawurlencode( __( 'Your free SEO review', 'lvm-seo-intake' ) ) ),
						),
					),
				),
			),
		);
		// wp_safe_remote_post refuses internal addresses, so the URL can only reach the outside world.
		$res = wp_safe_remote_post(
			$set['teams_url'],
			array(
				'headers'  => array( 'Content-Type' => 'application/json' ),
				'body'     => wp_json_encode( $card ),
				'timeout'  => $wait ? 15 : 5,
				'blocking' => $wait, // don't make the visitor wait on Microsoft
			)
		);
		if ( $wait ) {
			$code         = wp_remote_retrieve_response_code( $res );
			$out['teams'] = is_wp_error( $res ) ? $res->get_error_message() : ( $code >= 200 && $code < 300 ? 'ok' : 'HTTP ' . $code );
		} else {
			$out['teams'] = 'sent';
		}
	}

	return $out;
}

/* ---------- Settings screen ---------- */

add_action(
	'admin_init',
	function () {
		register_setting(
			'lvmi_notify',
			'lvmi_notify',
			array(
				'type'              => 'array',
				'sanitize_callback' => 'lvmi_sanitize_notify',
				'default'           => array(),
			)
		);
	}
);

/**
 * Keep only valid emails and an https Teams URL.
 *
 * @param mixed $in Posted settings.
 * @return array
 */
function lvmi_sanitize_notify( $in ) {
	$in     = (array) $in;
	$emails = array_filter( array_map( 'sanitize_email', preg_split( '/[\s,;]+/', (string) ( $in['emails'] ?? '' ) ) ), 'is_email' );
	$url    = esc_url_raw( trim( (string) ( $in['teams_url'] ?? '' ) ), array( 'https' ) );
	if ( trim( (string) ( $in['teams_url'] ?? '' ) ) && ! $url && function_exists( 'add_settings_error' ) ) {
		add_settings_error( 'lvmi_notify', 'lvmi_url', __( 'The Teams link must start with https://. It wasn’t saved.', 'lvm-seo-intake' ) );
	}
	return array( 'emails' => implode( ', ', array_unique( $emails ) ), 'teams_url' => $url );
}

add_action(
	'admin_menu',
	function () {
		add_submenu_page( 'edit.php?post_type=' . LVMI_CPT, __( 'Notifications', 'lvm-seo-intake' ), __( 'Notifications', 'lvm-seo-intake' ), 'manage_options', 'lvmi-notify', 'lvmi_render_notify_page' );
	}
);

/**
 * Notifications settings page.
 */
function lvmi_render_notify_page() {
	$set  = lvmi_notify_settings();
	$test = get_transient( 'lvmi_test_' . get_current_user_id() );
	delete_transient( 'lvmi_test_' . get_current_user_id() );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Notifications', 'lvm-seo-intake' ); ?></h1>
		<?php settings_errors( 'lvmi_notify' ); ?>
		<?php if ( $test ) : ?>
			<div class="notice notice-<?php echo esc_attr( $test['ok'] ? 'success' : 'warning' ); ?> is-dismissible"><p><?php echo esc_html( $test['msg'] ); ?></p></div>
		<?php endif; ?>
		<p><?php esc_html_e( 'Every new Free SEO Review request is sent to the places below.', 'lvm-seo-intake' ); ?></p>
		<form method="post" action="options.php">
			<?php settings_fields( 'lvmi_notify' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="lvmi-emails"><?php esc_html_e( 'Email to', 'lvm-seo-intake' ); ?></label></th>
					<td>
						<input type="text" class="large-text" id="lvmi-emails" name="lvmi_notify[emails]" value="<?php echo esc_attr( $set['emails'] ); ?>" placeholder="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">
						<p class="description"><?php esc_html_e( 'One or more addresses, separated by commas. Leave blank to use the site admin email.', 'lvm-seo-intake' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="lvmi-teams"><?php esc_html_e( 'Microsoft Teams', 'lvm-seo-intake' ); ?></label></th>
					<td>
						<input type="url" class="large-text code" id="lvmi-teams" name="lvmi_notify[teams_url]" value="<?php echo esc_attr( $set['teams_url'] ); ?>" placeholder="https://…" autocomplete="off" spellcheck="false">
						<p class="description"><?php esc_html_e( 'Keep this link private: anyone who has it can post to the channel.', 'lvm-seo-intake' ); ?></p>
						<details style="margin-top:8px"><summary><?php esc_html_e( 'How to get the link', 'lvm-seo-intake' ); ?></summary>
							<ol>
								<li><?php esc_html_e( 'In Teams, open the channel (or chat) where requests should appear.', 'lvm-seo-intake' ); ?></li>
								<li><?php esc_html_e( 'Click ••• next to the channel name, then Workflows.', 'lvm-seo-intake' ); ?></li>
								<li><?php esc_html_e( 'Pick “Send webhook alerts to a channel”, name it “SEO Review Intake”, and click Next, then Add workflow.', 'lvm-seo-intake' ); ?></li>
								<li><?php esc_html_e( 'Copy the link Teams shows and paste it above, then Save and Send test.', 'lvm-seo-intake' ); ?></li>
							</ol>
						</details>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="lvmi_test_notify">
			<?php wp_nonce_field( 'lvmi_test_notify' ); ?>
			<?php submit_button( __( 'Send test notification', 'lvm-seo-intake' ), 'secondary', 'submit', false ); ?>
		</form>
	</div>
	<?php
}

add_action(
	'admin_post_lvmi_test_notify',
	function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Not allowed.', 'lvm-seo-intake' ), 403 );
		}
		check_admin_referer( 'lvmi_test_notify' );

		// Sample answers: the first option of every choice field.
		$sample = array(
			'business' => 'Test Business Co.',
			'name'     => 'Test Person',
			'email'    => wp_get_current_user()->user_email,
			'website'  => home_url( '/' ),
			'area'     => 'Baltimore, MD',
		);
		foreach ( lvmi_fields() as $key => $f ) {
			if ( ! isset( $sample[ $key ] ) && ! empty( $f['options'] ) ) {
				$first          = array_key_first( $f['options'] );
				$sample[ $key ] = 'choices' === $f['type'] ? array( $first ) : $first;
			}
		}
		$r   = lvmi_notify( 0, $sample, true );
		$msg = array( $r['email'] ? __( 'Email sent.', 'lvm-seo-intake' ) : __( 'Email failed: WordPress couldn’t send mail from this server.', 'lvm-seo-intake' ) );
		if ( 'ok' === $r['teams'] ) {
			$msg[] = __( 'Posted to Teams.', 'lvm-seo-intake' );
		} elseif ( $r['teams'] ) {
			/* translators: %s: error */
			$msg[] = sprintf( __( 'Teams didn’t accept it (%s). Check the link.', 'lvm-seo-intake' ), $r['teams'] );
		} else {
			$msg[] = __( 'No Teams link set.', 'lvm-seo-intake' );
		}
		set_transient(
			'lvmi_test_' . get_current_user_id(),
			array( 'ok' => $r['email'] && 'ok' === $r['teams'], 'msg' => implode( ' ', $msg ) ),
			MINUTE_IN_SECONDS
		);
		wp_safe_redirect( admin_url( 'edit.php?post_type=' . LVMI_CPT . '&page=lvmi-notify' ) );
		exit;
	}
);
