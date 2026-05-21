<?php
/**
 * Template Name: Social Media Management Service Page
 * Visual language: social feed
 */
get_header(); ?>

<main class="service-page svc-sm">

  <!-- ============================================================
       HERO — with floating phone-feed preview
       ============================================================ -->
  <section class="sm-hero">
    <div class="sm-hero__grid" aria-hidden="true"></div>
    <div class="lvm-container sm-hero__inner">

      <div class="sm-hero__copy">
        <div class="page-hero__crumb mono">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
          <span class="page-hero__crumb-sep">/</span>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
          <span class="page-hero__crumb-sep">/</span>
          <span>Social Media</span>
        </div>
        <div class="eyebrow"><span class="eyebrow__num mono">S/04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · Social Media</span></div>
        <h1 class="sm-hero__h">Stay visible<br><em class="serif">without going viral.</em></h1>
        <p class="sm-hero__sub">
          Consistent, on-brand posting that keeps your business top-of-mind for local customers — service updates, blog promotion, seasonal content, and community moments. We're not chasing trends. We're building a steady local presence.
        </p>
        <div class="sm-hero__ctas">
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free social audit <span aria-hidden="true">→</span></a>
          <a href="#calendar" class="btn btn--ghost btn--lg">See a sample calendar <span aria-hidden="true">↓</span></a>
        </div>
      </div>

      <aside class="sm-phone" aria-label="Sample social feed preview">
        <div class="sm-phone__device">
          <div class="sm-phone__notch" aria-hidden="true"></div>
          <div class="sm-phone__screen">
            <div class="sm-phone__bar mono">
              <span>9:41</span>
              <span class="sm-phone__bar-r">●●●●○</span>
            </div>
            <div class="sm-phone__profile">
              <div class="sm-phone__avatar" aria-hidden="true">TH</div>
              <div class="sm-phone__profile-l">
                <span class="sm-phone__handle">tidewater_hvac</span>
                <span class="sm-phone__loc mono">Annapolis, MD · Sponsored ⌄</span>
              </div>
              <button class="sm-phone__more" aria-hidden="true">⋯</button>
            </div>

            <div class="sm-phone__post" aria-hidden="true">
              <div class="sm-phone__post-art">
                <span class="sm-phone__post-folio mono">POST 01 / SERVICE</span>
                <span class="sm-phone__post-h serif">Beat the<br>March rush.</span>
                <span class="sm-phone__post-foot mono">$89 spring tune-up · book by Mar 31</span>
              </div>
            </div>

            <div class="sm-phone__actions">
              <span aria-hidden="true">♡</span>
              <span aria-hidden="true">💬</span>
              <span aria-hidden="true"><svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg></span>
              <span class="sm-phone__actions-spacer"></span>
              <span aria-hidden="true">⌑</span>
            </div>

            <div class="sm-phone__caption">
              <strong>tidewater_hvac</strong>
              <span>Spring is calling. Beat the March rush — schedule your tune-up now and we'll be there before the season turns.</span>
              <span class="sm-phone__hashtags mono">#annapolismd · #hvacrepair · #marylandlocal</span>
            </div>

            <div class="sm-phone__stats mono">
              <span>184 likes</span>
              <span class="sm-phone__stats-dot"></span>
              <span>22 comments</span>
              <span class="sm-phone__stats-dot"></span>
              <span>3h ago</span>
            </div>
          </div>
        </div>
      </aside>

    </div>
  </section>

  <!-- ============================================================
       PLATFORMS WE MANAGE
       ============================================================ -->
  <section class="sm-plats">
    <div class="lvm-container">
      <div class="sm-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Platforms we manage</span></div>
        <h2 class="section-h">The four channels that earn<br><em class="serif">local visibility.</em></h2>
        <p class="section-lead">For service businesses, four platforms do the heavy lifting. We manage them as one coordinated voice, not four parallel campaigns.</p>
      </div>

      <div class="sm-plats__grid">
        <?php
        $platforms = array(
          array( 'F',  'Facebook',          'Local discovery, community posts, and event reach. Still where most Maryland homeowners 35+ live online.', '+38%', 'page reach' ),
          array( 'IG', 'Instagram',         'Visual storytelling, reels, and behind-the-scenes. Builds trust faster than any other channel.', '+62%', 'profile visits', true ),
          array( 'in', 'LinkedIn',          'B2B reach, partnership posts, and credibility for owners selling into commercial accounts.', '+24%', 'impressions' ),
          array( 'G',  'Google Business',   'Map pack visibility, photo updates, posts, and Q&A — the social platform Google actually ranks.', '+184%', 'discovery searches' ),
        );
        foreach ( $platforms as $p ) :
          $featured = isset( $p[5] ) && $p[5];
          ?>
          <article class="sm-plat<?php echo $featured ? ' sm-plat--featured' : ''; ?>">
            <div class="sm-plat__head">
              <span class="sm-plat__icon mono"><?php echo esc_html( $p[0] ); ?></span>
              <span class="sm-plat__live mono"><span class="sm-plat__live-dot"></span> active</span>
            </div>
            <h3 class="sm-plat__name"><?php echo esc_html( $p[1] ); ?></h3>
            <p class="sm-plat__desc"><?php echo esc_html( $p[2] ); ?></p>
            <div class="sm-plat__metric">
              <span class="sm-plat__metric-val"><?php echo esc_html( $p[3] ); ?></span>
              <span class="sm-plat__metric-lbl mono"><?php echo esc_html( $p[4] ); ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CONTENT FEED — sample post grid
       ============================================================ -->
  <section class="sm-feed">
    <div class="lvm-container">
      <div class="sm-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Content types</span></div>
        <h2 class="section-h">Six post types,<br><em class="serif">on rotation every month.</em></h2>
        <p class="section-lead">A planned mix — service highlights, customer wins, behind-the-scenes, education, seasonal moments, and the occasional human touch. Predictable cadence, not random output.</p>
      </div>

      <div class="sm-feed__grid">
        <?php
        // [ tag, color, category, caption, likes, comments, headline, foot-line, unsplash_photo_id, alt ]
        $posts = array(
          array( 'service',   '#FF6B4A', 'Service spotlight', 'Beat the March rush — $89 spring tune-up.',                    '184', '22', "Beat the\nMarch rush.",                       '$89 spring tune-up · book by Mar 31',   'photo-1561400555-786780284b67', 'HVAC technician at work' ),
          array( 'review',    '#4A90FF', 'Customer review',   '"They came out the same day and fixed it under warranty."',    '92',  '8',  '"Same day.\nFixed under\nwarranty."',         '★★★★★ · Maria H. · Annapolis',          'photo-1521790797524-b2497295b8a0', 'Two people shaking hands' ),
          array( 'bts',       '#7AC74F', 'Behind the scenes', 'Truck #04 ready for the day. New techs, same standards.',     '76',  '14', "Truck&nbsp;#04,\nready.",                     'Crew of 3 · 6:42 am roll-out',          'photo-1574757974346-45bae947d89a', 'Work truck loaded up' ),
          array( 'edu',       '#A067E5', 'Education',         '5 signs your AC is about to give up before summer.',           '218', '34', "5 signs your\nAC&rsquo;s done.",              'Save before May · 4-min read',          'photo-1650682009477-52fd77302b78', 'Thermostat on the wall' ),
          array( 'seasonal',  '#F5A623', 'Seasonal',          'First frost just hit Annapolis. Heat-pump checklist inside.',  '142', '19', "First frost.\nLet&rsquo;s talk\nheat pumps.", 'Checklist inside · Annapolis, MD',      'photo-1634282215801-00c6f4ce0d32', 'Frost on autumn leaves' ),
          array( 'community', '#E5478B', 'Community',         'Proud sponsors of the Severna Park Little League this season.','267', '41', "Go Severna\nPark.",                            'Proud sponsors · 2026 season',          'photo-1778293881330-4985b5f42142', 'Youth baseball game' ),
        );
        foreach ( $posts as $i => $p ) :
          $img_url = 'https://images.unsplash.com/' . $p[8] . '?w=720&h=720&fit=crop&crop=entropy&q=80&auto=format';
        ?>
          <article class="sm-card">
            <div class="sm-card__art" style="--col: <?php echo esc_attr( $p[1] ); ?>;">

              <img
                class="sm-card__img"
                src="<?php echo esc_url( $img_url ); ?>"
                alt="<?php echo esc_attr( $p[9] ); ?>"
                loading="lazy"
                decoding="async"
                width="720" height="720"
              >

              <span class="sm-card__folio mono">POST <?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?> / <?php echo esc_html( strtoupper( $p[0] ) ); ?></span>

              <span class="sm-card__head serif"><?php echo nl2br( $p[6] ); ?></span>

              <span class="sm-card__foot mono"><?php echo esc_html( $p[7] ); ?></span>

              <span class="sm-card__stamp mono" aria-hidden="true">
                <span>LV</span>
                <span class="sm-card__stamp-rule"></span>
                <span>tidewater_hvac</span>
              </span>

              <span class="sm-card__tag mono"><?php echo esc_html( $p[0] ); ?></span>
            </div>
            <div class="sm-card__body">
              <span class="sm-card__cat mono"><?php echo esc_html( $p[2] ); ?></span>
              <p class="sm-card__cap"><?php echo esc_html( $p[3] ); ?></p>
              <div class="sm-card__stats mono">
                <span>♡ <?php echo esc_html( $p[4] ); ?></span>
                <span>💬 <?php echo esc_html( $p[5] ); ?></span>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       POSTING CALENDAR
       ============================================================ -->
  <section class="sm-cal" id="calendar">
    <div class="lvm-container">
      <div class="sm-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Sample monthly calendar</span></div>
        <h2 class="section-h">A predictable rhythm,<br><em class="serif">not a content panic.</em></h2>
        <p class="section-lead">12 — 16 posts per month across platforms. Planned a month ahead, approved before they go live, scheduled in advance.</p>
      </div>

      <div class="sm-cal__board">
        <div class="sm-cal__head mono">
          <span>↻ March 2025 · Tidewater HVAC</span>
          <span>14 posts scheduled · 12 published</span>
        </div>

        <div class="sm-cal__weekdays mono">
          <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
        </div>

        <div class="sm-cal__grid">
          <?php
          // 4 weeks × 7 days = 28 cells
          $days = array(
            array( '24', null,         null ),
            array( '25', 'edu',        '#A067E5' ),
            array( '26', null,         null ),
            array( '27', 'service',    '#FF6B4A' ),
            array( '28', null,         null ),
            array( '01', 'community',  '#E5478B' ),
            array( '02', null,         null ),

            array( '03', 'review',     '#4A90FF' ),
            array( '04', null,         null ),
            array( '05', 'bts',        '#7AC74F' ),
            array( '06', 'edu',        '#A067E5' ),
            array( '07', null,         null ),
            array( '08', 'seasonal',   '#F5A623' ),
            array( '09', null,         null ),

            array( '10', null,         null ),
            array( '11', 'service',    '#FF6B4A' ),
            array( '12', null,         null ),
            array( '13', 'review',     '#4A90FF' ),
            array( '14', 'community',  '#E5478B' ),
            array( '15', null,         null ),
            array( '16', null,         null ),

            array( '17', 'edu',        '#A067E5' ),
            array( '18', null,         null ),
            array( '19', 'service',    '#FF6B4A' ),
            array( '20', 'bts',        '#7AC74F' ),
            array( '21', null,         null ),
            array( '22', 'seasonal',   '#F5A623' ),
            array( '23', null,         null ),
          );
          foreach ( $days as $d ) :
            $has  = (bool) $d[1];
            $cur  = ( $d[0] === '12' ); // current day demo
            ?>
            <div class="sm-cal__day<?php echo $has ? ' sm-cal__day--has' : ''; ?><?php echo $cur ? ' sm-cal__day--today' : ''; ?>">
              <span class="sm-cal__num mono"><?php echo esc_html( $d[0] ); ?></span>
              <?php if ( $has ) : ?>
                <span class="sm-cal__chip" style="--col: <?php echo esc_attr( $d[2] ); ?>;">
                  <span class="sm-cal__chip-dot"></span>
                  <span class="sm-cal__chip-lbl mono"><?php echo esc_html( $d[1] ); ?></span>
                </span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="sm-cal__legend mono">
          <span><span class="sm-cal__sw" style="--col: #FF6B4A;"></span> Service</span>
          <span><span class="sm-cal__sw" style="--col: #4A90FF;"></span> Review</span>
          <span><span class="sm-cal__sw" style="--col: #7AC74F;"></span> BTS</span>
          <span><span class="sm-cal__sw" style="--col: #A067E5;"></span> Education</span>
          <span><span class="sm-cal__sw" style="--col: #F5A623;"></span> Seasonal</span>
          <span><span class="sm-cal__sw" style="--col: #E5478B;"></span> Community</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHAT YOU GET
       ============================================================ -->
  <section class="sm-deliv">
    <div class="lvm-container">
      <div class="sm-section-head">
        <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">What you get</span></div>
        <h2 class="section-h">Done for you,<br><em class="serif">approved by you.</em></h2>
      </div>

      <div class="sm-deliv__grid">
        <?php
        $delivs = array(
          array( '01', 'Monthly content plan',     'A 4-week calendar with post types, captions, hashtags, and platform targets — sent for approval before anything ships.' ),
          array( '02', 'Original creative',        'Photo pulls, branded graphics, and short-form video edits — designed in your color and tone, not stock-template slop.' ),
          array( '03', 'Scheduled posting',        'Everything queued through Meta Business Suite and Google Business — published at the times your audience is actually online.' ),
          array( '04', 'Community management',     'Comment replies, DMs, and review responses handled within one business day. We escalate anything that needs the owner.' ),
          array( '05', 'Monthly performance recap','One-page report: reach, engagement, top posts, what changed, what we are trying next.' ),
          array( '06', 'Quarterly strategy call',  '30 minutes every quarter to review what is working, recalibrate the post mix, and plan around upcoming seasons.' ),
        );
        foreach ( $delivs as $d ) : ?>
          <article class="sm-deliv-card">
            <span class="sm-deliv-card__num mono"><?php echo esc_html( $d[0] ); ?></span>
            <h3 class="sm-deliv-card__name"><?php echo esc_html( $d[1] ); ?></h3>
            <p class="sm-deliv-card__desc"><?php echo esc_html( $d[2] ); ?></p>
          </article>
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
      <div class="cta__eyebrow mono">↳ Free social audit</div>
      <h2 class="cta__h">Ready to boost<br><em class="serif">your social presence?</em></h2>
      <p class="cta__p">Let's create a social media strategy that connects with your audience and drives real local visibility.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Get started today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
