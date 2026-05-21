<?php
/**
 * Template Name: Single Page Layout
 * Description: Default page template — used for About, Privacy, Terms, etc.
 */
get_header(); ?>

<main class="service-page">

  <section class="page-hero">
    <div class="page-hero__grid-bg" aria-hidden="true"></div>
    <div class="lvm-container page-hero__inner">
      <div class="page-hero__crumb mono">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <span><?php echo esc_html( get_the_title() ); ?></span>
      </div>
      <div class="eyebrow"><span class="eyebrow__num mono">00</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Page</span></div>
      <h1 class="page-hero__h"><?php the_title(); ?></h1>
      <?php $subtitle = get_post_meta( get_the_ID(), 'page_subtitle', true ); if ( $subtitle ) : ?>
        <p class="page-hero__sub"><?php echo esc_html( $subtitle ); ?></p>
      <?php endif; ?>
      <div class="page-hero__ctas">
        <a href="tel:+14438521000" class="btn btn--primary btn--lg">↳ Call (443) 852‑1000</a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--ghost btn--lg">Get in touch →</a>
      </div>
    </div>
  </section>

  <section class="page-body">
    <div class="lvm-container">
      <div class="page-body__inner">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
      </div>
    </div>
  </section>

  <section>
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Why Local Vocal</span></div>
      <h2 class="section-h">Your trusted digital partner<br><em class="serif">in Maryland.</em></h2>

      <div class="feature__grid">
        <article class="feature-card">
          <div class="feature-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><circle cx="12" cy="11" r="3"/></svg></div>
          <span class="feature-card__num mono">01</span>
          <h3 class="feature-card__title">Maryland-based</h3>
          <p class="feature-card__desc">Headquartered in Glyndon, serving the DMV area with local expertise and understanding of your market.</p>
        </article>
        <article class="feature-card">
          <div class="feature-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg></div>
          <span class="feature-card__num mono">02</span>
          <h3 class="feature-card__title">American-owned</h3>
          <p class="feature-card__desc">Founded and owned in the U.S. Committed to delivering excellence with people you can actually reach.</p>
        </article>
        <article class="feature-card">
          <div class="feature-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
          <span class="feature-card__num mono">03</span>
          <h3 class="feature-card__title">Global perspective</h3>
          <p class="feature-card__desc">Combining local insights with international experience to ship work that holds up against bigger agencies.</p>
        </article>
      </div>
    </div>
  </section>

  <section>
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Testimonials</span></div>
      <h2 class="section-h">What our clients<br><em class="serif">say about us.</em></h2>

      <div class="testi__grid">
        <?php
        $testi = array(
          array( '“The team at Local Vocal has been instrumental in growing our business. Their dedicated approach and innovative strategies have helped us reach new heights.”', 'Sarah Johnson', 'CEO, Johnson Enterprises' ),
          array( '“Working with Local Vocal has been a game-changer for our online presence. Their expertise in digital marketing is unmatched.”', 'Michael Thompson', "Owner, Thompson's Bakery" ),
          array( '“Local Vocal delivered results beyond our expectations. Their attention to detail and strategic planning has made a significant impact on our ROI.”', 'Amanda Wilson', 'Marketing Director, Wilson Group' ),
        );
        foreach ( $testi as $t ) : ?>
          <article class="testi">
            <div class="testi__stars" aria-hidden="true">★★★★★</div>
            <p class="testi__quote"><?php echo esc_html( trim( $t[0], '“”' ) ); ?></p>
            <div class="testi__who">
              <span class="testi__name"><?php echo esc_html( $t[1] ); ?></span>
              <span class="testi__role mono"><?php echo esc_html( $t[2] ); ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Ready to talk</div>
      <h2 class="cta__h">Ready to get<br><em class="serif">started?</em></h2>
      <p class="cta__p">Join our satisfied clients and experience the difference focused work makes for a local business.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Contact us today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
