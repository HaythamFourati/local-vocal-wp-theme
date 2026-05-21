<?php
/**
 * Template Name: Content Creation Service Page
 * Visual language: editorial magazine
 */
get_header(); ?>

<main class="service-page svc-cn">

  <!-- ============================================================
       MASTHEAD HERO
       ============================================================ -->
  <section class="cn-mast">
    <div class="lvm-container">
      <div class="cn-mast__bar mono">
        <span class="cn-mast__brand">LOCAL VOCAL · BLOG STUDIO</span>
        <span class="cn-mast__rule"></span>
        <span>Vol. 04 / SEO Editorial</span>
        <span class="cn-mast__rule"></span>
        <span>Maryland · 2025</span>
      </div>

      <div class="page-hero__crumb mono cn-mast__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Content &amp; Blog</span>
      </div>

      <h1 class="cn-mast__h">
        Blog content<br>
        <em class="serif">that earns its index slot.</em>
      </h1>

      <div class="cn-mast__lead">
        <p class="cn-mast__drop"><span class="cn-mast__cap">L</span>ong-tail blog content written around the questions your customers actually search for — service keywords, "near me" queries, and the specific concerns Maryland homeowners have before they pick up the phone. We don't ship 800-word filler. We ship a topical authority your service pages can lean on.</p>
      </div>

      <div class="cn-mast__byline mono">
        <span>By Local Vocal Editorial</span>
        <span>·</span>
        <span>Avg. 1,400 — 2,200 words</span>
        <span>·</span>
        <span>Indexed in 7 — 14 days</span>
      </div>

      <div class="cn-mast__ctas">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a content plan <span aria-hidden="true">→</span></a>
        <a href="#articles" class="btn btn--ghost btn--lg">Read sample articles <span aria-hidden="true">↓</span></a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FEATURE STORY + SAMPLE ARTICLES
       ============================================================ -->
  <section class="cn-feat" id="articles">
    <div class="lvm-container">
      <div class="cn-section-bar mono">
        <span class="cn-section-bar__num">01</span>
        <span class="cn-section-bar__rule"></span>
        <span class="cn-section-bar__lbl">In this issue</span>
      </div>

      <div class="cn-feat__grid">

        <!-- Featured story (large) -->
        <article class="cn-feat__hero">
          <div class="cn-feat__hero-art" aria-hidden="true">
            <div class="cn-feat__hero-art-frame">
              <span class="cn-feat__hero-art-folio mono">FEATURE / 04</span>
              <h3 class="cn-feat__hero-art-h">
                Why Maryland<br>HVAC searches<br>
                <em class="serif">peak in March.</em>
              </h3>
              <span class="cn-feat__hero-art-foot mono">↳ 2,180 words · 9 min read</span>
            </div>
          </div>
          <div class="cn-feat__hero-body">
            <span class="cn-feat__cat mono">SEO Editorial · Service insights</span>
            <h3 class="cn-feat__hero-h">
              Why "HVAC repair near me" peaks in March, and how to be ready for it.
            </h3>
            <p class="cn-feat__hero-x">
              A look at three years of Maryland search data, the seasonal patterns Google rewards, and the on-page moves that actually convert urgent traffic into booked jobs — written for the homeowner first, the algorithm second.
            </p>
            <div class="cn-feat__hero-meta mono">
              <span>By Haytham Fourati</span>
              <span>·</span>
              <span>Mar 14, 2025</span>
              <span>·</span>
              <span>9 min read</span>
            </div>
          </div>
        </article>

        <!-- Side stack -->
        <div class="cn-feat__stack">
          <?php
          $articles = array(
            array(
              'cat'   => 'Local SEO',
              'kicker'=> '02 / Service page',
              'title' => 'The five things every Maryland service-page intro needs.',
              'desc'  => 'Speed, location, scope, proof, action — in that order.',
              'words' => '1,420 words',
              'time'  => '6 min',
            ),
            array(
              'cat'   => 'Reviews',
              'kicker'=> '03 / Trust',
              'title' => 'Asking for the review without sounding desperate.',
              'desc'  => 'A short script we give to service-business owners.',
              'words' => '980 words',
              'time'  => '4 min',
            ),
            array(
              'cat'   => 'Technical',
              'kicker'=> '04 / Schema',
              'title' => 'JSON-LD, in plain English, for service businesses.',
              'desc'  => 'What Google reads when nobody is looking.',
              'words' => '1,640 words',
              'time'  => '7 min',
            ),
          );
          foreach ( $articles as $a ) : ?>
            <article class="cn-snip">
              <span class="cn-snip__kicker mono"><?php echo esc_html( $a['kicker'] ); ?></span>
              <h4 class="cn-snip__title"><?php echo esc_html( $a['title'] ); ?></h4>
              <p class="cn-snip__desc"><?php echo esc_html( $a['desc'] ); ?></p>
              <div class="cn-snip__meta mono">
                <span><?php echo esc_html( $a['cat'] ); ?></span>
                <span class="cn-snip__dot"></span>
                <span><?php echo esc_html( $a['words'] ); ?></span>
                <span class="cn-snip__dot"></span>
                <span><?php echo esc_html( $a['time'] ); ?></span>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       PULL QUOTE
       ============================================================ -->
  <section class="cn-quote">
    <div class="lvm-container">
      <figure class="cn-quote__fig">
        <span class="cn-quote__mark serif" aria-hidden="true">"</span>
        <blockquote class="cn-quote__q">
          We write blog posts the way good local journalists do — answer the question,
          then earn the next click. <em class="serif">If a real homeowner doesn't want to read it, Google shouldn't either.</em>
        </blockquote>
        <figcaption class="cn-quote__cite mono">
          ↳ Editorial principle 01 / 06
        </figcaption>
      </figure>
    </div>
  </section>

  <!-- ============================================================
       ARTICLE TYPES — type specimen
       ============================================================ -->
  <section class="cn-types">
    <div class="lvm-container">
      <div class="cn-section-bar mono">
        <span class="cn-section-bar__num">02</span>
        <span class="cn-section-bar__rule"></span>
        <span class="cn-section-bar__lbl">Article types</span>
      </div>

      <div class="cn-section-head">
        <h2 class="section-h">Four kinds of articles,<br><em class="serif">one editorial standard.</em></h2>
        <p class="section-lead">Every article has a job in the funnel — visibility, trust, conversion, or retention. We pick the type for the job, not the trend.</p>
      </div>

      <div class="cn-types__grid">
        <?php
        $types = array(
          array(
            'num'   => 'A',
            'name'  => 'Service explainers',
            'lead'  => 'The "what is X" articles that introduce a service to first-time searchers.',
            'shape' => '1,200 — 1,800 words',
            'job'   => 'Visibility · Awareness',
            'ex'    => '"What does an HVAC tune-up actually include?"',
          ),
          array(
            'num'   => 'B',
            'name'  => 'Local angle pieces',
            'lead'  => 'Articles tied to your county, your weather, your code requirements — the stuff out-of-state competitors can\'t fake.',
            'shape' => '1,400 — 2,200 words',
            'job'   => 'Local SEO · Trust',
            'ex'    => '"Anne Arundel County permits, in plain English."',
            'featured' => true,
          ),
          array(
            'num'   => 'C',
            'name'  => 'Decision guides',
            'lead'  => 'Long-form, comparison-style content for the customer who is two clicks from picking up the phone.',
            'shape' => '1,800 — 2,600 words',
            'job'   => 'Consideration · Conversion',
            'ex'    => '"Repair vs replace: when does it actually pay off?"',
          ),
          array(
            'num'   => 'D',
            'name'  => 'Seasonal updates',
            'lead'  => 'Recurring articles tied to the calendar — spring tune-up windows, hurricane prep, holiday hours.',
            'shape' => '900 — 1,200 words',
            'job'   => 'Retention · Repeat traffic',
            'ex'    => '"Your March HVAC checklist for the Bay region."',
          ),
        );
        foreach ( $types as $t ) :
          $featured = ! empty( $t['featured'] );
          ?>
          <article class="cn-type<?php echo $featured ? ' cn-type--featured' : ''; ?>">
            <span class="cn-type__num serif"><?php echo esc_html( $t['num'] ); ?></span>
            <h3 class="cn-type__name"><?php echo esc_html( $t['name'] ); ?></h3>
            <p class="cn-type__lead"><?php echo esc_html( $t['lead'] ); ?></p>
            <dl class="cn-type__specs">
              <div><dt class="mono">shape</dt><dd><?php echo esc_html( $t['shape'] ); ?></dd></div>
              <div><dt class="mono">job</dt><dd><?php echo esc_html( $t['job'] ); ?></dd></div>
            </dl>
            <p class="cn-type__ex"><span class="mono">e.g. /</span> <em class="serif"><?php echo esc_html( $t['ex'] ); ?></em></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       EDITORIAL PROCESS
       ============================================================ -->
  <section class="cn-proc">
    <div class="lvm-container">
      <div class="cn-section-bar mono">
        <span class="cn-section-bar__num">03</span>
        <span class="cn-section-bar__rule"></span>
        <span class="cn-section-bar__lbl">Editorial process</span>
      </div>

      <div class="cn-section-head">
        <h2 class="section-h">From pitch<br><em class="serif">to indexed page.</em></h2>
        <p class="section-lead">A four-step monthly editorial rhythm. Owners get a calendar, drafts to review, and a published post — without the back-and-forth.</p>
      </div>

      <ol class="cn-proc__list">
        <?php
        $steps = array(
          array( 'P / 01', 'Pitch', 'We send 4 — 6 article ideas for the month, each tied to a service keyword and a real customer question. You approve, kill, or trade ideas.' ),
          array( 'P / 02', 'Outline', 'Selected pitches become outlines: H-tag structure, target keyword, intent match, internal link plan. You review before we write.' ),
          array( 'P / 03', 'Draft', 'A working draft in plain English with your voice and your service language — not generic AI slop. Light revision pass included.' ),
          array( 'P / 04', 'Publish', 'Schema, OG image, internal links, and meta — all set. Submitted to Search Console for fast indexation. Tracked in your monthly report.' ),
        );
        foreach ( $steps as $s ) : ?>
          <li class="cn-proc-item">
            <span class="cn-proc-item__tag mono"><?php echo esc_html( $s[0] ); ?></span>
            <h3 class="cn-proc-item__name"><?php echo esc_html( $s[1] ); ?></h3>
            <p class="cn-proc-item__desc"><?php echo esc_html( $s[2] ); ?></p>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free content plan</div>
      <h2 class="cta__h">Ready for blog content<br><em class="serif">that actually ranks?</em></h2>
      <p class="cta__p">Tell us your services and service area — we'll send back a 30-day content plan with topics, target keywords, and where they fit in your funnel.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get a free content plan <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
