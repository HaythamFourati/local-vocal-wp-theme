<?php
/**
 * Template Name: Industry — Contractors
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--contractors">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-CONT-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>General Contractors</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Contractors</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · Contractors</span></div>
          <h1 class="ind-brief__h">Marketing that keeps<br><em class="serif">your crews booked.</em></h1>
          <p class="ind-brief__sub">
            General contractors live and die by referrals — until they don't. We build the digital presence that fills the gaps between word-of-mouth, keeps your pipeline predictable, and makes sure the right jobs find you first.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-CONT-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">Contractor Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>General Contractors · Remodelers</dd></div>
            <div><dt>Market</dt><dd>Local / Regional · 15–50 mi radius</dd></div>
            <div><dt>Goal</dt><dd>Booked crews · Higher-ticket projects</dd></div>
            <div><dt>Challenge</dt><dd>Referral-only plateau · Seasonal dips</dd></div>
            <div><dt>Channels</dt><dd>SEO · GBP · Content · Paid</dd></div>
            <div class="ind-brief__doc-list-last"><dt>Timeline</dt><dd>Results in 60–90 days</dd></div>
          </dl>
          <footer class="ind-brief__doc-foot mono">
            <span class="ind-brief__doc-sig">↳ strategy ready</span>
            <span class="ind-brief__doc-stamp">2026</span>
          </footer>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SERVICES — what we do for contractors
       ============================================================ -->
  <section class="ind-services" id="services">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 01</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">What we build</span>
        </div>
        <h2 class="section-h">Everything a contractor needs<br><em class="serif">to get found and get hired.</em></h2>
        <p class="section-lead">From the first Google search to the signed contract — we handle the digital layer so you can focus on the job site.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Local SEO & Map Pack',     'Rank for "contractor near me" and every service keyword in your area. Citations, schema, on-page — the full stack.', '#FF6B4A' ),
          array( 'WEB',     'Website That Converts',    'Fast, mobile-first site built to turn visitors into calls. Project galleries, clear CTAs, trust signals front and center.', '#4A90FF' ),
          array( 'GBP',     'Google Business Profile',  'Optimized GBP with regular posts, photo updates, review responses, and Q&A management. Map pack visibility on autopilot.', '#7AC74F' ),
          array( 'CNT',     'Content & Blog',           'Monthly blog posts targeting the questions homeowners actually ask before hiring a contractor. Builds trust and rankings.', '#A067E5' ),
          array( 'SOC',     'Social Media',             'Project showcases, before/afters, crew highlights, and customer testimonials — posted consistently so you stay top-of-mind.', '#E5478B' ),
          array( 'PAID',    'Paid Ads (When Needed)',   'Google Local Service Ads and targeted search campaigns for seasonal pushes or new service areas. Pay only for real leads.', '#F5A623' ),
        );
        foreach ( $services as $s ) : ?>
          <article class="ind-svc-card" style="--col: <?php echo esc_attr( $s[3] ); ?>;">
            <header class="ind-svc-card__h">
              <span class="ind-svc-card__sw" aria-hidden="true"></span>
              <span class="ind-svc-card__tag mono"><?php echo esc_html( $s[0] ); ?></span>
            </header>
            <h3 class="ind-svc-card__name"><?php echo esc_html( $s[1] ); ?></h3>
            <p class="ind-svc-card__desc"><?php echo esc_html( $s[2] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHY CONTRACTORS CHOOSE US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">Built for contractors,<br><em class="serif">not generic small business.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">We know the trades</h3>
          <p class="ind-why-col__p">Roofing, remodeling, concrete, electrical — we've written the pages, built the funnels, and run the ads. No learning curve on your dime.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">Results you can measure</h3>
          <p class="ind-why-col__p">Phone calls. Form fills. Booked estimates. We track what matters and report monthly in plain language — not vanity metrics.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">One team, no hand-offs</h3>
          <p class="ind-why-col__p">Your SEO, content, social, and ads are handled by the same small team. No vendors blaming each other. One Slack thread, one point of contact.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       RESULTS / KPIs
       ============================================================ -->
  <section class="ind-kpi">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 03</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Typical results</span>
        </div>
        <h2 class="section-h">What contractors see<br><em class="serif">in the first 90 days.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+45%',  'More phone calls',        'Qualified leads from organic search + map pack' ),
          array( 'Top 3', 'Map pack ranking',        'For primary service keywords in target area' ),
          array( '3×',    'Website lead volume',     'Form fills + click-to-call vs. prior quarter' ),
          array( '< 48h', 'Speed to first contact',  'Average response time from lead to callback' ),
        );
        foreach ( $kpis as $k ) : ?>
          <div class="ind-kpi-tile">
            <span class="ind-kpi-tile__val"><?php echo esc_html( $k[0] ); ?></span>
            <h3 class="ind-kpi-tile__name"><?php echo esc_html( $k[1] ); ?></h3>
            <p class="ind-kpi-tile__desc mono"><?php echo esc_html( $k[2] ); ?></p>
          </div>
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
      <div class="cta__eyebrow mono">↳ Free consultation</div>
      <h2 class="cta__h">Ready to fill<br><em class="serif">your pipeline?</em></h2>
      <p class="cta__p">We'll audit your current online presence, show you exactly where leads are slipping through, and map out the fastest path to a booked schedule.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
