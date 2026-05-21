<?php
/**
 * Template Name: Industry — Dentists
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--dental">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-DEN-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>Dental Practices</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Dentists</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · Dentists</span></div>
          <h1 class="ind-brief__h">Fill chairs with<br><em class="serif">the right patients.</em></h1>
          <p class="ind-brief__sub">
            Dental practices compete on trust, convenience, and visibility. We build the online presence that makes new patients choose you — through local search dominance, a modern website, and consistent social proof.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-DEN-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">Dental Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>Dental Practices · Orthodontics</dd></div>
            <div><dt>Market</dt><dd>Local · 5–15 mi radius</dd></div>
            <div><dt>Goal</dt><dd>New patient appointments · Case acceptance</dd></div>
            <div><dt>Challenge</dt><dd>High competition · Insurance queries · Trust</dd></div>
            <div><dt>Channels</dt><dd>SEO · GBP · Social · PPC</dd></div>
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
        <h2 class="section-h">Everything a dental practice needs<br><em class="serif">to attract new patients.</em></h2>
        <p class="section-lead">From the first "dentist near me" search to the booked appointment — we handle every touchpoint in between.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Dental SEO',               'Rank for "dentist near me," "teeth whitening [city]," and every procedure your practice offers. Local and on-page optimization.', '#FF6B4A' ),
          array( 'WEB',     'Patient-First Website',    'Modern, fast, mobile-first — with online booking, insurance info, virtual tours, and trust signals that convert visitors into patients.', '#4A90FF' ),
          array( 'GBP',     'Google Business Profile',  'Regular posts, photo updates, review responses, and Q&A — keeping your profile active and outranking competing practices.', '#7AC74F' ),
          array( 'SOC',     'Social Media',             'Before/after transformations, team spotlights, patient testimonials, and educational content — building community and trust.', '#E5478B' ),
          array( 'REP',     'Review Generation',        'Automated post-visit review requests, professional responses, and monitoring — building the 5-star reputation that wins new patients.', '#A067E5' ),
          array( 'PPC',     'Targeted Ads',             'Google Ads for high-value procedures (implants, Invisalign, cosmetic) and new-patient specials. Precise targeting, measurable ROI.', '#F5A623' ),
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
       WHY DENTISTS CHOOSE US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">Built for dental,<br><em class="serif">not generic healthcare.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">We know dental patients</h3>
          <p class="ind-why-col__p">Fear, cost, and convenience drive dental decisions. We craft messaging that addresses objections before they're spoken — insurance accepted, gentle care, same-day availability.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">High-value procedures</h3>
          <p class="ind-why-col__p">We don't just fill hygiene slots — we build campaigns around implants, Invisalign, and cosmetic work that drive practice revenue where margins are highest.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">Patient journey mapping</h3>
          <p class="ind-why-col__p">From first search to seated in the chair. We optimize every step — search visibility, website experience, booking flow, and post-visit follow-up for reviews and referrals.</p>
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
        <h2 class="section-h">What dental practices see<br><em class="serif">in the first quarter.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+35%',   'New patient appointments', 'From organic search + GBP + paid' ),
          array( '5.0★',   'Google review average',    'Active review generation program' ),
          array( 'Top 3',  'Map pack for key terms',   '"Dentist near me" + procedure keywords' ),
          array( '2.5×',   'ROI on ad spend',          'High-value procedure campaigns' ),
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
      <h2 class="cta__h">Ready to fill<br><em class="serif">your schedule?</em></h2>
      <p class="cta__p">We'll audit your current online presence, show you where new patients are going to competing practices, and build a plan to win them back.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
