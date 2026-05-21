<?php
/**
 * Template Name: Digital Marketing Service Page
 * Visual language: campaign brief / strategy document
 */
get_header(); ?>

<main class="service-page svc-dm">

  <!-- ============================================================
       BRIEF MASTHEAD
       ============================================================ -->
  <section class="dm-brief">
    <div class="lvm-container">

      <div class="dm-brief__topline mono">
        <span><strong>CAMPAIGN BRIEF</strong></span>
        <span class="dm-brief__topline-rule"></span>
        <span>Doc · DM-25-04</span>
        <span class="dm-brief__topline-rule"></span>
        <span>Confidential / Internal</span>
        <span class="dm-brief__topline-rule"></span>
        <span class="dm-brief__stamp">APPROVED ⨯</span>
      </div>

      <div class="page-hero__crumb mono dm-brief__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Digital Marketing</span>
      </div>

      <div class="dm-brief__grid">

        <div class="dm-brief__copy">
          <div class="eyebrow"><span class="eyebrow__num mono">S/06</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Service · Digital Marketing</span></div>
          <h1 class="dm-brief__h">One coordinated plan,<br><em class="serif">not three vendors guessing.</em></h1>
          <p class="dm-brief__sub">
            A focused mix of SEO, social, content, and paid — tied to one set of business outcomes. We write the brief, run the channels, and report on the only thing that matters: did the phone ring more this quarter than last.
          </p>
          <div class="dm-brief__ctas">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Request a free strategy call <span aria-hidden="true">→</span></a>
            <a href="#mix" class="btn btn--ghost btn--lg">View channel mix <span aria-hidden="true">↓</span></a>
          </div>
        </div>

        <aside class="dm-brief__doc" aria-label="Sample campaign brief">
          <header class="dm-brief__doc-head">
            <span class="dm-brief__doc-folio mono">DM-25-04 · Q3 BRIEF</span>
            <span class="dm-brief__doc-client mono">Tidewater HVAC</span>
          </header>
          <dl class="dm-brief__doc-list mono">
            <div><dt>Client</dt><dd>Tidewater HVAC, Annapolis MD</dd></div>
            <div><dt>Period</dt><dd>Jul 01 — Sep 30 · 90 days</dd></div>
            <div><dt>Goal</dt><dd>+30% qualified phone calls</dd></div>
            <div><dt>Audience</dt><dd>Homeowners, Anne Arundel Co.</dd></div>
            <div><dt>Budget</dt><dd>$ — split 60/25/15</dd></div>
            <div><dt>Channels</dt><dd>SEO · Content · Social · GBP</dd></div>
            <div class="dm-brief__doc-list-last"><dt>Owner</dt><dd>haytham@localvocal</dd></div>
          </dl>
          <footer class="dm-brief__doc-foot mono">
            <span class="dm-brief__doc-sig">↳ signed off · 06.28</span>
            <span class="dm-brief__doc-stamp">v.04</span>
          </footer>
        </aside>

      </div>
    </div>
  </section>

  <!-- ============================================================
       CHANNEL MIX — budget allocation bar + chips
       ============================================================ -->
  <section class="dm-mix" id="mix">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 01</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">The channel mix</span>
        </div>
        <h2 class="section-h">Four channels,<br><em class="serif">one set of outcomes.</em></h2>
        <p class="section-lead">For service businesses, this is the mix that compounds. SEO and content build the asset. Social and GBP keep it visible. Paid sharpens the spike when you need one.</p>
      </div>

      <div class="dm-mix__board">

        <div class="dm-mix__bar" aria-hidden="true">
          <span class="dm-mix__bar-seg dm-mix__bar-seg--seo"  style="width:42%"></span>
          <span class="dm-mix__bar-seg dm-mix__bar-seg--cnt"  style="width:24%"></span>
          <span class="dm-mix__bar-seg dm-mix__bar-seg--soc"  style="width:18%"></span>
          <span class="dm-mix__bar-seg dm-mix__bar-seg--paid" style="width:16%"></span>
        </div>

        <div class="dm-mix__cards">
          <?php
          $channels = array(
            array( 'SEO',     '42', 'Local SEO',           'On-page, technical, citations, schema, GBP — the slow asset that compounds for years.', '#FF6B4A' ),
            array( 'CNT',     '24', 'Content',             'Service-page rewrites and 4 — 6 long-tail blog posts a month, written for real customer questions.', '#A067E5' ),
            array( 'SOC',     '18', 'Social',              '12 — 16 posts/mo across IG, FB, GBP — service highlights, reviews, behind-the-scenes.', '#4A90FF' ),
            array( 'PAID',    '16', 'Paid (when needed)',  'Targeted Local Service Ads or Google search spikes for new locations or seasonal urgency.', '#7AC74F' ),
          );
          foreach ( $channels as $c ) : ?>
            <article class="dm-mix-card" style="--col: <?php echo esc_attr( $c[4] ); ?>;">
              <header class="dm-mix-card__h">
                <span class="dm-mix-card__sw" aria-hidden="true"></span>
                <span class="dm-mix-card__tag mono"><?php echo esc_html( $c[0] ); ?></span>
                <span class="dm-mix-card__pct mono"><?php echo esc_html( $c[1] ); ?>%</span>
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
       THE STRATEGY — problem / approach / outcome
       ============================================================ -->
  <section class="dm-strat">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 02</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">The strategy</span>
        </div>
        <h2 class="section-h">Problem,<br><em class="serif">approach, outcome.</em></h2>
        <p class="section-lead">Every brief we write follows this shape. If we can't fill all three lines in one paragraph each, the strategy isn't ready yet.</p>
      </div>

      <div class="dm-strat__cols">
        <article class="dm-strat-col">
          <span class="dm-strat-col__num mono">A</span>
          <h3 class="dm-strat-col__h">Problem</h3>
          <p class="dm-strat-col__p">Most Maryland service businesses have <strong>three disconnected vendors</strong> — a web designer, an SEO, and a social-media person — none of whom share goals, data, or accountability for outcomes.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">×</span> Channels run on separate timelines</li>
            <li><span aria-hidden="true">×</span> No shared definition of "win"</li>
            <li><span aria-hidden="true">×</span> Owner stuck translating between vendors</li>
          </ul>
        </article>

        <article class="dm-strat-col dm-strat-col--featured">
          <span class="dm-strat-col__num mono">B</span>
          <h3 class="dm-strat-col__h">Approach</h3>
          <p class="dm-strat-col__p">One small team writes <em class="serif">one brief</em>, runs all four channels against it, and shares one dashboard. Quarterly priorities, weekly check-ins, monthly reports.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">+</span> One quarterly brief, signed off</li>
            <li><span aria-hidden="true">+</span> Weekly cross-channel sync</li>
            <li><span aria-hidden="true">+</span> One owner, one Slack thread</li>
          </ul>
        </article>

        <article class="dm-strat-col">
          <span class="dm-strat-col__num mono">C</span>
          <h3 class="dm-strat-col__h">Outcome</h3>
          <p class="dm-strat-col__p">A predictable pipeline of qualified phone calls and form submissions, attributable to channel and content piece, growing quarter over quarter.</p>
          <ul class="dm-strat-col__list">
            <li><span aria-hidden="true">→</span> +30% qualified calls / quarter</li>
            <li><span aria-hidden="true">→</span> Lower cost per qualified lead</li>
            <li><span aria-hidden="true">→</span> Compounding organic asset</li>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       TIMELINE — 90-day Gantt
       ============================================================ -->
  <section class="dm-time">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 03</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">90-day rollout</span>
        </div>
        <h2 class="section-h">Three months,<br><em class="serif">in plain view.</em></h2>
        <p class="section-lead">A typical Q3 timeline. Heavy front-loading on audit and asset creation, then steady cadence through publishing and reporting.</p>
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
          // each row: name, start (1-12 weeks), span weeks
          $rows = array(
            array( 'Audit + brief',         1, 2, 'seo'  ),
            array( 'On-page rewrites',      2, 4, 'cnt'  ),
            array( 'Content / blog',        3, 9, 'cnt'  ),
            array( 'GBP + citations',       1, 5, 'seo'  ),
            array( 'Social calendar',       3, 9, 'soc'  ),
            array( 'Paid spike (optional)', 7, 4, 'paid' ),
            array( 'Reporting + review',    4, 9, 'rep'  ),
          );
          foreach ( $rows as $r ) :
            $start = max( 1, min( 12, (int) $r[1] ) );
            $span  = max( 1, min( 13 - $start, (int) $r[2] ) );
            $col   = $r[3];
            ?>
            <div class="dm-gantt__row">
              <span class="dm-gantt__row-name"><?php echo esc_html( $r[0] ); ?></span>
              <div class="dm-gantt__track">
                <span class="dm-gantt__bar dm-gantt__bar--<?php echo esc_attr( $col ); ?>"
                      style="--start: <?php echo $start; ?>; --span: <?php echo $span; ?>;">
                  <span class="dm-gantt__bar-w mono">w<?php echo $start; ?> — w<?php echo $start + $span - 1; ?></span>
                </span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="dm-gantt__legend mono">
          <span><span class="dm-gantt__sw dm-gantt__sw--seo"></span> SEO</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--cnt"></span> Content</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--soc"></span> Social</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--paid"></span> Paid</span>
          <span><span class="dm-gantt__sw dm-gantt__sw--rep"></span> Reporting</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       KPI TARGETS
       ============================================================ -->
  <section class="dm-kpi">
    <div class="lvm-container">
      <div class="dm-section-head">
        <div class="dm-section-bar mono">
          <span class="dm-section-bar__num">§ 04</span>
          <span class="dm-section-bar__rule"></span>
          <span class="dm-section-bar__lbl">KPI targets</span>
        </div>
        <h2 class="section-h">Numbers we agree to,<br><em class="serif">not numbers we hope for.</em></h2>
      </div>

      <div class="dm-kpi__grid">
        <?php
        $kpis = array(
          array( '+30%', 'Qualified phone calls',     'Quarterly target · vs prior quarter' ),
          array( '+20%', 'Organic sessions',          'GA4 · branded + non-branded' ),
          array( 'Top 3', 'Map pack rank',            '5 priority service keywords' ),
          array( '< 14d', 'Avg. lead → contact time', 'Form submissions to first call' ),
        );
        foreach ( $kpis as $k ) : ?>
          <div class="dm-kpi-tile">
            <span class="dm-kpi-tile__val"><?php echo esc_html( $k[0] ); ?></span>
            <h3 class="dm-kpi-tile__name"><?php echo esc_html( $k[1] ); ?></h3>
            <p class="dm-kpi-tile__desc mono"><?php echo esc_html( $k[2] ); ?></p>
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
      <div class="cta__eyebrow mono">↳ Free strategy call</div>
      <h2 class="cta__h">Ready to grow<br><em class="serif">your business?</em></h2>
      <p class="cta__p">We'll review your current marketing, recommend a focused channel mix, and walk you through the highest-leverage moves first.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Start marketing now <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
