<?php
/**
 * Template Name: Development Service Page
 * Visual language: engineering documentation
 */
get_header(); ?>

<main class="service-page svc-dev">

  <!-- ============================================================
       HERO — with floating build spec card
       ============================================================ -->
  <section class="dev-hero">
    <div class="dev-hero__grid" aria-hidden="true"></div>
    <div class="lvm-container dev-hero__inner">

      <div class="dev-hero__copy">
        <div class="page-hero__crumb mono">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
          <span class="page-hero__crumb-sep">/</span>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
          <span class="page-hero__crumb-sep">/</span>
          <span>Web Development</span>
        </div>
        <div class="eyebrow"><span class="eyebrow__num mono">S/01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · Development</span></div>
        <h1 class="dev-hero__h">Websites that load fast,<br><em class="serif">rank well, and don't break.</em></h1>
        <p class="dev-hero__sub">
          Mobile-first builds with SEO structure baked in from the first commit. We ship with Core Web Vitals targets, JSON-LD schema, accessibility passes, and clean code your next developer will thank us for.
        </p>
        <div class="dev-hero__ctas">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start a project <span aria-hidden="true">→</span></a>
          <a href="#stack" class="btn btn--ghost btn--lg">View tech stack <span aria-hidden="true">↓</span></a>
        </div>
      </div>

      <aside class="dev-spec" aria-label="Build specifications">
        <div class="dev-spec__bar">
          <span class="dev-spec__dot dev-spec__dot--r"></span>
          <span class="dev-spec__dot dev-spec__dot--y"></span>
          <span class="dev-spec__dot dev-spec__dot--g"></span>
          <span class="dev-spec__path mono">~/local-vocal/build.spec</span>
        </div>
        <div class="dev-spec__body mono">
          <div class="dev-spec__row"><span class="dev-spec__k">stack</span><span class="dev-spec__v">WordPress + custom theme</span></div>
          <div class="dev-spec__row"><span class="dev-spec__k">framework</span><span class="dev-spec__v">PHP · Tailwind v4 · GSAP</span></div>
          <div class="dev-spec__row"><span class="dev-spec__k">target</span><span class="dev-spec__v">Lighthouse <span class="dev-spec__hi">90+</span> all axes</span></div>
          <div class="dev-spec__row"><span class="dev-spec__k">bundle</span><span class="dev-spec__v">&lt; 200 KB gzipped</span></div>
          <div class="dev-spec__row"><span class="dev-spec__k">schema</span><span class="dev-spec__v">JSON-LD · LocalBusiness</span></div>
          <div class="dev-spec__row"><span class="dev-spec__k">a11y</span><span class="dev-spec__v">WCAG 2.1 AA targeted</span></div>
          <div class="dev-spec__row dev-spec__row--last"><span class="dev-spec__k">ship</span><span class="dev-spec__v"><span class="dev-spec__hi">14 — 28 days</span></span></div>
        </div>
      </aside>

    </div>
  </section>

  <!-- ============================================================
       BUILD MODES — deployment-card grid
       ============================================================ -->
  <section class="dev-modes">
    <div class="lvm-container">
      <div class="dev-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Build modes</span></div>
        <h2 class="section-h">Three ship modes,<br><em class="serif">one set of standards.</em></h2>
        <p class="section-lead">Pick the build that matches your stage. Same engineering bar across every one — speed, structure, and SEO are not optional.</p>
      </div>

      <div class="dev-modes__grid">
        <?php
        $modes = array(
          array(
            'tag'  => 'mode_01',
            'name' => 'Marketing site',
            'lead' => 'A focused 5–8 page brochure site that explains what you do, where you do it, and how to call you.',
            'time' => '14 days',
            'pages'=> '5 — 8 pages',
            'best' => 'New businesses, rebrands, single-service shops',
            'incl' => array(
              'Custom design system in your brand',
              'Mobile-first responsive layouts',
              'On-page SEO + JSON-LD schema',
              'Contact form + spam protection',
              'Google Analytics 4 wired in',
            ),
          ),
          array(
            'tag'  => 'mode_02',
            'name' => 'Conversion site',
            'lead' => 'Service-led site with location pages, booking flow, and the technical SEO scaffolding to rank in the map pack.',
            'time' => '21 days',
            'pages'=> '8 — 18 pages',
            'best' => 'Service businesses with multi-county coverage',
            'incl' => array(
              'Everything in Marketing site',
              'Per-service + per-location pages',
              'Booking / quote flow integration',
              'Internal linking architecture',
              'Core Web Vitals tuning + a11y pass',
              'Editor training + handoff doc',
            ),
            'featured' => true,
          ),
          array(
            'tag'  => 'mode_03',
            'name' => 'Full WordPress build',
            'lead' => 'Custom WordPress theme with editor blocks, integrations, and the maintenance plan to keep it shipping.',
            'time' => '28 — 42 days',
            'pages'=> '18+ pages · custom blocks',
            'best' => 'Established brands ready for a real platform',
            'incl' => array(
              'Everything in Conversion site',
              'Custom Gutenberg blocks',
              'CRM / email / payment integrations',
              'Staging + version control workflow',
              'Quarterly maintenance + uptime monitoring',
              'Editorial CMS training for your team',
            ),
          ),
        );
        foreach ( $modes as $m ) :
          $featured = ! empty( $m['featured'] );
          ?>
          <article class="dev-mode<?php echo $featured ? ' dev-mode--featured' : ''; ?>">
            <header class="dev-mode__h">
              <span class="dev-mode__tag mono"><?php echo esc_html( $m['tag'] ); ?></span>
              <?php if ( $featured ) : ?>
                <span class="dev-mode__star mono">most picked</span>
              <?php endif; ?>
            </header>
            <h3 class="dev-mode__name"><?php echo esc_html( $m['name'] ); ?></h3>
            <p class="dev-mode__lead"><?php echo esc_html( $m['lead'] ); ?></p>

            <dl class="dev-mode__specs">
              <div><dt class="mono">ship</dt><dd><?php echo esc_html( $m['time'] ); ?></dd></div>
              <div><dt class="mono">scope</dt><dd><?php echo esc_html( $m['pages'] ); ?></dd></div>
            </dl>

            <p class="dev-mode__best mono"><span>best for /</span> <?php echo esc_html( $m['best'] ); ?></p>

            <ul class="dev-mode__incl">
              <?php foreach ( $m['incl'] as $line ) : ?>
                <li><span aria-hidden="true">+</span><?php echo esc_html( $line ); ?></li>
              <?php endforeach; ?>
            </ul>

            <a class="dev-mode__cta" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
              Pick this build <span aria-hidden="true">→</span>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ARCHITECTURE — CSS-only system diagram
       ============================================================ -->
  <section class="dev-arch" id="stack">
    <div class="lvm-container">
      <div class="dev-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Architecture</span></div>
        <h2 class="section-h">Boring stack,<br><em class="serif">long shelf life.</em></h2>
        <p class="section-lead">We pick the simplest tools that do the job. Every layer below is auditable, replaceable, and well-documented.</p>
      </div>

      <div class="dev-arch__diagram" role="img" aria-label="System architecture diagram">

        <div class="dev-arch__layer">
          <span class="dev-arch__num mono">L1</span>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">VISITOR</span>
            <span class="dev-arch__node-desc">Mobile · Desktop · Tablet</span>
          </div>
        </div>

        <span class="dev-arch__line" aria-hidden="true"></span>

        <div class="dev-arch__layer">
          <span class="dev-arch__num mono">L2</span>
          <div class="dev-arch__node dev-arch__node--accent">
            <span class="dev-arch__node-name mono">EDGE / CDN</span>
            <span class="dev-arch__node-desc">Cached HTML · Asset delivery · TLS</span>
          </div>
        </div>

        <span class="dev-arch__line" aria-hidden="true"></span>

        <div class="dev-arch__layer dev-arch__layer--split">
          <span class="dev-arch__num mono">L3</span>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">FRONTEND</span>
            <span class="dev-arch__node-desc">PHP templates · Tailwind v4 · Vanilla JS / GSAP</span>
          </div>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">SEO LAYER</span>
            <span class="dev-arch__node-desc">JSON-LD · OpenGraph · sitemap.xml · robots.txt</span>
          </div>
        </div>

        <span class="dev-arch__line" aria-hidden="true"></span>

        <div class="dev-arch__layer">
          <span class="dev-arch__num mono">L4</span>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">WORDPRESS CORE</span>
            <span class="dev-arch__node-desc">Custom theme · Custom blocks · ACF · WP REST API</span>
          </div>
        </div>

        <span class="dev-arch__line" aria-hidden="true"></span>

        <div class="dev-arch__layer dev-arch__layer--split">
          <span class="dev-arch__num mono">L5</span>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">DATABASE</span>
            <span class="dev-arch__node-desc">MySQL / MariaDB · Daily backups · 30-day retention</span>
          </div>
          <div class="dev-arch__node">
            <span class="dev-arch__node-name mono">INTEGRATIONS</span>
            <span class="dev-arch__node-desc">Stripe · HubSpot · Mailchimp · GA4 · Search Console</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       PERFORMANCE PROMISE — Lighthouse-style gauges
       ============================================================ -->
  <section class="dev-perf">
    <div class="lvm-container">
      <div class="dev-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Performance promise</span></div>
        <h2 class="section-h">Numbers we ship by,<br><em class="serif">not numbers we hope for.</em></h2>
        <p class="section-lead">Every site we deliver passes these targets in production on a real mobile device — not just in a lab.</p>
      </div>

      <div class="dev-gauges">
        <?php
        $gauges = array(
          array( 'Performance',      96, '< 2.5s LCP · < 200ms TBT' ),
          array( 'Accessibility',    98, 'WCAG 2.1 AA · Keyboard safe' ),
          array( 'Best Practices',   100, 'HTTPS · No console errors · CSP' ),
          array( 'SEO',              100, 'Schema · Meta · Crawlable · Mobile' ),
        );
        foreach ( $gauges as $g ) : ?>
          <div class="dev-gauge">
            <div class="dev-gauge__ring" style="--score: <?php echo (int) $g[1]; ?>;">
              <span class="dev-gauge__num mono"><?php echo (int) $g[1]; ?></span>
            </div>
            <h3 class="dev-gauge__name"><?php echo esc_html( $g[0] ); ?></h3>
            <p class="dev-gauge__sub mono"><?php echo esc_html( $g[2] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="dev-guarantees">
        <div class="dev-guarantee"><span class="mono">+</span> Mobile-first, never an afterthought</div>
        <div class="dev-guarantee"><span class="mono">+</span> JSON-LD schema on every public page</div>
        <div class="dev-guarantee"><span class="mono">+</span> Image optimization &amp; lazy loading by default</div>
        <div class="dev-guarantee"><span class="mono">+</span> No render-blocking 3rd-party scripts</div>
        <div class="dev-guarantee"><span class="mono">+</span> Semantic HTML &amp; visible focus states</div>
        <div class="dev-guarantee"><span class="mono">+</span> 99.9% uptime monitoring on all maintained sites</div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROCESS — terminal-style log
       ============================================================ -->
  <section class="dev-proc">
    <div class="lvm-container">
      <div class="dev-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Process</span></div>
        <h2 class="section-h">From kickoff to launch,<br><em class="serif">no surprises.</em></h2>
        <p class="section-lead">A four-phase build with weekly check-ins and a single point of contact. You always know what's shipping next.</p>
      </div>

      <div class="dev-term">
        <div class="dev-term__bar">
          <span class="dev-spec__dot dev-spec__dot--r"></span>
          <span class="dev-spec__dot dev-spec__dot--y"></span>
          <span class="dev-spec__dot dev-spec__dot--g"></span>
          <span class="dev-spec__path mono">~/local-vocal/process.sh</span>
        </div>
        <div class="dev-term__body mono">
          <p><span class="dev-term__prompt">$</span> <span class="dev-term__cmd">project init</span><span class="dev-term__meta">— phase 01 / discovery</span></p>
          <p class="dev-term__ok"><span>✓</span> Stakeholder interviews + audit of current site</p>
          <p class="dev-term__ok"><span>✓</span> Goals, audiences, conversion paths defined</p>
          <p class="dev-term__ok"><span>✓</span> Scope, milestones, and success metrics signed</p>

          <p><span class="dev-term__prompt">$</span> <span class="dev-term__cmd">project design</span><span class="dev-term__meta">— phase 02 / design system</span></p>
          <p class="dev-term__ok"><span>✓</span> Brand-aligned design system (color, type, spacing)</p>
          <p class="dev-term__ok"><span>✓</span> Page wireframes + final visual designs</p>
          <p class="dev-term__ok"><span>✓</span> Component library prepped for handoff</p>

          <p><span class="dev-term__prompt">$</span> <span class="dev-term__cmd">project build</span><span class="dev-term__meta">— phase 03 / development</span></p>
          <p class="dev-term__ok"><span>✓</span> Frontend templates + custom blocks built</p>
          <p class="dev-term__ok"><span>✓</span> Backend integrations + form pipelines wired</p>
          <p class="dev-term__ok"><span>✓</span> Schema, sitemap, redirects, analytics installed</p>

          <p><span class="dev-term__prompt">$</span> <span class="dev-term__cmd">project ship</span><span class="dev-term__meta">— phase 04 / launch</span></p>
          <p class="dev-term__ok"><span>✓</span> Cross-browser + mobile-device QA pass</p>
          <p class="dev-term__ok"><span>✓</span> Lighthouse + a11y + Core Web Vitals targets met</p>
          <p class="dev-term__ok dev-term__ok--final"><span>✓</span> Domain cutover + 30-day post-launch monitoring</p>

          <p class="dev-term__final"><span class="dev-term__prompt">$</span> <span class="dev-term__cursor" aria-hidden="true">▌</span></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Project brief</div>
      <h2 class="cta__h">Ready to start<br><em class="serif">your website project?</em></h2>
      <p class="cta__p">Tell us about your business and what you need. We'll come back with a clear scope, a fair price, and a real timeline.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Contact us today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
