<?php
/**
 * Template Name: Industry — Home Care
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--homecare">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-HC-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>Home Care Services</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Home Care</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/05</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · Home Care</span></div>
          <h1 class="ind-brief__h">Families find you<br><em class="serif">when it matters most.</em></h1>
          <p class="ind-brief__sub">
            Home care decisions are emotional, urgent, and deeply personal. We help agencies build the digital trust and visibility that families need — so when they're searching at midnight, you're the name they call.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-HC-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">Home Care Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>Home Care · Senior Care · Companion</dd></div>
            <div><dt>Market</dt><dd>Local · 10–30 mi radius</dd></div>
            <div><dt>Goal</dt><dd>Client inquiries + caregiver recruitment</dd></div>
            <div><dt>Challenge</dt><dd>Trust-critical · Emotional decisions · Compliance</dd></div>
            <div><dt>Channels</dt><dd>SEO · GBP · Content · Social</dd></div>
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
        <h2 class="section-h">Marketing that earns trust<br><em class="serif">before the first call.</em></h2>
        <p class="section-lead">From search visibility to compassionate content — we help families find your agency and feel confident choosing you for their loved ones.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Home Care SEO',            'Rank for "home care near me," "senior care [city]," and every service you offer. Local and service-page optimization.', '#FF6B4A' ),
          array( 'WEB',     'Compassionate Website',    'Warm, professional, accessible — with service details, caregiver bios, testimonials, and easy contact. Built to reassure.', '#4A90FF' ),
          array( 'CNT',     'Educational Content',      'Guides on choosing home care, understanding costs, caregiver qualifications — content that helps families and ranks.', '#A067E5' ),
          array( 'GBP',     'Google Business Profile',  'Review management, regular posts, and service updates — building visibility and trust in map pack results.', '#7AC74F' ),
          array( 'SOC',     'Social Media',             'Caregiver stories, client testimonials, community involvement, and educational posts — showing the human side of your agency.', '#E5478B' ),
          array( 'RCT',     'Recruitment Marketing',    'Attract quality caregivers with targeted job ads, culture content, and a career page that shows why your agency is different.', '#F5A623' ),
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
       WHY HOME CARE AGENCIES CHOOSE US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">We understand<br><em class="serif">the care industry.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">Trust-first messaging</h3>
          <p class="ind-why-col__p">Home care is a trust decision. We craft messaging that speaks to the adult child researching at midnight — compassionate, clear, and reassuring without being clinical.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">Dual-audience strategy</h3>
          <p class="ind-why-col__p">You need clients AND caregivers. We run parallel campaigns — one for families seeking care, one for quality caregivers seeking employment. Same brand, two funnels.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">Compliance-aware</h3>
          <p class="ind-why-col__p">Healthcare marketing has rules. We write content that's accurate, compliant, and sensitive — no overblown claims, no stock-photo sterility, just honest human messaging.</p>
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
        <h2 class="section-h">What home care agencies see<br><em class="serif">in the first quarter.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+50%',  'Client inquiries',        'From organic search + GBP visibility' ),
          array( '+30%',  'Caregiver applications',  'From targeted recruitment campaigns' ),
          array( 'Top 3', 'Map pack ranking',        'For "home care" + service-specific terms' ),
          array( '4.9★',  'Review score maintained', 'Active review generation + response' ),
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
      <h2 class="cta__h">Ready to grow<br><em class="serif">your agency?</em></h2>
      <p class="cta__p">We'll audit your current online presence, show you where families are choosing competitors, and build a plan to earn their trust first.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
