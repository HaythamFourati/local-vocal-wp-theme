<?php
/**
 * Closing free-review section, shared by the homepage and every inner page:
 * shader stage, centred two-tone headline, then one glass panel with
 * "what happens next" and the multi-step intake form.
 *
 *   get_template_part( 'template-parts/cta', null, array(
 *     'eyebrow' => 'Free SEO audit',
 *     'lead'    => 'Ready to elevate',      // bright part of the headline
 *     'tail'    => 'your local SEO?',       // dimmed part
 *     'deck'    => 'One or two sentences.',
 *   ) );
 *
 * Styles live in src/home.css (.lvh-cta*), the background in
 * src/scripts/shader.js; both load on every page.
 *
 * @package Local_Vocal
 */

$a = wp_parse_args(
	$args ?? array(),
	array(
		'eyebrow' => 'Free review',
		'lead'    => 'Ready to improve your website',
		'tail'    => 'and local SEO?',
		'deck'    => "We'll review your current website, local search visibility, and content strategy — and walk you through the highest‑leverage opportunities to grow. No pitch deck, no obligation.",
	)
);
?>
<div class="lvh lvh--part">
  <?php // <div>, not <section>: inner templates pad and border every <section> they contain ?>
  <div class="lvh-sec lvh-sec--bay lvh-cta" id="cta" role="region" aria-label="Free website and SEO review">
    <div class="lvh-bay lvh-cta__stage">
      <canvas class="lvh-shader" data-shader="stage" aria-hidden="true"></canvas>
      <header class="lvh-cta__head">
        <span class="lvh-eyebrow" data-reveal><?php echo esc_html( $a['eyebrow'] ); ?></span>
        <h2 class="lvh-title lvh-title--xl" data-reveal><?php echo esc_html( $a['lead'] ); ?> <span class="lvh-dim"><?php echo esc_html( $a['tail'] ); ?></span></h2>
        <p class="lvh-deck" data-reveal><?php echo esc_html( $a['deck'] ); ?></p>
      </header>

      <div class="lvh-cta__panel" data-reveal>
        <div class="lvh-cta__side">
          <span class="lvh-cta__label">What happens next</span>
          <ol class="lvh-cta__notes">
            <li><b>30‑minute walkthrough</b>Scheduled this week, at a time that suits you.</li>
            <li><b>We show you what's costing visibility</b>On screen, with your site and your competitors.</li>
            <li><b>Written report within 48 hours</b>The fixes, in order, whether you hire us or not.</li>
          </ol>
          <div class="lvh-cta__team">
            <span class="lvh-cta__faces">
              <?php foreach ( array( 'garey-simmons', 'haytham-fourati', 'david-breth' ) as $face ) : ?>
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/team/' . $face . '.jpg' ) ); ?>" alt="" loading="lazy" width="36" height="36">
              <?php endforeach; ?>
            </span>
            <span>Reviewed personally by<b>Garey, Haytham &amp; David</b></span>
          </div>
        </div>
        <div class="lvh-cta__form">
          <div class="lvh-cta__formhead">
            <strong>Request your free review</strong>
            <span class="lvh-cta__badge">Report in 48h</span>
          </div>
          <?php
          // Multi-step intake plugin first (same form as the pop-up); Contact Form 7 if it's off
          if ( shortcode_exists( 'lvm_seo_intake' ) ) {
            echo do_shortcode( '[lvm_seo_intake]' );
          } elseif ( shortcode_exists( 'contact-form-7' ) ) {
            echo do_shortcode( '[contact-form-7 id="aca8789" title="SEO Audit"]' );
          } else {
            ?>
            <a href="<?php echo esc_url( lvm_url( 'contact' ) ); ?>" class="lvh-btn lvh-btn--glow"><span>Request a free website &amp; SEO review</span><span class="lvh-btn__icon"><svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span></a>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
