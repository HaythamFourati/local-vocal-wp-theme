<?php
/**
 * 404 Template
 */
get_header(); ?>

<main class="service-page">
  <section class="err404">
    <div class="err404__bg" aria-hidden="true"></div>
    <div class="lvm-container">
      <div class="err404__inner">
        <div class="err404__num">404</div>
        <h1 class="err404__h">Page not found.</h1>
        <p class="err404__p">The page you&rsquo;re looking for doesn&rsquo;t exist or has been moved. Try one of these instead.</p>

        <div class="err404__links">
          <a class="err404__link" href="<?php echo esc_url( home_url( '/services' ) ); ?>">
            <span class="err404__link-num mono">01</span>
            <span class="err404__link-t">Our services</span>
            <span class="err404__link-d">Web design, SEO, content, social, support.</span>
          </a>
          <a class="err404__link" href="<?php echo esc_url( home_url( '/blog' ) ); ?>">
            <span class="err404__link-num mono">02</span>
            <span class="err404__link-t">Latest blog posts</span>
            <span class="err404__link-d">Local SEO insights and case studies.</span>
          </a>
          <a class="err404__link" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
            <span class="err404__link-num mono">03</span>
            <span class="err404__link-t">Contact us</span>
            <span class="err404__link-d">Send a message or call directly.</span>
          </a>
        </div>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary btn--lg">
          <span aria-hidden="true">←</span> Back to homepage
        </a>
      </div>
    </div>
  </section>
</main>

<?php get_footer();
