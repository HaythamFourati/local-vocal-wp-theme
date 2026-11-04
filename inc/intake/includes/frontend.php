<?php
/**
 * Front end: assets, the pop-up (a native <dialog>, so focus trapping,
 * Esc and the backdrop come from the browser) and the inline version for
 * page sections: [lvm_seo_intake]. Both render the same form.
 *
 * @package LVM_SEO_Intake
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		$css = LVMI_PATH . 'assets/intake.css';
		$js  = LVMI_PATH . 'assets/intake.js';
		wp_enqueue_style( 'lvm-seo-intake', LVMI_URL . 'assets/intake.css', array(), (string) filemtime( $css ) );
		wp_enqueue_script( 'lvm-seo-intake', LVMI_URL . 'assets/intake.js', array(), (string) filemtime( $js ), array( 'in_footer' => true, 'strategy' => 'defer' ) );
		wp_add_inline_script(
			'lvm-seo-intake',
			'window.LVMI = ' . wp_json_encode(
				array(
					'endpoint' => esc_url_raw( rest_url( 'lvm-intake/v1/submit' ) ),
				)
			) . ';',
			'before'
		);
	}
);

add_action( 'wp_footer', 'lvmi_render_dialog' );
add_shortcode( 'lvm_seo_intake', 'lvmi_shortcode' );

/**
 * [lvm_seo_intake]: the multi-step form inline, without the pop-up chrome.
 *
 * @return string
 */
function lvmi_shortcode() {
	static $n = 0;
	ob_start();
	echo '<div class="lvmi lvmi--inline">';
	lvmi_render_form( 'lvmi-i' . ( ++$n ), true );
	echo '</div>';
	return ob_get_clean();
}

/**
 * One field.
 *
 * @param string $key Field key.
 * @param array  $f   Field definition.
 * @param string $uid Instance prefix, keeps ids unique when the form appears twice.
 */
function lvmi_render_field( $key, $f, $uid ) {
	$id    = $uid . '-' . $key;
	$cls   = 'lvmi__field' . ( ! empty( $f['half'] ) ? ' is-half' : '' );
	$req   = ! empty( $f['required'] );
	$label = esc_html( $f['label'] ) . ( $req ? '' : ' <em>' . esc_html__( 'optional', 'lvm-seo-intake' ) . '</em>' );

	if ( in_array( $f['type'], array( 'choice', 'choices' ), true ) ) {
		$multi = 'choices' === $f['type'];
		echo '<fieldset class="' . esc_attr( $cls ) . ' lvmi__field--chips" data-field="' . esc_attr( $key ) . '"' . ( $req ? ' data-required' : '' ) . '>';
		echo '<legend class="lvmi__label">' . $label . '</legend><div class="lvmi__chips">'; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped above
		foreach ( $f['options'] as $v => $text ) {
			echo '<label class="lvmi__chip"><input type="' . ( $multi ? 'checkbox' : 'radio' ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $v ) . '"><span>' . esc_html( $text ) . '</span></label>';
		}
		echo '</div><span class="lvmi__msg" aria-live="polite"></span></fieldset>';
		return;
	}

	echo '<div class="' . esc_attr( $cls ) . '" data-field="' . esc_attr( $key ) . '">';
	echo '<label class="lvmi__label" for="' . esc_attr( $id ) . '">' . $label . '</label>'; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped above
	$attrs = ' id="' . esc_attr( $id ) . '" name="' . esc_attr( $key ) . '" placeholder="' . esc_attr( $f['placeholder'] ?? '' ) . '"'
		. ( $req ? ' required' : '' )
		. ( ! empty( $f['autocomplete'] ) ? ' autocomplete="' . esc_attr( $f['autocomplete'] ) . '"' : '' );
	if ( 'textarea' === $f['type'] ) {
		echo '<textarea' . $attrs . ' rows="3" maxlength="2000"></textarea>'; // phpcs:ignore WordPress.Security.EscapeOutput
	} else {
		$type = 'url' === $f['type'] ? 'text' : $f['type']; // URLs typed without https:// are fine; the server adds it
		echo '<input type="' . esc_attr( $type ) . '"' . $attrs . ( 'url' === $f['type'] ? ' inputmode="url" autocomplete="url"' : '' ) . ' maxlength="200">'; // phpcs:ignore WordPress.Security.EscapeOutput
	}
	if ( ! empty( $f['hint'] ) ) {
		echo '<span class="lvmi__hint">' . esc_html( $f['hint'] ) . '</span>';
	}
	echo '<span class="lvmi__msg" aria-live="polite"></span></div>';
}

/**
 * Check icon used by the rail and the promise list.
 *
 * @return string
 */
function lvmi_check() {
	return '<svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3.5 8.5 3 3 6-7"/></svg>';
}

/**
 * The pop-up: step rail + the form.
 */
function lvmi_render_dialog() {
	$check = lvmi_check();
	?>
	<dialog class="lvmi" aria-labelledby="lvmi-d-t-0">
		<div class="lvmi__shell">
			<aside class="lvmi__rail" aria-hidden="true">
				<span class="lvmi__eyebrow"><i></i><?php esc_html_e( 'Free website & SEO review', 'lvm-seo-intake' ); ?></span>
				<ol class="lvmi__steps">
					<?php foreach ( lvmi_steps() as $i => $s ) : ?>
						<li data-step="<?php echo (int) $i; ?>"><span class="lvmi__dot"><b><?php echo (int) $i + 1; ?></b><?php echo $check; // phpcs:ignore WordPress.Security.EscapeOutput ?></span><?php echo esc_html( $s['rail'] ); ?></li>
					<?php endforeach; ?>
				</ol>
				<ul class="lvmi__promise">
					<li><?php echo $check; // phpcs:ignore WordPress.Security.EscapeOutput ?><?php esc_html_e( '30-minute walkthrough, on screen', 'lvm-seo-intake' ); ?></li>
					<li><?php echo $check; // phpcs:ignore WordPress.Security.EscapeOutput ?><?php esc_html_e( 'Written report within 48 hours', 'lvm-seo-intake' ); ?></li>
					<li><?php echo $check; // phpcs:ignore WordPress.Security.EscapeOutput ?><?php esc_html_e( 'Free. No obligation, no pitch deck.', 'lvm-seo-intake' ); ?></li>
				</ul>
			</aside>
			<?php lvmi_render_form( 'lvmi-d', false ); ?>
		</div>
	</dialog>
	<?php
}

/**
 * The multi-step form.
 *
 * @param string $uid    Instance prefix for ids.
 * @param bool   $inline True inside a page section: no close buttons.
 */
function lvmi_render_form( $uid, $inline ) {
	$steps = lvmi_steps();
	?>
			<form class="lvmi__form" novalidate>
				<header class="lvmi__top">
					<span class="lvmi__count"><?php esc_html_e( 'Step', 'lvm-seo-intake' ); ?> <b class="lvmi__n">1</b> <?php esc_html_e( 'of', 'lvm-seo-intake' ); ?> <?php echo count( $steps ); ?></span>
					<?php if ( ! $inline ) : ?>
						<button type="button" class="lvmi__close" data-lvmi-close aria-label="<?php esc_attr_e( 'Close', 'lvm-seo-intake' ); ?>"><svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 4l8 8M12 4l-8 8"/></svg></button>
					<?php endif; ?>
				</header>
				<div class="lvmi__bar" aria-hidden="true"><i></i></div>

				<div class="lvmi__panes">
					<?php foreach ( $steps as $i => $s ) : ?>
						<?php // <div>, not <section>: themes often pad every section inside <main> ?>
						<div class="lvmi__pane<?php echo 0 === $i ? ' is-on' : ''; ?>" data-step="<?php echo (int) $i; ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
							<h2 class="lvmi__title" id="<?php echo esc_attr( $uid . '-t-' . $i ); ?>"><?php echo esc_html( $s['title'] ); ?></h2>
							<p class="lvmi__lead"><?php echo esc_html( $s['lead'] ); ?></p>
							<div class="lvmi__grid">
								<?php
								foreach ( $s['fields'] as $key => $f ) {
									lvmi_render_field( $key, $f, $uid );
								}
								?>
							</div>
						</div>
					<?php endforeach; ?>

					<div class="lvmi__pane lvmi__done" data-step="done" hidden>
						<svg class="lvmi__tick" viewBox="0 0 72 72" aria-hidden="true"><circle cx="36" cy="36" r="33"/><path d="M23 37.5l9 9 17-19"/></svg>
						<h2 class="lvmi__title" id="<?php echo esc_attr( $uid . '-t-done' ); ?>"><?php esc_html_e( 'You’re all set', 'lvm-seo-intake' ); ?><span class="lvmi__who"></span>.</h2>
						<p class="lvmi__lead"><?php esc_html_e( 'Your request is in. Here’s what happens next:', 'lvm-seo-intake' ); ?></p>
						<ol class="lvmi__next">
							<li><b><?php esc_html_e( 'Within one business day', 'lvm-seo-intake' ); ?></b><?php esc_html_e( 'We reach out to book your 30-minute walkthrough.', 'lvm-seo-intake' ); ?></li>
							<li><b><?php esc_html_e( 'On the call', 'lvm-seo-intake' ); ?></b><?php esc_html_e( 'We show you, on screen, what’s costing you visibility.', 'lvm-seo-intake' ); ?></li>
							<li><b><?php esc_html_e( 'Within 48 hours', 'lvm-seo-intake' ); ?></b><?php esc_html_e( 'Your written report, with the fixes in order.', 'lvm-seo-intake' ); ?></li>
						</ol>
						<?php if ( ! $inline ) : ?>
							<button type="button" class="lvmi__btn lvmi__btn--primary" data-lvmi-close><?php esc_html_e( 'Done', 'lvm-seo-intake' ); ?></button>
						<?php endif; ?>
					</div>
				</div>

				<p class="lvmi__error" role="alert" hidden></p>

				<footer class="lvmi__nav">
					<button type="button" class="lvmi__btn lvmi__btn--ghost" data-lvmi-back><svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13 8H3M7 4 3 8l4 4"/></svg><?php esc_html_e( 'Back', 'lvm-seo-intake' ); ?></button>
					<span class="lvmi__hint-nav"><?php esc_html_e( 'Takes about a minute', 'lvm-seo-intake' ); ?></span>
					<button type="submit" class="lvmi__btn lvmi__btn--primary" data-lvmi-next>
						<span class="lvmi__next-label" data-next="<?php esc_attr_e( 'Continue', 'lvm-seo-intake' ); ?>" data-last="<?php esc_attr_e( 'Get my free review', 'lvm-seo-intake' ); ?>"><?php esc_html_e( 'Continue', 'lvm-seo-intake' ); ?></span>
						<svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
					</button>
				</footer>

				<?php // Honeypot: hidden from people, irresistible to bots. ?>
				<input class="lvmi__hp" type="text" name="_hp" tabindex="-1" autocomplete="off" aria-hidden="true">
			</form>
	<?php
}
