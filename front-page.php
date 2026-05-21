<?php
/**
 * Front Page — Local Vocal Marketing redesign
 * Maryland Web Design & SEO for Local Businesses.
 */
get_header();
?>

<main>

  <!-- ============================================================
       HERO
       ============================================================ -->
  <section class="hero" id="top">
    <div class="hero__grid-bg" aria-hidden="true"></div>

    <div class="lvm-container hero__inner">
      <div class="hero__pill mono">
        <span class="hero__pill-dot" aria-hidden="true"></span>
        Maryland‑based · taking on new clients for Q3
      </div>

      <h1 class="hero__h1">
        Maryland <em class="serif">Web Design</em> &amp; SEO for Local Businesses
      </h1>

      <p class="hero__sub">
        Local Vocal Marketing helps small businesses build better websites, improve
        Google visibility, publish SEO‑focused content, and stay active online with
        ongoing support. Maryland‑based, serving Maryland and nearby U.S. service areas.
      </p>

      <div class="hero__cta">
        <a href="#cta" class="btn btn--primary btn--lg">Request a free website &amp; SEO review <span aria-hidden="true">→</span></a>
        <a href="#services" class="btn btn--ghost btn--lg">View our services</a>
      </div>

      <div class="hero__trust">
        <?php
        $trust_items = array( 'Web design', 'Local SEO', 'Blog content', 'Social media', 'Ongoing support' );
        foreach ( $trust_items as $i => $t ) :
          if ( $i > 0 ) echo '<span class="hero__trust-divider"></span>';
          ?>
          <div class="hero__trust-item">
            <span class="hero__trust-num"><?php echo esc_html( $t ); ?></span>
            <span class="hero__trust-lbl mono">service · 0<?php echo esc_html( $i + 1 ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Hero dashboard mockup -->
    <div class="lvm-container hero__visual-wrap">
      <div class="hero-dash">
        <div class="hero-dash__chrome">
          <div class="hero-dash__dots"><span></span><span></span><span></span></div>
          <div class="hero-dash__url"><span class="mono">tidewater‑hvac.com · indexed · annapolis, md</span></div>
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
                <span class="sitefull__burl mono">tidewater‑hvac.com / annapolis</span>
              </div>

              <div class="sitefull__nav">
                <div class="sitefull__brand">
                  <span class="sitefull__logo" aria-hidden="true"></span>
                  <span class="sitefull__brandname">Tidewater HVAC</span>
                </div>
                <div class="sitefull__links">
                  <span>Services</span>
                  <span>About</span>
                  <span>Reviews</span>
                  <span class="sitefull__phone mono">(410) 555‑0142</span>
                </div>
              </div>

              <div class="sitefull__hero">
                <span class="sitefull__pin sitefull__pin--02" aria-hidden="true">02</span>
                <div class="sitefull__tag mono">★ 4.9 · serving Annapolis since 2008</div>
                <h2 class="sitefull__h1">
                  AC Repair &amp; Installation
                  <span class="sitefull__h1-mark"> in Annapolis, MD</span>
                </h2>
                <p class="sitefull__sub">Same‑day service. Licensed &amp; insured technicians. Honest estimates with no surprise fees.</p>
                <div class="sitefull__ctas">
                  <span class="sitefull__cta sitefull__cta--primary">Get a free quote</span>
                  <span class="sitefull__cta sitefull__cta--ghost">Call now <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg></span>
                </div>
              </div>

              <div class="sitefull__svcs">
                <?php
                $sf_svcs = array(
                  array( 'AC repair', 'Same‑day · 7 days a week' ),
                  array( 'New installation', 'Lennox &amp; Trane certified' ),
                  array( 'Tune‑ups', 'Spring &amp; fall maintenance' ),
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
                  <span>"Same‑day fix — couldn't ask for more." — Karen M.</span>
                  <span class="sitefull__rev-divider"></span>
                  <span>"Honest, fair pricing." — James P.</span>
                </div>
              </div>

              <div class="sitefull__blog">
                <span class="sitefull__pin sitefull__pin--03" aria-hidden="true">03</span>
                <div class="sitefull__blog-label mono">From the blog</div>
                <div class="sitefull__blog-list">
                  <span>How to Know When Your AC Needs Repair →</span>
                  <span>5 Signs Your Furnace Is Failing Early →</span>
                </div>
              </div>

              <div class="sitefull__foot">
                <span class="sitefull__pin sitefull__pin--04" aria-hidden="true">04</span>
                <span class="mono">Anne Arundel County · Annapolis · Severna Park</span>
                <span class="sitefull__social mono">@tidewaterhvac</span>
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
              <div class="ch__kicker mono">"hvac repair near me" · Annapolis MD</div>
              <div class="ch__body">
                <div class="mappack">
                  <div class="mappack__row mappack__row--you">
                    <span class="mappack__pin">A</span>
                    <div>
                      <div class="mappack__name">Tidewater HVAC</div>
                      <div class="mappack__meta mono">★ 4.9 · 184 reviews</div>
                    </div>
                    <span class="mappack__pos mono">#1</span>
                  </div>
                  <div class="mappack__row">
                    <span class="mappack__pin">B</span>
                    <div>
                      <div class="mappack__name">Capital Air &amp; Heat</div>
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
                  <div class="ch-blog__title">How to Know When Your AC Needs Repair</div>
                  <div class="ch-blog__meta mono">8 min · ranks #2 for "ac repair annapolis"</div>
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
                    <div class="ch-social__name">Tidewater HVAC <span class="ch-social__dot"></span></div>
                    <p class="ch-social__text">Spring tune‑ups 20% off. Same‑day in Annapolis.</p>
                  </div>
                </div>
              </div>
            </section>
          </aside>
        </div>
      </div>
    </div>

    <!-- Hero logos -->
    <div class="lvm-container hero__logos">
      <div class="hero__logos-label mono">Trusted by local operators across Maryland</div>
      <div class="hero__logos-row">
        <?php
        $logos = array(
          'Tidewater HVAC · Annapolis',
          'Northgate Auto Glass · Glen Burnie',
          'Riverside Dental · Severna Park',
          'Calvert Law · Annapolis',
          'Bay Home Care · Easton',
          'Coast Security · Ocean City',
        );
        foreach ( $logos as $l ) : ?>
          <span class="logo-pill"><?php echo esc_html( $l ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROBLEM
       ============================================================ -->
  <section class="problem" id="problem">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">01</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">The problem</span></div>
      <h2 class="section-h">Your customers are searching.<br><em class="serif">Can they find you?</em></h2>
      <p class="section-lead">
        Most local businesses have a website. Fewer have one that ranks, loads fast,
        reads well on mobile, and brings in calls. Here's what we hear most often.
      </p>

      <div class="problem__grid">
        <?php
        $problems = array(
          array( "You don't show up for local searches", 'Customers Google your service in your city — and find someone else first.' ),
          array( 'Competitors outrank you on Google', 'A few SEO basics decide who appears in the map pack and who scrolls by.' ),
          array( 'Your site looks outdated on mobile', 'Most local searches happen on a phone. Slow, cramped sites lose the click.' ),
          array( 'Service pages feel thin', "Generic copy doesn't tell Google — or customers — what you actually do." ),
          array( "Your blog isn't targeting real searches", "Without intent‑driven topics, content sits unread and unranked." ),
          array( 'Updates take weeks, not hours', "New service? Seasonal promo? You shouldn't have to wait on a freelancer." ),
        );
        foreach ( $problems as $i => $p ) : ?>
          <div class="problem__card">
            <div class="problem__num mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
            <div class="problem__title"><?php echo esc_html( $p[0] ); ?></div>
            <div class="problem__desc"><?php echo esc_html( $p[1] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SERVICES
       ============================================================ -->
  <section class="services" id="services">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">02</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Services</span></div>
      <h2 class="section-h">Web design, SEO, content, and support<br><em class="serif">built for local growth.</em></h2>
      <p class="section-lead">
        Five focused services. Buy one, the rest get sharper. Combine them and you
        stop competing for attention and start competing for the click.
      </p>

      <div class="services__grid">
        <?php
        $services = array(
          array(
            't' => 'Website Design',
            'd' => 'Modern, mobile‑friendly websites that build trust, explain your services clearly, and help visitors take action.',
            'best' => 'Service businesses on outdated or template sites',
            'res' => 'Cleaner design, faster pages, more phone clicks',
            'link' => '/development',
          ),
          array(
            't' => 'Local SEO',
            'd' => 'On‑page SEO, keyword strategy, metadata, internal linking, and Google Business Profile support — built around your service area.',
            'best' => 'Maryland businesses that want to show up locally',
            'res' => 'Higher map‑pack visibility and qualified search traffic',
            'link' => '/seo-optimization',
          ),
          array(
            't' => 'SEO Blog Articles',
            'd' => 'Ongoing blog content written around real customer questions, service keywords, and local search intent — not filler.',
            'best' => 'Businesses building topical authority over time',
            'res' => 'Long‑term organic traffic and supported service pages',
            'link' => '/content-creation',
          ),
          array(
            't' => 'Social Media Management',
            'd' => 'Consistent posting that keeps your business visible — service updates, blog promotion, seasonal content, and customer education.',
            'best' => 'Local brands that need to stay active, not viral',
            'res' => 'Steady online presence and a trust signal for searchers',
            'link' => '/social-media-management',
          ),
          array(
            't' => 'Ongoing Website Support',
            'd' => 'Updates, fixes, new pages, security patches, content changes, and performance tuning — handled without the headache.',
            'best' => 'Owners who want a long‑term partner, not a one‑off',
            'res' => 'A healthy website that stays current and search‑friendly',
            'link' => '/analytics-reporting',
          ),
        );
        foreach ( $services as $i => $s ) : ?>
          <article class="svc-card">
            <div class="svc-card__head">
              <span class="svc-card__num mono">S/<?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
              <h3 class="svc-card__title"><?php echo esc_html( $s['t'] ); ?></h3>
            </div>
            <p class="svc-card__desc"><?php echo esc_html( $s['d'] ); ?></p>
            <div class="svc-card__meta">
              <div class="svc-card__row">
                <span class="mono svc-card__lbl">Best for</span>
                <span class="svc-card__val"><?php echo esc_html( $s['best'] ); ?></span>
              </div>
              <div class="svc-card__row">
                <span class="mono svc-card__lbl">Result</span>
                <span class="svc-card__val"><?php echo esc_html( $s['res'] ); ?></span>
              </div>
            </div>
            <a class="svc-card__link" href="<?php echo esc_url( home_url( $s['link'] ) ); ?>">
              <span>Learn more</span>
              <span aria-hidden="true">→</span>
            </a>
          </article>
        <?php endforeach; ?>
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
                  <span class="anno__hl"> in Annapolis, MD</span>
                </div>
                <div class="anno__sub">
                  Storm damage, repairs, and replacements. Free inspections this week
                  across Anne Arundel County.
                </div>
                <div class="anno__ctas">
                  <span class="anno__cta anno__cta--primary">Get a free inspection</span>
                  <span class="anno__cta anno__cta--ghost">Call (410) 555‑7732</span>
                </div>
              </div>

              <div class="anno__svcs">
                <?php
                $anno_svcs = array(
                  array( 'Repairs', 'Same‑week appointments' ),
                  array( 'Replacement', 'GAF &amp; Owens Corning' ),
                  array( 'Inspections', 'Free, no obligation' ),
                  array( 'Storm damage', 'Insurance claim help' ),
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
                  <span>How to know when your roof needs repair in Maryland →</span>
                  <span>What storm damage costs in Anne Arundel County →</span>
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
       LOCAL SEO
       ============================================================ -->
  <section class="seo" id="seo">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">04</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Local SEO</span></div>
      <h2 class="section-h">Local SEO that helps Maryland businesses<br><em class="serif">get found.</em></h2>
      <p class="section-lead">
        Local customers search with intent. They want a business nearby, with real
        reviews, that answers the phone. We make sure that's you.
      </p>

      <div class="seo__layout">
        <div class="seo__left">
          <div class="seo__rank-wrap">
            <div class="srank">
              <div class="srank__head">
                <span class="mono srank__query">"hvac repair near me"</span>
                <span class="mono srank__loc">Annapolis, MD · map pack</span>
              </div>
              <div class="srank__list">
                <?php
                $srank_rows = array(
                  array( 1, 'Your business', '4.9', 184, true, '+6' ),
                  array( 2, 'Capital Air &amp; Heat', '4.6', 92, false, '' ),
                  array( 3, 'Bay Mechanical', '4.4', 51, false, '' ),
                  array( 4, 'Tidewater HVAC Co.', '4.2', 38, false, '' ),
                );
                foreach ( $srank_rows as $r ) : ?>
                  <div class="srank__row<?php echo $r[4] ? ' is-you' : ''; ?>">
                    <span class="srank__pos mono"><?php echo $r[0]; ?></span>
                    <span class="srank__name"><?php echo $r[1]; ?></span>
                    <span class="srank__stars mono">★ <?php echo $r[2]; ?> · <?php echo $r[3]; ?></span>
                    <?php if ( $r[5] ) : ?>
                      <span class="srank__delta mono"><?php echo $r[5]; ?></span>
                    <?php else : ?>
                      <span></span>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="srank__foot mono">
                Tracked weekly · 38 local keywords · service area: Anne Arundel County
              </div>
            </div>

            <div class="seo__photo">
              <img src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?auto=format&fit=crop&w=1200&q=70" alt="Annapolis, Maryland harbor — the kind of local market our clients serve" loading="lazy">
              <div class="seo__photo-cap">
                <span class="seo__photo-cap-dot" aria-hidden="true"></span>
                <span class="mono">Annapolis · Anne Arundel County, MD</span>
              </div>
            </div>
          </div>
        </div>

        <div class="seo__right">
          <ul class="seo__list">
            <?php
            $seo_items = array(
              array( 'Google Business Profile', 'Categories, photos, posts, services, and review velocity — tuned.' ),
              array( 'Local keyword targeting', 'Maps the searches your customers actually use, by city and category.' ),
              array( 'Service‑area SEO', 'Dedicated pages for each city and service you cover — not one thin page.' ),
              array( 'On‑page SEO', 'Headings, metadata, internal links, and schema, fixed page by page.' ),
              array( 'Content structure', 'Pages built to be readable by humans and crawlable by Google.' ),
              array( 'Review &amp; reputation support', 'Steady review flow without spammy templates or fake names.' ),
            );
            foreach ( $seo_items as $i => $it ) : ?>
              <li class="seo__item">
                <span class="seo__num mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
                <div>
                  <div class="seo__t"><?php echo $it[0]; ?></div>
                  <div class="seo__d"><?php echo $it[1]; ?></div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       BLOG CONTENT
       ============================================================ -->
  <section class="blog" id="blog">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">05</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Blog content</span></div>
      <h2 class="section-h">SEO blog articles that target<br><em class="serif">real customer searches.</em></h2>
      <p class="section-lead">
        Your blog isn't a place to write about industry news. It's where you answer
        the questions your customers Google before they call you — and where Google
        decides you're an authority on your service area.
      </p>

      <div class="bloggrid">
        <?php
        $posts = array(
          array( 'Roofing · Maryland', 'How to Know When Your Roof Needs Repair in Maryland', '9 min read', 'Ranks #3 · MD' ),
          array( 'Legal · Ocean City', 'What to Do After a DUI Arrest in Ocean City', '7 min read', 'Ranks #1 · MD' ),
          array( 'Auto Glass', 'Five Signs Your Windshield Needs Replacement', '6 min read', 'Ranks #2 · US' ),
          array( 'Home Care', 'How Home Care Helps Seniors Stay Independent', '8 min read', 'Ranks #4 · MD' ),
          array( 'Wellness', 'What to Expect During an ADHD Evaluation', '10 min read', 'Ranks #5 · MD' ),
          array( 'Dental', 'When to Take Your Child to the Dentist for the First Time', '5 min read', 'Ranks #2 · MD' ),
        );
        foreach ( $posts as $p ) : ?>
          <article class="bpost">
            <div class="bpost__cat mono"><?php echo $p[0]; ?></div>
            <h3 class="bpost__title"><?php echo $p[1]; ?></h3>
            <div class="bpost__foot">
              <span class="bpost__read mono"><?php echo $p[2]; ?></span>
              <span class="bpost__rank mono"><?php echo $p[3]; ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="blog__bands">
        <?php
        $bands = array(
          'Target real search intent',
          'Support and link to service pages',
          'Build topical authority over time',
          'Answer real customer questions',
          'Improve long‑term organic visibility',
        );
        foreach ( $bands as $i => $b ) : ?>
          <div class="blog__band">
            <span class="blog__band-num mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
            <span><?php echo esc_html( $b ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SOCIAL
       ============================================================ -->
  <section class="social" id="social">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">06</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Social media</span></div>
      <h2 class="section-h">Consistent social media<br><em class="serif">that keeps your business visible.</em></h2>
      <p class="section-lead">
        Social media won't replace SEO — but it keeps you active, shares your blog,
        highlights new services, and adds the trust signal a searcher needs before
        they tap "Call."
      </p>

      <div class="social-strip">
        <?php
        $sposts = array(
          array( 'TH', 'Tidewater HVAC', '@tidewaterhvac', '2h', 'Spring tune‑ups 20% off through April. Same‑day appointments still open.', '#Annapolis #HVAC', 184, 12, 8 ),
          array( 'CL', 'Calvert Law', '@calvertlaw', '5h', 'Free 15‑minute consultation for personal injury cases this month. Call or book online.', '#Maryland #PersonalInjury', 62, 4, 21 ),
          array( 'RD', 'Riverside Dental', '@riversidedental', '1d', 'Now accepting new patients — most insurance plans accepted, evening appointments available.', '#Severna #Dentist', 98, 7, 3 ),
        );
        foreach ( $sposts as $p ) : ?>
          <article class="spost">
            <header class="spost__head">
              <div class="spost__avatar" aria-hidden="true"><?php echo $p[0]; ?></div>
              <div class="spost__who">
                <div class="spost__name"><?php echo $p[1]; ?> <span class="spost__verified" aria-hidden="true"></span></div>
                <div class="spost__handle mono"><?php echo $p[2]; ?> · <?php echo $p[3]; ?></div>
              </div>
            </header>
            <p class="spost__text"><?php echo esc_html( $p[4] ); ?></p>
            <div class="spost__tags mono"><?php echo esc_html( $p[5] ); ?></div>
            <div class="spost__engage">
              <span class="spost__eitem">♥ <?php echo $p[6]; ?></span>
              <span class="spost__eitem">💬 <?php echo $p[7]; ?></span>
              <span class="spost__eitem"><svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg> <?php echo $p[8]; ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SUPPORT
       ============================================================ -->
  <section class="support" id="support">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">07</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Ongoing support</span></div>
      <h2 class="section-h">Ongoing website support<br><em class="serif">without the headaches.</em></h2>
      <p class="section-lead">
        A website isn't a one‑time project. Plugins update, browsers change, services
        get added. We handle the small things so they don't become big things.
      </p>

      <div class="checklist">
        <?php
        $groups = array(
          array(
            'title' => 'Every month',
            'items' => array( 'Plugin &amp; theme updates', 'Security scans &amp; patches', 'Backups verified', 'Broken link &amp; redirect audit', 'Page speed checks' ),
          ),
          array(
            'title' => 'On request',
            'items' => array( 'Content updates &amp; new pages', 'Service &amp; pricing changes', 'New blog post publishing', 'Photo &amp; gallery updates', 'Seasonal banner &amp; promo swaps' ),
          ),
          array(
            'title' => 'Quarterly',
            'items' => array( 'On‑page SEO review', 'Internal linking refresh', 'Local citation audit', 'Performance &amp; Core Web Vitals report', 'Recommendation report sent to you' ),
          ),
        );
        foreach ( $groups as $g ) : ?>
          <div class="checklist__col">
            <div class="checklist__title mono"><?php echo $g['title']; ?></div>
            <ul class="checklist__list">
              <?php foreach ( $g['items'] as $it ) : ?>
                <li>
                  <span class="checklist__check" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                  <span><?php echo $it; ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       INDUSTRIES
       ============================================================ -->
  <section class="industries" id="industries">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">08</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Industries</span></div>
      <h2 class="section-h">Built for local service businesses<br><em class="serif">across Maryland.</em></h2>

      <div class="industries__grid">
        <?php
        // Each entry: [title, description, inner SVG markup]
        $inds = array(
          array(
            'Contractors',
            'Rank for the services homeowners search for most.',
            '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
          ),
          array(
            'HVAC Companies',
            'Show up when homeowners need urgent repair — not three pages in.',
            '<circle cx="12" cy="12" r="3"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>',
          ),
          array(
            'Law Firms',
            'Build trust and turn local searches into consultation requests.',
            '<path d="M12 3v18M5 21h14"/><path d="M6 8l-3 6a3 3 0 0 0 6 0L6 8zM18 8l-3 6a3 3 0 0 0 6 0l-3-6z"/><path d="M3 6h18"/>',
          ),
          array(
            'Dentists',
            'Help nearby patients find your practice and book online.',
            '<path d="M12 5.5c-2 -2 -5 -2 -7 0c-2 2 -2 5 0 8c1 1.5 1.5 3 2 5c.5 2 1 3 2 3c1 0 1.5 -1.5 2 -3.5l1 -3l1 3c.5 2 1 3.5 2 3.5c1 0 1.5 -1 2 -3c.5 -2 1 -3.5 2 -5c2 -3 2 -6 0 -8c-2 -2 -5 -2 -7 0z"/>',
          ),
          array(
            'Medical Clinics',
            'Get found by patients researching specific care in your area.',
            '<path d="M9 3v6H3v6h6v6h6v-6h6V9h-6V3z"/>',
          ),
          array(
            'Auto Glass',
            'Show up when drivers need urgent repair or replacement.',
            '<path d="M5 17h14M5 17l1.5-6a2 2 0 0 1 2-1.5h7a2 2 0 0 1 2 1.5L19 17M5 17v3M19 17v3M8 13h8"/><circle cx="7.5" cy="17" r="1.5"/><circle cx="16.5" cy="17" r="1.5"/>',
          ),
          array(
            'Home Care Agencies',
            'Create content that builds trust with families.',
            '<path d="M3 11l9-8 9 8v9a2 2 0 0 1-2 2h-3v-7H8v7H5a2 2 0 0 1-2-2z"/><path d="M12 13.5l-1.5-1.5a1.5 1.5 0 0 1 2.12-2.12L12 10l-.62-.62a1.5 1.5 0 1 1 2.12 2.12L12 13.5z" fill="currentColor"/>',
          ),
          array(
            'Restaurants',
            'Make your menu and local presence easier to find.',
            '<path d="M7 3v8a2 2 0 0 0 2 2v8M11 3v6M7 3h4M17 3c-1.5 0-3 1.5-3 4s1.5 4 3 4v10"/>',
          ),
          array(
            'Security Companies',
            'Reach customers researching protection at home or work.',
            '<path d="M12 2l8 3v7c0 5-3.5 9-8 10-4.5-1-8-5-8-10V5z"/><path d="M9 12l2 2 4-4"/>',
          ),
          array(
            'Local Service Businesses',
            'If customers Google your category by city, this is for you.',
            '<path d="M3 9l1.5-5h15L21 9M3 9v11h18V9M3 9h18M8 14h3v6H8z"/>',
          ),
        );
        foreach ( $inds as $i ) : ?>
          <article class="ind-card">
            <div class="ind-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $i[2]; ?></svg>
            </div>
            <h3 class="ind-card__title"><?php echo esc_html( $i[0] ); ?></h3>
            <p class="ind-card__desc"><?php echo esc_html( $i[1] ); ?></p>
            <div class="ind-card__cta mono">
              <span>SEO playbook</span>
              <span aria-hidden="true">→</span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       RECENT WORK
       ============================================================ -->
  <section class="work" id="work">
    <div class="lvm-container">
      <div class="eyebrow"><span class="eyebrow__num mono">09</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Recent work</span></div>
      <h2 class="section-h">Real client projects<br><em class="serif">we've shipped.</em></h2>
      <p class="section-lead">
        Service businesses and professionals redesigned, ranked, and supported. Each
        site below was rebuilt for local search, mobile speed, and clear conversion paths.
      </p>

      <div class="work__grid">
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
          ?>
          <article class="work-case">
            <div class="work-case__media">
              <div class="work-case__media-frame">
                <img src="<?php echo esc_url( $w['img'] ); ?>" alt="<?php echo esc_attr( $w['alt'] ); ?>" loading="lazy">
              </div>
              <span class="work-case__chip mono"><?php echo esc_html( $w['tag'] ); ?></span>
            </div>

            <div class="work-case__body">
              <div class="work-case__index">
                <span class="work-case__index-num mono"><?php echo $num; ?></span>
                <span class="work-case__index-rule" aria-hidden="true"></span>
                <span class="work-case__index-lbl mono">Project / <?php echo esc_html( $w['tag'] ); ?></span>
              </div>

              <h3 class="work-case__title">
                <?php echo esc_html( $w['main'] ); ?><br>
                <em class="serif"><?php echo esc_html( $w['accent'] ); ?></em>
              </h3>

              <div class="work-case__client">
                <span class="work-case__client-name"><?php echo esc_html( $w['client'] ); ?></span>
                <span class="work-case__client-dot" aria-hidden="true"></span>
                <span class="work-case__client-loc mono"><?php echo esc_html( $w['location'] ); ?></span>
              </div>

              <p class="work-case__desc"><?php echo esc_html( $w['desc'] ); ?></p>

              <dl class="work-case__metrics">
                <div class="work-case__metric">
                  <dt class="work-case__metric-lbl mono"><?php echo esc_html( $w['k1_lbl'] ); ?></dt>
                  <dd class="work-case__metric-val"><?php echo esc_html( $w['k1_val'] ); ?></dd>
                </div>
                <div class="work-case__metric">
                  <dt class="work-case__metric-lbl mono"><?php echo esc_html( $w['k2_lbl'] ); ?></dt>
                  <dd class="work-case__metric-val"><?php echo esc_html( $w['k2_val'] ); ?></dd>
                </div>
              </dl>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="work__foot">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--ghost btn--lg">
          Start your project <span aria-hidden="true">→</span>
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
       WHY US (dark)
       ============================================================ -->
  <section class="whyus whyus--dark" id="whyus">
    <div class="whyus__glow" aria-hidden="true"></div>
    <div class="lvm-container whyus__inner">
      <div class="eyebrow eyebrow--light"><span class="eyebrow__num mono">11</span><span class="eyebrow__rule"></span><span class="eyebrow__label mono">Why Local Vocal</span></div>
      <h2 class="section-h section-h--light">Why local businesses choose<br><em class="serif">Local Vocal Marketing.</em></h2>

      <div class="whyus__grid">
        <?php
        $whyus = array(
          array( 'We understand local search', 'Maryland service areas, map pack mechanics, and the keywords customers actually type.' ),
          array( 'We build websites with SEO in mind', 'Not pretty templates retrofitted later. Structure, speed, and schema from page one.' ),
          array( 'We publish content consistently', 'Blog posts that target real searches, written to your voice — not AI filler.' ),
          array( 'We support your website long‑term', 'Updates, fixes, new pages, and small wins, on a calendar — not on hold.' ),
          array( 'We communicate clearly', "No jargon. No 40‑slide reports. Just what's working, what's not, and what's next." ),
          array( 'We focus on visibility, trust, and leads', 'Three measurable outcomes. Everything else is a means to those ends.' ),
        );
        foreach ( $whyus as $i => $p ) : ?>
          <div class="whyus__item">
            <div class="whyus__num mono"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
            <h3 class="whyus__t"><?php echo esc_html( $p[0] ); ?></h3>
            <p class="whyus__d"><?php echo esc_html( $p[1] ); ?></p>
          </div>
        <?php endforeach; ?>
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
