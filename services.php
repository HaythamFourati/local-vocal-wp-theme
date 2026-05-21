<?php
/**
 * Template Name: Services Page
 * Visual language: index / directory hinting at each page's signature
 */
get_header(); ?>

<main class="service-page svc-idx">

  <!-- ============================================================
       INDEX HERO
       ============================================================ -->
  <section class="idx-hero">
    <div class="idx-hero__grid" aria-hidden="true"></div>
    <div class="lvm-container">
      <div class="page-hero__crumb mono idx-hero__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Services</span>
      </div>
      <div class="eyebrow"><span class="eyebrow__num mono">00</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Services index</span></div>
      <h1 class="idx-hero__h">Six focused services<br><em class="serif">for local growth.</em></h1>
      <p class="idx-hero__sub">
        Buy one and the rest get sharper. Combine them and you stop competing for attention — you start competing for the click. Each service has a dedicated page with its own playbook, sample work, and KPI targets.
      </p>
      <div class="idx-hero__ctas">
        <a href="#index" class="btn btn--primary btn--lg">Browse the index <span aria-hidden="true">↓</span></a>
        <a href="tel:+14438521000" class="btn btn--ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SERVICE INDEX — directory rows
       ============================================================ -->
  <section class="idx-list" id="index">
    <div class="lvm-container">

      <header class="idx-list__head mono">
        <span>SERVICE</span>
        <span>SUMMARY</span>
        <span>SIGNATURE</span>
        <span>NEXT</span>
      </header>

      <ol class="idx-list__rows">
        <?php
        $services = array(
          array(
            'num'   => 'S/01',
            'name'  => 'Web Development',
            'serif' => 'shipped to last.',
            'desc'  => 'Mobile-first builds with SEO structure baked in. Fast pages, clean code, and conversion paths from the first commit.',
            'sig'   => 'Engineering doc',
            'sigsm' => 'spec sheets · architecture · terminal',
            'slug'  => 'development',
            'best'  => 'New sites · CRO rebuilds · WordPress',
            'span'  => '14 — 42 days',
          ),
          array(
            'num'   => 'S/02',
            'name'  => 'Local SEO',
            'serif' => 'page one, in your area.',
            'desc'  => 'On-page, off-page, and technical — built around your service area, not generic checklists. Map pack first, organic right behind it.',
            'sig'   => 'Ranking report',
            'sigsm' => 'SERP demo · keyword tables · trajectory chart',
            'slug'  => 'seo-optimization',
            'best'  => 'Service businesses · local-only',
            'span'  => '90-day cycle',
          ),
          array(
            'num'   => 'S/03',
            'name'  => 'Content &amp; Blog',
            'serif' => 'that earns its index slot.',
            'desc'  => 'Long-tail blog content written around real customer questions, service keywords, and local search intent — not filler.',
            'sig'   => 'Editorial magazine',
            'sigsm' => 'masthead · drop caps · pull quotes',
            'slug'  => 'content-creation',
            'best'  => 'Topical authority · funnel content',
            'span'  => '4 — 6 articles / mo',
          ),
          array(
            'num'   => 'S/04',
            'name'  => 'Social Media',
            'serif' => 'visible without going viral.',
            'desc'  => 'Consistent posting that keeps your business visible — service updates, blog promotion, seasonal content, customer wins.',
            'sig'   => 'Social feed',
            'sigsm' => 'phone mock · post grid · calendar',
            'slug'  => 'social-media-management',
            'best'  => 'Local brands · steady cadence',
            'span'  => '12 — 16 posts / mo',
          ),
          array(
            'num'   => 'S/05',
            'name'  => 'Analytics &amp; Reporting',
            'serif' => 'numbers you actually read.',
            'desc'  => 'Tracking installed correctly, dashboards built around outcomes, and a one-page monthly report in plain English.',
            'sig'   => 'Live dashboard',
            'sigsm' => 'KPI tiles · sparklines · funnel',
            'slug'  => 'analytics-reporting',
            'best'  => 'Owners tired of dashboards',
            'span'  => 'Monthly cadence',
          ),
          array(
            'num'   => 'S/06',
            'name'  => 'Digital Marketing',
            'serif' => 'one plan, four channels.',
            'desc'  => 'Strategic mix of SEO, content, social, and paid — tied to one set of business outcomes, not three disconnected vendors.',
            'sig'   => 'Campaign brief',
            'sigsm' => 'doc · channel mix · 90-day Gantt',
            'slug'  => 'digital-marketing',
            'best'  => 'Combine channels into one plan',
            'span'  => '90-day brief',
          ),
        );

        foreach ( $services as $s ) : ?>
          <li class="idx-row">
            <a class="idx-row__link" href="<?php echo esc_url( home_url( '/' . $s['slug'] ) ); ?>" aria-label="<?php echo esc_attr( $s['name'] ); ?> — <?php echo esc_attr( $s['sig'] ); ?>">

              <div class="idx-row__service">
                <span class="idx-row__num mono"><?php echo esc_html( $s['num'] ); ?></span>
                <h3 class="idx-row__name"><?php echo $s['name']; ?> <em class="serif">— <?php echo $s['serif']; ?></em></h3>
                <div class="idx-row__meta mono">
                  <span><?php echo esc_html( $s['best'] ); ?></span>
                  <span class="idx-row__meta-dot"></span>
                  <span><?php echo esc_html( $s['span'] ); ?></span>
                </div>
              </div>

              <div class="idx-row__summary">
                <p><?php echo esc_html( $s['desc'] ); ?></p>
              </div>

              <div class="idx-row__sig">
                <span class="idx-row__sig-tag mono"><?php echo esc_html( $s['sig'] ); ?></span>
                <span class="idx-row__sig-sm mono"><?php echo $s['sigsm']; ?></span>
              </div>

              <div class="idx-row__cta">
                <span class="idx-row__cta-lbl mono">View <span aria-hidden="true">→</span></span>
              </div>

            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       BUNDLE NOTE
       ============================================================ -->
  <section class="idx-note">
    <div class="lvm-container">
      <div class="idx-note__inner">
        <span class="idx-note__tag mono">↳ note from the team</span>
        <p class="idx-note__p">
          You don't have to buy all six. Most clients start with <em class="serif">Local SEO</em> or <em class="serif">Web Development</em> — whichever is the bigger lever right now — and add the rest as the pipeline calls for it. Pick the one that solves your loudest problem first.
        </p>
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
      <h2 class="cta__h">Not sure where<br><em class="serif">to start?</em></h2>
      <p class="cta__p">Tell us about your business. We'll recommend the single highest-leverage service to start with — and what to ignore for now.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Contact us today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
