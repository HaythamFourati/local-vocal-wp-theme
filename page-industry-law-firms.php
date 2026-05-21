<?php
/**
 * Template Name: Industry — Law Firms
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--law">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-LAW-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>Legal Services</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Law Firms</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · Law Firms</span></div>
          <h1 class="ind-brief__h">Clients who need you<br><em class="serif">find you first.</em></h1>
          <p class="ind-brief__sub">
            Legal marketing is expensive and competitive. We help small and mid-size firms build an organic pipeline that doesn't depend on $200+ CPCs — through authority content, local SEO, and a website that earns trust in seconds.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-LAW-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">Legal Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>Law Firms · Attorneys</dd></div>
            <div><dt>Market</dt><dd>Local / Regional · Metro areas</dd></div>
            <div><dt>Goal</dt><dd>Qualified case inquiries · Retained clients</dd></div>
            <div><dt>Challenge</dt><dd>High CPCs · Trust deficit · Bar compliance</dd></div>
            <div><dt>Channels</dt><dd>SEO · Content · PPC · GBP</dd></div>
            <div class="ind-brief__doc-list-last"><dt>Timeline</dt><dd>Results in 90–120 days</dd></div>
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
        <h2 class="section-h">Digital marketing<br><em class="serif">built for legal.</em></h2>
        <p class="section-lead">Authority content, local visibility, and a website that converts — without crossing compliance lines or sounding like every other firm.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Legal SEO',                'Practice-area pages, schema markup, and local citations that rank you for "[practice] lawyer near me" searches.', '#FF6B4A' ),
          array( 'CNT',     'Authority Content',        'Blog posts and guides answering the exact questions prospects Google before hiring. Builds trust and rankings simultaneously.', '#A067E5' ),
          array( 'WEB',     'Trust-First Website',      'Professional, fast, mobile-first — with case results, testimonials, and clear CTAs. Designed to convert in a skeptical space.', '#4A90FF' ),
          array( 'GBP',     'Google Business Profile',  'Review management, post scheduling, and citation consistency — so you dominate the local map pack for your practice areas.', '#7AC74F' ),
          array( 'PPC',     'Targeted PPC',             'Tight keyword targeting for high-intent searches. We keep CPCs in check with quality score optimization and negative keywords.', '#E5478B' ),
          array( 'REP',     'Reputation Management',    'Systematic review generation from satisfied clients. Professional responses. Building the 4.9★ profile that wins the click.', '#F5A623' ),
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
       WHY LAW FIRMS CHOOSE US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">We speak legal<br><em class="serif">without billing hourly.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">Bar-compliant content</h3>
          <p class="ind-why-col__p">Every page and post is written with compliance in mind — proper disclaimers, no guarantees, no misleading claims. We've studied the rules so you don't have to review every word.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">Lower cost per case</h3>
          <p class="ind-why-col__p">Organic SEO and content compound over time, reducing your dependence on $200+ PPC clicks. We build the asset that pays dividends for years.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">Trust-building design</h3>
          <p class="ind-why-col__p">Legal prospects are skeptical. We design sites and content that establish credibility in seconds — case results, accolades, clear specialization, and real client stories.</p>
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
        <h2 class="section-h">What law firms see<br><em class="serif">after one quarter.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+40%',   'Case inquiries',        'From organic search + content marketing' ),
          array( '-55%',   'Cost per lead',         'Vs. PPC-only strategy over 6 months' ),
          array( 'Page 1', 'For practice keywords', '80% of target keywords ranking page 1' ),
          array( '4.9★',   'Average review score',  'Active reputation management program' ),
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
      <h2 class="cta__h">Ready to grow<br><em class="serif">your practice?</em></h2>
      <p class="cta__p">We'll audit your current digital presence, identify where qualified leads are going to competing firms, and map out a plan to capture them.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
