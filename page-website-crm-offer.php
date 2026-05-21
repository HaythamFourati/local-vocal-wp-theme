<?php
/**
 * Template Name: Website + CRM Offer Page
 * Description: $97/month Website + CRM package landing page for trades pros
 */
get_header(); ?>

<main class="service-page">

  <section class="page-hero" style="padding-bottom:48px;">
    <div class="page-hero__grid-bg" aria-hidden="true"></div>
    <div class="lvm-container page-hero__inner" style="max-width:920px;">
      <div class="page-hero__crumb mono">
        <span style="background:var(--accent);color:var(--accent-ink);padding:4px 10px;border-radius:999px;letter-spacing:0.04em;">LIMITED OFFER · FIRST 10 GET FREE SETUP ($299 VALUE)</span>
      </div>
      <h1 class="page-hero__h" style="max-width:24ch;">Get a website that works<br><em class="serif">as hard as you do.</em></h1>
      <p class="page-hero__sub" style="max-width:62ch;">
        For Maryland trades — plumbers, electricians, HVAC, contractors. Only $97/month covers build, host, secure, and maintain. Full CRM system included free.
      </p>
      <p class="mono" style="font-size:12px;color:var(--muted);letter-spacing:0.04em;margin:-12px 0 24px;">
        You keep the water flowing, the lights on, the wires safe — <span style="color:var(--ink);font-weight:500;">who&rsquo;s keeping your phone ringing?</span>
      </p>
      <div class="page-hero__ctas">
        <a href="tel:+14437753770" class="btn btn--primary btn--lg">↳ Call +1 443‑775‑3770</a>
        <a href="https://api.leadconnectorhq.com/widget/booking/h91OK57EebhOpeiGoWZ3" target="_blank" rel="noopener" class="btn btn--ghost btn--lg">Schedule a meeting →</a>
      </div>
    </div>
  </section>

  <section>
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">The reality</span></div>
      <h2 class="section-h">300+ Maryland trades show up on Google<br><em class="serif">with no website.</em></h2>
      <p class="section-lead">
        That&rsquo;s like answering half a phone call. Your Google Business Profile needs a real home — a clean, mobile-friendly, lead-generating website built to turn clicks into calls. For $97/month, we&rsquo;ll build you exactly that.
      </p>
    </div>
  </section>

  <section>
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">What you get</span></div>
      <h2 class="section-h">Three things,<br><em class="serif">all included.</em></h2>
      <div class="feature__grid">
        <?php
        $feats = array(
          array( '01', 'A custom website built to convert', array(
            'Designed for trades (plumbing, electrical, HVAC, contracting)',
            'Mobile-first, fast-loading, clean navigation',
            'Click-to-call from phones',
            'Lead capture forms with SMS + email alerts',
            'SEO-ready foundation + Google Business Profile link',
          ), '<path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>' ),
          array( '02', 'Hosting, maintenance &amp; security', array(
            'Premium secure hosting',
            'Real-time monitoring + backups',
            'Monthly updates + improvements',
            'Lightning-fast support',
            'No tech headaches. Ever.',
          ), '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>' ),
          array( '03', 'Advanced CRM &mdash; <span style="color:var(--accent-ink);">FREE bonus</span>', array(
            'Every lead captured automatically (site, Google, social, texts)',
            'Follow-up via SMS, email, and calls',
            'Automations that reply while you&rsquo;re on the job',
            'Appointment booking + reminders',
            'Reputation management (more 5-star reviews)',
          ), '<path d="M13 10V3L4 14h7v7l9-11h-7z"/>' ),
        );
        foreach ( $feats as $f ) : ?>
          <article class="feature-card">
            <div class="feature-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $f[3]; ?></svg></div>
            <span class="feature-card__num mono"><?php echo $f[0]; ?></span>
            <h3 class="feature-card__title"><?php echo $f[1]; ?></h3>
            <ul class="proc-card__list" style="margin:0;">
              <?php foreach ( $f[2] as $li ) echo '<li>' . $li . '</li>'; ?>
            </ul>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section>
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">03</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">How it works</span></div>
      <h2 class="section-h">Live in 4 steps,<br><em class="serif">no tech stress.</em></h2>
      <div class="proc__grid">
        <?php
        $proc = array(
          array( 'Share your info',    array( 'Service area', 'A few job photos', 'Your phone number' ) ),
          array( 'We build your site', array( 'Designed for your trade', 'Mobile-first layout', 'Conversion paths in place' ) ),
          array( 'Connect to Google',  array( 'Google Business Profile linked', 'Schema markup added', 'Call tracking installed' ) ),
          array( 'Calls start coming', array( 'Forms routed to your SMS', 'Calls tracked + recorded', 'CRM follow-up active' ) ),
        );
        foreach ( $proc as $i => $p ) : ?>
          <div class="proc-card">
            <span class="proc-card__step mono">Step 0<?php echo $i + 1; ?></span>
            <h3 class="proc-card__t"><?php echo $p[0]; ?></h3>
            <ul class="proc-card__list"><?php foreach ( $p[1] as $item ) echo '<li>' . $item . '</li>'; ?></ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="cta" id="pricing" style="padding:96px 0;">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner" style="max-width:760px;">
      <div class="cta__eyebrow mono">↳ Simple pricing</div>
      <div style="font-family:var(--font-serif);font-style:italic;font-size:clamp(72px,12vw,128px);line-height:1;color:var(--accent);letter-spacing:-0.04em;margin:8px 0 0;">$97</div>
      <div class="mono" style="color:rgba(255,255,255,.7);font-size:14px;letter-spacing:0.08em;margin-bottom:24px;">PER MONTH · EVERYTHING INCLUDED</div>
      <h2 class="cta__h" style="font-size:clamp(28px,3.4vw,42px);">No contracts. No upsells.<br><em class="serif">No tech stress.</em></h2>
      <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:8px 24px;max-width:560px;margin:24px auto 32px;text-align:left;font-size:14px;color:rgba(255,255,255,.85);">
        <?php
        $incl = array( 'Custom website design', 'Premium hosting + security', 'Monthly updates + backups', 'Advanced CRM system', 'Lead capture + follow-up', 'SMS + email notifications', 'Google Business integration', 'Call tracking setup' );
        foreach ( $incl as $i ) echo '<div style="display:flex;gap:8px;align-items:center;"><span style="color:var(--accent);">✓</span><span>' . $i . '</span></div>';
        ?>
      </div>
      <div class="cta__actions">
        <a href="tel:+14437753770" class="btn btn--primary btn--lg">↳ Call +1 443‑775‑3770</a>
        <a href="https://api.leadconnectorhq.com/widget/booking/h91OK57EebhOpeiGoWZ3" target="_blank" rel="noopener" class="btn btn--dark-ghost btn--lg">Schedule a meeting →</a>
      </div>
      <p class="mono" style="font-size:11px;color:rgba(255,255,255,.55);margin-top:16px;letter-spacing:0.06em;">Cancel anytime · No questions asked</p>
    </div>
  </section>

</main>

<?php get_footer();
