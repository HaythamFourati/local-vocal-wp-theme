<?php
/**
 * Template Name: Industry — HVAC
 * Visual language: campaign brief / strategy document (industry variant)
 */
get_header(); ?>

<main class="service-page svc-ind svc-ind--hvac">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="ind-brief">
    <div class="lvm-container">

      <div class="ind-brief__topline mono">
        <span><strong>INDUSTRY BRIEF</strong></span>
        <span class="ind-brief__topline-rule"></span>
        <span>Doc · IND-HVAC-26</span>
        <span class="ind-brief__topline-rule"></span>
        <span>HVAC / Mechanical</span>
      </div>

      <div class="page-hero__crumb mono ind-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Industries</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>HVAC</span>
      </div>

      <div class="ind-brief__grid">

        <div class="ind-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">IND/02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industry · HVAC</span></div>
          <h1 class="ind-brief__h">More calls when<br><em class="serif">the weather turns.</em></h1>
          <p class="ind-brief__sub">
            HVAC is seasonal, competitive, and hyper-local. We make sure your company is the first one homeowners find — and trust — when the AC dies in July or the furnace quits in January.
          </p>
          <div class="ind-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#services" class="btn btn--ghost btn--lg">See what we do <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="ind-brief__doc" aria-label="Industry snapshot">
          <header class="ind-brief__doc-head">
            <span class="ind-brief__doc-folio mono">IND-HVAC-26 · PROFILE</span>
            <span class="ind-brief__doc-client mono">HVAC Marketing</span>
          </header>
          <dl class="ind-brief__doc-list mono">
            <div><dt>Industry</dt><dd>HVAC · Heating & Cooling</dd></div>
            <div><dt>Market</dt><dd>Local · 20–40 mi radius</dd></div>
            <div><dt>Goal</dt><dd>Emergency calls + maintenance plans</dd></div>
            <div><dt>Challenge</dt><dd>Seasonal demand · High CPC · Reviews</dd></div>
            <div><dt>Channels</dt><dd>SEO · GBP · LSA · Content</dd></div>
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
        <h2 class="section-h">The full digital stack<br><em class="serif">for HVAC companies.</em></h2>
        <p class="section-lead">From emergency search ads to long-term organic growth — we handle the online layer so your techs can focus on the job.</p>
      </div>

      <div class="ind-services__grid">
        <?php
        $services = array(
          array( 'SEO',     'Local SEO & Map Pack',     'Dominate "AC repair near me" and every emergency + maintenance keyword in your service area.', '#FF6B4A' ),
          array( 'LSA',     'Local Service Ads',        'Google Guaranteed badge + pay-per-lead ads that show up above everything else for emergency searches.', '#7AC74F' ),
          array( 'GBP',     'Google Business Profile',  'Review generation, weekly posts, photo updates, Q&A — keep your GBP active and outranking competitors.', '#4A90FF' ),
          array( 'WEB',     'Conversion-First Website', 'Click-to-call on every page, seasonal landing pages, financing options front and center. Built for phone calls.', '#A067E5' ),
          array( 'CNT',     'Content & Blog',           'Seasonal maintenance guides, "signs your AC is failing" posts — content that ranks and educates.', '#E5478B' ),
          array( 'SOC',     'Social Media',             'Crew spotlights, before/after installs, 5-star review graphics — stay visible between seasons.', '#F5A623' ),
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
       WHY HVAC COMPANIES CHOOSE US
       ============================================================ -->
  <section class="ind-why">
    <div class="lvm-container">
      <div class="ind-section-head">
        <div class="ind-section-bar mono">
          <span class="ind-section-bar__num">§ 02</span>
          <span class="ind-section-bar__rule"></span>
          <span class="ind-section-bar__lbl">Why us</span>
        </div>
        <h2 class="section-h">We understand<br><em class="serif">the HVAC business.</em></h2>
      </div>

      <div class="ind-why__cols">
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">01</span>
          <h3 class="ind-why-col__h">Seasonal strategy</h3>
          <p class="ind-why-col__p">We ramp campaigns before the rush — spring for AC, fall for heating. No scrambling when demand spikes. Your ads and content are ready before the first call.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">02</span>
          <h3 class="ind-why-col__h">Emergency visibility</h3>
          <p class="ind-why-col__p">When someone's AC dies at 2am, they search Google. We make sure you're the first result — map pack, LSA, and organic — with a click-to-call ready.</p>
        </article>
        <article class="ind-why-col">
          <span class="ind-why-col__num mono">03</span>
          <h3 class="ind-why-col__h">Review engine</h3>
          <p class="ind-why-col__p">We help you systematically earn and respond to reviews, building the social proof that wins the click over competitors with similar rankings.</p>
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
        <h2 class="section-h">What HVAC companies see<br><em class="serif">in the first 90 days.</em></h2>
      </div>

      <div class="ind-kpi__grid">
        <?php
        $kpis = array(
          array( '+60%',  'Emergency calls',       'From organic search + LSA in peak season' ),
          array( '4.8★',  'Average review score',  'Active review management across platforms' ),
          array( 'Top 3', 'Map pack for AC repair', 'Primary keywords in 20-mile service area' ),
          array( '< $35', 'Cost per qualified lead', 'LSA + organic blended average' ),
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
      <h2 class="cta__h">Ready to own<br><em class="serif">your service area?</em></h2>
      <p class="cta__p">We'll audit your current online presence, show you where calls are going to competitors, and build a plan to capture them.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
