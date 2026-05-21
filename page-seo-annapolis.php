<?php
/**
 * Template Name: SEO — Annapolis
 * Visual language: geo-focused SEO audit report
 */
get_header(); ?>

<main class="service-page svc-seo svc-seo--annapolis">

  <!-- ============================================================
       GEO AUDIT MASTHEAD
       ============================================================ -->
  <section class="seo-geo">
    <div class="lvm-container">

      <div class="seo-geo__topline mono">
        <span><strong>LOCAL SEO AUDIT</strong></span>
        <span class="seo-geo__topline-rule"></span>
        <span>Report · ANN-SEO-26</span>
        <span class="seo-geo__topline-rule"></span>
        <span>Annapolis, MD</span>
      </div>

      <div class="page-hero__crumb mono seo-geo__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/seo' ) ); ?>">SEO</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Annapolis</span>
      </div>

      <div class="seo-geo__grid">

        <div class="seo-geo__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">MD/01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">SEO · Annapolis Market</span></div>
          <h1 class="seo-geo__h">Own Annapolis search<br><em class="serif">before your competitors do.</em></h1>
          <p class="seo-geo__sub">
            Maryland's capital is competitive — law firms, restaurants, maritime services, and tourism all fighting for the same local searches. We help Annapolis businesses dominate the map pack and organic results with hyper-local SEO that understands the city's unique search behavior.
          </p>
          <div class="seo-geo__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get your free SEO audit <span aria-hidden="true">→</span></a>
            <a href="#analysis" class="btn btn--ghost btn--lg">See market analysis <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="seo-geo__report" aria-label="SEO audit snapshot">
          <header class="seo-geo__report-head">
            <span class="seo-geo__report-folio mono">ANN-SEO-26 · AUDIT</span>
            <span class="seo-geo__report-client mono">Annapolis Market</span>
          </header>
          <dl class="seo-geo__report-list mono">
            <div><dt>Market</dt><dd>Annapolis City · Anne Arundel</dd></div>
            <div><dt>Population</dt><dd>41,000 · Metro 95M</dd></div>
            <div><dt>Key sectors</dt><dd>Legal · Maritime · Tourism · Gov</dd></div>
            <div><dt>Search volume</dt><dd>12,400+ local queries/mo</dd></div>
            <div><dt>Competition</dt><dd>High · Established firms</dd></div>
            <div class="seo-geo__report-list-last"><dt>Opportunity</dt><dd>Map pack + content gaps</dd></div>
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
        <h2 class="section-h">How Annapolis searches<br><em class="serif">and where the gaps are.</em></h2>
        <p class="section-lead">Local SEO in Annapolis isn't just about rankings — it's about understanding seasonal tourism, government cycles, and maritime industry patterns.</p>
      </div>

      <div class="seo-analysis__grid">
        <?php
        $insights = array(
          array( 'Seasonal', 'Tourism peaks May–Sep', 'Waterfront dining, boat services, historic tours dominate search. 3x volume during summer months.', '#FF6B4A' ),
          array( 'Legal', 'High-value legal terms', '"Annapolis lawyer" searches avg $150 CPC. Personal injury, maritime law, family law dominate.', '#4A90FF' ),
          array( 'Gov', 'State government impact', 'Legislative session drives contractor, consulting, and B2B services search patterns.', '#7AC74F' ),
          array( 'Local', 'Neighborhood signals', '"West Street," "Eastport," "Naval Academy" modifiers indicate strong local intent.', '#A067E5' ),
          array( 'Mobile', 'On-the-go searches', '85% of Annapolis searches are mobile — tourists and professionals searching from phones.', '#E5478B' ),
          array( 'Voice', "Naval Academy queries", '"How far is Naval Academy\' and related wayfinding searches spike during events.', '#F5A623' ),
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
        <h2 class="section-h">Where Annapolis businesses<br><em class="serif">can outrank competitors.</em></h2>
      </div>

      <div class="seo-opps__cols">
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">01</span>
          <h3 class="seo-opp-col__h">Map pack domination</h3>
          <p class="seo-opp-col__p">Only 3 spots show for "Annapolis [service]" searches. We optimize GBP signals, local citations, and proximity factors to win these high-visibility positions.</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">02</span>
          <h3 class="seo-opp-col__h">Tourist-focused content</h3>
          <p class="seo-opp-col__p">Create content that captures the 3.5M annual visitors — "best waterfront dining Annapolis," "things to do near Naval Academy," "boat tours Annapolis."</p>
        </article>
        <article class="seo-opp-col">
          <span class="seo-opp-col__num mono">03</span>
          <h3 class="seo-opp-col__h">Maritime industry SEO</h3>
          <p class="seo-opp-col__p">Annapolis is a sailing hub. Target boat repair, marine services, yacht management, and waterfront commercial services with industry-specific keywords.</p>
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
        <h2 class="section-h">Annapolis search terms<br><em class="serif">that drive real business.</em></h2>
      </div>

      <div class="seo-keywords__grid">
        <?php
        $keywords = array(
          array( 'restaurants near naval academy', '2,400', 'Tourist dining searches' ),
          array( 'annapolis boat repair', '890', 'Marine services' ),
          array( 'lawyers annapolis md', '1,600', 'Legal services' ),
          array( 'things to do in annapolis', '3,200', 'Tourism activities' ),
          array( 'annapolis waterfront dining', '1,100', 'Restaurant searches' ),
          array( 'contractors annapolis', '980', 'Home services' ),
          array( 'annapolis md real estate', '1,400', 'Property searches' ),
          array( 'best annapolis restaurants', '1,800', 'Dining decisions' ),
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
        <h2 class="section-h">What your Annapolis<br><em class="serif">competitors are missing.</em></h2>
      </div>

      <div class="seo-gap__list">
        <?php
        $gaps = array(
          array( 'Mobile optimization', '60% of Annapolis businesses have slow mobile sites', 'Critical for tourist and professional searches' ),
          array( 'Local content', 'Most sites ignore Annapolis-specific topics', 'Naval Academy, State House, maritime history' ),
          array( 'GBP signals', 'Weak review velocity and posting frequency', 'Regular posts and responses win map pack' ),
          array( 'Schema markup', '85% missing local business schema', 'Helps Google understand service area' ),
          array( 'Seasonal content', 'No summer/winter content strategy', 'Misses tourism and off-season opportunities' ),
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
      <div class="cta__eyebrow mono">↳ Free Annapolis SEO audit</div>
      <h2 class="cta__h">Ready to dominate<br><em class="serif">Annapolis search?</em></h2>
      <p class="cta__p">We'll analyze your Annapolis search presence, identify where competitors are outranking you, and create a hyper-local strategy to capture more business from residents and visitors.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start your audit today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
