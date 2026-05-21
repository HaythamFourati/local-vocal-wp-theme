<?php
/**
 * Template Name: SEO — Glen Burnie
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--glen-burnie">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · GB-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Glen Burnie, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Glen Burnie</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Glen Burnie Market</span></div>
          <h1 class="seo-geo__h">Capture Glen Burnie's<br><em class="serif">high-volume local searches.</em></h1>
          <p class="seo-geo__sub">
            Glen Burnie's high traffic location on I-97 and proximity to BWI make it a hub for retail, auto services, and convenience businesses. We help Glen Burnie companies dominate the intense local search competition through strategic SEO that captures both residents and pass-through traffic.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">GB-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Glen Burnie Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Glen Burnie · AA County</dd></div>
            <div><dt>Population</dt><dd>73,000 · High traffic</dd></div>
            <div><dt>Key sectors</dt><dd>Retail · Auto · Food · Services</dd></div>
            <div><dt>Search volume</dt><dd>18,600+ local queries/mo</dd></div>
            <div><dt>Competition</dt><dd>High · Chain stores</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Local differentiation</dd></div>
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
        <h2 class="section-h">How Glen Burnie searches<br><em class="serif">and where the volume is.</em></h2>
        <p class="section-lead">Glen Burnie's search patterns reflect its high-traffic location — auto services, retail convenience, and quick-service businesses dominate local search behavior.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Auto', 'Auto services hub', 'Auto repair, dealerships, parts stores drive 40% of searches near Ritchie Hwy and Crain Hwy.', '#FF6B4A' ),
          array( 'Retail', 'Shopping center searches', 'Marley Station, Glen Burnie Mall searches show strong retail intent.', '#4A90FF' ),
          array( 'Transit', 'BWI proximity impact', 'Airport-related searches spill over to Glen Burnie businesses.', '#7AC74F' ),
          array( 'Food', 'Quick-service dominance', 'Fast food, delivery, takeout searches peak during commute hours.', '#A067E5' ),
          array( 'Urgent', 'Emergency services', 'Plumbing, HVAC, towing searches show high immediate intent.', '#E5478B' ),
          array( 'Commute', 'I-97 corridor', 'Commuter searches for gas, coffee, convenience along major routes.', '#F5A623' ),
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
        <h2 class="section-h">Where Glen Burnie businesses<br><em class="serif">can win local search.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Route 2/Crain Highway</h3>
          <p class="seo-opp-col__p">High-visibility corridor businesses can capture commuter and local traffic with geo-targeted content and GBP optimization.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Differentiation from chains</h3>
          <p class="seo-opp-col__p">Local businesses can outrank chains by emphasizing Glen Burnie-specific knowledge, community ties, and personalized service.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">Mobile-first urgency</h3>
          <p class="seo-opp-col__p">Glen Burnie searches show high mobile urgency — fast-loading sites with click-to-call win immediate business.</p>
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
        <h2 class="section-h">Glen Burnie search terms<br><em class="serif">that drive traffic.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'auto repair glen burnie', '1,200', 'Auto services' ),
          array( 'restaurants glen burnie', '1,800', 'Dining' ),
          array( 'plumber glen burnie', '890', 'Home services' ),
          array( 'glen burnie mall', '1,100', 'Shopping' ),
          array( 'hvac glen burnie', '720', 'Home services' ),
          array( 'dentist glen burnie', '640', 'Healthcare' ),
          array( 'gas near glen burnie', '980', 'Convenience' ),
          array( 'hotels glen burnie md', '820', 'Lodging' ),
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
        <h2 class="section-h">What Glen Burnie<br><em class="serif">competitors miss.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Local content', '75% ignore Glen Burnie-specific topics', 'Marley Station, Ritchie Hwy, community events' ),
          array( 'Mobile optimization', '80% have slow mobile experiences', 'Critical for high-traffic area searches' ),
          array( 'GBP posting', 'Weak Google Business activity', 'Regular posts win map pack visibility' ),
          array( 'Urgency signals', 'Missing emergency service keywords', 'After-hours, 24/7 service terms' ),
          array( 'Local schema', '70% missing structured data', 'Helps Google understand service area' ),
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
      <div class="cta__eyebrow mono">↳ Free Glen Burnie SEO audit</div>
      <h2 class="cta__h">Ready to dominate<br><em class="serif">Glen Burnie search?</em></h2>
      <p class="cta__p">We'll analyze your Glen Burnie search presence, identify where high-volume competitors are winning, and create a strategy to capture more local and pass-through traffic.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
