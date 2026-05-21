<?php
/**
 * Template Name: SEO — Baltimore
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--baltimore">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · BAL-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Baltimore, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Baltimore</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/06</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Baltimore Market</span></div>
          <h1 class="seo-geo__h">Dominate Baltimore's<br><em class="serif">complex urban search.</em></h1>
          <p class="seo-geo__sub">
            Baltimore's diverse neighborhoods, major institutions, and competitive business environment create complex local SEO challenges. From Federal Hill to Fells Point, Johns Hopkins to the Inner Harbor, Baltimore businesses need hyper-local strategies that understand neighborhood boundaries, institutional search patterns, and urban search behavior.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">BAL-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Baltimore Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Baltimore City · Metro 2.8M</dd></div>
            <div><dt>Population</dt><dd>585,000 · Dense urban</dd></div>
            <div><dt>Key sectors</dt><dd>Healthcare · Education · Tech · Hospitality</dd></div>
            <div><dt>Search volume</dt><dd>45,000+ local queries/mo</dd></div>
            <div><dt>Competition</dt><dd>Extreme · Urban density</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Neighborhood targeting</dd></div>
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
        <h2 class="section-h">How Baltimore searches<br><em class="serif">and neighborhood patterns.</em></h2>
        <p class="section-lead">Baltimore's search behavior is highly neighborhood-specific — residents search with strong geographic modifiers, while institutional searches (Johns Hopkins, University of Maryland) drive professional and medical services.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Neighborhoods', 'Hyper-local search', 'Canton, Federal Hill, Fells Point, Hampden show 60% stronger local modifier usage.', '#FF6B4A' ),
          array( 'Medical', 'Healthcare hub', 'Johns Hopkins, University of Maryland medical searches drive 25% of professional queries.', '#4A90FF' ),
          array( 'Education', 'University impact', 'Students and faculty drive searches for housing, dining, and services near campuses.', '#7AC74F' ),
          array( 'Inner Harbor', 'Tourism concentration', 'Inner Harbor searches dominate visitor queries for attractions, dining, and hotels.', '#A067E5' ),
          array( 'Professional', 'Business district', 'Downtown Baltimore drives B2B and professional service searches.', '#E5478B' ),
          array( 'Mobile', 'Urban mobile-first', '78% of Baltimore searches are mobile — pedestrians, commuters, and residents on-the-go.', '#F5A623' ),
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
        <h2 class="section-h">Where Baltimore businesses<br><em class="serif">can win urban search.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Neighborhood authority</h3>
          <p class="seo-opp-col__p">Create neighborhood-specific content — "Federal Hill restaurants," "Canton dog parks," "Fells Point nightlife" — to capture hyper-local searches.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Institutional proximity</h3>
          <p class="seo-opp-col__p">Target searches near Johns Hopkins, University of Maryland, and major hospitals with location-specific service pages.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">Transit corridor optimization</h3>
          <p class="seo-opp-col__p">Optimize for searches along major transit routes — light rail stations, bus stops, and commuter corridors drive foot traffic.</p>
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
        <h2 class="section-h">Baltimore search terms<br><em class="serif">that drive urban business.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'restaurants baltimore', '12,200', 'Dining' ),
          array( 'things to do in baltimore', '8,900', 'Activities' ),
          array( 'baltimore inner harbor', '6,400', 'Attractions' ),
          array( 'federal hill restaurants', '3,200', 'Neighborhood dining' ),
          array( 'jobs in baltimore', '4,800', 'Employment' ),
          array( 'baltimore hotels', '3,600', 'Lodging' ),
          array( 'baltimore events', '2,900', 'Entertainment' ),
          array( 'canton baltimore', '2,100', 'Neighborhood' ),
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
        <h2 class="section-h">What Baltimore<br><em class="serif">competitors overlook.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Neighborhood pages', '85% ignore specific neighborhoods', 'Missing hyper-local targeting opportunities' ),
          array( 'Transit optimization', '70% ignore transit corridor searches', 'Missing commuter and pedestrian traffic' ),
          array( 'Event SEO', 'Weak event-specific content', 'Missing Ravens games, festivals, concerts' ),
          array( 'Mobile speed', '65% have slow mobile sites', 'Critical for urban on-the-go searches' ),
          array( 'Local schema', 'Missing neighborhood-specific markup', 'Helps Google understand service areas' ),
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
      <div class="cta__eyebrow mono">↳ Free Baltimore SEO audit</div>
      <h2 class="cta__h">Ready to dominate<br><em class="serif">Baltimore search?</em></h2>
      <p class="cta__p">We'll analyze your Baltimore search presence, identify neighborhood and institutional opportunities competitors miss, and create a hyper-local strategy to capture more urban business.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
