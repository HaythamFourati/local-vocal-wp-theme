<?php
/**
 * Visible FAQ for the current page, from inc/seo-data.php. The same entries
 * feed the FAQPage schema in inc/seo.php, so what Google reads is exactly
 * what visitors see. Renders nothing for pages without FAQs.
 *
 *   get_template_part( 'template-parts/faq' );
 *
 * Uses the homepage FAQ component (.lvh-faq in src/home.css).
 *
 * @package Local_Vocal
 */

$lvm_page = lvm_seo_current();
if ( empty( $lvm_page['faqs'] ) ) {
	return;
}
$lvm_head = $lvm_page['faq_h'] ?? array( 'Common', 'questions, answered.' );
?>
<div class="lvh lvh--part">
  <div class="lvh-sec lvh-faqsec" id="faq" role="region" aria-labelledby="lvm-faq-h">
    <div class="lvh-wrap lvh-faqwrap">
      <header class="lvh-faqwrap__head">
        <span class="lvh-eyebrow">FAQ</span>
        <h2 class="lvh-title" id="lvm-faq-h"><?php echo wp_kses_post( $lvm_head[0] ); ?> <span class="lvh-dim"><?php echo wp_kses_post( $lvm_head[1] ); ?></span></h2>
        <?php if ( is_page( 'contact' ) ) : $lvm_biz = lvm_business(); ?>
        <p class="lvh-deck">Still unsure? <a class="lvh-textlink" href="tel:<?php echo esc_attr( $lvm_biz['phone'] ); ?>">Call <?php echo esc_html( $lvm_biz['phone_human'] ); ?></a> and talk to one of the team.</p>
        <?php else : ?>
        <p class="lvh-deck">Something else on your mind? <a class="lvh-textlink" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Ask us directly <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></a></p>
        <?php endif; ?>
      </header>
      <div class="lvh-faq">
        <?php foreach ( $lvm_page['faqs'] as $i => $q ) : ?>
          <details class="lvh-faq__item" name="lvh-faq"<?php echo 0 === $i ? ' open' : ''; ?>>
            <summary><span class="lvh-faq__n"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span><span class="lvh-faq__q"><?php echo esc_html( $q[0] ); ?></span><span class="lvh-faq__icon" aria-hidden="true"></span></summary>
            <p><?php echo esc_html( $q[1] ); ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
