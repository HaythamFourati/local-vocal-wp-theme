<?php
/**
 * Template Name: SEO Optimization Service Page
 * Visual language: ranking report / SERP dashboard
 */
get_header(); ?>

<main class="service-page svc-seo">

  <!-- ============================================================
       HERO — with floating ranking report card
       ============================================================ -->
  <section class="seo-hero">
    <div class="seo-hero__grid" aria-hidden="true"></div>
    <div class="lvm-container seo-hero__inner">

      <div class="seo-hero__copy">
        <div class="page-hero__crumb mono">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
          <span class="page-hero__crumb-sep">/</span>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
          <span class="page-hero__crumb-sep">/</span>
          <span>Local SEO</span>
        </div>
        <div class="eyebrow"><span class="eyebrow__num mono">S/02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · Local SEO</span></div>
        <h1 class="seo-hero__h">Page-one rankings,<br><em class="serif">in your service area.</em></h1>
        <p class="seo-hero__sub">
          Local SEO that gets you found in the map pack and on page one for the searches that actually convert. Built around your service area, your service list, and your real customers — not generic checklists.
        </p>
        <div class="seo-hero__ctas">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free audit <span aria-hidden="true">→</span></a>
          <a href="#serp" class="btn btn--ghost btn--lg">See a sample report <span aria-hidden="true">↓</span></a>
        </div>
      </div>

      <aside class="seo-rank" aria-label="Sample ranking report">
        <div class="seo-rank__head">
          <div class="seo-rank__head-l">
            <span class="seo-rank__title mono">RANKING REPORT</span>
            <span class="seo-rank__client">Tidewater HVAC · Annapolis, MD</span>
          </div>
          <span class="seo-rank__date mono">↻ Updated 06.04</span>
        </div>

        <div class="seo-rank__row seo-rank__row--head mono">
          <span>Keyword</span>
          <span>Pos</span>
          <span>Δ 30d</span>
        </div>

        <?php
        $rows = array(
          array( 'hvac repair near me',          '1',  '+12', 'up' ),
          array( 'ac installation annapolis',    '2',  '+8',  'up' ),
          array( 'emergency hvac maryland',      '3',  '+5',  'up' ),
          array( 'furnace repair severna park',  '4',  '+9',  'up' ),
          array( 'heat pump service',            '6',  '+3',  'up' ),
          array( 'hvac contractor 21401',        '2',  '—',   'flat' ),
        );
        foreach ( $rows as $r ) : ?>
          <div class="seo-rank__row">
            <span class="seo-rank__kw"><?php echo esc_html( $r[0] ); ?></span>
            <span class="seo-rank__pos mono">#<?php echo esc_html( $r[1] ); ?></span>
            <span class="seo-rank__delta seo-rank__delta--<?php echo esc_attr( $r[3] ); ?> mono">
              <?php if ( $r[3] === 'up' ) : ?>▲<?php elseif ( $r[3] === 'down' ) : ?>▼<?php else : ?>•<?php endif; ?>
              <?php echo esc_html( $r[2] ); ?>
            </span>
          </div>
        <?php endforeach; ?>

        <div class="seo-rank__foot mono">
          <span><span class="seo-rank__dot"></span> 42 keywords tracked</span>
          <span>avg. position <span class="seo-rank__avg">3.2</span></span>
        </div>
      </aside>

    </div>
  </section>

  <!-- ============================================================
       SERP MOCKUP — Google search demo with map pack
       ============================================================ -->
  <section class="seo-serp" id="serp">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">What page-one looks like</span></div>
        <h2 class="section-h">Map pack first,<br><em class="serif">organic right behind it.</em></h2>
        <p class="section-lead">For local searches, the map pack is the prize. Three pinned results above the fold — and the homeowner calls one of them. Our job is making sure that one is yours.</p>
      </div>

      <div class="seo-serp__demo">
        <div class="seo-serp__bar">
          <span class="seo-spec__dot seo-spec__dot--r"></span>
          <span class="seo-spec__dot seo-spec__dot--y"></span>
          <span class="seo-spec__dot seo-spec__dot--g"></span>
          <span class="seo-serp__url mono">google.com/search?q=hvac+repair+near+me</span>
        </div>

        <div class="seo-serp__body">

          <div class="seo-serp__pack">
            <div class="seo-serp__pack-head mono">
              <span>★ Map results · Annapolis, MD</span>
              <span>3 results</span>
            </div>

            <ol class="seo-serp__pins">
              <li class="seo-serp__pin seo-serp__pin--you">
                <span class="seo-serp__pin-num mono">1</span>
                <div class="seo-serp__pin-body">
                  <div class="seo-serp__pin-name">Tidewater HVAC <span class="seo-serp__pin-badge mono">your business</span></div>
                  <div class="seo-serp__pin-meta">★★★★★ 4.9 (218) · Open · 1.2 mi · "Same-day service. Honest pricing."</div>
                </div>
              </li>
              <li class="seo-serp__pin">
                <span class="seo-serp__pin-num mono">2</span>
                <div class="seo-serp__pin-body">
                  <div class="seo-serp__pin-name">Bay Area Heating &amp; Cooling</div>
                  <div class="seo-serp__pin-meta">★★★★☆ 4.4 (87) · Closed · 3.8 mi</div>
                </div>
              </li>
              <li class="seo-serp__pin">
                <span class="seo-serp__pin-num mono">3</span>
                <div class="seo-serp__pin-body">
                  <div class="seo-serp__pin-name">Capital HVAC Services</div>
                  <div class="seo-serp__pin-meta">★★★★☆ 4.2 (54) · Open · 5.1 mi</div>
                </div>
              </li>
            </ol>
          </div>

          <ul class="seo-serp__organic">
            <li class="seo-serp__result seo-serp__result--you">
              <span class="seo-serp__crumb mono">tidewaterhvac.com › services › repair</span>
              <h4 class="seo-serp__rtitle">HVAC Repair in Annapolis · Same-Day Service | Tidewater</h4>
              <p class="seo-serp__rmeta">Family-run HVAC repair across Anne Arundel County. Honest diagnostics, upfront pricing, weekend service available. Call (443) 555-0142.</p>
            </li>
            <li class="seo-serp__result">
              <span class="seo-serp__crumb mono">bay-area-hvac.com › repair-services</span>
              <h4 class="seo-serp__rtitle">HVAC Repair Services | Bay Area Heating &amp; Cooling</h4>
              <p class="seo-serp__rmeta">24/7 emergency HVAC repair in the greater Annapolis region. Licensed, bonded, insured. Free estimates on new systems.</p>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       THREE PILLARS — On-page / Off-page / Technical (audit cards)
       ============================================================ -->
  <section class="seo-pillars">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Three sides of SEO</span></div>
        <h2 class="section-h">Skip any one of them,<br><em class="serif">and Google notices.</em></h2>
        <p class="section-lead">Real local SEO is a stack — content, trust signals, and technical foundation. We audit and ship all three on a quarterly rhythm.</p>
      </div>

      <div class="seo-pillars__grid">
        <?php
        $pillars = array(
          array(
            'num'   => '01',
            'name'  => 'On-page',
            'lead'  => 'Headings, metadata, internal links, structured data, and content depth — fixed page by page.',
            'score' => 92,
            'items' => array(
              'Title tags + meta descriptions tuned per page',
              'H1 / H2 / H3 hierarchy aligned to search intent',
              'Internal linking architecture (hub & spoke)',
              'Schema markup: LocalBusiness, FAQ, Service',
              'Image alt text + filename normalization',
              'Page-level content audits & rewrites',
            ),
          ),
          array(
            'num'   => '02',
            'name'  => 'Off-page',
            'lead'  => 'Citations, reviews, and trust signals built the slow way — because the fast way gets you penalized.',
            'score' => 88,
            'items' => array(
              'Google Business Profile optimization',
              'NAP consistency across 40+ directories',
              'Review velocity strategy (real customers)',
              'Local backlinks from MD partners + press',
              'Branded mentions monitoring',
              'Disavow file maintenance for toxic links',
            ),
            'featured' => true,
          ),
          array(
            'num'   => '03',
            'name'  => 'Technical',
            'lead'  => 'Page speed, Core Web Vitals, crawlability, and indexation — the things humans never see.',
            'score' => 95,
            'items' => array(
              'Core Web Vitals: LCP, INP, CLS in the green',
              'Mobile-first responsiveness audit',
              'Crawl budget + indexation monitoring',
              'XML sitemap + robots.txt hygiene',
              'HTTPS, redirects, canonical tags',
              'Page-speed optimization & lazy loading',
            ),
          ),
        );
        foreach ( $pillars as $p ) :
          $featured = ! empty( $p['featured'] );
          ?>
          <article class="seo-pillar<?php echo $featured ? ' seo-pillar--featured' : ''; ?>">
            <header class="seo-pillar__head">
              <span class="seo-pillar__num mono"><?php echo esc_html( $p['num'] ); ?></span>
              <div class="seo-pillar__score" style="--score: <?php echo (int) $p['score']; ?>;">
                <span class="seo-pillar__score-num mono"><?php echo (int) $p['score']; ?></span>
              </div>
            </header>
            <h3 class="seo-pillar__name"><?php echo esc_html( $p['name'] ); ?> SEO</h3>
            <p class="seo-pillar__lead"><?php echo esc_html( $p['lead'] ); ?></p>

            <ul class="seo-pillar__list">
              <?php foreach ( $p['items'] as $item ) : ?>
                <li><span aria-hidden="true">✓</span><?php echo esc_html( $item ); ?></li>
              <?php endforeach; ?>
            </ul>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       RANKING TRAJECTORY — CSS-only chart
       ============================================================ -->
  <section class="seo-traj">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">A real client trajectory</span></div>
        <h2 class="section-h">Six months,<br><em class="serif">page 4 to position 1.</em></h2>
        <p class="section-lead">"hvac repair near me" — Anne Arundel County. Real client, real Google Search Console data, names anonymized.</p>
      </div>

      <div class="seo-chart">
        <div class="seo-chart__head">
          <div class="seo-chart__legend mono">
            <span><span class="seo-chart__sw seo-chart__sw--rank"></span> Avg. position</span>
            <span><span class="seo-chart__sw seo-chart__sw--ctr"></span> Click-through rate</span>
          </div>
          <div class="seo-chart__deltas mono">
            <span><span>POS</span><strong>#42 → #1</strong></span>
            <span><span>CTR</span><strong>0.4% → 8.7%</strong></span>
            <span><span>CALLS</span><strong>+184%</strong></span>
          </div>
        </div>

        <div class="seo-chart__plot">
          <span class="seo-chart__y-lbl seo-chart__y-lbl--top mono">#1</span>
          <span class="seo-chart__y-lbl seo-chart__y-lbl--mid mono">#10</span>
          <span class="seo-chart__y-lbl seo-chart__y-lbl--bot mono">#50</span>

          <?php
          // Heights are inverted: ranking #1 = 100% bar, #50 = ~5%
          $traj = array(
            array( 'M1', 8,  4 ),
            array( 'M2', 18, 12 ),
            array( 'M3', 32, 28 ),
            array( 'M4', 56, 50 ),
            array( 'M5', 78, 70 ),
            array( 'M6', 95, 88 ),
          );
          foreach ( $traj as $t ) : ?>
            <div class="seo-chart__col">
              <div class="seo-chart__bars">
                <span class="seo-chart__bar seo-chart__bar--rank" style="--h: <?php echo (int) $t[1]; ?>%;"></span>
                <span class="seo-chart__bar seo-chart__bar--ctr"  style="--h: <?php echo (int) $t[2]; ?>%;"></span>
              </div>
              <span class="seo-chart__x-lbl mono"><?php echo esc_html( $t[0] ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <p class="seo-chart__note mono">↳ Source: Google Search Console + GA4. 6-month engagement, May–Oct 2024.</p>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROCESS — audit phases
       ============================================================ -->
  <section class="seo-proc">
    <div class="lvm-container">
      <div class="seo-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Process</span></div>
        <h2 class="section-h">A systematic approach<br><em class="serif">to local visibility.</em></h2>
        <p class="section-lead">Audit, plan, ship, measure. Every quarter. No black-box dashboards, no monthly mystery invoices.</p>
      </div>

      <ol class="seo-phases">
        <?php
        $phases = array(
          array(
            'tag'   => 'phase 01',
            'name'  => 'SEO audit',
            'lead'  => 'Full technical, on-page, and off-page audit. We benchmark you against the three closest map-pack competitors.',
            'lines' => array( 'Site crawl + indexation report', 'Keyword opportunity matrix', 'GBP + citation health check', 'Competitor gap analysis' ),
          ),
          array(
            'tag'   => 'phase 02',
            'name'  => 'Strategy & roadmap',
            'lead'  => 'A 90-day roadmap with priorities, KPIs, and the highest-leverage moves first — not a 12-month wishlist.',
            'lines' => array( 'Custom 90-day roadmap', 'KPI targets defined', 'Quarterly priorities locked', 'Owner sign-off' ),
          ),
          array(
            'tag'   => 'phase 03',
            'name'  => 'Implementation',
            'lead'  => 'On-page rewrites, technical fixes, GBP optimization, and link/citation work — shipped weekly.',
            'lines' => array( 'On-page + technical fixes', 'Content & internal-link work', 'GBP + citation builds', 'Schema deployment' ),
          ),
          array(
            'tag'   => 'phase 04',
            'name'  => 'Reporting',
            'lead'  => 'A monthly report you actually read — keyword movements, win/loss analysis, and what we are doing next.',
            'lines' => array( 'Monthly ranking + traffic report', 'Win/loss analysis', 'Plan refinement', 'Quarterly review call' ),
          ),
        );
        foreach ( $phases as $i => $ph ) : ?>
          <li class="seo-phase">
            <div class="seo-phase__l">
              <span class="seo-phase__tag mono"><?php echo esc_html( $ph['tag'] ); ?></span>
              <h3 class="seo-phase__name"><?php echo esc_html( $ph['name'] ); ?></h3>
              <p class="seo-phase__lead"><?php echo esc_html( $ph['lead'] ); ?></p>
            </div>
            <ul class="seo-phase__list">
              <?php foreach ( $ph['lines'] as $line ) : ?>
                <li><span class="mono" aria-hidden="true">→</span><?php echo esc_html( $line ); ?></li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free SEO audit</div>
      <h2 class="cta__h">Ready to elevate<br><em class="serif">your local SEO?</em></h2>
      <p class="cta__p">We'll audit your current rankings, technical health, and competitor positions — and show you the highest-impact moves first. Free. No commitment.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free audit <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
