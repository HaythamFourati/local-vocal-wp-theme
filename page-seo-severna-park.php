<?php
/**
 * Template Name: SEO — Severna Park
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--severna-park">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · SP-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Severna Park, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Severna Park</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Severna Park Market</span></div>
          <h1 class="seo-geo__h">Dominate Severna Park searches<br><em class="serif">in this competitive suburb.</em></h1>
          <p class="seo-geo__sub">
            Severna Park's affluent residential market means high-value local searches — home services, professional services, and family-focused businesses. We help Severna Park companies capture these premium customers through targeted local SEO that speaks to suburban search behavior.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">SP-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Severna Park Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Severna Park · AA County</dd></div>
            <div><dt>Population</dt><dd>39,000 · Median HH $125K</dd></div>
            <div><dt>Key sectors</dt><dd>Home services · Professional · Retail</dd></div>
            <div><dt>Search volume</dt><dd>8,200+ local queries/mo</dd></div>
            <div><dt>Competition</dt><dd>Medium · Local businesses</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Map pack gaps · Mobile</dd></div>
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
        <h2 class="section-h">How Severna Park searches<br><em class="serif">and where the opportunities are.</em></h2>
        <p class="section-lead">Severna Park's suburban search patterns focus on home improvement, family services, and local convenience — with higher average order values than surrounding areas.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Residential', 'Home services dominate', 'HVAC, roofing, landscaping, pool services drive 60% of local searches.', '#FF6B4A' ),
          array( 'Family', 'Kid-focused queries', '"Pediatrician Severna Park," "dentist for kids," "tutoring" show strong family intent.', '#4A90FF' ),
          array( 'School', 'School district searches', 'Severna Park High School feeds local business searches and service decisions.', '#7AC74F' ),
          array( 'Shopping', 'Local retail preference', 'Residents search "Severna Park" modifier before general retail terms.', '#A067E5' ),
          array( 'Commute', 'Baltimore/DC proximity', 'Professional services benefit from commuter location searches.', '#E5478B' ),
          array( 'Water', 'Waterfront proximity', 'Magothy River searches for boating and waterfront services.', '#F5A623' ),
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
        <h2 class="section-h">Where Severna Park businesses<br><em class="serif">can win local search.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Ritchie Highway corridor</h3>
          <p class="seo-opp-col__p">Route 2 businesses capture commuter and local traffic. Geo-targeted content for "near Ritchie Highway" searches drives high-intent visits.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Neighborhood targeting</h3>
          <p class="seo-opp-col__p">Severna Park neighborhoods (Olde Severna, Round Bay, Ben Oaks) show strong local modifier searches for services.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">School-year rhythm</h3>
          <p class="seo-opp-col__p">Search patterns follow school calendar — tutoring, after-school programs, and family services peak during academic year.</p>
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
        <h2 class="section-h">Severna Park search terms<br><em class="serif">that bring customers.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'hvac severna park', '720', 'Home services' ),
          array( 'dentist severna park', '540', 'Healthcare' ),
          array( 'restaurants severna park', '890', 'Dining' ),
          array( 'plumber severna park', '410', 'Home services' ),
          array( 'severna park high school', '620', 'Education' ),
          array( 'hair salon severna park', '380', 'Personal services' ),
          array( 'auto repair severna park', '490', 'Automotive' ),
          array( 'real estate severna park', '1,100', 'Property' ),
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
        <h2 class="section-h">What Severna Park<br><em class="serif">competitors overlook.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Mobile speed', '70% of local sites load slowly on mobile', 'Critical for residential area searches' ),
          array( 'Neighborhood pages', 'Most ignore specific Severna Park areas', 'Olde Severna, Round Bay, Ben Oaks content' ),
          array( 'Seasonal content', 'No summer/winter service strategies', 'Pool services, snow removal, holiday prep' ),
          array( 'Review strategy', 'Weak review generation systems', 'Family decisions depend heavily on reviews' ),
          array( 'Local schema', 'Missing Severna Park-specific markup', 'Helps Google understand service area' ),
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
      <div class="cta__eyebrow mono">↳ Free Severna Park SEO audit</div>
      <h2 class="cta__h">Ready to own<br><em class="serif">Severna Park search?</em></h2>
      <p class="cta__p">We'll analyze your Severna Park search presence, identify where local competitors are winning, and create a strategy to capture more high-value residential customers.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
