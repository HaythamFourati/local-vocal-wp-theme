<?php
/**
 * Template Name: Contact Page
 * Visual language: switchboard / dispatch desk
 */
get_header(); ?>

<main class="service-page svc-contact">

  <!-- ============================================================
       MASTHEAD — switchboard
       ============================================================ -->
  <section class="ct-mast">
    <div class="lvm-container">

      <div class="ct-mast__top mono">
        <span class="ct-mast__top-l">
          <span class="ct-mast__pulse" aria-hidden="true">
            <span class="ct-mast__pulse-dot"></span>
            <span class="ct-mast__pulse-ring"></span>
          </span>
          <strong>LINE OPEN</strong> · Dispatch desk
        </span>
        <span class="ct-mast__top-rule"></span>
        <span><?php echo esc_html( gmdate( 'l, F j' ) ); ?></span>
        <span class="ct-mast__top-rule"></span>
        <span>Baltimore · MD · USA</span>
        <span class="ct-mast__top-rule"></span>
        <span>Reply ≤ 1 business day</span>
      </div>

      <div class="page-hero__crumb mono ct-mast__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Contact</span>
      </div>

      <h1 class="ct-mast__h">
        <span>Get in</span>
        <em class="serif">touch.</em>
      </h1>

      <div class="ct-mast__sub-row">
        <p class="ct-mast__sub">
          You're talking to the people who'll be doing the work — not a sales team. Pick a line, send a brief, or just call. We answer every message within one business day with a clear next step.
        </p>
        <ul class="ct-mast__meta mono">
          <li><span class="ct-mast__meta-k">Hours</span><span>Mon&ndash;Fri · 9&ndash;6 ET</span></li>
          <li><span class="ct-mast__meta-k">Reply</span><span>Within 24 hrs</span></li>
          <li><span class="ct-mast__meta-k">Calls</span><span>No phone tree</span></li>
          <li><span class="ct-mast__meta-k">Coverage</span><span>MD &amp; remote</span></li>
        </ul>
      </div>

    </div>
  </section>

  <!-- ============================================================
       DIRECT LINES — switchboard panel
       ============================================================ -->
  <section class="ct-lines">
    <div class="lvm-container">

      <div class="ct-section-bar mono">
        <span class="ct-section-bar__num">§ 01</span>
        <span class="ct-section-bar__rule"></span>
        <span class="ct-section-bar__lbl">Two direct lines</span>
        <span class="ct-section-bar__tag">All open</span>
      </div>

      <h2 class="ct-lines__h">Pick the channel<br><em class="serif">that fits the moment.</em></h2>

      <div class="ct-lines__grid">

        <a class="ct-line ct-line--01" href="mailto:info@localvocalmarketing.com">
          <div class="ct-line__head">
            <span class="ct-line__num mono">01</span>
            <span class="ct-line__status mono">
              <span class="ct-line__status-dot"></span>
              ONLINE
            </span>
          </div>
          <div class="ct-line__channel mono">Email</div>
          <h3 class="ct-line__t">Send a message.</h3>
          <p class="ct-line__desc">Best for project briefs, quotes, and anything you'd rather not say twice. We log every email and reply within one business day.</p>
          <div class="ct-line__value">info@localvocalmarketing.com</div>
          <div class="ct-line__foot mono">
            <span>Reply ≤ 24h</span>
            <span class="ct-line__foot-cta">Compose <span aria-hidden="true">→</span></span>
          </div>
        </a>

        <a class="ct-line ct-line--02" href="tel:+14438521000">
          <div class="ct-line__head">
            <span class="ct-line__num mono">02</span>
            <span class="ct-line__status mono">
              <span class="ct-line__status-dot"></span>
              LIVE
            </span>
          </div>
          <div class="ct-line__channel mono">Phone</div>
          <h3 class="ct-line__t">Call us.</h3>
          <p class="ct-line__desc">Real human, first ring. No gatekeeper, no salesperson on commission, no transferring you four times. Voicemails returned same day.</p>
          <div class="ct-line__value">(443)&nbsp;852‑1000</div>
          <div class="ct-line__foot mono">
            <span>Mon&ndash;Fri · 9&ndash;6 ET</span>
            <span class="ct-line__foot-cta">Dial <span aria-hidden="true">→</span></span>
          </div>
        </a>

      </div>
    </div>
  </section>

  <!-- ============================================================
       PROJECT BRIEF — form
       ============================================================ -->
  <section class="ct-brief" id="brief">
    <div class="lvm-container">

      <div class="ct-section-bar mono">
        <span class="ct-section-bar__num">§ 02</span>
        <span class="ct-section-bar__rule"></span>
        <span class="ct-section-bar__lbl">Project brief</span>
        <span class="ct-section-bar__tag">Form · 04 fields</span>
      </div>

      <div class="ct-brief__grid">

        <aside class="ct-brief__aside">
          <h2 class="ct-brief__h">Tell us about<br><em class="serif">your business.</em></h2>
          <p class="ct-brief__p">A few sentences are plenty. We'll come back within one business day with a clear next step — whether that's a quote, a strategy call, or a written review of your current setup.</p>

          <ul class="ct-brief__check">
            <li><span class="ct-brief__check-mark" aria-hidden="true">✓</span><span><strong>What you're stuck on.</strong> Rankings, leads, design, content — pick one or list them.</span></li>
            <li><span class="ct-brief__check-mark" aria-hidden="true">✓</span><span><strong>Where you are now.</strong> A link to your site or social, plus the area you serve.</span></li>
            <li><span class="ct-brief__check-mark" aria-hidden="true">✓</span><span><strong>Rough timeline.</strong> Yesterday, this quarter, "exploring." All fine.</span></li>
            <li><span class="ct-brief__check-mark" aria-hidden="true">✓</span><span><strong>Budget range, if any.</strong> Helps us shape a real proposal, not a sales pitch.</span></li>
          </ul>

          <div class="ct-brief__hours">
            <div class="ct-brief__hours-bar mono">
              <span>Office hours</span>
              <span class="ct-brief__hours-bar-rule"></span>
              <span>ET</span>
            </div>
            <ul class="ct-brief__hours-list">
              <li><span>Mon&ndash;Fri</span><span class="ct-brief__hours-dot"></span><span>9am&ndash;6pm</span></li>
              <li><span>Saturday</span><span class="ct-brief__hours-dot"></span><span>By appointment</span></li>
              <li><span>Sunday</span><span class="ct-brief__hours-dot"></span><span>Closed</span></li>
              <li class="ct-brief__hours-list-em"><span>Email replies</span><span class="ct-brief__hours-dot"></span><span>Within 1 business day</span></li>
            </ul>
          </div>
        </aside>

        <div class="ct-brief__form-wrap">
          <div class="ct-brief__form-bar mono">
            <span class="ct-brief__form-bar-tag">FORM 02 · INTAKE</span>
            <span class="ct-brief__form-bar-rule"></span>
            <span class="ct-brief__form-bar-meta">Encrypted · No spam, ever</span>
          </div>

          <div class="ct-brief__form contact-form">
            <?php
            if ( function_exists( 'wpcf7_contact_form' ) ) {
              echo do_shortcode( '[contact-form-7 id="1570408" title="Contact Form"]' );
            } else {
              ?>
              <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                <p><label class="mono">Full name<input type="text" name="name" placeholder="Jane Doe" required></label></p>
                <p><label class="mono">Email address<input type="email" name="email" placeholder="jane@business.com" required></label></p>
                <p><label class="mono">Phone (optional)<input type="tel" name="phone" placeholder="(443) 555 0100"></label></p>
                <p><label class="mono">Tell us what you're working on<textarea name="message" rows="6" placeholder="A few sentences about your business and what you'd like help with…" required></textarea></label></p>
                <input type="hidden" name="action" value="submit_contact_form">
                <?php wp_nonce_field( 'contact_form_submit' ); ?>
                <p><input type="submit" value="Send brief →"></p>
              </form>
              <?php
            }
            ?>
          </div>

          <div class="ct-brief__form-foot mono">
            <span>By submitting, you agree to our gentle email follow-up.</span>
            <span class="ct-brief__form-foot-rule"></span>
            <span>SIG · LV-2026</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       VISIT — location card
       ============================================================ -->
  <section class="ct-visit">
    <div class="lvm-container">

      <div class="ct-section-bar mono">
        <span class="ct-section-bar__num">§ 03</span>
        <span class="ct-section-bar__rule"></span>
        <span class="ct-section-bar__lbl">Where we work</span>
      </div>

      <div class="ct-visit__grid">
        <div class="ct-visit__l">
          <h2 class="ct-visit__h">Maryland-based,<br><em class="serif">remote-friendly.</em></h2>
          <p class="ct-visit__p">Our studio is in Glyndon, MD — half an hour from Baltimore, an hour from DC. We work with clients across the Mid-Atlantic in person and U.S.-wide remotely. If a coffee or a whiteboard would be useful, we're up for the drive.</p>

          <ul class="ct-visit__list mono">
            <li><span class="ct-visit__list-k">Studio</span><span>209 Central Ave, Glyndon, MD 21071</span></li>
            <li><span class="ct-visit__list-k">Calls</span><span>(443) 852‑1000</span></li>
            <li><span class="ct-visit__list-k">Mail</span><span>info@localvocalmarketing.com</span></li>
            <li><span class="ct-visit__list-k">Coverage</span><span>Maryland · DMV · remote U.S.</span></li>
          </ul>

          <a class="ct-visit__cta" href="https://maps.app.goo.gl/eio3U1s7NzCkutyf8" target="_blank" rel="noopener">
            Open in Maps <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg>
          </a>
        </div>

        <div class="ct-visit__card">
          <div class="ct-visit__card-bar mono">
            <span class="ct-visit__card-folio">FIELD&nbsp;CARD&nbsp;/&nbsp;03</span>
            <span class="ct-visit__card-rule"></span>
            <span>39.4836°N · 76.8236°W</span>
          </div>

          <div class="ct-visit__card-art" aria-hidden="true">
            <svg class="ct-visit__lines" viewBox="0 0 600 380" preserveAspectRatio="none">
              <path d="M0 60 Q 200 100, 400 80 T 600 120" />
              <path d="M0 140 Q 250 200, 500 170 T 700 210" />
              <path d="M0 220 Q 180 260, 360 240 T 600 270" />
              <path d="M0 300 Q 220 340, 440 310 T 600 340" />
              <path d="M120 0 Q 180 200, 140 380" />
              <path d="M280 0 Q 320 200, 260 380" />
              <path d="M440 0 Q 480 200, 420 380" />
            </svg>
            <div class="ct-visit__pin">
              <span class="ct-visit__pin-ring--lg"></span>
              <span class="ct-visit__pin-ring"></span>
              <span class="ct-visit__pin-dot"></span>
            </div>
          </div>

          <dl class="ct-visit__card-list">
            <div>
              <dt>Studio</dt>
              <dd>209 Central Ave · Glyndon, MD</dd>
            </div>
            <div>
              <dt>Hours</dt>
              <dd>Mon&ndash;Fri · 9am&ndash;6pm ET</dd>
            </div>
            <div class="ct-visit__card-list-last">
              <dt>Parking</dt>
              <dd>On‑site · free · the gravel lot out back</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FAQ
       ============================================================ -->
  <section class="ct-faq">
    <div class="lvm-container">

      <div class="ct-section-bar mono">
        <span class="ct-section-bar__num">§ 04</span>
        <span class="ct-section-bar__rule"></span>
        <span class="ct-section-bar__lbl">FAQ</span>
        <span class="ct-section-bar__tag">06 questions</span>
      </div>

      <h2 class="ct-faq__h">Quick answers<br><em class="serif">before you write.</em></h2>

      <div class="faq ct-faq__list">
        <?php
        $faqs = array(
          array( 'What makes Local Vocal different?', 'We combine local Maryland expertise with proven SEO + web design practices. You work with the same three people from first call through every blog post, design tweak, and SEO update — no juniors, no offshoring.' ),
          array( 'How do I get started?', 'Send us a message or call. We\'ll schedule a 30-minute call, review your current setup live, and email a written recommendation within 48 hours. No deck, no pressure.' ),
          array( 'What services do you offer?', 'Website design, local SEO, blog content, social media management, analytics &amp; reporting, and digital marketing strategy &mdash; for local Maryland businesses and U.S. service brands.' ),
          array( 'Can you customize for my business?', 'Yes. Every engagement starts with a review, not a template. Service-area pages, blog topics, and design choices are tailored to your business and your customers.' ),
          array( 'How is pricing structured?', 'Pricing depends on scope &mdash; we share a flat number after the first call so there are no surprises. Most clients fall into recurring monthly retainers; one-off projects are available too.' ),
          array( 'Do you offer package deals?', 'Yes &mdash; bundles for businesses combining web design with ongoing SEO + content, at a meaningful discount vs. piecing them out.' ),
        );
        foreach ( $faqs as $i => $q ) : ?>
          <div class="faq__item">
            <button class="faq__q" type="button" aria-expanded="false">
              <span class="faq__qnum mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
              <span class="faq__qtext"><?php echo $q[0]; ?></span>
              <span class="faq__qicon" aria-hidden="true"><span></span><span></span></span>
            </button>
            <div class="faq__a-wrap"><div class="faq__a"><?php echo $q[1]; ?></div></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FINAL CTA
       ============================================================ -->
  <section class="cta" id="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Ready when you are</div>
      <h2 class="cta__h">Prefer to talk<br><em class="serif">to a human?</em></h2>
      <p class="cta__p">Call us directly. No phone tree, no gatekeeper, no salesperson on commission.</p>
      <div class="cta__actions">
        <a href="tel:+14438521000" class="btn btn--primary btn--lg">↳ (443) 852‑1000</a>
        <a href="mailto:info@localvocalmarketing.com" class="btn btn--dark-ghost btn--lg">Email instead →</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
