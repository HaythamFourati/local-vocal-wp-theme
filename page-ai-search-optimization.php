<?php
/**
 * Template Name: AI Search Optimization Service Page
 * Visual language: AI visibility check (reuses the Digital Marketing brief components, .svc-dm)
 */
get_header(); ?>

<main class="service-page svc-dm svc-ai">

  <!-- ============================================================
       MASTHEAD — sample AI visibility check
       ============================================================ -->
  <section class="dm-brief">
    <div class="lvm-container">

      <div class="dm-brief__topline mono">
        <span><strong>AI VISIBILITY CHECK</strong></span>
        <span class="dm-brief__topline-rule"></span>
        <span>ChatGPT · Gemini · Perplexity · AI Overviews</span>
        <span class="dm-brief__topline-rule"></span>
        <span class="dm-brief__stamp">NEW ⨯</span>
      </div>

      <div class="page-hero__crumb mono dm-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>AI Search Optimization</span>
      </div>

      <div class="dm-brief__grid">

        <div class="dm-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">S/07</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · AI Search Optimization</span></div>
          <h1 class="dm-brief__h">AI search optimization in Maryland:<br><em class="serif">be the business AI recommends.</em></h1>
          <p class="dm-brief__sub">
            Your customers now ask ChatGPT, Google's AI Overviews, Gemini, and Perplexity who to call. Those answers are built from what the web says about you. We make sure your business facts, services, and reviews are clear enough for AI to find, trust, and name you.
          </p>
          <div class="dm-brief__ctas">
            <a href="<?php echo esc_url( lvm_url( 'contact' ) ); ?>" class="btn btn--primary btn--lg" data-lvm-intake>Get a free AI visibility check <span aria-hidden="true">→</span></a>
            <a href="#sources" class="btn btn--ghost btn--lg">How AI picks businesses <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="dm-brief__doc" aria-label="Sample AI visibility check">
          <header class="dm-brief__doc-head">
            <span class="dm-brief__doc-folio mono">SAMPLE CHECK · HVAC</span>
            <span class="dm-brief__doc-client mono">Annapolis, MD</span>
          </header>
          <dl class="dm-brief__doc-list mono">
            <div><dt>Question</dt><dd>"Who installs heat pumps near Annapolis?"</dd></div>
            <div><dt>Engines</dt><dd>ChatGPT · Gemini · Perplexity · Google</dd></div>
            <div><dt>Named?</dt><dd>1 of 4 answers</dd></div>
            <div><dt>Business facts</dt><dd>Hours and phone differ across sites</dd></div>
            <div><dt>Schema</dt><dd>Missing services and service area</dd></div>
            <div><dt>Reviews</dt><dd>Too few that mention the service</dd></div>
            <div class="dm-brief__doc-list-last"><dt>Next step</dt><dd>Fix list, then re-test in 30 days</dd></div>
          </dl>
          <footer class="dm-brief__doc-foot mono">
            <span class="dm-brief__doc-sig">↳ example report, not a client</span>
            <span class="dm-brief__doc-stamp">v.01</span>
          </footer>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       SOURCES — what AI answers are built from
       ============================================================ -->
  <section class="dm-mix" id="sources">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 01</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">Where AI answers come from</span>
        </div>
        <h2 class="section-h">Four sources,<br><em class="serif">one consistent story.</em></h2>
        <p class="section-lead">AI assistants don't rank pages the way Google's ten blue links do. They piece together an answer from sources they trust and recommend the businesses those sources agree on. When the sources disagree, or say nothing, you get left out.</p>
      </div>

      <div class="dm-mix__board">
        <div class="dm-mix__cards">
          <?php
          $sources = array(
            array( 'WEB', '01', 'Your website',              'Clear service pages, structured data (schema), an llms.txt brief, and direct answers to the questions customers ask.', '#FF6B4A' ),
            array( 'GBP', '02', 'Google Business Profile',   'Categories, services, hours, and photos. Google\'s own AI leans on it heavily for local answers.', '#4A90FF' ),
            array( 'REV', '03', 'Reviews',                   'What customers write, and how often, tells AI what you are known for. Reviews that name the service and town carry the most weight.', '#7AC74F' ),
            array( 'CIT', '04', 'Listings and mentions',     'Directories, local press, and partner sites with the same name, address, and phone. Consistency is what makes AI confident enough to name you.', '#A067E5' ),
          );
          foreach ( $sources as $c ) : ?>
            <article class="dm-mix-card" style="--col: <?php echo esc_attr( $c[4] ); ?>;">
              <header class="dm-mix-card__h">
                <span class="dm-mix-card__sw" aria-hidden="true"></span>
                <span class="dm-mix-card__tag mono"><?php echo esc_html( $c[0] ); ?></span>
                <span class="dm-mix-card__pct mono"><?php echo esc_html( $c[1] ); ?></span>
              </header>
              <h3 class="dm-mix-card__name"><?php echo esc_html( $c[2] ); ?></h3>
              <p class="dm-mix-card__desc"><?php echo esc_html( $c[3] ); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROBLEM / APPROACH / OUTCOME
       ============================================================ -->
  <section class="dm-strat">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 02</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">How we approach it</span>
        </div>
        <h2 class="section-h">Problem,<br><em class="serif">approach, outcome.</em></h2>
        <p class="section-lead">AI search optimization builds on solid local SEO. It doesn't replace it. Most of the work is making what's already true about your business easy for machines to read and verify.</p>
      </div>

      <div class="dm-strat__cols">
        <article class="dm-strat-col">
          <span class="dm-strat-col__num mono">A</span>
          <h3 class="dm-strat-col__h">Problem</h3>
          <p class="dm-strat-col__p">Most Maryland service businesses are <strong>invisible or misdescribed</strong> in AI answers: wrong hours, an old phone number, or a competitor named instead.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">×</span> Business facts differ from site to site</li>
            <li><span aria-hidden="true">×</span> Services buried in vague page copy</li>
            <li><span aria-hidden="true">×</span> No structured data for machines to read</li>
          </ul>
        </article>

        <article class="dm-strat-col dm-strat-col--featured">
          <span class="dm-strat-col__num mono">B</span>
          <h3 class="dm-strat-col__h">Approach</h3>
          <p class="dm-strat-col__p">We ask the AI engines the questions your customers ask, record who gets named, then fix the <em class="serif">sources</em> behind those answers, starting with your own website.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">+</span> Schema for your business, services, and FAQs</li>
            <li><span aria-hidden="true">+</span> An llms.txt brief and answer-first page copy</li>
            <li><span aria-hidden="true">+</span> Consistent listings and a review plan</li>
          </ul>
        </article>

        <article class="dm-strat-col">
          <span class="dm-strat-col__num mono">C</span>
          <h3 class="dm-strat-col__h">Outcome</h3>
          <p class="dm-strat-col__p">AI assistants describe your business correctly and name you more often for the services and towns you want, alongside stronger regular Google rankings.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">→</span> Accurate facts in every AI answer</li>
            <li><span aria-hidden="true">→</span> Named for your key services and towns</li>
            <li><span aria-hidden="true">→</span> Better Google results along the way</li>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       TIMELINE — first 12 weeks
       ============================================================ -->
  <section class="dm-time">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 03</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">The first 12 weeks</span>
        </div>
        <h2 class="section-h">Test, fix,<br><em class="serif">test again.</em></h2>
        <p class="section-lead">AI answers update as the web changes, so this works as a loop: a baseline test, a round of fixes, and a monthly re-test to see what moved.</p>
      </div>

      <div class="dm-gantt">
        <div class="dm-gantt__head mono">
          <span class="dm-gantt__head-spacer"></span>
          <span>Month 01</span>
          <span>Month 02</span>
          <span>Month 03</span>
        </div>

        <div class="dm-gantt__rows">
          <?php
          // each row: name, start week (1-12), span weeks, color key
          $rows = array(
            array( 'Baseline AI test',        1, 2, 'rep'  ),
            array( 'Business facts cleanup',  2, 3, 'seo'  ),
            array( 'Schema + llms.txt',       2, 3, 'seo'  ),
            array( 'Answer-first page copy',  4, 5, 'cnt'  ),
            array( 'GBP + review plan',       3, 10, 'soc' ),
            array( 'Monthly re-test',         5, 8, 'rep'  ),
          );
          foreach ( $rows as $r ) :
            $start = max( 1, min( 12, (int) $r[1] ) );
            $span  = max( 1, min( 13 - $start, (int) $r[2] ) );
            ?>
            <div class="dm-gantt__row">
              <span class="dm-gantt__row-name"><?php echo esc_html( $r[0] ); ?></span>
              <div class="dm-gantt__track">
                <span class="dm-gantt__bar dm-gantt__bar--<?php echo esc_attr( $r[3] ); ?>"
                      style="--start: <?php echo $start; ?>; --span: <?php echo $span; ?>;">
                  <span class="dm-gantt__bar-w mono">w<?php echo $start; ?> — w<?php echo $start + $span - 1; ?></span>
                </span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="dm-gantt__legend mono">
          <span><span class="dm-gantt__sw dm-gantt__sw--rep"></span> Testing</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--seo"></span> Technical</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--cnt"></span> Content</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--soc"></span> Profile &amp; reviews</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHAT YOU GET
       ============================================================ -->
  <section class="dm-kpi">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 04</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">What you get</span>
        </div>
        <h2 class="section-h">A clear report,<br><em class="serif">not a black box.</em></h2>
      </div>

      <div class="dm-kpi__grid">
        <?php
        $tiles = array(
          array( '4',    'AI engines tested',       'ChatGPT · Gemini · Perplexity · Google' ),
          array( '20',   'Customer questions',      'Your services × the towns you serve' ),
          array( '1',    'Prioritized fix list',    'Plain English, biggest wins first' ),
          array( '30d',  'Re-test cycle',           'See what changed, month by month' ),
        );
        foreach ( $tiles as $k ) : ?>
          <div class="dm-kpi-tile">
            <span class="dm-kpi-tile__val"><?php echo esc_html( $k[0] ); ?></span>
            <h3 class="dm-kpi-tile__name"><?php echo esc_html( $k[1] ); ?></h3>
            <p class="dm-kpi-tile__desc mono"><?php echo esc_html( $k[2] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/faq' ); // visible FAQs = FAQPage schema (inc/seo-data.php) ?>

  <?php
  get_template_part( 'template-parts/cta', null, array(
    'eyebrow' => 'Free AI visibility check',
    'lead'    => 'Find out what AI',
    'tail'    => 'says about you.',
    'deck'    => 'We\'ll ask ChatGPT, Gemini, Perplexity, and Google the questions your customers ask, show you who gets named, and list the fixes that would put you in the answer.',
  ) );
  ?>

</main>

<?php get_footer();
