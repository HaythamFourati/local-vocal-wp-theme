<?php
/**
 * Front Page — Local Vocal Marketing redesign
 * Maryland Web Design & SEO for Local Businesses.
 */
get_header();
?>

<main class="lvm-home">

  <!-- ============================================================
       HERO — FIELD OFFICE / MARKET DOSSIER
       Visual language: a working field office. Dossier topline,
       coordinate strip, ledger-style services, then the live workstation.
       ============================================================ -->
  <section class="hm-hero hero" id="top">
    <div class="hero__grid-bg" aria-hidden="true"></div>

  

    <div class="lvm-container hero__inner hm-hero__inner">

      <div class="hm-hero__copy">
        <div class="eyebrow hm-hero__eyebrow">
          <span class="eyebrow__num mono">00</span>
          <span class="eyebrow__rule"></span>
          <span class="eyebrow__label mono">Local Vocal · Maryland practice</span>
        </div>

        <h1 class="hero__h1 hm-hero__h1">
          Maryland <em class="serif">Web Design</em> &amp; SEO<br>for Local Businesses.
        </h1>

        <p class="hero__sub hm-hero__sub">
          Local Vocal Marketing helps small businesses build better websites, improve
          Google visibility, publish SEO‑focused content, and stay active online with
          ongoing support. Maryland‑based, serving Maryland and nearby U.S. service areas.
        </p>

        <div class="hero__cta hm-hero__cta">
          <a href="#cta" class="btn btn--primary btn--lg">Request a free website &amp; SEO review <span aria-hidden="true">→</span></a>
          <a href="#services" class="btn btn--ghost btn--lg">View the services menu</a>
        </div>
      </div>

      <!-- Right: market brief card -->
      <aside class="hm-hero__brief mono" aria-label="Market brief">
        <header class="hm-hero__brief-head">
          <span><strong>MARKET BRIEF</strong></span>
          <span class="hm-hero__brief-stamp">Q3 / OPEN</span>
        </header>
        <dl class="hm-hero__brief-list">
          <div><dt>Region</dt><dd>Maryland · MD</dd></div>
          <div><dt>Areas</dt><dd>Annapolis · Severna Park · Baltimore</dd></div>
          <div><dt>Sectors</dt><dd>10 service trades</dd></div>
          <div><dt>Cadence</dt><dd>Weekly check-in · monthly report</dd></div>
          <div class="hm-hero__brief-list-last"><dt>Owner</dt><dd>info@localvocal</dd></div>
        </dl>
        <footer class="hm-hero__brief-foot">
          <span>↳ Brief signed · 06.28</span>
          <span class="hm-hero__brief-foot-v">v.04</span>
        </footer>
      </aside>
    </div>

    <!-- Services ledger -->
    <div class="lvm-container hm-hero__ledger">
      <div class="hm-hero__ledger-head mono">
        <span><strong>SERVICES IN PRACTICE</strong></span>
        <span class="hm-hero__ledger-rule"></span>
        <span>5 lines · all live</span>
      </div>
      <ol class="hm-hero__ledger-row">
        <?php
        $trust_items = array(
          array( 'Web design',         'foundation' ),
          array( 'Local SEO',          'visibility' ),
          array( 'Blog content',       'authority'  ),
          array( 'Social media',       'presence'   ),
          array( 'Ongoing support',    'upkeep'     ),
        );
        foreach ( $trust_items as $i => $t ) : ?>
          <li class="hm-hero__ledger-item">
            <span class="hm-hero__ledger-num mono">S/0<?php echo esc_html( $i + 1 ); ?></span>
            <span class="hm-hero__ledger-name"><?php echo esc_html( $t[0] ); ?></span>
            <span class="hm-hero__ledger-tag mono"><?php echo esc_html( $t[1] ); ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

    <!-- Hero dashboard mockup -->
    <div class="lvm-container hero__visual-wrap">
      <div class="hero-dash">
        <div class="hero-dash__chrome">
          <div class="hero-dash__dots"><span></span><span></span><span></span></div>
          <div class="hero-dash__url"><span class="mono">securitytrainingclasses.com · indexed · baltimore, md</span></div>
          <div class="hero-dash__status">
            <span class="hero-dash__status-dot" aria-hidden="true"></span>
            <span class="mono">ranking</span>
          </div>
        </div>

        <div class="hero-dash__split">
          <!-- LEFT: full website preview -->
          <div class="hero-dash__left">
            <div class="hero-dash__leftlbl">
              <span class="mono hd-bigtag">01 — Website design</span>
              <span class="mono hd-bigmeta">foundation</span>
            </div>

            <div class="sitefull">
              <div class="sitefull__bar">
                <span class="sitefull__bdot"></span>
                <span class="sitefull__bdot"></span>
                <span class="sitefull__bdot"></span>
                <span class="sitefull__burl mono">securitytrainingclasses.com / baltimore</span>
              </div>

              <div class="sitefull__nav">
                <div class="sitefull__brand">
                  <span class="sitefull__logo" aria-hidden="true"></span>
                  <span class="sitefull__brandname">Security Training Academy</span>
                </div>
                <div class="sitefull__links">
                  <span>Services</span>
                  <span>About</span>
                  <span>Reviews</span>
                  <span class="sitefull__phone mono">(443) 702-7891</span>
                </div>
              </div>

              <div class="sitefull__hero">
                <span class="sitefull__pin sitefull__pin--02" aria-hidden="true">02</span>
                <div class="sitefull__tag mono">★ 4.9 · serving Annapolis since 2008</div>
                <h2 class="sitefull__h1">
                  Security Training &amp; Certification
                  <span class="sitefull__h1-mark"> in Baltimore, MD</span>
                </h2>
                <p class="sitefull__sub">Professional certification courses. Licensed instructors. Flexible scheduling for working professionals.</p>
                <div class="sitefull__ctas">
                  <span class="sitefull__cta sitefull__cta--primary">Get a free quote</span>
                  <span class="sitefull__cta sitefull__cta--ghost">Call now <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg></span>
                </div>
              </div>

              <div class="sitefull__svcs">
                <?php
                $sf_svcs = array(
                  array( 'Security Guard Training', 'Weekend & evening classes' ),
                  array( 'CPR Certification', 'American Heart Association certified' ),
                  array( 'Firearms Training', 'MD State Police approved' ),
                );
                foreach ( $sf_svcs as $s ) : ?>
                  <div class="sitefull__svc">
                    <span class="sitefull__svc-ic" aria-hidden="true"></span>
                    <div class="sitefull__svc-tx">
                      <div class="sitefull__svc-name"><?php echo $s[0]; ?></div>
                      <div class="sitefull__svc-desc"><?php echo $s[1]; ?></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="sitefull__reviews">
                <div class="sitefull__rev-head">
                  <span class="sitefull__rev-stars">★★★★★</span>
                  <span class="sitefull__rev-num"><b>4.9</b> · 184 Google reviews</span>
                </div>
                <div class="sitefull__rev-list">
                  <span>"Great instructors - very thorough training." — Marcus R.</span>
                  <span class="sitefull__rev-divider"></span>
                  <span>"Flexible schedule worked perfectly." — Sarah T.</span>
                </div>
              </div>

              <div class="sitefull__blog">
                <span class="sitefull__pin sitefull__pin--03" aria-hidden="true">03</span>
                <div class="sitefull__blog-label mono">From the blog</div>
                <div class="sitefull__blog-list">
                  <span>How to Choose the Right Security Training Program →</span>
                  <span>5 Benefits of Professional Security Certification →</span>
                </div>
              </div>

              <div class="sitefull__foot">
                <span class="sitefull__pin sitefull__pin--04" aria-hidden="true">04</span>
                <span class="mono">Baltimore County · Baltimore · Glyndon</span>
                <span class="sitefull__social mono">@securitytrainingmd</span>
              </div>
            </div>
          </div>

          <!-- RIGHT: channels column -->
          <aside class="hero-dash__right">
            <section class="ch">
              <header class="ch__head">
                <span class="ch__num mono">02</span>
                <span class="ch__label">Local SEO</span>
                <span class="ch__meta mono">visibility</span>
              </header>
              <div class="ch__kicker mono">"security training baltimore" · Baltimore MD</div>
              <div class="ch__body">
                <div class="mappack">
                  <div class="mappack__row mappack__row--you">
                    <span class="mappack__pin">A</span>
                    <div>
                      <div class="mappack__name">Security Training Academy</div>
                      <div class="mappack__meta mono">★ 4.9 · 184 reviews</div>
                    </div>
                    <span class="mappack__pos mono">#1</span>
                  </div>
                  <div class="mappack__row">
                    <span class="mappack__pin">B</span>
                    <div>
                      <div class="mappack__name">Baltimore Security Institute</div>
                      <div class="mappack__meta mono">★ 4.6 · 92 reviews</div>
                    </div>
                    <span class="mappack__pos mono">#2</span>
                  </div>
                  <div class="mappack__row">
                    <span class="mappack__pin">C</span>
                    <div>
                      <div class="mappack__name">Bay Mechanical</div>
                      <div class="mappack__meta mono">★ 4.4 · 51 reviews</div>
                    </div>
                    <span class="mappack__pos mono">#3</span>
                  </div>
                </div>
              </div>
            </section>

            <section class="ch">
              <header class="ch__head">
                <span class="ch__num mono">03</span>
                <span class="ch__label">Blog content</span>
                <span class="ch__meta mono">traffic</span>
              </header>
              <div class="ch__kicker mono">Service guide · Maryland</div>
              <div class="ch__body">
                <div class="ch-blog">
                  <div class="ch-blog__title">How to Choose the Right Security Training Program</div>
                  <div class="ch-blog__meta mono">8 min · ranks #2 for "security training baltimore"</div>
                </div>
              </div>
            </section>

            <section class="ch">
              <header class="ch__head">
                <span class="ch__num mono">04</span>
                <span class="ch__label">Social</span>
                <span class="ch__meta mono">trust</span>
              </header>
              <div class="ch__kicker mono">Posted today · 9:14a</div>
              <div class="ch__body">
                <div class="ch-social">
                  <div class="ch-social__avatar" aria-hidden="true">TH</div>
                  <div class="ch-social__body">
                    <div class="ch-social__name">Security Training Academy <span class="ch-social__dot"></span></div>
                    <p class="ch-social__text">Spring tune‑ups 20% off. Same‑day in Annapolis.</p>
                  </div>
                </div>
              </div>
            </section>
          </aside>
        </div>
      </div>
    </div>

    <!-- Client roster -->
    <div class="lvm-container hm-hero__roster">
      <header class="hm-hero__roster-head mono">
        <span><strong>CLIENT ROSTER · LIVE</strong></span>
        <span class="hm-hero__roster-rule"></span>
        <span>Trusted by local operators across Maryland</span>
      </header>
      <ul class="hm-hero__roster-list">
        <?php
        $logos = array(
          array( 'Security Training Academy',        'Pasadena',      'https://www.securitytrainingclasses.com/' ),
          array( 'Care Giving Angels of Maryland',  'Annapolis',     'https://caregivingangelsofmd.com/' ),
          array( 'Cullen M Burke Law Office',      'Ocean City',    'https://www.cullenburke.com/' ),
          array( 'Extreme Vivid Auto Glass',           'Reisterstown',  'https://ev-autoglass.com/' ),
        );
        foreach ( $logos as $i => $l ) : ?>
          <li class="hm-hero__roster-item">
            <span class="hm-hero__roster-id mono">№ <?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
            <a href="<?php echo esc_url( $l[2] ); ?>" target="_blank" rel="noopener noreferrer" class="hm-hero__roster-name"><?php echo esc_html( $l[0] ); ?></a>
            <span class="hm-hero__roster-loc mono">· <?php echo esc_html( $l[1] ); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- ============================================================
       PROBLEM — DIAGNOSTIC CHART
       Visual language: a clinical / audit chart with symptoms,
       severity ratings, and "vitals" readings.
       ============================================================ -->
  <section class="hm-diag" id="problem">
    <div class="lvm-container">

      <div class="hm-diag__topline mono">
        <span><strong>SITE DIAGNOSTIC</strong></span>
        <span class="hm-diag__topline-rule"></span>
        <span>Chart · LV-CHK-01</span>
        <span class="hm-diag__topline-rule"></span>
        <span>Intake · symptoms reported</span>
      </div>

      <div class="hm-diag__head">
        <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">The problem</span></div>
        <h2 class="section-h">Your customers are searching.<br><em class="serif">Can they find you?</em></h2>
        <p class="section-lead">
          Most local businesses have a website. Fewer have one that ranks, loads fast,
          reads well on mobile, and brings in calls. Here's the symptom chart we see most often.
        </p>
      </div>

      <div class="hm-diag__board">
        <header class="hm-diag__board-head mono">
          <span class="hm-diag__col-id">CODE</span>
          <span class="hm-diag__col-sym">SYMPTOM</span>
          <span class="hm-diag__col-note">CLINICAL NOTE</span>
          <span class="hm-diag__col-sev">SEVERITY</span>
        </header>

        <?php
        $problems = array(
          array( "You don't show up for local searches",       'Customers Google your service in your city — and find someone else first.',          'critical', 'CRIT' ),
          array( 'Competitors outrank you on Google',           'A few SEO basics decide who appears in the map pack and who scrolls by.',           'critical', 'CRIT' ),
          array( 'Your site looks outdated on mobile',          'Most local searches happen on a phone. Slow, cramped sites lose the click.',       'high',     'HIGH' ),
          array( 'Service pages feel thin',                     "Generic copy doesn't tell Google — or customers — what you actually do.",          'high',     'HIGH' ),
          array( "Your blog isn't targeting real searches",     "Without intent‑driven topics, content sits unread and unranked.",                   'med',      'MED'  ),
          array( 'Updates take weeks, not hours',               "New service? Seasonal promo? You shouldn't have to wait on a freelancer.",          'med',      'MED'  ),
        );
        foreach ( $problems as $i => $p ) :
          $code = 'SX-' . str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
          ?>
          <article class="hm-diag__row hm-diag__row--<?php echo esc_attr( $p[2] ); ?>">
            <span class="hm-diag__row-id mono"><?php echo esc_html( $code ); ?></span>
            <h3 class="hm-diag__row-sym"><?php echo esc_html( $p[0] ); ?></h3>
            <p class="hm-diag__row-note"><?php echo esc_html( $p[1] ); ?></p>
            <span class="hm-diag__row-sev mono" aria-label="Severity <?php echo esc_attr( $p[3] ); ?>">
              <span class="hm-diag__sev-dot" aria-hidden="true"></span>
              <span><?php echo esc_html( $p[3] ); ?></span>
            </span>
          </article>
        <?php endforeach; ?>
      </div>

      <footer class="hm-diag__vitals mono">
        <div class="hm-diag__vital">
          <span class="hm-diag__vital-lbl">Visibility</span>
          <span class="hm-diag__vital-val hm-diag__vital-val--low">low</span>
        </div>
        <div class="hm-diag__vital">
          <span class="hm-diag__vital-lbl">Mobile UX</span>
          <span class="hm-diag__vital-val hm-diag__vital-val--low">strained</span>
        </div>
        <div class="hm-diag__vital">
          <span class="hm-diag__vital-lbl">Content health</span>
          <span class="hm-diag__vital-val hm-diag__vital-val--mid">thin</span>
        </div>
        <div class="hm-diag__vital">
          <span class="hm-diag__vital-lbl">Recommended</span>
          <span class="hm-diag__vital-val hm-diag__vital-val--rx">audit + plan</span>
        </div>
        <div class="hm-diag__stamp">
          <span>Awaiting Rx</span>
        </div>
      </footer>

    </div>
  </section>

  <!-- ============================================================
       SERVICES — SHOP MENU
       Visual language: a printed shop menu / price card.
       Services as line items with leader dots and tagged results.
       ============================================================ -->
  <section class="hm-menu" id="services">
    <div class="lvm-container">

      <div class="hm-menu__head">
        <div class="hm-menu__head-l">
          <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Services</span></div>
          <h2 class="section-h">Web design, SEO, content, and support<br><em class="serif">built for local growth.</em></h2>
          <p class="section-lead">
            Five focused services. Buy one, the rest get sharper. Combine them and you
            stop competing for attention and start competing for the click.
          </p>
        </div>
        <aside class="hm-menu__card mono" aria-label="Menu key">
          <div class="hm-menu__card-row"><span>Establishment</span><span>Local Vocal · MD</span></div>
          <div class="hm-menu__card-row"><span>Doc</span><span>SVC-MENU-26</span></div>
          <div class="hm-menu__card-row"><span>Currency</span><span>Local visibility</span></div>
          <div class="hm-menu__card-row hm-menu__card-row--last"><span>Service</span><span>By appointment</span></div>
          <div class="hm-menu__card-stamp">Today's specials ★</div>
        </aside>
      </div>

      <div class="hm-menu__sheet">

        <header class="hm-menu__sheet-head">
          <span class="hm-menu__sheet-title">— The Services Menu —</span>
          <span class="hm-menu__sheet-sub mono">five line items · order any one, combine any two</span>
        </header>

        <ol class="hm-menu__list">
          <?php
          $services = array(
            array(
              't' => 'Website Design',
              'd' => 'Modern, mobile‑friendly websites that build trust, explain your services clearly, and help visitors take action.',
              'best' => 'Service businesses on outdated or template sites',
              'res' => 'Cleaner design, faster pages, more phone clicks',
              'link' => '/development',
              'tag' => 'foundation',
            ),
            array(
              't' => 'Local SEO',
              'd' => 'On‑page SEO, keyword strategy, metadata, internal linking, and Google Business Profile support — built around your service area.',
              'best' => 'Maryland businesses that want to show up locally',
              'res' => 'Higher map‑pack visibility and qualified search traffic',
              'link' => '/seo-optimization',
              'tag' => 'visibility',
            ),
            array(
              't' => 'SEO Blog Articles',
              'd' => 'Ongoing blog content written around real customer questions, service keywords, and local search intent — not filler.',
              'best' => 'Businesses building topical authority over time',
              'res' => 'Long‑term organic traffic and supported service pages',
              'link' => '/content-creation',
              'tag' => 'authority',
            ),
            array(
              't' => 'Social Media Management',
              'd' => 'Consistent posting that keeps your business visible — service updates, blog promotion, seasonal content, and customer education.',
              'best' => 'Local brands that need to stay active, not viral',
              'res' => 'Steady online presence and a trust signal for searchers',
              'link' => '/social-media-management',
              'tag' => 'presence',
            ),
            array(
              't' => 'Ongoing Website Support',
              'd' => 'Updates, fixes, new pages, security patches, content changes, and performance tuning — handled without the headache.',
              'best' => 'Owners who want a long‑term partner, not a one‑off',
              'res' => 'A healthy website that stays current and search‑friendly',
              'link' => '/analytics-reporting',
              'tag' => 'upkeep',
            ),
          );
          foreach ( $services as $i => $s ) :
            $code = 'S/' . str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
            ?>
            <li class="hm-menu__item">
              <div class="hm-menu__item-line">
                <span class="hm-menu__item-num mono"><?php echo esc_html( $code ); ?></span>
                <h3 class="hm-menu__item-name"><?php echo esc_html( $s['t'] ); ?></h3>
                <span class="hm-menu__item-leader" aria-hidden="true"></span>
                <span class="hm-menu__item-tag mono"><?php echo esc_html( $s['tag'] ); ?></span>
              </div>
              <p class="hm-menu__item-desc"><?php echo esc_html( $s['d'] ); ?></p>
              <dl class="hm-menu__item-meta mono">
                <div><dt>Best for</dt><dd><?php echo esc_html( $s['best'] ); ?></dd></div>
                <div><dt>You get</dt><dd><?php echo esc_html( $s['res'] ); ?></dd></div>
              </dl>
              <a class="hm-menu__item-link" href="<?php echo esc_url( home_url( $s['link'] ) ); ?>">
                <span>See full menu page</span>
                <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg>
              </a>
            </li>
          <?php endforeach; ?>
        </ol>

        <footer class="hm-menu__sheet-foot mono">
          <span>↳ All services served fresh by the same three people.</span>
          <span class="hm-menu__sheet-foot-sig">Chef · LVM</span>
        </footer>
      </div>

    </div>
  </section>

  <!-- ============================================================
       WEBSITES THAT RANK
       ============================================================ -->
  <section class="webrank" id="web-design">
    <div class="lvm-container">
      <div class="webrank__layout">
        <div class="webrank__left">
          <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Website design</span></div>
          <h2 class="section-h">Websites designed to look good<br><em class="serif">and rank better.</em></h2>
          <p class="section-lead">
            A good website should do more than look professional. It should be
            structured so Google can understand your services, your locations,
            and your expertise — and so a homeowner on a phone can call you in
            under ten seconds.
          </p>
          <div class="webrank__meta">
            <span class="webrank__meta-num mono">5 / 5</span>
            <span class="webrank__meta-lbl mono">SEO fundamentals built into every page</span>
          </div>
        </div>

        <div class="webrank__right">
          <div class="anno">
            <div class="anno__rail" aria-hidden="true">
              <span class="anno__pin anno__pin--01" data-target=".anno__h1" style="opacity:0">
                <span class="mono">01</span><span class="anno__tick"></span>
              </span>
              <span class="anno__pin anno__pin--02" data-target=".anno__ctas" style="opacity:0">
                <span class="mono">02</span><span class="anno__tick"></span>
              </span>
              <span class="anno__pin anno__pin--03" data-target=".anno__svcs" style="opacity:0">
                <span class="mono">03</span><span class="anno__tick"></span>
              </span>
              <span class="anno__pin anno__pin--04" data-target=".anno__blog" style="opacity:0">
                <span class="mono">04</span><span class="anno__tick"></span>
              </span>
              <span class="anno__pin anno__pin--05" data-target=".anno__foot" style="opacity:0">
                <span class="mono">05</span><span class="anno__tick"></span>
              </span>
            </div>

            <div class="anno__site">
              <div class="anno__chrome">
                <div class="anno__dots"><span></span><span></span><span></span></div>
                <div class="anno__url mono">marylandcontractor.com / services / roofing‑annapolis</div>
              </div>

              <div class="anno__hero">
                <div class="anno__tag mono">★ 4.9 · 87 Google reviews · Licensed in MD</div>
                <div class="anno__h1">
                  Roofing Services
                  <span class="anno__hl"> in Baltimore, MD</span>
                </div>
                <div class="anno__sub">
                  Professional security training and certification. Free course catalog this week
                  across Baltimore County.
                </div>
                <div class="anno__ctas">
                  <span class="anno__cta anno__cta--primary">Get a free inspection</span>
                  <span class="anno__cta anno__cta--ghost">Call (410) 555‑7732</span>
                </div>
              </div>

              <div class="anno__svcs">
                <?php
                $anno_svcs = array(
                  array( 'Guard Training', 'Weekend classes available' ),
                  array( 'CPR Certification', 'AHA certified instructors' ),
                  array( 'Firearms Training', 'State approved curriculum' ),
                  array( 'Group Classes', 'Corporate discounts available' ),
                );
                foreach ( $anno_svcs as $s ) : ?>
                  <div class="anno__svc">
                    <div class="anno__svc-name"><?php echo $s[0]; ?></div>
                    <div class="anno__svc-desc"><?php echo $s[1]; ?></div>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="anno__blog">
                <div class="anno__blog-title mono">From the blog</div>
                <div class="anno__blog-list">
                  <span>How to choose the right security training program in Maryland →</span>
                  <span>What security certification costs in Baltimore County →</span>
                </div>
              </div>

              <div class="anno__foot">
                <span class="mono">Serving Annapolis · Severna Park · Davidsonville</span>
                <span class="anno__foot-tag mono">schema · localBusiness</span>
              </div>
            </div>

            <ol class="anno__legend">
              <?php
              $legend = array(
                array( '01', 'Keyword‑rich H1 with location modifier' ),
                array( '02', 'Conversion CTAs above the fold' ),
                array( '03', 'Service &amp; location pages — not one thin page' ),
                array( '04', 'Internal links from blog to services' ),
                array( '05', 'Service‑area schema + metadata' ),
              );
              foreach ( $legend as $l ) : ?>
                <li>
                  <span class="anno__legendnum mono"><?php echo $l[0]; ?></span>
                  <span><?php echo $l[1]; ?></span>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       LOCAL SEO — MAP PACK RADAR
       Visual language: a radar / coordinate console. Live local
       monitor with pinned competitors and a ranking feed.
       ============================================================ -->
  <section class="hm-radar" id="seo">
    <div class="lvm-container">

      <div class="hm-radar__topline mono">
        <span><strong>LOCAL RADAR</strong></span>
        <span class="hm-radar__topline-rule"></span>
        <span>Console · LV-RDR-26</span>
        <span class="hm-radar__topline-rule"></span>
        <span>38.978° N · 76.492° W</span>
        <span class="hm-radar__topline-rule"></span>
        <span class="hm-radar__live"><span class="hm-radar__live-dot" aria-hidden="true"></span>LIVE · pinging</span>
      </div>

      <div class="hm-radar__head">
        <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Local SEO</span></div>
        <h2 class="section-h">Local SEO that helps Maryland businesses<br><em class="serif">get found.</em></h2>
        <p class="section-lead">
          Local customers search with intent. They want a business nearby, with real
          reviews, that answers the phone. We make sure that's you — at the top of the map pack.
        </p>
      </div>

      <div class="hm-radar__grid">

        <!-- LEFT: Radar console -->
        <div class="hm-radar__console">
          <header class="hm-radar__console-head mono">
            <span class="hm-radar__query">› "security training baltimore"</span>
            <span class="hm-radar__loc">Baltimore, MD</span>
          </header>

          <div class="hm-radar__scope" aria-hidden="true">
            <div class="hm-radar__rings">
              <span class="hm-radar__ring hm-radar__ring--1"></span>
              <span class="hm-radar__ring hm-radar__ring--2"></span>
              <span class="hm-radar__ring hm-radar__ring--3"></span>
              <span class="hm-radar__cross hm-radar__cross--h"></span>
              <span class="hm-radar__cross hm-radar__cross--v"></span>
              <span class="hm-radar__sweep"></span>
            </div>

            <span class="hm-radar__pin hm-radar__pin--you" style="top: 48%; left: 50%;">
              <span class="hm-radar__pin-mark">A</span>
              <span class="hm-radar__pin-tag mono">You · #1</span>
            </span>
            <span class="hm-radar__pin" style="top: 32%; left: 68%;">
              <span class="hm-radar__pin-mark">B</span>
              <span class="hm-radar__pin-tag mono">B · #2</span>
            </span>
            <span class="hm-radar__pin" style="top: 64%; left: 30%;">
              <span class="hm-radar__pin-mark">C</span>
              <span class="hm-radar__pin-tag mono">C · #3</span>
            </span>
            <span class="hm-radar__pin" style="top: 76%; left: 64%;">
              <span class="hm-radar__pin-mark">D</span>
              <span class="hm-radar__pin-tag mono">D · #4</span>
            </span>

            <span class="hm-radar__coord hm-radar__coord--tl mono">38.99 N</span>
            <span class="hm-radar__coord hm-radar__coord--tr mono">76.48 W</span>
            <span class="hm-radar__coord hm-radar__coord--bl mono">38.96 N</span>
            <span class="hm-radar__coord hm-radar__coord--br mono">76.50 W</span>
          </div>

          <div class="hm-radar__feed">
            <header class="hm-radar__feed-head mono">
              <span>POS</span>
              <span>BUSINESS</span>
              <span>SIGNAL</span>
              <span>Δ</span>
            </header>
            <?php
            $feed_rows = array(
              array( 1, 'Your business',         '★ 4.9 · 184',  '+6',  'you'  ),
              array( 2, 'Baltimore Security Institute', '★ 4.6 · 92',   '−1',  'down' ),
              array( 3, 'Maryland Protection Services',  '★ 4.4 · 51',   '—',   'flat' ),
              array( 4, 'Security Training Academy', '★ 4.2 · 38',   '−2',  'down' ),
            );
            foreach ( $feed_rows as $r ) : ?>
              <div class="hm-radar__feed-row<?php echo $r[4] === 'you' ? ' is-you' : ''; ?>">
                <span class="hm-radar__feed-pos mono">#<?php echo (int) $r[0]; ?></span>
                <span class="hm-radar__feed-name"><?php echo $r[1]; ?></span>
                <span class="hm-radar__feed-sig mono"><?php echo $r[2]; ?></span>
                <span class="hm-radar__feed-delta mono hm-radar__feed-delta--<?php echo esc_attr( $r[4] ); ?>"><?php echo esc_html( $r[3] ); ?></span>
              </div>
            <?php endforeach; ?>
          </div>

          <footer class="hm-radar__console-foot mono">
            <span>↳ Tracked weekly · 38 local keywords</span>
            <span>Service area: Anne Arundel County</span>
          </footer>
        </div>

        <!-- RIGHT: Ops manifest -->
        <aside class="hm-radar__ops" aria-label="Local SEO operations">
          <header class="hm-radar__ops-head mono">
            <span><strong>OPS MANIFEST</strong></span>
            <span class="hm-radar__ops-count">06 / 06</span>
          </header>
          <ol class="hm-radar__ops-list">
            <?php
            $seo_items = array(
              array( 'Google Business Profile',     'Categories, photos, posts, services, and review velocity — tuned.', 'GBP' ),
              array( 'Local keyword targeting',     'Maps the searches your customers actually use, by city and category.', 'KW'  ),
              array( 'Service‑area SEO',            'Dedicated pages for each city and service you cover — not one thin page.', 'SVC' ),
              array( 'On‑page SEO',                 'Headings, metadata, internal links, and schema, fixed page by page.', 'OP'  ),
              array( 'Content structure',           'Pages built to be readable by humans and crawlable by Google.', 'CMS' ),
              array( 'Review &amp; reputation support', 'Steady review flow without spammy templates or fake names.', 'REV' ),
            );
            foreach ( $seo_items as $i => $it ) :
              $code = 'OP-' . str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
              ?>
              <li class="hm-radar__ops-item">
                <span class="hm-radar__ops-id mono"><?php echo esc_html( $code ); ?></span>
                <div class="hm-radar__ops-body">
                  <h3 class="hm-radar__ops-name"><?php echo $it[0]; ?></h3>
                  <p class="hm-radar__ops-desc"><?php echo $it[1]; ?></p>
                </div>
                <span class="hm-radar__ops-tag mono"><?php echo esc_html( $it[2] ); ?></span>
              </li>
            <?php endforeach; ?>
          </ol>
          <footer class="hm-radar__ops-foot mono">
            <span class="hm-radar__ops-status">↳ All systems engaged</span>
            <span class="hm-radar__ops-stamp">CLEARED · LVM</span>
          </footer>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       BLOG — NEWSSTAND / PRESS RACK
       Visual language: a press rack of editions. Each article is a
       folded paper with masthead, dateline, headline, and rank stamp.
       ============================================================ -->
  <section class="hm-press" id="blog">
    <div class="lvm-container">

      <div class="hm-press__topline mono">
        <span><strong>THE LVM PRESS</strong></span>
        <span class="hm-press__topline-rule"></span>
        <span>Vol. III · Issue 04</span>
        <span class="hm-press__topline-rule"></span>
        <span>Distributed weekly · Maryland edition</span>
      </div>

      <div class="hm-press__head">
        <div class="eyebrow"><span class="eyebrow__num mono">05</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Blog content</span></div>
        <h2 class="section-h">SEO blog articles that target<br><em class="serif">real customer searches.</em></h2>
        <p class="section-lead">
          Your blog isn't a place to write about industry news. It's where you answer
          the questions your customers Google before they call you — and where Google
          decides you're an authority on your service area.
        </p>
      </div>

      <div class="hm-press__rack">
        <?php
        $posts = array(
          array( 'Security · Maryland',   'How to Choose the Right Security Training Program in Maryland',         '9 min read',  '#3', 'MD',  'Ed. 042' ),
          array( 'Legal · Ocean City',     'What to Do After a DUI Arrest in Ocean City',                 '7 min read',  '#1', 'MD',  'Ed. 041' ),
          array( 'Auto Glass · National',  'Five Signs Your Windshield Needs Replacement',                '6 min read',  '#2', 'US',  'Ed. 040' ),
          array( 'Home Care · Maryland',   'How Home Care Helps Seniors Stay Independent',                '8 min read',  '#4', 'MD',  'Ed. 039' ),
          array( 'Wellness · Maryland',    'What to Expect During an ADHD Evaluation',                    '10 min read', '#5', 'MD',  'Ed. 038' ),
          array( 'Dental · Maryland',      'When to Take Your Child to the Dentist for the First Time',  '5 min read',  '#2', 'MD',  'Ed. 037' ),
        );
        foreach ( $posts as $i => $p ) : ?>
          <article class="hm-press__paper">
            <header class="hm-press__paper-mast">
              <span class="hm-press__paper-edition mono"><?php echo esc_html( $p[5] ); ?></span>
              <span class="hm-press__paper-mark">★</span>
              <span class="hm-press__paper-cat mono"><?php echo esc_html( $p[0] ); ?></span>
            </header>

            <div class="hm-press__paper-fold" aria-hidden="true"></div>

            <h3 class="hm-press__paper-h"><?php echo esc_html( $p[1] ); ?></h3>

            <div class="hm-press__paper-byline mono">
              <span>By LVM Editorial</span>
              <span class="hm-press__paper-dot"></span>
              <span><?php echo esc_html( $p[2] ); ?></span>
            </div>

            <footer class="hm-press__paper-foot">
              <span class="hm-press__paper-stamp">
                <span class="hm-press__paper-stamp-rank mono"><?php echo esc_html( $p[3] ); ?></span>
                <span class="hm-press__paper-stamp-loc mono">RANK · <?php echo esc_html( $p[4] ); ?></span>
              </span>
              <span class="hm-press__paper-cta mono">Read →</span>
            </footer>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="hm-press__bands mono">
        <?php
        $bands = array(
          'Target real search intent',
          'Support and link to service pages',
          'Build topical authority over time',
          'Answer real customer questions',
          'Improve long‑term organic visibility',
        );
        foreach ( $bands as $i => $b ) : ?>
          <div class="hm-press__band">
            <span class="hm-press__band-num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
            <span><?php echo esc_html( $b ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ============================================================
       SOCIAL — POSTING BOARD / EDITORIAL CALENDAR
       Visual language: a pin board with scheduled posts, plus a
       weekly cadence rail showing consistency at a glance.
       ============================================================ -->
  <section class="hm-board" id="social">
    <div class="lvm-container">

      <div class="hm-board__topline mono">
        <span><strong>POSTING BOARD</strong></span>
        <span class="hm-board__topline-rule"></span>
        <span>Calendar · WK 14</span>
        <span class="hm-board__topline-rule"></span>
        <span>Cadence · 12 posts / wk · 3 brands</span>
      </div>

      <div class="hm-board__head">
        <div class="eyebrow"><span class="eyebrow__num mono">06</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Social media</span></div>
        <h2 class="section-h">Consistent social media<br><em class="serif">that keeps your business visible.</em></h2>
        <p class="section-lead">
          Social media won't replace SEO — but it keeps you active, shares your blog,
          highlights new services, and adds the trust signal a searcher needs before
          they tap "Call."
        </p>
      </div>

      <!-- WEEKLY CADENCE RAIL -->
      <div class="hm-board__rail" aria-label="Weekly posting cadence">
        <span class="hm-board__rail-lbl mono">↳ Week 14 · M T W T F S S</span>
        <ol class="hm-board__rail-week mono">
          <?php
          $week = array(
            array( 'M', array( 'TH', 'CL'       ) ),
            array( 'T', array( 'RD'             ) ),
            array( 'W', array( 'TH', 'RD'       ) ),
            array( 'T', array( 'CL'             ) ),
            array( 'F', array( 'TH', 'CL', 'RD' ) ),
            array( 'S', array(                  ) ),
            array( 'S', array( 'TH'             ) ),
          );
          foreach ( $week as $d ) : ?>
            <li class="hm-board__rail-day<?php echo empty( $d[1] ) ? ' is-empty' : ''; ?>">
              <span class="hm-board__rail-letter"><?php echo esc_html( $d[0] ); ?></span>
              <span class="hm-board__rail-pins" aria-hidden="true">
                <?php foreach ( $d[1] as $brand ) : ?>
                  <span class="hm-board__rail-pin"><?php echo esc_html( $brand ); ?></span>
                <?php endforeach; ?>
              </span>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>

      <!-- PINNED POSTS -->
      <div class="hm-board__pins">
        <?php
        $sposts = array(
          array( 'STA', 'Security Training Academy', '@securitytrainingmd',  'Mon · 09:14a',  'Professional security training and certification courses. Enrolling now for summer classes.',                              '#Security #Training',           184, 12,  8, 'PRO' ),
          array( 'CL', 'Calvert Law',       '@calvertlaw',     'Wed · 02:30p',  'Free 15‑minute consultation for personal injury cases this month. Call or book online.',              '#Maryland #PersonalInjury',   62,  4, 21, 'OFR' ),
          array( 'RD', 'Riverside Dental',  '@riversidedental', 'Fri · 11:00a', 'Now accepting new patients — most insurance plans accepted, evening appointments available.',          '#Severna #Dentist',           98,  7,  3, 'NEW' ),
        );
        foreach ( $sposts as $i => $p ) : ?>
          <article class="hm-board__post">
            <span class="hm-board__post-pin" aria-hidden="true"></span>
            <span class="hm-board__post-tape mono"><?php echo esc_html( $p[9] ); ?></span>

            <header class="hm-board__post-head">
              <div class="hm-board__post-avatar" aria-hidden="true"><?php echo esc_html( $p[0] ); ?></div>
              <div class="hm-board__post-who">
                <div class="hm-board__post-name"><?php echo esc_html( $p[1] ); ?></div>
                <div class="hm-board__post-handle mono"><?php echo esc_html( $p[2] ); ?> · <?php echo esc_html( $p[3] ); ?></div>
              </div>
            </header>

            <p class="hm-board__post-text"><?php echo esc_html( $p[4] ); ?></p>
            <div class="hm-board__post-tags mono"><?php echo esc_html( $p[5] ); ?></div>

            <footer class="hm-board__post-foot mono">
              <span>♥ <?php echo (int) $p[6]; ?></span>
              <span>💬 <?php echo (int) $p[7]; ?></span>
              <span>↗ <?php echo (int) $p[8]; ?></span>
              <span class="hm-board__post-status">Scheduled</span>
            </footer>
          </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ============================================================
       SUPPORT — MAINTENANCE LOG / SERVICE JOURNAL
       Visual language: a service journal book with timestamped
       entries, technician initials, and "DONE" stamps.
       ============================================================ -->
  <section class="hm-log" id="support">
    <div class="lvm-container">

      <div class="hm-log__topline mono">
        <span><strong>SERVICE JOURNAL</strong></span>
        <span class="hm-log__topline-rule"></span>
        <span>Book · LV-MNT-2026</span>
        <span class="hm-log__topline-rule"></span>
        <span>Tech · LVM</span>
      </div>

      <div class="hm-log__head">
        <div class="eyebrow"><span class="eyebrow__num mono">07</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Ongoing support</span></div>
        <h2 class="section-h">Ongoing website support<br><em class="serif">without the headaches.</em></h2>
        <p class="section-lead">
          A website isn't a one‑time project. Plugins update, browsers change, services
          get added. Here's the running journal we keep on every supported site.
        </p>
      </div>

      <div class="hm-log__book">
        <?php
        $log_groups = array(
          array(
            'cadence'    => 'Every month',
            'cadence_id' => 'M',
            'sub'        => 'Routine — recurring maintenance',
            'items'      => array(
              array( 'Plugin &amp; theme updates',         '01.04 · 09:14' ),
              array( 'Security scans &amp; patches',      '03.04 · 10:02' ),
              array( 'Backups verified',                  '07.04 · 11:38' ),
              array( 'Broken link &amp; redirect audit',  '14.04 · 14:21' ),
              array( 'Page speed checks',                 '21.04 · 16:55' ),
            ),
          ),
          array(
            'cadence'    => 'On request',
            'cadence_id' => 'R',
            'sub'        => 'Ad-hoc — owner-initiated tickets',
            'items'      => array(
              array( 'Content updates &amp; new pages',       'as filed' ),
              array( 'Service &amp; pricing changes',         'as filed' ),
              array( 'New blog post publishing',              'as filed' ),
              array( 'Photo &amp; gallery updates',           'as filed' ),
              array( 'Seasonal banner &amp; promo swaps',     'as filed' ),
            ),
          ),
          array(
            'cadence'    => 'Quarterly',
            'cadence_id' => 'Q',
            'sub'        => 'Health check — deeper review',
            'items'      => array(
              array( 'On‑page SEO review',                       'Q1 · 03.31' ),
              array( 'Internal linking refresh',                 'Q1 · 03.31' ),
              array( 'Local citation audit',                     'Q1 · 03.31' ),
              array( 'Performance &amp; Core Web Vitals report', 'Q1 · 03.31' ),
              array( 'Recommendation report sent to you',        'Q1 · 03.31' ),
            ),
          ),
        );
        foreach ( $log_groups as $gi => $g ) : ?>
          <article class="hm-log__entry">
            <header class="hm-log__entry-head">
              <span class="hm-log__entry-id mono"><?php echo esc_html( $g['cadence_id'] ); ?></span>
              <div class="hm-log__entry-titles">
                <h3 class="hm-log__entry-cadence"><?php echo esc_html( $g['cadence'] ); ?></h3>
                <span class="hm-log__entry-sub mono"><?php echo esc_html( $g['sub'] ); ?></span>
              </div>
              <span class="hm-log__stamp" aria-hidden="true">
                <span><?php echo $g['cadence_id'] === 'R' ? 'OPEN' : 'DONE'; ?></span>
              </span>
            </header>

            <ul class="hm-log__list">
              <?php foreach ( $g['items'] as $row ) : ?>
                <li class="hm-log__row">
                  <span class="hm-log__check" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                  <span class="hm-log__task"><?php echo $row[0]; ?></span>
                  <span class="hm-log__time mono"><?php echo esc_html( $row[1] ); ?></span>
                  <span class="hm-log__init mono">LV</span>
                </li>
              <?php endforeach; ?>
            </ul>
          </article>
        <?php endforeach; ?>

        <footer class="hm-log__foot mono">
          <span>↳ Logged on every supported site. Yours can start in week one.</span>
          <span class="hm-log__foot-sig">Signed · LVM Maintenance</span>
        </footer>
      </div>

    </div>
  </section>

  <!-- ============================================================
       INDUSTRIES — FILING CABINET
       Visual language: a tabbed filing cabinet. Each industry is
       its own folder with sector code, tab, icon, and playbook link.
       ============================================================ -->
  <section class="hm-files" id="industries">
    <div class="lvm-container">

      <div class="hm-files__topline mono">
        <span><strong>SECTOR INDEX</strong></span>
        <span class="hm-files__topline-rule"></span>
        <span>Drawer · IND-MD</span>
        <span class="hm-files__topline-rule"></span>
        <span>10 folders · sorted A–Z by trade</span>
      </div>

      <div class="hm-files__head">
        <div class="eyebrow"><span class="eyebrow__num mono">08</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industries</span></div>
        <h2 class="section-h">Built for local service businesses<br><em class="serif">across Maryland.</em></h2>
        <p class="section-lead">Pull a folder. Each one has a working playbook — keywords we chase, pages we build, and the local signals that move the needle for that trade.</p>
      </div>

      <div class="hm-files__grid">
        <?php
        // Each entry: [title, description, inner SVG markup, slug, sector-code]
        $inds = array(
          array(
            'Contractors', 'Rank for the services homeowners search for most.',
            '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
            '/contractors', 'CON',
          ),
          array(
            'Security Training', 'Show up when professionals need certification — not three pages in.',
            '<circle cx="12" cy="12" r="3"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>',
            '/security-training', 'SEC',
          ),
          array(
            'Law Firms', 'Build trust and turn local searches into consultation requests.',
            '<path d="M12 3v18M5 21h14"/><path d="M6 8l-3 6a3 3 0 0 0 6 0L6 8zM18 8l-3 6a3 3 0 0 0 6 0l-3-6z"/><path d="M3 6h18"/>',
            '/law-firms', 'LAW',
          ),
          array(
            'Dentists', 'Help nearby patients find your practice and book online.',
            '<path d="M12 5.5c-2 -2 -5 -2 -7 0c-2 2 -2 5 0 8c1 1.5 1.5 3 2 5c.5 2 1 3 2 3c1 0 1.5 -1.5 2 -3.5l1 -3l1 3c.5 2 1 3.5 2 3.5c1 0 1.5 -1 2 -3c.5 -2 1 -3.5 2 -5c2 -3 2 -6 0 -8c-2 -2 -5 -2 -7 0z"/>',
            '/dentists', 'DNT',
          ),
          array(
            'Medical Clinics', 'Get found by patients researching specific care in your area.',
            '<path d="M9 3v6H3v6h6v6h6v-6h6V9h-6V3z"/>',
            '#', 'MED',
          ),
          array(
            'Auto Glass', 'Show up when drivers need urgent repair or replacement.',
            '<path d="M5 17h14M5 17l1.5-6a2 2 0 0 1 2-1.5h7a2 2 0 0 1 2 1.5L19 17M5 17v3M19 17v3M8 13h8"/><circle cx="7.5" cy="17" r="1.5"/><circle cx="16.5" cy="17" r="1.5"/>',
            '/auto-glass', 'AGL',
          ),
          array(
            'Home Care Agencies', 'Create content that builds trust with families.',
            '<path d="M3 11l9-8 9 8v9a2 2 0 0 1-2 2h-3v-7H8v7H5a2 2 0 0 1-2-2z"/><path d="M12 13.5l-1.5-1.5a1.5 1.5 0 0 1 2.12-2.12L12 10l-.62-.62a1.5 1.5 0 1 1 2.12 2.12L12 13.5z" fill="currentColor"/>',
            '/home-care', 'HMC',
          ),
          array(
            'Restaurants', 'Make your menu and local presence easier to find.',
            '<path d="M7 3v8a2 2 0 0 0 2 2v8M11 3v6M7 3h4M17 3c-1.5 0-3 1.5-3 4s1.5 4 3 4v10"/>',
            '#', 'RST',
          ),
          array(
            'Security Companies', 'Reach customers researching protection at home or work.',
            '<path d="M12 2l8 3v7c0 5-3.5 9-8 10-4.5-1-8-5-8-10V5z"/><path d="M9 12l2 2 4-4"/>',
            '#', 'SEC',
          ),
          array(
            'Local Service Businesses', 'If customers Google your category by city, this is for you.',
            '<path d="M3 9l1.5-5h15L21 9M3 9v11h18V9M3 9h18M8 14h3v6H8z"/>',
            '/contact', 'LSB',
          ),
        );
        foreach ( $inds as $i => $row ) :
          $href = $row[3] === '#' ? '#' : esc_url( home_url( $row[3] ) );
          $num  = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
          ?>
          <a class="hm-files__folder" href="<?php echo $href; ?>">
            <span class="hm-files__tab mono">
              <span class="hm-files__tab-num"><?php echo esc_html( $num ); ?></span>
              <span class="hm-files__tab-code"><?php echo esc_html( $row[4] ); ?></span>
            </span>
            <div class="hm-files__folder-body">
              <div class="hm-files__folder-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $row[2]; ?></svg>
              </div>
              <h3 class="hm-files__folder-title"><?php echo esc_html( $row[0] ); ?></h3>
              <p class="hm-files__folder-desc"><?php echo esc_html( $row[1] ); ?></p>
              <div class="hm-files__folder-foot mono">
                <span>↳ SEO playbook</span>
                <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="11" height="11" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ============================================================
       RECENT WORK — CASE FILE DOSSIER
       Visual language: manila case files. Each project is a dossier
       with project code, client metadata, and a CLOSED / SHIPPED stamp.
       ============================================================ -->
  <section class="hm-cases" id="work">
    <div class="lvm-container">

      <div class="hm-cases__topline mono">
        <span><strong>CASE FILES</strong></span>
        <span class="hm-cases__topline-rule"></span>
        <span>Cabinet · LV-CASE-26</span>
        <span class="hm-cases__topline-rule"></span>
        <span>06 dossiers · status SHIPPED</span>
      </div>

      <div class="hm-cases__head">
        <div class="eyebrow"><span class="eyebrow__num mono">09</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Recent work</span></div>
        <h2 class="section-h">Real client projects<br><em class="serif">we've shipped.</em></h2>
        <p class="section-lead">
          Service businesses and professionals redesigned, ranked, and supported. Each
          file below was rebuilt for local search, mobile speed, and clear conversion paths.
        </p>
      </div>

      <div class="hm-cases__grid">
        <?php
        $assets = get_template_directory_uri() . '/assets/projects/';
        $work = array(
          array(
            'tag'      => 'Auto Glass',
            'client'   => 'Extreme Vivid Auto Glass',
            'location' => 'Baltimore County · Maryland',
            'main'     => 'Mobile windshield service',
            'accent'   => 'built for urgent local search.',
            'desc'     => 'A fast, mobile-first site that converts the "auto glass near me" moment into a same-day booking — across four Maryland counties.',
            'k1_val'   => 'Top 3',
            'k1_lbl'   => 'County rank',
            'k2_val'   => 'Web + SEO',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'extreem.png',
            'alt'      => 'Extreme Vivid Auto Glass website — mobile autoglass service in Baltimore County',
          ),
          array(
            'tag'      => 'Legal',
            'client'   => 'Cullen Burke, Attorney at Law',
            'location' => 'Ocean City · Maryland',
            'main'     => 'Authority-first identity',
            'accent'   => 'for a three-decade defender.',
            'desc'     => 'A serious, evidence-led design system that translates 30+ years of criminal defense experience into trust on first scroll.',
            'k1_val'   => 'Top 5',
            'k1_lbl'   => 'DUI defense MD',
            'k2_val'   => 'Web + Content',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'cullen.png',
            'alt'      => 'Cullen Burke Attorney at Law website — criminal defense Maryland',
          ),
          array(
            'tag'      => 'Home Care',
            'client'   => 'Caregiving Angels of Maryland',
            'location' => 'Statewide · Maryland',
            'main'     => 'Trust-led design',
            'accent'   => 'for licensed CNA care.',
            'desc'     => 'Warm, family-first storytelling paired with structured service pages that rank across 40+ home-care search terms in Maryland.',
            'k1_val'   => '40+',
            'k1_lbl'   => 'Care keywords ranked',
            'k2_val'   => 'Web + Local SEO',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'caregiving .png',
            'alt'      => 'Caregiving Angels of Maryland website — licensed home care and CNA services',
          ),
          array(
            'tag'      => 'Healthcare',
            'client'   => 'Reflect Neuropsychology',
            'location' => 'California',
            'main'     => 'Clean, conversion-focused',
            'accent'   => 'specialty practice site.',
            'desc'     => 'A calm, clinical design that helps families and patients understand neuropsychological assessment — and book the next step in two clicks.',
            'k1_val'   => 'Lifespan',
            'k1_lbl'   => 'Patient coverage',
            'k2_val'   => 'Web + SEO',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'reflect.png',
            'alt'      => 'Reflect Neuropsychology website — assessment through the lifespan',
          ),
          array(
            'tag'      => 'Aesthetics',
            'client'   => 'Precision Aesthetics',
            'location' => 'New York City',
            'main'     => 'Editorial-grade aesthetics',
            'accent'   => 'as seen in Vogue and Elle.',
            'desc'     => 'A high-touch site for a Vogue-featured aesthetic surgeon — black-and-white editorial photography, refined typography, premium-feel CTAs.',
            'k1_val'   => 'Vogue · ELLE',
            'k1_lbl'   => 'Press features',
            'k2_val'   => 'Web + Content',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'pa.png',
            'alt'      => 'Precision Aesthetics website — non-invasive aesthetic treatments NYC',
          ),
          array(
            'tag'      => 'Entertainment',
            'client'   => 'Kidzz Kreations',
            'location' => 'Tri-State · NJ · NY · CT',
            'main'     => 'Playful, conversion-ready',
            'accent'   => 'kids entertainment brand.',
            'desc'     => 'Bright, joyful design for a tri-state kids entertainment agency — booking flow front and center, character library a thumb-flick away.',
            'k1_val'   => '3 states',
            'k1_lbl'   => 'Service area',
            'k2_val'   => 'Web + Local SEO',
            'k2_lbl'   => 'Scope',
            'img'      => $assets . 'kids.png',
            'alt'      => 'Kidzz Kreations website — kids entertainment agency, costume characters and balloon art',
          ),
        );
        foreach ( $work as $i => $w ) :
          $num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
          $code = 'CF-' . str_pad( 26000 + $i, 5, '0', STR_PAD_LEFT );
          ?>
          <article class="hm-cases__file">
            <header class="hm-cases__file-tab mono">
              <span class="hm-cases__file-tab-id"><?php echo esc_html( $code ); ?></span>
              <span class="hm-cases__file-tab-tag"><?php echo esc_html( $w['tag'] ); ?></span>
            </header>

            <div class="hm-cases__file-media">
              <img src="<?php echo esc_url( $w['img'] ); ?>" alt="<?php echo esc_attr( $w['alt'] ); ?>" loading="lazy">
              <span class="hm-cases__file-stamp" aria-hidden="true"><span>SHIPPED</span></span>
            </div>

            <div class="hm-cases__file-body">
              <div class="hm-cases__file-index mono">
                <span class="hm-cases__file-index-num">№ <?php echo $num; ?></span>
                <span class="hm-cases__file-index-rule" aria-hidden="true"></span>
                <span class="hm-cases__file-index-lbl">Dossier · <?php echo esc_html( $w['tag'] ); ?></span>
              </div>

              <h3 class="hm-cases__file-title">
                <?php echo esc_html( $w['main'] ); ?><br>
                <em class="serif"><?php echo esc_html( $w['accent'] ); ?></em>
              </h3>

              <div class="hm-cases__file-client mono">
                <span class="hm-cases__file-client-lbl">Client</span>
                <span class="hm-cases__file-client-name"><?php echo esc_html( $w['client'] ); ?></span>
                <span class="hm-cases__file-client-dot" aria-hidden="true"></span>
                <span class="hm-cases__file-client-loc"><?php echo esc_html( $w['location'] ); ?></span>
              </div>

              <p class="hm-cases__file-desc"><?php echo esc_html( $w['desc'] ); ?></p>

              <dl class="hm-cases__file-metrics mono">
                <div>
                  <dt><?php echo esc_html( $w['k1_lbl'] ); ?></dt>
                  <dd><?php echo esc_html( $w['k1_val'] ); ?></dd>
                </div>
                <div>
                  <dt><?php echo esc_html( $w['k2_lbl'] ); ?></dt>
                  <dd><?php echo esc_html( $w['k2_val'] ); ?></dd>
                </div>
              </dl>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="hm-cases__foot mono">
        <span>↳ Filed and closed. Yours could be the next dossier.</span>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--ghost btn--lg">
          Open your file <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       TEAM
       ============================================================ -->
  <section class="team" id="team">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">10</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Team</span></div>
      <h2 class="section-h">A small team,<br><em class="serif">close to your business.</em></h2>
      <p class="section-lead">
        You'll work with the same three people from your first call through every blog post,
        design tweak, and SEO update. No account‑manager carousel, no offshore handoffs.
      </p>

      <div class="team__grid">
        <?php
        $members = array(
          array(
            'name' => 'Garey Simmons',
            'role' => 'CEO &amp; Founder',
            'bio'  => 'Over 15 years of experience in digital marketing and business strategy. Leads the agency\'s overall direction and works directly with founders on growth strategy.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2023/08/GareySimmons-smile-1.jpg',
          ),
          array(
            'name' => 'Haytham Fourati',
            'role' => 'Website Developer',
            'bio'  => 'Expert in front‑end development, WordPress, and SEO strategy. Builds the websites and on‑page foundations every Local Vocal site is judged on.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2025/02/WhatsApp-Image-2023-02-20-at-12.00.54.jpg',
          ),
          array(
            'name' => 'David Breth',
            'role' => 'Social Media Manager',
            'bio'  => 'A social media expert with a knack for creating engaging content. Runs the consistent posting cadence that keeps client brands visible week to week.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2025/02/467235083_10234123037800716_1873456959756484989_n-1.jpg',
          ),
        );
        foreach ( $members as $i => $m ) : ?>
          <article class="tcard">
            <figure class="tcard__photo">
              <img src="<?php echo esc_url( $m['photo'] ); ?>" alt="<?php echo esc_attr( $m['name'] . ' — ' . wp_strip_all_tags( $m['role'] ) . ', Local Vocal Marketing' ); ?>" loading="lazy">
              <span class="tcard__photo-tag mono">0<?php echo $i + 1; ?> / 03</span>
            </figure>
            <div class="tcard__body">
              <div class="tcard__role mono"><?php echo $m['role']; ?></div>
              <h3 class="tcard__name"><?php echo esc_html( $m['name'] ); ?></h3>
              <p class="tcard__bio"><?php echo $m['bio']; ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHY US — SPEC SHEET / RECEIPT (dark)
       Visual language: a printed dark spec ticket. Six principles
       as printed line items with codes, values, and a stamped total.
       ============================================================ -->
  <section class="hm-spec" id="whyus">
    <div class="hm-spec__glow" aria-hidden="true"></div>
    <div class="lvm-container hm-spec__inner">

      <div class="hm-spec__topline mono">
        <span><strong>OPERATING SPEC</strong></span>
        <span class="hm-spec__topline-rule"></span>
        <span>Sheet · LVM-OS-26</span>
        <span class="hm-spec__topline-rule"></span>
        <span>How we run.</span>
      </div>

      <div class="hm-spec__head">
        <div class="eyebrow eyebrow--light"><span class="eyebrow__num mono">11</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Why Local Vocal</span></div>
        <h2 class="section-h section-h--light">Why local businesses choose<br><em class="serif">Local Vocal Marketing.</em></h2>
        <p class="section-lead section-lead--light">Six operating principles. Print them, frame them, hold us to them.</p>
      </div>

      <div class="hm-spec__sheet">
        <header class="hm-spec__sheet-head mono">
          <span class="hm-spec__col-id">ID</span>
          <span class="hm-spec__col-name">PRINCIPLE</span>
          <span class="hm-spec__col-val">SO IT MEANS</span>
        </header>

        <?php
        $whyus = array(
          array( 'We understand local search',            'Maryland service areas, map pack mechanics, and the keywords customers actually type.', 'LOCAL'  ),
          array( 'We build websites with SEO in mind',    'Not pretty templates retrofitted later. Structure, speed, and schema from page one.',   'BUILD'  ),
          array( 'We publish content consistently',       'Blog posts that target real searches, written to your voice — not AI filler.',          'WRITE'  ),
          array( 'We support your website long‑term',     'Updates, fixes, new pages, and small wins, on a calendar — not on hold.',               'KEEP'   ),
          array( 'We communicate clearly',                "No jargon. No 40‑slide reports. Just what's working, what's not, and what's next.",     'SPEAK'  ),
          array( 'We focus on visibility, trust, and leads', 'Three measurable outcomes. Everything else is a means to those ends.',                'AIM'    ),
        );
        foreach ( $whyus as $i => $p ) :
          $code = 'OS-' . str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
          ?>
          <article class="hm-spec__row">
            <span class="hm-spec__row-id mono"><?php echo esc_html( $code ); ?></span>
            <div class="hm-spec__row-body">
              <h3 class="hm-spec__row-name"><?php echo esc_html( $p[0] ); ?></h3>
              <p class="hm-spec__row-desc"><?php echo esc_html( $p[1] ); ?></p>
            </div>
            <span class="hm-spec__row-val mono"><?php echo esc_html( $p[2] ); ?></span>
          </article>
        <?php endforeach; ?>

        <footer class="hm-spec__sheet-foot mono">
          <div class="hm-spec__total">
            <span class="hm-spec__total-lbl">↳ Total promise</span>
            <span class="hm-spec__total-val">Visibility · Trust · Leads</span>
          </div>
          <div class="hm-spec__stamp">
            <span>Signed · LVM</span>
          </div>
        </footer>
      </div>

    </div>
  </section>

  <!-- ============================================================
       PROCESS
       ============================================================ -->
  <section class="process" id="process">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">12</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Process</span></div>
      <h2 class="section-h">A simple process for improving<br><em class="serif">your online presence.</em></h2>

      <ol class="process__list">
        <?php
        $steps = array(
          array( 'Review',   "We audit your current website, SEO, content, and local visibility — and write down what's actually broken.", 'Week 1' ),
          array( 'Plan',     'We identify the biggest opportunities to improve rankings, design, and content, sized to your budget.', 'Week 2' ),
          array( 'Build',    'We design or improve your website with SEO‑focused structure, fast pages, and clear conversion paths.', 'Week 3–6' ),
          array( 'Optimize', 'We sharpen headings, metadata, internal links, service pages, and local content as data comes in.', 'Week 7+' ),
          array( 'Support',  'We keep going — blog posts, social, updates, and ongoing improvements that compound.', 'Ongoing' ),
        );
        foreach ( $steps as $i => $s ) : ?>
          <li class="process__item">
            <div class="process__num mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
            <div class="process__rule"></div>
            <div class="process__body">
              <h3 class="process__title"><?php echo esc_html( $s[0] ); ?></h3>
              <p class="process__desc"><?php echo esc_html( $s[1] ); ?></p>
            </div>
            <div class="process__meta mono"><?php echo esc_html( $s[2] ); ?></div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       FAQ
       ============================================================ -->
  <section class="faq-section" id="faq">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">13</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">FAQ</span></div>
      <h2 class="section-h">Maryland web design &amp; SEO<br><em class="serif">questions, answered.</em></h2>

      <div class="faq">
        <?php
        $faqs = array(
          array( 'Why does a local business need SEO?', "Most customers find local services through Google. If your business doesn't appear when someone searches for what you do in your city, you're invisible to people ready to buy. Local SEO makes you visible to the right people, in the right place, at the right moment." ),
          array( 'How does web design affect Google rankings?', 'A lot. Page speed, mobile experience, clear headings, semantic structure, internal linking, and crawlable content are all design decisions Google evaluates. A pretty site with broken structure can rank worse than a plain site that\'s built right.' ),
          array( 'What is local SEO?', "Local SEO is the set of practices that helps your business appear in location‑based searches — the map pack, 'near me' results, and city‑specific queries. It combines Google Business Profile optimization, on‑page SEO, service‑area pages, citations, and review velocity." ),
          array( 'How often should a business publish blog articles?', 'For most local businesses, 2–4 high‑quality SEO‑focused posts per month is a healthy pace. Consistency matters more than volume — and posts that target real customer questions outperform a flood of generic content.' ),
          array( 'Can blog posts help my business rank locally?', "Yes. Blog content built around customer questions and local topics supports your service pages, earns long‑tail traffic, and signals to Google that you're an authority on your subject and your service area." ),
          array( 'Do you work with businesses outside Maryland?', "Yes. We're based in Maryland and the majority of our clients are local, but we work with service businesses across the U.S. Local SEO principles are the same whether you're in Annapolis or Austin." ),
          array( 'What makes a website SEO‑friendly?', 'Fast page speed, mobile‑first layout, clean URL structure, semantic HTML, proper heading hierarchy, optimized metadata, schema markup, internal linking, and unique, useful content on every page. We build with all of this from the start.' ),
          array( 'How long does SEO take to work?', "Most clients see meaningful movement in 3–6 months and real compounding in 6–12. SEO is not a quick win — it's a long‑term investment that becomes harder for competitors to displace the longer you stick with it." ),
          array( 'Do small businesses need social media?', "Not for sales alone, but yes for trust. A quiet social presence makes customers wonder if you're still open. Consistent posting — even a few times a month — keeps you visible and supports your other marketing." ),
          array( 'Can you update and support an existing website?', "Absolutely. Many of our clients come to us with an existing site that needs SEO, content, performance, or design improvements — not a full rebuild. We'll review what you have and recommend the smallest change that creates the biggest result." ),
        );
        foreach ( $faqs as $i => $q ) : ?>
          <div class="faq__item">
            <button class="faq__q" type="button" aria-expanded="false">
              <span class="faq__qnum mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
              <span class="faq__qtext"><?php echo esc_html( $q[0] ); ?></span>
              <span class="faq__qicon" aria-hidden="true"><span></span><span></span></span>
            </button>
            <div class="faq__a-wrap">
              <div class="faq__a"><?php echo esc_html( $q[1] ); ?></div>
            </div>
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
      <div class="cta__eyebrow mono">↳ Free review</div>
      <h2 class="cta__h">Ready to improve your website<br><em class="serif">and local SEO?</em></h2>
      <p class="cta__p">
        We'll review your current website, local search visibility, and content
        strategy — and walk you through the highest‑leverage opportunities to grow.
        No pitch deck, no obligation.
      </p>

      <?php
      // Free SEO audit form
      if ( shortcode_exists( 'contact-form-7' ) ) {
        echo do_shortcode( '[contact-form-7 id="aca8789" title="SEO Audit"]' );
      } else {
        ?>
        <div class="cta__actions">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free website &amp; SEO review <span aria-hidden="true">→</span></a>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--dark-ghost btn--lg">Contact Local Vocal</a>
        </div>
        <?php
      }
      ?>

      <div class="cta__notes">
        <div class="cta__note">
          <span class="mono cta__note-lbl">01</span>
          30‑minute walkthrough, scheduled this week
        </div>
        <div class="cta__note">
          <span class="mono cta__note-lbl">02</span>
          We share what's costing you visibility, on screen
        </div>
        <div class="cta__note">
          <span class="mono cta__note-lbl">03</span>
          Written report emailed within 48 hours
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
