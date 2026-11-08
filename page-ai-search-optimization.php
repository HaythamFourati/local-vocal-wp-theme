<?php
/**
 * Template Name: AI Search Optimization Service Page
 * Visual language: a live AI answer. Built on the homepage system (.lvh, src/home.css)
 * with the service-07 hover card grown into a page: gradient rim, chat bubbles,
 * streamed answers and cited sources. Page styles: src/ai-search.css; the engine
 * switcher: src/scripts/ai-search.js.
 */
get_header();

$arrow = '<svg class="lvh-arrow" viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>';
$spark = '<svg class="aip-spark" viewBox="0 0 24 24" aria-hidden="true"><path fill="url(#aip-g)" d="M12 2c.6 4.6 2.4 7.4 7.5 8.2v1.6C14.4 12.6 12.6 15.4 12 20h-.1c-.6-4.6-2.4-7.4-7.5-8.2v-1.6C9.5 9.4 11.3 6.6 11.9 2z"/></svg>';

// Streams a sentence word by word (--w); <mark> chunks stay whole
$stream = function ( array $chunks ) {
  $w   = 0;
  $out = '';
  foreach ( $chunks as $chunk ) {
    foreach ( 0 === strpos( $chunk, '<mark>' ) ? array( $chunk ) : explode( ' ', $chunk ) as $word ) {
      $out .= '<span style="--w:' . $w++ . '">' . $word . '</span> ';
    }
  }
  return $out;
};

// One AI answer card: [engine, question, answer chunks, sources]
$answer = function ( $a, $on = false ) use ( $spark, $stream ) {
  ob_start(); ?>
  <div class="aip-ans<?php echo $on ? ' is-on' : ''; ?>" data-engine="<?php echo esc_attr( $a[0] ); ?>">
    <p class="aip-ans__q"><?php echo esc_html( $a[1] ); ?></p>
    <div class="aip-ans__a">
      <span class="aip-ans__think"><?php echo $spark; ?>Searching reviews, listings and websites…</span>
      <p class="aip-ans__text"><?php echo $stream( $a[2] ); ?></p>
    </div>
    <div class="aip-ans__src">
      <?php foreach ( $a[3] as $i => $s ) : ?>
        <span style="--i:<?php echo (int) $i; ?>"><i class="aip-dot aip-dot--<?php echo (int) $i; ?>"></i><?php echo esc_html( $s ); ?></span>
      <?php endforeach; ?>
    </div>
  </div>
  <?php
  return ob_get_clean();
};

$answers = array(
  array( 'ChatGPT',     'Who\'s the best HVAC company near Annapolis?',        array( 'For heat pump installs near Annapolis, customers rate', '<mark>Your&nbsp;business</mark>', 'highest: 4.9★ from 184 reviews and same-week service across Anne Arundel County.' ), array( 'yourbusiness.com', 'Google reviews', 'Yelp' ) ),
  array( 'Gemini',      'Emergency plumber open now in Towson?',               array( '<mark>Your&nbsp;business</mark>', 'offers 24/7 emergency plumbing in Towson and Baltimore County, with upfront pricing and a 60-minute arrival window.' ), array( 'Google Business Profile', 'yourbusiness.com', 'BBB' ) ),
  array( 'Perplexity',  'Family dentist in Owings Mills that takes new patients?', array( 'Several practices are accepting patients. Reviewers single out', '<mark>Your&nbsp;business</mark>', 'for gentle care with kids and evening hours on weekdays.' ), array( 'Google reviews', 'yourbusiness.com', 'Healthgrades' ) ),
  array( 'AI Overviews','Best roofer in Columbia, MD for storm damage?',       array( 'For storm damage in Columbia, reviewers recommend', '<mark>Your&nbsp;business</mark>', 'for insurance-claim help and free inspections within 48 hours.' ), array( 'yourbusiness.com', 'Angi', 'Google reviews' ) ),
);
?>

<main class="service-page svc-ai">
  <svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs><linearGradient id="aip-g" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#FFB37A"/><stop offset=".5" stop-color="#C69CFF"/><stop offset="1" stop-color="#7DB4FF"/></linearGradient></defs></svg>

  <div class="lvh lvh--part">

    <!-- ============================================================
         HERO — copy + a live AI answer that cycles through engines
         ============================================================ -->
    <div class="lvh-hero aip-hero">
      <div class="lvh-stage">
        <canvas class="lvh-shader" data-shader="stage" aria-hidden="true"></canvas>
        <div class="lvh-stage__grid aip-hero__grid">
          <div class="lvh-hero__copy">
            <nav class="aip-crumb" aria-label="Breadcrumb">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span aria-hidden="true">/</span>
              <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Services</a><span aria-hidden="true">/</span>
              <span>AI Search Optimization</span>
            </nav>
            <span class="lvh-eyebrow lvh-eyebrow--live"><i></i>Service 07 · ChatGPT, Gemini, Perplexity &amp; AI Overviews</span>
            <h1 class="lvh-title lvh-title--hero">AI search optimization in Maryland: <span class="aip-grad">be the business AI recommends.</span></h1>
            <p class="lvh-deck">
              Your customers now ask ChatGPT, Google's AI Overviews, Gemini, and Perplexity who to call. Those answers are built from what the web says about you. We make sure your business facts, services, and reviews are clear enough for AI to find, trust, and name you.
            </p>
            <div class="lvh-actions">
              <a href="<?php echo esc_url( lvm_url( 'contact' ) ); ?>" class="lvh-btn lvh-btn--glow" data-lvm-intake><span>Get a free AI visibility check</span><span class="lvh-btn__icon"><?php echo $arrow; ?></span></a>
              <a href="#sources" class="lvh-btn lvh-btn--ghost">How AI picks businesses</a>
            </div>
            <ul class="lvh-meta">
              <li>4 AI engines tested</li>
              <li>20 real customer questions</li>
              <li>Re-tested every month</li>
            </ul>
          </div>

          <figure class="aip-chat" aria-label="Example AI answers recommending a local business">
            <div class="aip-chat__in">
              <div class="aip-chat__top">
                <?php echo $spark; ?><strong>AI answer</strong>
                <span class="aip-tabs" role="group" aria-label="AI engine">
                  <?php foreach ( $answers as $i => $a ) : ?>
                    <button type="button" class="aip-tab<?php echo 0 === $i ? ' is-on' : ''; ?>" data-i="<?php echo (int) $i; ?>" aria-pressed="<?php echo 0 === $i ? 'true' : 'false'; ?>"><?php echo esc_html( $a[0] ); ?></button>
                  <?php endforeach; ?>
                </span>
              </div>
              <div class="aip-chat__body">
                <?php foreach ( $answers as $i => $a ) { echo $answer( $a, 0 === $i ); } ?>
              </div>
              <figcaption class="aip-chat__cap">Example answers. "Your business" is where your name should appear.</figcaption>
            </div>
          </figure>
        </div>
      </div>
    </div>

    <!-- ============================================================
         SOURCES — what AI answers are built from, as citations
         ============================================================ -->
    <div class="lvh-sec aip-sec" id="sources">
      <div class="lvh-wrap">
        <header class="lvh-head lvh-head--row">
          <div>
            <span class="lvh-eyebrow">Where AI answers come from</span>
            <h2 class="lvh-title">Four sources, <span class="lvh-dim">one consistent story.</span></h2>
          </div>
          <p class="lvh-deck">AI assistants don't rank pages the way Google's ten blue links do. They piece an answer together from sources they trust and recommend the businesses those sources agree on. When the sources disagree, or say nothing, you get left out.</p>
        </header>

        <ol class="aip-cites">
          <?php
          // [title, what it is, what AI reads from it]
          $sources = array(
            array( 'Your website',            'Clear service pages, structured data (schema), an llms.txt brief, and direct answers to the questions customers ask.',                         'Services · service area · hours · FAQs' ),
            array( 'Google Business Profile', 'Categories, services, hours, and photos. Google\'s own AI leans on it heavily for local answers.',                                           'Category · open now · location' ),
            array( 'Reviews',                 'What customers write, and how often, tells AI what you are known for. Reviews that name the service and town carry the most weight.',     '"Fixed our heat pump in Arnold…"' ),
            array( 'Listings and mentions',   'Directories, local press, and partner sites with the same name, address, and phone. Consistency is what makes AI confident enough to name you.', 'Same name · address · phone' ),
          );
          foreach ( $sources as $i => $s ) : ?>
            <li class="aip-cite">
              <span class="aip-cite__n">[<?php echo $i + 1; ?>]</span>
              <h3 class="aip-cite__h"><?php echo esc_html( $s[0] ); ?></h3>
              <p class="aip-cite__p"><?php echo esc_html( $s[1] ); ?></p>
              <span class="aip-cite__reads"><?php echo $spark; ?>AI reads: <?php echo esc_html( $s[2] ); ?></span>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>

    <!-- ============================================================
         BEFORE / AFTER — the same question, before and after the work
         ============================================================ -->
    <div class="lvh-sec aip-sec">
      <div class="lvh-wrap">
        <header class="lvh-head">
          <span class="lvh-eyebrow">The difference</span>
          <h2 class="lvh-title">Same question. <span class="lvh-dim">Different answer.</span></h2>
          <p class="lvh-deck">Most Maryland service businesses are invisible or misdescribed in AI answers: wrong hours, an old phone number, or a competitor named instead. The work is making what's already true about your business easy for machines to read and verify.</p>
        </header>

        <div class="aip-vs">
          <figure class="aip-card aip-card--before">
            <span class="aip-card__tag">Before</span>
            <p class="aip-card__q">Who should I call for AC repair in Glen Burnie?</p>
            <p class="aip-card__a">I'd suggest <b>Bay Area Heating &amp; Cooling</b>, which has strong reviews in Anne Arundel County. I couldn't confirm hours or service areas for other local companies.</p>
            <ul class="aip-card__list">
              <li>Business facts differ from site to site</li>
              <li>Services buried in vague page copy</li>
              <li>No structured data for machines to read</li>
            </ul>
          </figure>
          <figure class="aip-card aip-card--after">
            <span class="aip-card__tag"><?php echo $spark; ?>After</span>
            <p class="aip-card__q">Who should I call for AC repair in Glen Burnie?</p>
            <p class="aip-card__a"><mark>Your business</mark> is a strong choice: same-day AC repair in Glen Burnie and Pasadena, open until 8pm, 4.9★ from 184 reviews.</p>
            <ul class="aip-card__list">
              <li>One set of facts, everywhere</li>
              <li>A clear page for every service and town</li>
              <li>Schema and an llms.txt brief AI can read</li>
            </ul>
          </figure>
        </div>
      </div>
    </div>

    <!-- ============================================================
         PROCESS — a loop: test, fix, write, re-test
         ============================================================ -->
    <div class="lvh-sec aip-sec">
      <div class="lvh-wrap">
        <header class="lvh-head lvh-head--row">
          <div>
            <span class="lvh-eyebrow">The first 12 weeks</span>
            <h2 class="lvh-title">Test, fix, <span class="lvh-dim">test again.</span></h2>
          </div>
          <p class="lvh-deck">AI search optimization builds on solid local SEO; it doesn't replace it. And AI answers change as the web changes, so the work runs as a loop with a monthly re-test.</p>
        </header>

        <ol class="aip-steps">
          <?php
          $steps = array(
            array( 'Weeks 1–2',  'Baseline AI test',         'We ask ChatGPT, Gemini, Perplexity, and Google\'s AI the 20 questions your customers ask, and record who gets named.' ),
            array( 'Weeks 2–5',  'Fix the facts',            'Schema for your business, services, and FAQs, an llms.txt brief, and the same name, address, and phone everywhere.' ),
            array( 'Weeks 4–8',  'Answer-first pages',       'Service and town pages that answer questions directly, the way AI quotes them. Plus a review plan.' ),
            array( 'Every month', 'Re-test and report',      'The same questions, asked again. You see what changed, who is named now, and what we fix next.' ),
          );
          foreach ( $steps as $i => $s ) : ?>
            <li class="aip-step">
              <span class="aip-step__n"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
              <div>
                <span class="aip-step__when"><?php echo esc_html( $s[0] ); ?></span>
                <h3 class="aip-step__h"><?php echo esc_html( $s[1] ); ?></h3>
                <p class="aip-step__p"><?php echo esc_html( $s[2] ); ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>

    <!-- ============================================================
         WHAT YOU GET
         ============================================================ -->
    <div class="lvh-sec aip-sec">
      <div class="lvh-wrap">
        <header class="lvh-head">
          <span class="lvh-eyebrow">What you get</span>
          <h2 class="lvh-title">A clear report, <span class="lvh-dim">not a black box.</span></h2>
        </header>
        <div class="aip-stats">
          <?php
          $tiles = array(
            array( '4',   'AI engines tested',    'ChatGPT · Gemini · Perplexity · Google' ),
            array( '20',  'Customer questions',   'Your services × the towns you serve' ),
            array( '1',   'Prioritized fix list', 'Plain English, biggest wins first' ),
            array( '30d', 'Re-test cycle',        'See what changed, month by month' ),
          );
          foreach ( $tiles as $t ) : ?>
            <div class="aip-stat">
              <span class="aip-stat__v"><?php echo esc_html( $t[0] ); ?></span>
              <h3 class="aip-stat__h"><?php echo esc_html( $t[1] ); ?></h3>
              <p class="aip-stat__p"><?php echo esc_html( $t[2] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>

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
