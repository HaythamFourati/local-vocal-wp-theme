<?php
/**
 * Template Name: Analytics & Reporting Service Page
 * Visual language: live business dashboard
 */
get_header(); ?>

<main class="service-page svc-an">

  <!-- ============================================================
       HERO — with floating KPI tiles
       ============================================================ -->
  <section class="an-hero">
    <div class="an-hero__grid" aria-hidden="true"></div>
    <div class="lvm-container an-hero__inner">

      <div class="an-hero__copy">
        <div class="page-hero__crumb mono">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
          <span class="page-hero__crumb-sep">/</span>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
          <span class="page-hero__crumb-sep">/</span>
          <span>Analytics &amp; Reporting</span>
        </div>
        <div class="eyebrow"><span class="eyebrow__num mono">S/05</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · Analytics</span></div>
        <h1 class="an-hero__h">A dashboard you'll actually open,<br><em class="serif">and a report you'll actually read.</em></h1>
        <p class="an-hero__sub">
          Tracking installed correctly. The KPIs that matter for service businesses, not vanity metrics. A monthly written report telling you what worked, what didn't, and what's next — in plain English.
        </p>
        <div class="an-hero__ctas">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free review <span aria-hidden="true">→</span></a>
          <a href="#funnel" class="btn btn--ghost btn--lg">See sample report <span aria-hidden="true">↓</span></a>
        </div>
      </div>

      <aside class="an-dash" aria-label="Live dashboard preview">
        <div class="an-dash__head">
          <div class="an-dash__head-l">
            <span class="an-dash__title mono">DASHBOARD · LAST 30 DAYS</span>
            <span class="an-dash__client">Tidewater HVAC · Annapolis, MD</span>
          </div>
          <span class="an-dash__live mono"><span class="an-dash__live-dot"></span> live</span>
        </div>

        <div class="an-dash__tiles">
          <?php
          $tiles = array(
            array( 'CALLS',     '184',  '+62%',   array( 12, 18, 14, 22, 20, 28, 32, 38 ) ),
            array( 'FORM LEADS','47',   '+38%',   array(  4,  6,  8,  7, 10,  9, 12, 11 ) ),
            array( 'SESSIONS',  '8.2K', '+24%',   array( 18, 22, 30, 26, 34, 32, 40, 44 ) ),
            array( 'CONV. RATE','3.6%', '+0.8pp', array(  8, 10, 12, 11, 14, 13, 17, 18 ) ),
          );
          foreach ( $tiles as $t ) : ?>
            <div class="an-tile">
              <span class="an-tile__lbl mono"><?php echo esc_html( $t[0] ); ?></span>
              <span class="an-tile__val"><?php echo esc_html( $t[1] ); ?></span>
              <span class="an-tile__delta mono">▲ <?php echo esc_html( $t[2] ); ?></span>
              <svg class="an-tile__spark" viewBox="0 0 80 32" preserveAspectRatio="none" aria-hidden="true">
                <?php
                $pts = $t[3];
                $count = count( $pts );
                $max = max( $pts );
                $coords = array();
                foreach ( $pts as $i => $v ) {
                  $x = $i * ( 80 / ( $count - 1 ) );
                  $y = 28 - ( ( $v / $max ) * 24 );
                  $coords[] = round( $x, 1 ) . ',' . round( $y, 1 );
                }
                $line = implode( ' ', $coords );
                $area = '0,32 ' . $line . ' 80,32';
                ?>
                <polygon class="an-tile__spark-fill" points="<?php echo esc_attr( $area ); ?>"/>
                <polyline class="an-tile__spark-line" points="<?php echo esc_attr( $line ); ?>"/>
              </svg>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="an-dash__foot mono">
          <span>↻ Synced 4m ago</span>
          <span>GA4 · Search Console · Calls</span>
        </div>
      </aside>

    </div>
  </section>

  <!-- ============================================================
       WHAT WE TRACK — KPI categories
       ============================================================ -->
  <section class="an-track">
    <div class="lvm-container">
      <div class="an-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">What we track</span></div>
        <h2 class="section-h">The numbers that move the business,<br><em class="serif">not the ones that flatter it.</em></h2>
        <p class="section-lead">A small, deliberate set of KPIs across acquisition, behavior, and outcomes. Updated nightly, summarized monthly, explained in plain English.</p>
      </div>

      <div class="an-track__grid">
        <?php
        $tracks = array(
          array(
            'tag'  => 'cat_01',
            'name' => 'Acquisition',
            'desc' => 'Where customers find you and which channel earned the call. Real attribution, not "direct/none".',
            'kpis' => array( 'Organic sessions by service', 'Map pack views &amp; clicks', 'Branded vs non-branded', 'GBP discovery searches', 'Top entry pages' ),
          ),
          array(
            'tag'  => 'cat_02',
            'name' => 'Behavior',
            'desc' => 'What customers do once they\'re on the site — and where they get stuck.',
            'kpis' => array( 'Service-page engagement', 'Scroll depth + dwell time', 'Internal navigation paths', 'Mobile vs desktop UX', 'Search queries on-site' ),
            'featured' => true,
          ),
          array(
            'tag'  => 'cat_03',
            'name' => 'Outcomes',
            'desc' => 'The bottom line — calls, forms, bookings. Tagged by source so you know what paid off.',
            'kpis' => array( 'Phone calls (tracked)', 'Form submissions', 'Booking completions', 'Lead source attribution', 'Cost per qualified lead' ),
          ),
        );
        foreach ( $tracks as $tk ) :
          $featured = ! empty( $tk['featured'] );
          ?>
          <article class="an-track-card<?php echo $featured ? ' an-track-card--featured' : ''; ?>">
            <span class="an-track-card__tag mono"><?php echo esc_html( $tk['tag'] ); ?></span>
            <h3 class="an-track-card__name"><?php echo esc_html( $tk['name'] ); ?></h3>
            <p class="an-track-card__desc"><?php echo $tk['desc']; ?></p>
            <ul class="an-track-card__list mono">
              <?php foreach ( $tk['kpis'] as $k ) : ?>
                <li><span aria-hidden="true">▦</span><?php echo $k; ?></li>
              <?php endforeach; ?>
            </ul>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FUNNEL VISUALIZATION
       ============================================================ -->
  <section class="an-funnel" id="funnel">
    <div class="lvm-container">
      <div class="an-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">A real client funnel</span></div>
        <h2 class="section-h">From local search<br><em class="serif">to a booked job.</em></h2>
        <p class="section-lead">Sample funnel for a Maryland HVAC client, last 30 days. Real shape, anonymized numbers.</p>
      </div>

      <div class="an-funnel__board">

        <ol class="an-funnel__steps">
          <?php
          $steps = array(
            array( 'Searches in service area', '12,400', '100%', 100 ),
            array( 'Saw your map pack listing', '4,820',  '38.9%', 70 ),
            array( 'Visited your website',     '2,140',  '17.3%', 50 ),
            array( 'Engaged service page',     '780',    '6.3%',  35 ),
            array( 'Called or submitted form', '184',    '1.5%',  18 ),
            array( 'Booked a job',             '127',    '1.0%',  10 ),
          );
          foreach ( $steps as $i => $s ) : ?>
            <li class="an-funnel__step" style="--w: <?php echo (int) $s[3]; ?>%;">
              <div class="an-funnel__bar">
                <span class="an-funnel__bar-fill"></span>
              </div>
              <div class="an-funnel__row">
                <span class="an-funnel__num mono">0<?php echo $i + 1; ?></span>
                <span class="an-funnel__lbl"><?php echo esc_html( $s[0] ); ?></span>
                <span class="an-funnel__val mono"><?php echo esc_html( $s[1] ); ?></span>
                <span class="an-funnel__pct mono"><?php echo esc_html( $s[2] ); ?></span>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>

        <aside class="an-funnel__notes">
          <div class="an-funnel__note">
            <span class="an-funnel__note-tag mono">⚡ insight</span>
            <p>The biggest leak is <strong>map-pack &rarr; site visit</strong>. We're A/B-testing the GBP photo set + service categories this month.</p>
          </div>
          <div class="an-funnel__note">
            <span class="an-funnel__note-tag mono"><svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="11" height="11" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg> win</span>
            <p>Service-page conversion up <strong>+38%</strong> since the booking form simplification in June.</p>
          </div>
          <div class="an-funnel__note">
            <span class="an-funnel__note-tag mono">→ next</span>
            <p>Add call-tracking on the Annapolis service page to attribute weekend calls correctly.</p>
          </div>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       MONTHLY REPORT MOCKUP
       ============================================================ -->
  <section class="an-report">
    <div class="lvm-container">
      <div class="an-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">The monthly report</span></div>
        <h2 class="section-h">A short, written summary,<br><em class="serif">not a 40-page deck.</em></h2>
        <p class="section-lead">One page of plain English. What changed, what we shipped, what we're trying next. Sent the first business day of every month.</p>
      </div>

      <div class="an-report__doc">
        <header class="an-report__hd">
          <div class="an-report__hd-l">
            <span class="an-report__brand mono">LV / MONTHLY REPORT</span>
            <span class="an-report__period">June 2025 · Tidewater HVAC</span>
          </div>
          <span class="an-report__date mono">Issued 07.01.2025</span>
        </header>

        <section class="an-report__sec">
          <h4 class="an-report__h">Summary <span class="mono">/ 01</span></h4>
          <p>A strong month. Calls climbed <strong>+62%</strong> month-over-month and "hvac repair near me" reached the <strong>map pack #1</strong> for the Annapolis area. The new service-area landing pages drove most of the growth.</p>
        </section>

        <section class="an-report__sec">
          <h4 class="an-report__h">What we shipped <span class="mono">/ 02</span></h4>
          <ul>
            <li>4 new service-area landing pages (Severna Park, Glen Burnie, Pasadena, Edgewater)</li>
            <li>Schema markup deployed on all service pages</li>
            <li>Booking form simplified: 7 fields → 4 fields</li>
            <li>14 new branded photos added to GBP</li>
          </ul>
        </section>

        <section class="an-report__sec">
          <h4 class="an-report__h">What we're trying next <span class="mono">/ 03</span></h4>
          <ul>
            <li>A/B test of GBP "Services" listing order</li>
            <li>Add weekend call-tracking line</li>
            <li>Q3 content calendar: emergency-repair topical cluster</li>
          </ul>
        </section>

        <footer class="an-report__ft mono">
          <span>↳ Next sync · Mon 07.07 · 9:00am</span>
          <span>haytham@localvocal.com</span>
        </footer>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROCESS / WHAT YOU GET
       ============================================================ -->
  <section class="an-deliv">
    <div class="lvm-container">
      <div class="an-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">What you get</span></div>
        <h2 class="section-h">Set up once,<br><em class="serif">delivered every month.</em></h2>
        <p class="section-lead">A clean tracking install, the right dashboards, and a written report cadence — without you having to learn GA4.</p>
      </div>

      <div class="an-deliv__grid">
        <?php
        $delivs = array(
          array( '01', 'Tracking install',
            'GA4, Search Console, GBP, call tracking, and form events — installed correctly the first time.',
            array( 'GA4 + GTM clean install', 'Server-side conversion events', 'Call tracking number setup', 'GBP &amp; Search Console wired in' ) ),
          array( '02', 'Custom dashboards',
            'Looker Studio dashboards built around your business outcomes — calls, leads, bookings — not Google\'s defaults.',
            array( 'Outcome-led KPI dashboard', 'Channel attribution view', 'Top pages + drop-off pages', 'Mobile-friendly viewing' ) ),
          array( '03', 'Monthly written report',
            'A one-page summary on the first business day of every month. What changed, what we shipped, what\'s next.',
            array( 'Plain-English summary', 'Wins + losses called out', 'Next-month plan', 'Delivered as PDF + email' ) ),
          array( '04', 'Quarterly review call',
            '30 minutes every quarter to walk through trends, recalibrate KPIs, and decide what to invest in next.',
            array( '90-day trend review', 'KPI recalibration', 'Roadmap adjustments', 'Owner Q&amp;A' ) ),
        );
        foreach ( $delivs as $d ) : ?>
          <article class="an-deliv-card">
            <span class="an-deliv-card__num mono"><?php echo esc_html( $d[0] ); ?></span>
            <h3 class="an-deliv-card__name"><?php echo esc_html( $d[1] ); ?></h3>
            <p class="an-deliv-card__desc"><?php echo esc_html( $d[2] ); ?></p>
            <ul class="an-deliv-card__list">
              <?php foreach ( $d[3] as $line ) : ?>
                <li><span aria-hidden="true">+</span><?php echo $line; ?></li>
              <?php endforeach; ?>
            </ul>
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
      <div class="cta__eyebrow mono">↳ Free analytics review</div>
      <h2 class="cta__h">Ready to make<br><em class="serif">data-driven decisions?</em></h2>
      <p class="cta__p">We'll review your current analytics, find the gaps, and show you the numbers that actually matter for your business.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free review <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
