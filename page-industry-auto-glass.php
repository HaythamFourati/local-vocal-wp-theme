<?php
/**
 * Template Name: Industry — Auto Glass
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--autoglass">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-AG-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>Auto Glass Services</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Auto Glass</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/06</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · Auto Glass</span></div>
          <h1 class="ind-brief__h">Rock chip or full replacement,<br><em class="serif">we bring you the calls.</em></h1>
          <p class="ind-brief__sub">
            Auto glass is a high-intent, local search business. Customers need service now — and they Google it. We make sure your shop is the first one they find, call, and choose over Safelite and the competition.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-AG-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">Auto Glass Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>Auto Glass · Windshield Repair</dd></div>
            <div><dt>Market</dt><dd>Local · 15–50 mi radius</dd></div>
            <div><dt>Goal</dt><dd>Repair + replacement bookings</dd></div>
            <div><dt>Challenge</dt><dd>Big brands dominate · Price shoppers</dd></div>
            <div><dt>Channels</dt><dd>SEO · GBP · PPC · Local</dd></div>
            <div class="ind-brief__doc-list-last"><dt>Timeline</dt><dd>Results in 30–60 days</dd></div>
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
       SERVICES
       ============================================================ -->
  <section class="ind-services" id="services">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 01</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">What we build</span>
        </div>
        <h2 class="section-h">Everything for auto glass<br><em class="serif">to win local search.</em></h2>
        <p class="section-lead">From emergency rock chip searches to full replacement bookings — we make sure your shop is the first call customers make.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Auto Glass SEO',           'Rank for "windshield repair near me," "auto glass [city]," and every service you offer. Beat the big brands locally.', '#FF6B4A' ),
          array( 'GBP',     'Google Business Profile',  'Review management, service photos, posts, and Q&A — dominate the local map pack for glass services.', '#7AC74F' ),
          array( 'PPC',     'Emergency Search Ads',     'Targeted ads for "broken windshield," "rock chip repair," and urgent needs. Pay only for high-intent clicks.', '#4A90FF' ),
          array( 'WEB',     'Mobile-First Website',     'Fast, professional site with instant quote forms, service areas, insurance info, and click-to-call. Built for mobile.', '#A067E5' ),
          array( 'LOC',     'Local Listings',           'Yelp, Angie\'s, BBB, and industry directories — consistent NAP, reviews, and photos across every platform.', '#E5478B' ),
          array( 'SOC',     'Social Media',             'Before/after photos, team spotlights, customer testimonials, and seasonal reminders — stay top of mind.', '#F5A623' ),
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
       WHY AUTO GLASS CHOOSES US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">We beat the big brands<br><em class="serif">in your backyard.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">Emergency visibility</h3>
          <p class="ind-why-col__p">When someone's windshield cracks, they search Google. We make sure you're the first result — map pack, ads, and organic — with a click-to-call ready for immediate business.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">Trust over price</h3>
          <p class="ind-why-col__p">Customers choose local shops they trust. We build that trust through reviews, testimonials, service photos, and content that shows your expertise and quality.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">Insurance partnerships</h3>
          <p class="ind-why-col__p">We highlight your insurance partnerships, billing processes, and OEM vs aftermarket options — the details that matter to customers deciding between you and the big chains.</p>
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
        <h2 class="section-h">What auto glass shops see<br><em class="serif">in the first quarter.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+70%',  'Phone calls',              'From organic search + local ads' ),
          array( 'Top 3', 'Map pack for glass terms',  '"Windshield repair" + service keywords' ),
          array( '4.8★',  'Review score maintained',   'Active review generation program' ),
          array( '< $45', 'Cost per qualified lead',  'PPC + organic blended average' ),
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
      <h2 class="cta__h">Ready to own<br><em class="serif">your market?</em></h2>
      <p class="cta__p">We'll audit your current online presence, show you exactly where calls are going to competitors, and build a plan to capture them.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
