<?php
/**
 * Template Name: SEO — Ocean City
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--ocean-city">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · OC-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Ocean City, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Ocean City</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/05</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Ocean City Market</span></div>
          <h1 class="seo-geo__h">Capture summer's peak<br><em class="serif">in Ocean City search.</em></h1>
          <p class="seo-geo__sub">
            Ocean City's extreme seasonality — 8 million summer visitors, 8,000 winter residents — creates unique SEO challenges and opportunities. We help Ocean City businesses dominate the intense summer search season while maintaining year-round visibility through strategic seasonal SEO that captures tourist intent and local business.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">OC-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Ocean City Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Ocean City · Worcester County</dd></div>
            <div><dt>Population</dt><dd>8,000 · 8M visitors/summer</dd></div>
            <div><dt>Key sectors</dt><dt>Hospitality · Retail · Food · Services</dt></div>
            <div><dt>Search volume</dt><dd>24,000+ summer queries/mo</dd></div>
            <div><dt>Competition</dt><dd>Extreme · Seasonal</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Seasonal content strategy</dd></div>
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
        <h2 class="section-h">How Ocean City searches<br><em class="serif">and seasonal patterns.</em></h2>
        <p class="section-lead">Ocean City's search behavior is dramatically seasonal — summer brings 10x search volume for dining, activities, and services, while winter focuses on off-season planning and local resident needs.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Seasonal', 'Summer 10x volume', 'Memorial Day to Labor Day: 80% of annual search volume concentrated in 14 weeks.', '#FF6B4A' ),
          array( 'Activities', 'Things to do', '"Things to do in Ocean City" peaks at 12,000 searches/month in July.', '#4A90FF' ),
          array( 'Dining', 'Restaurant decisions', 'Tourists search restaurants daily, with strong "near me" and "on the boardwalk" modifiers.', '#7AC74F' ),
          array( 'Boardwalk', 'Location-specific', '"Ocean City boardwalk," "on the beach," "near inlet" show strong location intent.', '#A067E5' ),
          array( 'Last-minute', 'Urgent bookings', '"Hotels tonight," "last minute" searches spike during summer weekends.', '#E5478B' ),
          array( 'Off-season', 'Winter planning', '"Ocean City 2026," "summer rentals" searches start in January.', '#F5A623' ),
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
        <h2 class="section-h">Where Ocean City businesses<br><em class="serif">can win seasonal search.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Boardwalk authority</h3>
          <p class="seo-opp-col__p">Create comprehensive boardwalk content — dining guides, activity lists, parking info — to capture high-intent tourist searches.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Seasonal content calendar</h3>
          <p class="seo-opp-col__p">Plan content around summer events, off-season promotions, and year-round activities to maintain visibility beyond peak season.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">Mobile-first booking</h3>
          <p class="seo-opp-col__p">Tourists search on mobile while walking the boardwalk. Fast mobile sites with instant booking capture immediate business.</p>
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
        <h2 class="section-h">Ocean City search terms<br><em class="serif">that drive summer business.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'things to do ocean city', '12,000', 'Activities' ),
          array( 'restaurants ocean city md', '8,900', 'Dining' ),
          array( 'hotels ocean city md', '6,200', 'Lodging' ),
          array( 'ocean city boardwalk', '4,100', 'Attractions' ),
          array( 'ocean city events', '3,400', 'Entertainment' ),
          array( 'ocean city beach', '2,800', 'Activities' ),
          array( 'ocean city fishing', '1,900', 'Recreation' ),
          array( 'ocean city nightlife', '1,600', 'Entertainment' ),
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
        <h2 class="section-h">What Ocean City<br><em class="serif">competitors miss.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Off-season SEO', '90% ignore winter content', 'Missing year-round visibility and early bookings' ),
          array( 'Mobile booking', '75% have slow mobile checkout', 'Critical for on-the-go tourist decisions' ),
          array( 'Event content', 'Weak event-specific optimization', 'Summer weekends, festivals, concerts' ),
          array( 'Location modifiers', 'Missing boardwalk/beach targeting', 'Tourists search with location intent' ),
          array( 'Seasonal schema', 'No seasonal markup', 'Helps Google understand seasonal relevance' ),
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
      <div class="cta__eyebrow mono">↳ Free Ocean City SEO audit</div>
      <h2 class="cta__h">Ready to dominate<br><em class="serif">summer search?</em></h2>
      <p class="cta__p">We'll analyze your Ocean City search presence, identify seasonal opportunities competitors miss, and create a strategy to capture more tourist business during peak season and beyond.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
