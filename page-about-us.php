<?php
/**
 * Template Name: About Us
 * Auto-applied to the page with slug "about-us"
 * Visual language: studio manifesto / editorial portrait
 */
get_header(); ?>

<main class="service-page svc-about">

  <!-- ============================================================
       MANIFESTO HERO
       ============================================================ -->
  <section class="ab-mast">
    <div class="lvm-container">

      <div class="ab-mast__bar mono">
        <span><strong>ABOUT</strong></span>
        <span class="ab-mast__bar-rule"></span>
        <span>Studio · est. 2010</span>
        <span class="ab-mast__bar-rule"></span>
        <span>Maryland · USA</span>
        <span class="ab-mast__bar-rule"></span>
        <span class="ab-mast__bar-tag">No.&nbsp;01 / 06</span>
      </div>

      <div class="page-hero__crumb mono ab-mast__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>About Us</span>
      </div>

      <h1 class="ab-mast__h">
        <span class="ab-mast__line">A small Maryland studio</span>
        <span class="ab-mast__line ab-mast__line--accent serif">building the boring,<br>durable web</span>
        <span class="ab-mast__line">for service businesses.</span>
      </h1>

      <div class="ab-mast__sig">
        <span class="ab-mast__sig-num mono">↳ since 2010</span>
        <span class="ab-mast__sig-rule"></span>
        <span class="ab-mast__sig-meta mono">Annapolis · Severna Park · the Bay</span>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ORIGIN / POSITIONING
       ============================================================ -->
  <section class="ab-origin">
    <div class="lvm-container">

      <aside class="ab-origin__aside">
        <span class="ab-origin__aside-tag mono">§ 01 · ORIGIN</span>
        <p class="ab-origin__aside-meta mono">A note on why we exist —<br>and who we exist for.</p>
      </aside>

      <div class="ab-origin__body">
        <p class="ab-origin__lead">
          <span class="ab-origin__cap">L</span>ocal Vocal started because most service businesses in Maryland kept getting stuck with the same problem: a beautiful website that didn't rank, a marketing agency that didn't return calls, or a freelancer who disappeared after launch. We wanted to build the alternative — <em class="serif">small enough to care, technical enough to ship</em>, and honest enough to tell you what you don't actually need.
        </p>
        <div class="ab-origin__grid">
          <p>We're a three-person studio. Garey runs strategy, Haytham builds the sites, David runs social. That's the team. You'll talk to all three of us at some point, and the same people who win your project ship every line of it.</p>
          <p>We work mostly with HVAC, legal, healthcare, home-services, and aesthetic businesses — the kind of work where a homeowner needs to call you in the next ten minutes, and your website has to make that easy.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================================
       TEAM PORTRAITS — alternating editorial slices
       ============================================================ -->
  <section class="ab-team" id="team">
    <div class="lvm-container">
      <div class="ab-section-bar mono">
        <span class="ab-section-bar__num">§ 02</span>
        <span class="ab-section-bar__rule"></span>
        <span class="ab-section-bar__lbl">The team</span>
      </div>

      <h2 class="ab-team__h">Three people,<br><em class="serif">every line of every project.</em></h2>

      <div class="ab-team__list">
        <?php
        $members = array(
          array(
            'num'   => '01',
            'role'  => 'CEO & Founder',
            'name'  => 'Garey Simmons',
            'years' => '15 + years',
            'spec'  => 'Strategy · Sales · Client growth',
            'bio'   => 'Garey runs the agency. 15+ years in digital marketing and business strategy, and the person founders end up on a call with when they need a clear answer. He picks the work we say yes to and decides which problems we solve first.',
            'quote' => 'If we can\'t make the phone ring more, we shouldn\'t be on the invoice.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2023/08/GareySimmons-smile-1.jpg',
          ),
          array(
            'num'   => '02',
            'role'  => 'Website Developer · SEO',
            'name'  => 'Haytham Fourati',
            'years' => 'Front-end · WordPress',
            'spec'  => 'Engineering · Performance · SEO',
            'bio'   => 'Haytham builds the sites. Front-end engineering, WordPress, and the on-page SEO foundations every Local Vocal site is judged on. If a site loads fast and ranks well, it\'s usually because of the decisions made before the first commit.',
            'quote' => 'Boring stack, long shelf life. Every site we ship is auditable, replaceable, and well-documented.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2025/02/WhatsApp-Image-2023-02-20-at-12.00.54.jpg',
          ),
          array(
            'num'   => '03',
            'role'  => 'Social Media Manager',
            'name'  => 'David Breth',
            'years' => 'Editorial · Cadence',
            'spec'  => 'Content · Calendars · Community',
            'bio'   => 'David runs the social side. Plans the calendar, writes the captions, edits the photo, replies to the comments. He keeps client brands visible without chasing trends — the steady, on-brand presence that builds trust between launches.',
            'quote' => 'Predictable cadence beats viral every time. Show up on the same day every week.',
            'photo' => 'https://localvocalmarketing.com/wp-content/uploads/2025/02/467235083_10234123037800716_1873456959756484989_n-1.jpg',
          ),
        );
        foreach ( $members as $i => $m ) : ?>
          <article class="ab-mem">
            <figure class="ab-mem__photo">
              <img src="<?php echo esc_url( $m['photo'] ); ?>" alt="<?php echo esc_attr( $m['name'] . ' — ' . wp_strip_all_tags( $m['role'] ) ); ?>" loading="lazy">
              <figcaption class="ab-mem__photo-cap mono">
                <span><?php echo esc_html( $m['num'] ); ?> / 03</span>
                <span><?php echo esc_html( $m['name'] ); ?></span>
              </figcaption>
            </figure>

            <div class="ab-mem__body">
              <div class="ab-mem__crumb mono">
                <span><?php echo esc_html( $m['role'] ); ?></span>
                <span class="ab-mem__crumb-dot"></span>
                <span><?php echo esc_html( $m['years'] ); ?></span>
              </div>
              <h3 class="ab-mem__name">
                <?php echo esc_html( $m['name'] ); ?>
              </h3>
              <p class="ab-mem__bio"><?php echo esc_html( $m['bio'] ); ?></p>

              <blockquote class="ab-mem__q">
                <span class="ab-mem__q-mark serif" aria-hidden="true">"</span>
                <em class="serif"><?php echo esc_html( $m['quote'] ); ?></em>
              </blockquote>

              <dl class="ab-mem__specs">
                <div><dt class="mono">focus</dt><dd><?php echo esc_html( $m['spec'] ); ?></dd></div>
                <div><dt class="mono">role</dt><dd><?php echo esc_html( $m['role'] ); ?></dd></div>
              </dl>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PRINCIPLES — manifesto numbered list
       ============================================================ -->
  <section class="ab-prin">
    <div class="lvm-container">
      <div class="ab-section-bar mono">
        <span class="ab-section-bar__num">§ 03</span>
        <span class="ab-section-bar__rule"></span>
        <span class="ab-section-bar__lbl">The way we work</span>
      </div>

      <h2 class="ab-prin__h">Six principles<br><em class="serif">we don't break.</em></h2>

      <ol class="ab-prin__list">
        <?php
        $principles = array(
          array( '01', 'Build the boring stack.',
            'We pick the simplest tools that do the job. Boring choices have long shelf lives — your next developer will thank us.' ),
          array( '02', 'One brief, one team.',
            'Three of us work on every project. No account-manager carousel, no offshore handoffs, no Slack threads with strangers.' ),
          array( '03', 'Ship, then iterate.',
            'A site live next month and improving every week beats a perfect site shipped never. Real customers tell us what to do next.' ),
          array( '04', 'Plain English, always.',
            'No jargon, no 40-slide reports, no acronym soup. If we can\'t explain it on a phone call, the strategy isn\'t ready.' ),
          array( '05', 'Local, not "nationwide".',
            'We work with Maryland service businesses because we know the counties, the seasonal patterns, and the search behavior here.' ),
          array( '06', 'Honest about what you don\'t need.',
            'Half the value is telling you which service to skip. Most clients start with one thing — the right one — and add the rest later.' ),
        );
        foreach ( $principles as $p ) : ?>
          <li class="ab-prin-item">
            <span class="ab-prin-item__num mono"><?php echo esc_html( $p[0] ); ?></span>
            <div class="ab-prin-item__body">
              <h3 class="ab-prin-item__name serif"><?php echo esc_html( $p[1] ); ?></h3>
              <p class="ab-prin-item__desc"><?php echo esc_html( $p[2] ); ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       BY THE NUMBERS
       ============================================================ -->
  <section class="ab-stats">
    <div class="lvm-container">
      <div class="ab-section-bar mono">
        <span class="ab-section-bar__num">§ 04</span>
        <span class="ab-section-bar__rule"></span>
        <span class="ab-section-bar__lbl">By the numbers</span>
      </div>

      <div class="ab-stats__grid">
        <?php
        $stats = array(
          array( '15+',  'Years',      'in digital marketing &amp; web' ),
          array( '120+', 'Sites',      'shipped &amp; supported across Maryland' ),
          array( '3',    'People',     'on every project, start to finish' ),
          array( '0',    'Hand-offs',  'to offshore teams or contractors' ),
        );
        foreach ( $stats as $s ) : ?>
          <article class="ab-stat">
            <span class="ab-stat__val"><?php echo esc_html( $s[0] ); ?></span>
            <span class="ab-stat__name"><?php echo esc_html( $s[1] ); ?></span>
            <span class="ab-stat__desc mono"><?php echo $s[2]; ?></span>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHERE WE ARE — Maryland block
       ============================================================ -->
  <section class="ab-place">
    <div class="lvm-container ab-place__inner">
      <div class="ab-place__l">
        <div class="ab-section-bar mono">
          <span class="ab-section-bar__num">§ 05</span>
          <span class="ab-section-bar__rule"></span>
          <span class="ab-section-bar__lbl">Where we are</span>
        </div>
        <h2 class="ab-place__h">Anchored in <em class="serif">Annapolis,</em><br>working across the Bay.</h2>
        <p class="ab-place__p">We're based in Maryland and serve service businesses across Anne Arundel, Baltimore, Howard, and the surrounding counties. If you call us, the person who answers lives within an hour of your shop.</p>
        <ul class="ab-place__list mono">
          <li>↳ Annapolis · Severna Park · Pasadena</li>
          <li>↳ Glen Burnie · Edgewater · Crofton</li>
          <li>↳ Baltimore County · Howard County</li>
          <li>↳ Eastern Shore · the Bay region</li>
        </ul>
      </div>

      <aside class="ab-place__r">
        <div class="ab-place__card">
          <div class="ab-place__card-bar mono">
            <span class="ab-place__card-folio">LV / FIELD CARD</span>
            <span class="ab-place__card-id">MD-21401</span>
          </div>
          <div class="ab-place__card-art" aria-hidden="true">
            <span class="ab-place__pin">
              <span class="ab-place__pin-dot"></span>
              <span class="ab-place__pin-ring"></span>
              <span class="ab-place__pin-ring ab-place__pin-ring--lg"></span>
            </span>
            <svg class="ab-place__lines" viewBox="0 0 320 200" aria-hidden="true">
              <path d="M0 130 Q 80 110 160 120 T 320 100" />
              <path d="M0 90 Q 90 70 160 80 T 320 70" />
              <path d="M40 200 Q 100 150 160 160 T 280 0" />
            </svg>
          </div>
          <dl class="ab-place__card-list mono">
            <div><dt>Studio</dt><dd>Annapolis, MD</dd></div>
            <div><dt>Hours</dt><dd>Mon — Fri · 9 to 6</dd></div>
            <div><dt>Calls</dt><dd>(443) 852-1000</dd></div>
            <div class="ab-place__card-list-last"><dt>Coverage</dt><dd>Statewide · MD</dd></div>
          </dl>
        </div>
      </aside>
    </div>
  </section>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free consultation</div>
      <h2 class="cta__h">Want to work<br><em class="serif">with a small team?</em></h2>
      <p class="cta__p">Tell us a bit about your business. We'll be honest about whether we're the right fit — and which service to start with if we are.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get in touch <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
