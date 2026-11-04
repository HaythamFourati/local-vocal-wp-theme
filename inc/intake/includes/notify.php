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
		$lines[] = '';
		$lines[] = __( 'Open in WordPress:', 'lvm-seo-intake' ) . ' ' . $link;
		$text    = implode( "\n", $lines );

		// HTML body, with the plain text as the fallback part for mail apps that don't show HTML.
		$alt = function ( $mailer ) use ( $text ) {
			$mailer->AltBody = $text; // phpcs:ignore WordPress.NamingConventions.ValidVariableName
		};
		add_action( 'phpmailer_init', $alt );
		$out['email'] = wp_mail(
			$to,
			$subject,
			lvmi_email_html( $post_id, $clean, $link ),
			array(
				'Content-Type: text/html; charset=UTF-8',
				'Reply-To: ' . str_replace( array( '"', '<', '>', ',', ';', ':', '@' ), '', $clean['name'] ) . ' <' . $clean['email'] . '>', // no extra addresses smuggled in via the name
			)
		);
		remove_action( 'phpmailer_init', $alt );
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

/**
 * Notification email: tables and inline styles only, so it holds up in
 * Gmail, Outlook and Apple Mail. Every visitor value is escaped.
 *
 * @param int    $post_id Request ID, 0 for a test.
 * @param array  $clean   Clean values keyed by field.
 * @param string $link    Admin link to the request.
 * @return string
 */
function lvmi_email_html( $post_id, $clean, $link ) {
	$e      = 'esc_html';
	$orange = '#F67F2F';
	$ink    = '#16130F';
	$muted  = '#6F675E';
	$line   = '#ECE7E1';
	$font   = "-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif";
	$fields = lvmi_fields();
	$val    = fn( $k ) => lvmi_display_value( $fields[ $k ], $clean[ $k ] ?? '' );
	$first  = strtok( (string) $clean['name'], ' ' );
	$when   = ( $post_id ? get_the_date( 'M j, Y \a\t g:i a', $post_id ) : '' ) ?: wp_date( 'M j, Y \a\t g:i a' );
	$phone  = (string) ( $clean['phone'] ?? '' );
	$mailto = 'mailto:' . rawurlencode( $clean['email'] ) . '?subject=' . rawurlencode( __( 'Your free website & SEO review', 'lvm-seo-intake' ) );

	$button = function ( $href, $label, $primary ) use ( $orange, $ink, $line, $font ) {
		return '<a href="' . esc_url( $href ) . '" style="display:inline-block;margin:0 8px 8px 0;white-space:nowrap;padding:11px 18px;border-radius:999px;font:600 14px/1 ' . $font . ';text-decoration:none;'
			. ( $primary ? 'background:' . $orange . ';color:#fff;border:1px solid ' . $orange : 'background:#fff;color:' . $ink . ';border:1px solid ' . $line ) . '">' . esc_html( $label ) . '</a>';
	};
	$row = function ( $label, $value_html ) use ( $muted, $ink, $line, $font ) {
		return '<tr><td valign="top" style="padding:11px 0;border-top:1px solid ' . $line . ';width:38%;padding-right:14px;font:13px/1.45 ' . $font . ';color:' . $muted . '">' . esc_html( $label ) . '</td>'
			. '<td valign="top" style="padding:11px 0;border-top:1px solid ' . $line . ';font:500 14px/1.45 ' . $font . ';color:' . $ink . '">' . $value_html . '</td></tr>';
	};

	// Answers grouped by form step; contact details get their own card up top.
	$sections = '';
	foreach ( lvmi_steps() as $step ) {
		if ( isset( $step['fields']['email'] ) ) {
			continue;
		}
		$rows = '';
		foreach ( $step['fields'] as $k => $f ) {
			$v = $val( $k );
			if ( '' === $v || 'business' === $k ) { // business is the headline
				continue;
			}
			if ( 'url' === $f['type'] ) {
				$html = '<a href="' . esc_url( $v ) . '" style="color:' . $orange . ';text-decoration:none">' . $e( preg_replace( '#^https?://(www\.)?#', '', untrailingslashit( $v ) ) ) . '</a>';
			} elseif ( 'choices' === $f['type'] ) {
				$html = '';
				foreach ( (array) $clean[ $k ] as $opt ) {
					$html .= '<span style="display:inline-block;margin:0 6px 6px 0;padding:4px 10px;border-radius:999px;background:#FDF0E6;color:#A9480C;font:600 12px/1.4 ' . $font . '">' . $e( $f['options'][ $opt ] ?? $opt ) . '</span>';
				}
			} elseif ( 'textarea' === $f['type'] ) {
				$html = '<div style="padding:10px 12px;border-left:3px solid ' . $orange . ';background:#FAF8F5;font-weight:400">' . nl2br( $e( $v ) ) . '</div>';
			} else {
				$html = $e( $v );
			}
			$rows .= $row( $f['label'], $html );
		}
		if ( $rows ) {
			$sections .= '<tr><td style="padding:24px 32px 0"><div style="font:700 11px/1 ' . $font . ';letter-spacing:.08em;text-transform:uppercase;color:' . $muted . ';padding-bottom:10px">' . $e( $step['rail'] ) . '</div>'
				. '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse">' . $rows . '</table></td></tr>';
		}
	}

	$contact = $row( __( 'Email', 'lvm-seo-intake' ), '<a href="' . esc_url( $mailto ) . '" style="color:' . $orange . ';text-decoration:none">' . $e( $clean['email'] ) . '</a>' );
	if ( '' !== $phone ) {
		$contact .= $row( __( 'Phone', 'lvm-seo-intake' ), '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ) . '" style="color:' . $ink . ';text-decoration:none">' . $e( $phone ) . '</a>' );
	}
	if ( '' !== $val( 'contact_pref' ) ) {
		$contact .= $row( $fields['contact_pref']['label'], $e( $val( 'contact_pref' ) ) );
	}

	$buttons = $button( $mailto, sprintf( /* translators: %s: first name */ __( 'Reply to %s', 'lvm-seo-intake' ), $first ), true );
	if ( '' !== $phone ) {
		$buttons .= $button( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone ), __( 'Call', 'lvm-seo-intake' ), false );
	}
	$buttons .= $button( $link, __( 'Open in WordPress', 'lvm-seo-intake' ), false );

	$preheader = implode( ' · ', array_filter( array( $clean['name'], $val( 'area' ), $val( 'goals' ) ) ) );
	$test      = $post_id ? '' : '<tr><td style="padding:12px 32px;background:#FFF6D6;font:600 13px/1.4 ' . $font . ';color:#7A5B00">' . $e( __( 'This is a test notification with sample answers.', 'lvm-seo-intake' ) ) . '</td></tr>';

	return '<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="color-scheme" content="light"><title>' . $e( $clean['business'] ) . '</title></head>'
		. '<body style="margin:0;padding:0;background:#F4F1ED">'
		. '<div style="display:none;max-height:0;overflow:hidden;opacity:0">' . $e( $preheader ) . '</div>'
		. '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#F4F1ED"><tr><td align="center" style="padding:28px 12px">'
		. '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background:#fff;border-radius:16px;overflow:hidden;border:1px solid ' . $line . '">'
		// Header
		. '<tr><td style="background:#0E0E0C;padding:18px 32px"><table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr>'
		. '<td style="font:600 16px/1 ' . $font . ';color:#fff"><img src="' . esc_url( get_theme_file_uri( '/assets/images/logo-512.png' ) ) . '" width="28" height="28" alt="" style="vertical-align:middle;border-radius:7px;margin-right:10px">Local <span style="color:#A39B91;font-weight:400">Vocal</span></td>'
		. '<td align="right"><span style="display:inline-block;padding:6px 12px;border-radius:999px;background:' . $orange . ';color:#fff;font:700 11px/1 ' . $font . ';letter-spacing:.06em;text-transform:uppercase">' . $e( __( 'New request', 'lvm-seo-intake' ) ) . '</span></td>'
		. '</tr></table></td></tr>'
		. $test
		// Who
		. '<tr><td style="padding:30px 32px 6px">'
		. '<div style="font:700 11px/1 ' . $font . ';letter-spacing:.08em;text-transform:uppercase;color:' . $orange . '">' . $e( __( 'Free website & SEO review', 'lvm-seo-intake' ) ) . '</div>'
		. '<h1 style="margin:10px 0 6px;font:700 26px/1.2 ' . $font . ';color:' . $ink . ';letter-spacing:-.01em">' . $e( $clean['business'] ) . '</h1>'
		. '<div style="font:15px/1.5 ' . $font . ';color:' . $muted . '">' . $e( sprintf( /* translators: 1: name, 2: date */ __( 'from %1$s · %2$s', 'lvm-seo-intake' ), $clean['name'], $when ) ) . '</div>'
		. '</td></tr>'
		// Contact card + actions
		. '<tr><td style="padding:18px 32px 0"><table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#FAF8F5;border-radius:12px"><tr><td style="padding:6px 18px 14px">'
		. '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse">' . preg_replace( '/border-top:1px solid #ECE7E1;/', '', $contact, 2 ) . '</table>'
		. '<div style="margin-top:14px">' . $buttons . '</div>'
		. '</td></tr></table></td></tr>'
		. $sections
		// Footer
		. '<tr><td style="padding:28px 32px 26px"><div style="border-top:1px solid ' . $line . ';padding-top:16px;font:12px/1.6 ' . $font . ';color:' . $muted . '">'
		. $e( __( 'Sent by the Free SEO Review form on', 'lvm-seo-intake' ) ) . ' <a href="' . esc_url( home_url( '/' ) ) . '" style="color:' . $muted . '">' . $e( wp_parse_url( home_url(), PHP_URL_HOST ) ) . '</a>. '
		. $e( __( 'Replying to this email writes straight to the client.', 'lvm-seo-intake' ) ) . ' <a href="' . esc_url( admin_url( 'edit.php?post_type=' . LVMI_CPT . '&page=lvmi-notify' ) ) . '" style="color:' . $muted . '">' . $e( __( 'Notification settings', 'lvm-seo-intake' ) ) . '</a>'
		. '</div></td></tr>'
		. '</table></td></tr></table></body></html>';
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
