<?php
/**
 * Footer — Local Vocal Marketing redesign
 */
?>
<footer class="footer">
  <div class="lvm-container footer__inner">
    <div class="footer__brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__brand">
        <span class="nav__mark" aria-hidden="true"><span></span><span></span><span></span></span>
        <span class="nav__name">Local Vocal</span>
        <span class="nav__suffix mono">MD</span>
      </a>
      <p class="footer__tag">
        Maryland web design &amp; SEO for local businesses. We help small businesses
        build better websites, rank better on Google, and stay visible online.
      </p>
      <div class="footer__loc mono">↳ Glyndon, MD · serving Maryland &amp; the U.S.</div>
    </div>

    <div class="footer__cols">
      <div>
        <div class="footer__heading mono">Services</div>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/development' ) ); ?>">Website Design</a></li>
          <li><a href="<?php echo esc_url( home_url( '/seo-optimization' ) ); ?>">Local SEO</a></li>
          <li><a href="<?php echo esc_url( home_url( '/content-creation' ) ); ?>">SEO Blog Articles</a></li>
          <li><a href="<?php echo esc_url( home_url( '/social-media-management' ) ); ?>">Social Media</a></li>
          <li><a href="<?php echo esc_url( home_url( '/analytics-reporting' ) ); ?>">Analytics &amp; Reporting</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>">Free SEO Review</a></li>
        </ul>
      </div>
      <div>
        <div class="footer__heading mono">Industries</div>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">Contractors</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">HVAC</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">Law Firms</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">Dentists</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">Home Care</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#industries' ) ); ?>">Auto Glass</a></li>
        </ul>
      </div>
      <div>
        <div class="footer__heading mono">Maryland SEO</div>
        <ul>
          <li><a href="#">Annapolis</a></li>
          <li><a href="#">Severna Park</a></li>
          <li><a href="#">Glen Burnie</a></li>
          <li><a href="#">Easton</a></li>
          <li><a href="#">Ocean City</a></li>
          <li><a href="#">Baltimore</a></li>
        </ul>
      </div>
      <div>
        <div class="footer__heading mono">Company</div>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQ</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
          <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy</a></li>
          <li><a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>">Terms</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="lvm-container footer__bottom mono">
    <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Local Vocal Marketing · Maryland Web Design &amp; SEO</span>
    <span>Built for local businesses people search for every day.</span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
