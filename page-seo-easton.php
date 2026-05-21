<?php
/**
 * Template Name: SEO — Easton
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--easton">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · EAST-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Easton, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Easton</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Easton Market</span></div>
          <h1 class="seo-geo__h">Own Eastern Shore search<br><em class="serif">from Easton's historic center.</em></h1>
          <p class="seo-geo__sub">
            Easton serves as the commercial and cultural hub of Maryland's Eastern Shore. With its historic downtown, medical center, and tourism appeal, Easton businesses compete for both local residents and regional visitors. We help Easton companies dominate this unique market through targeted local SEO that captures Shore-specific search patterns.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">EAST-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Easton Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Easton · Talbot County</dd></div>
            <div><dt>Population</dt><dd>17,000 · Regional hub</dd></div>
            <div><dt>Key sectors</dt><dd>Medical · Retail · Tourism · Professional</dd></div>
            <div><dt>Search volume</dt><dd>6,800+ local queries/mo</dd></div>
            <div><dt>Competition</dt><dd>Medium · Established local</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Regional capture</dd></div>
          </dl>
          <footer class="seo-geo__report-foot mono">
            <span class="seo-geo__report-sig">↳ audit complete</span>
            <span class="seo-geo__report-stamp">2026</span>
          </footer>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       MARKET ANALYSIS
       ============================================================ -->
  <section class="seo-analysis" id="analysis">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="seo-section-bar mono">
          <span class="seo-section-bar__num">§ 01</span>
          <span class="seo-section-bar__rule"></span>
          <span class="seo-section-bar__lbl">Market analysis</span>
        </div>
        <h2 class="section-h">How Easton searches<br><em class="serif">and regional patterns.</em></h2>
        <p class="section-lead">Easton's search behavior reflects its role as an Eastern Shore hub — medical services, historic tourism, and professional services dominate, with significant spill-over from surrounding counties.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Medical', 'Shore Medical Center', 'Hospital and medical services drive 35% of Easton searches from across the Shore.', '#FF6B4A' ),
          array( 'Historic', 'Downtown tourism', '"Historic Easton," "Easton downtown," and cultural attraction searches from visitors.', '#4A90FF' ),
          array( 'Professional', 'Regional services', 'Law firms, financial services, and consulting capture business from across Talbot County.', '#7AC74F' ),
          array( 'Retail', 'Local shopping preference', 'Residents search "Easton" modifier before driving to Annapolis or Salisbury.', '#A067E5' ),
          array( 'Waterfront', 'Chesapeake proximity', 'Boating, fishing, and water-related services show strong seasonal patterns.', '#E5478B' ),
          array( 'Events', 'Festival and event searches', 'Waterfowl Festival, Plein Air events drive seasonal search spikes.', '#F5A623' ),
        );
        foreach ( $insights as $i ) : ?>
          <article class="seo-insight-card" style="--col: <?php echo esc_attr( $i[3] ); ?>;">
            <header class="seo-insight-card__h">
              <span class="seo-insight-card__sw" aria-hidden="true"></span>
              <span class="seo-insight-card__tag mono"><?php echo esc_html( $i[0] ); ?></span>
            </header>
            <h3 class="seo-insight-card__name"><?php echo esc_html( $i[1] ); ?></h3>
            <p class="seo-insight-card__desc"><?php echo esc_html( $i[2] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       OPPORTUNITY AREAS
       ============================================================ -->
  <section class="seo-opps">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="seo-section-bar mono">
          <span class="seo-section-bar__num">§ 02</span>
          <span class="seo-section-bar__rule"></span>
          <span class="seo-section-bar__lbl">Opportunity areas</span>
        </div>
        <h2 class="section-h">Where Easton businesses<br><em class="serif">can expand their reach.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Regional service area</h3>
          <p class="seo-opp-col__p">Target "Eastern Shore," "Talbot County," and surrounding towns (St. Michaels, Oxford) to capture regional searches.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Medical tourism optimization</h3>
          <p class="seo-opp-col__p">Optimize for Shore Medical Center-related searches — lodging, dining, and services for patients and families.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">Historic downtown authority</h3>
          <p class="seo-opp-col__p">Create content around Easton's history, architecture, and cultural events to capture tourism and local pride searches.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       LOCAL KEYWORDS
       ============================================================ -->
  <section class="seo-keywords">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="seo-section-bar mono">
          <span class="seo-section-bar__num">§ 03</span>
          <span class="seo-section-bar__rule"></span>
          <span class="seo-section-bar__lbl">Target keywords</span>
        </div>
        <h2 class="section-h">Easton search terms<br><em class="serif">that bring regional business.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'restaurants easton md', '890', 'Dining' ),
          array( 'shore medical center easton', '720', 'Healthcare' ),
          array( 'historic easton md', '540', 'Tourism' ),
          array( 'lawyers easton md', '410', 'Professional' ),
          array( 'hotels easton maryland', '620', 'Lodging' ),
          array( 'easton downtown', '380', 'Shopping/Entertainment' ),
          array( 'real estate easton md', '490', 'Property' ),
          array( 'things to do easton md', '560', 'Activities' ),
        );
        foreach ( $keywords as $k ) : ?>
          <div class="seo-keyword-tile">
            <span class="seo-keyword-tile__term"><?php echo esc_html( $k[0] ); ?></span>
            <span class="seo-keyword-tile__vol mono"><?php echo esc_html( $k[1] ); ?> <small>/mo</small></span>
            <span class="seo-keyword-tile__cat mono"><?php echo esc_html( $k[2] ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       COMPETITOR GAP
       ============================================================ -->
  <section class="seo-gap">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="seo-section-bar mono">
          <span class="seo-section-bar__num">§ 04</span>
          <span class="seo-section-bar__rule"></span>
          <span class="seo-section-bar__lbl">Competitor gaps</span>
        </div>
        <h2 class="section-h">What Easton competitors<br><em class="serif">aren't capturing.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Regional targeting', '85% focus only on Easton', 'Missing Shore-wide opportunity' ),
          array( 'Medical content', 'Weak hospital-related content', 'Missing patient/family services' ),
          array( 'Event SEO', 'No festival/event optimization', 'Seasonal tourism opportunities' ),
          array( 'Mobile experience', '70% have slow mobile sites', 'Critical for tourist searches' ),
          array( 'Local schema', 'Missing Eastern Shore markup', 'Helps Google understand regional reach' ),
        );
        foreach ( $gaps as $g ) : ?>
          <article class="seo-gap-item">
            <h3 class="seo-gap-item__name"><?php echo esc_html( $g[0] ); ?></h3>
            <p class="seo-gap-item__stat mono"><?php echo esc_html( $g[1] ); ?></p>
            <p class="seo-gap-item__desc"><?php echo esc_html( $g[2] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free Easton SEO audit</div>
      <h2 class="cta__h">Ready to dominate<br><em class="serif">Eastern Shore search?</em></h2>
      <p class="cta__p">We'll analyze your Easton search presence, identify regional opportunities competitors miss, and create a strategy to capture more local and tourist business.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
