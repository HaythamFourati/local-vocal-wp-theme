<?php
/**
 * Front Page — Local Vocal Marketing
 * Maryland Web Design & SEO for Local Businesses.
 *
 * Dark "cinematic" system: inset shader stage, light display type,
 * pill controls, card libraries, stepper + stage panels.
 * Styles: src/home.css (scoped to .lvh). Behaviour: src/scripts/home.js.
 */
get_header();

$assets  = get_template_directory_uri() . '/assets/projects/';
$contact = esc_url( lvm_url( 'contact' ) );
$arrow   = '<svg class="lvh-arrow" viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>';

$icon = function ( $paths ) {
  return '<svg class="lvh-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $paths . '</svg>';
};
// Screenshot src/srcset: each .jpg in assets/projects/screens/ has .webp and -720.webp copies (cwebp -q 78)
$shot = function ( $img ) use ( $assets ) {
  $base = $assets . 'screens/' . preg_replace( '/\.jpg$/', '', $img );
  return 'src="' . esc_url( $base . '.webp' ) . '" srcset="' . esc_url( $base . '-720.webp' ) . ' 720w, ' . esc_url( $base . '.webp' ) . ' 1440w" sizes="(max-width: 960px) 92vw, 720px"';
};
// Browser-window mockup. Screenshots live in assets/projects/screens/ and are never cropped.
$window = function ( $img, $url, $alt = '', $class = '' ) use ( $shot ) {
  return '<figure class="lvh-window ' . esc_attr( $class ) . '">'
    . '<div class="lvh-window__bar"><span class="lvh-window__dots"><i></i><i></i><i></i></span>'
    . '<span class="lvh-window__url"><svg viewBox="0 0 16 16" width="10" height="10" fill="currentColor" aria-hidden="true"><path d="M5 7V5a3 3 0 0 1 6 0v2h.5A1.5 1.5 0 0 1 13 8.5v5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 13.5v-5A1.5 1.5 0 0 1 4.5 7H5zm1.5 0h3V5a1.5 1.5 0 0 0-3 0v2z"/></svg>' . esc_html( $url ) . '</span><span></span></div>'
    . '<img ' . $shot( $img ) . ' alt="' . esc_attr( $alt ) . '" loading="lazy">'
    . '</figure>';
};
// Platform app icons live in functions.php (lvm_platforms / lvm_app_icon), shared with inner pages
$platforms = lvm_platforms();
$app       = 'lvm_app_icon';
// Two-tone section title: bright lead + dimmed tail.
$title = function ( $lead, $tail, $tag = 'h2', $class = '' ) {
  return '<' . $tag . ' class="lvh-title ' . esc_attr( $class ) . '" data-reveal>' . $lead . ' <span class="lvh-dim">' . $tail . '</span></' . $tag . '>';
};
$eyebrow = function ( $text ) {
  return '<span class="lvh-eyebrow" data-reveal>' . $text . '</span>';
};
?>

<main class="lvh">
  <script>if ('IntersectionObserver' in window) document.documentElement.classList.add('lvh-js');</script>

  <!-- ============================================================
       HERO — inset shader stage
       ============================================================ -->
  <section class="lvh-hero" id="top">
    <div class="lvh-stage">
      <canvas class="lvh-shader" data-shader="stage" aria-hidden="true"></canvas>
      <div class="lvh-stage__grid">
        <div class="lvh-hero__copy">
          <span class="lvh-eyebrow lvh-eyebrow--live" data-reveal><i></i>Web design &amp; local SEO · Glyndon, Maryland</span>
          <?php
          // Each word enters on its own stagger (--w).
          $w = 0;
          $words = function ( $text ) use ( &$w ) {
            $out = array();
            foreach ( explode( ' ', $text ) as $word ) {
              $out[] = '<span class="lvh-w" style="--w:' . $w++ . '">' . $word . '</span>';
            }
            return implode( ' ', $out );
          };
          ?>
          <h1 class="lvh-title lvh-title--hero" data-reveal>
            <?php echo $words( 'Maryland web design &amp; SEO' ); ?>
            <span class="lvh-dim"><?php echo $words( 'for local businesses.' ); ?></span>
          </h1>
          <p class="lvh-deck" data-reveal>
            We build fast, search‑ready websites for Baltimore and Maryland businesses and keep them climbing with local SEO,
            blog content, social media, and ongoing support — so your phone rings with
            people already searching for what you do.
          </p>
          <div class="lvh-actions" data-reveal>
            <a href="#cta" class="lvh-btn lvh-btn--glow" data-lvm-intake><span>Get my free website &amp; SEO review</span><span class="lvh-btn__icon"><?php echo $arrow; ?></span></a>
            <a href="#work" class="lvh-btn lvh-btn--ghost">See our work</a>
          </div>
          <ul class="lvh-meta" data-reveal>
            <li>Since 2010</li>
            <li>One 3‑person team</li>
            <li>Free review, report in 48 hours</li>
          </ul>
        </div>

        <?php
        // Map-pack demo. First query is server-rendered; home.js cycles the rest.
        $queries = array(
          array( 'q' => 'roofing contractor annapolis', 'r' => array(
            array( 'Your business',             '4.9', '87',  '1.2' ),
            array( 'Bay Ridge Roofing',         '4.6', '52',  '2.8' ),
            array( 'Severn Exteriors',          '4.4', '31',  '3.5' ),
          ) ),
          array( 'q' => 'dentist severna park', 'r' => array(
            array( 'Your business',             '4.9', '212', '0.8' ),
            array( 'Magothy Dental Group',      '4.7', '140', '1.9' ),
            array( 'Park Smiles Family Dental', '4.5', '96',  '2.4' ),
          ) ),
          array( 'q' => 'dui lawyer ocean city', 'r' => array(
            array( 'Your business',             '5.0', '64',  '0.5' ),
            array( 'Coastal Defense Law',       '4.6', '41',  '1.1' ),
            array( 'Worcester Legal Group',     '4.3', '22',  '2.0' ),
          ) ),
          array( 'q' => 'auto glass repair baltimore', 'r' => array(
            array( 'Your business',             '4.9', '143', '2.1' ),
            array( 'Charm City Glass',          '4.5', '77',  '3.0' ),
            array( 'Harbor Auto Glass',         '4.3', '40',  '4.2' ),
          ) ),
        );
        // Desktop results-page details per search (the browser beside the phone).
        // Addresses and 555 phone numbers are fictional.
        $serp = array(
          array( 'cat' => 'Roofing contractor in Annapolis, MD', 'crumb' => 'yourbusiness.com › roofing-annapolis', 'title' => 'Roofing Contractor in Annapolis, MD | Your business',
                 'desc' => 'Licensed, insured roofers serving Annapolis. Free inspections, storm repair and new roofs — on your roof within 24 hours.',
                 'addr' => '120 Bay Ridge Ave, Annapolis, MD', 'hours' => 'Open · Closes 6 PM', 'tel' => '(410) 555‑0142', 'count' => '1,240,000', 'secs' => '0.41' ),
          array( 'cat' => 'Dentist in Severna Park, MD', 'crumb' => 'yourbusiness.com › dentist-severna-park', 'title' => 'Family Dentist in Severna Park, MD | Your business',
                 'desc' => 'Gentle family dentistry with evening and Saturday visits. New patients welcome — most PPO plans accepted.',
                 'addr' => '540 Ritchie Hwy, Severna Park, MD', 'hours' => 'Open · Closes 7 PM', 'tel' => '(410) 555‑0187', 'count' => '862,000', 'secs' => '0.38' ),
          array( 'cat' => 'DUI attorney in Ocean City, MD', 'crumb' => 'yourbusiness.com › dui-lawyer-ocean-city', 'title' => 'DUI Defense Lawyer in Ocean City, MD | Your business',
                 'desc' => 'Charged with a DUI in Ocean City? Free, confidential consultation with an experienced defense attorney — day or night.',
                 'addr' => '9 Philadelphia Ave, Ocean City, MD', 'hours' => 'Open 24 hours', 'tel' => '(410) 555‑0119', 'count' => '412,000', 'secs' => '0.44' ),
          array( 'cat' => 'Auto glass shop in Baltimore, MD', 'crumb' => 'yourbusiness.com › auto-glass-baltimore', 'title' => 'Mobile Auto Glass Repair in Baltimore | Your business',
                 'desc' => 'Same-day windshield repair and replacement. We come to your home or work anywhere in Baltimore.',
                 'addr' => 'Mobile service · Baltimore, MD', 'hours' => 'Open · Closes 8 PM', 'tel' => '(410) 555‑0163', 'count' => '1,030,000', 'secs' => '0.39' ),
        );
        foreach ( $serp as $i => $d ) { $queries[ $i ]['site'] = $d; }
        ?>
        <div class="lvh-hero__visual" aria-hidden="true">
          <?php
          // Desktop search results that mirror the phone: same query, same
          // ranking, "Your business" on top. home.js swaps the fields per search.
          $s0  = $queries[0]['site'];
          $r0  = $queries[0]['r'];
          $tel_icon = '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z"/></svg>';
          $glass = '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="7" cy="7" r="4.5"/><path d="M10.5 10.5 14 14"/></svg>';
          ?>
          <figure class="lvh-site lvh-gs-win" data-reveal>
            <div class="lvh-window__bar">
              <span class="lvh-window__dots"><i></i><i></i><i></i></span>
              <span class="lvh-window__url"><svg viewBox="0 0 16 16" width="10" height="10" fill="currentColor"><path d="M5 7V5a3 3 0 0 1 6 0v2h.5A1.5 1.5 0 0 1 13 8.5v5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 13.5v-5A1.5 1.5 0 0 1 4.5 7H5zm1.5 0h3V5a1.5 1.5 0 0 0-3 0v2z"/></svg><span class="lvh-site__url">google.com/search</span></span>
              <span class="lvh-site__load" aria-hidden="true"></span>
            </div>
            <div class="lvh-site__page lvh-gs">
              <div class="lvh-gs__head">
                <svg class="lvh-gs__mark" viewBox="0 0 48 48" aria-hidden="true"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                <span class="lvh-gs__box"><?php echo $glass; ?><span class="lvh-gs__q"><?php echo esc_html( $queries[0]['q'] ); ?></span><span class="lvh-gs__caret"></span></span>
              </div>
              <div class="lvh-gs__tabs"><i class="is-on">All</i><i>Maps</i><i>Images</i><i>Reviews</i><i>News</i></div>

              <div class="lvh-gs__body">
                <div class="lvh-gs__main">
                  <span class="lvh-gs__stats lvh-gs__in" style="--o:0">About <span data-s="count"><?php echo esc_html( $s0['count'] ); ?></span> results (<span data-s="secs"><?php echo esc_html( $s0['secs'] ); ?></span> seconds)</span>

                  <div class="lvh-gs__pack lvh-gs__in" style="--o:1">
                    <span class="lvh-gs__label">Places</span>
                    <div class="lvh-gs__map">
                      <span class="lvh-gs__pin" style="--x:22%;--y:34%"></span>
                      <span class="lvh-gs__pin" style="--x:74%;--y:62%"></span>
                      <span class="lvh-gs__pin lvh-gs__pin--you" style="--x:48%;--y:46%"><b>1</b></span>
                    </div>
                    <?php foreach ( $r0 as $i => $r ) : ?>
                      <div class="lvh-gs__place<?php echo 0 === $i ? ' is-you' : ''; ?>"<?php echo 0 === $i ? ' data-t="you"' : ''; ?>>
                        <span class="lvh-gs__pos"><?php echo (int) $i + 1; ?></span>
                        <span class="lvh-gs__pname"><b data-s="p<?php echo (int) $i; ?>"><?php echo esc_html( $r[0] ); ?></b><small><span class="lvh-gs__stars">★★★★★</span> <span data-s="p<?php echo (int) $i; ?>m">★ <?php echo esc_html( $r[1] ); ?> (<?php echo esc_html( $r[2] ); ?>) · <?php echo esc_html( $r[3] ); ?> mi</span></small></span>
                        <?php if ( 0 === $i ) : ?><span class="lvh-gs__open">Open</span><?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <div class="lvh-gs__result lvh-gs__in" style="--o:2">
                    <span class="lvh-gs__site"><i>Y</i><span>Your business<small data-s="crumb"><?php echo esc_html( $s0['crumb'] ); ?></small></span></span>
                    <b class="lvh-gs__title" data-s="title"><?php echo esc_html( $s0['title'] ); ?></b>
                    <p data-s="desc"><?php echo esc_html( $s0['desc'] ); ?></p>
                    <span class="lvh-gs__links"><i>Services</i><i>Reviews</i><i>Free quote</i><i>Contact</i></span>
                  </div>
                </div>

                <aside class="lvh-gs__panel lvh-gs__in" style="--o:1">
                  <div class="lvh-gs__photo"><span><i>Y</i></span></div>
                  <b class="lvh-gs__pn">Your business</b>
                  <span class="lvh-gs__rate"><b data-s="rating"><?php echo esc_html( $r0[0][1] ); ?></b> <span class="lvh-gs__stars">★★★★★</span> <span data-s="reviews">(<?php echo esc_html( $r0[0][2] ); ?>)</span></span>
                  <span class="lvh-gs__cat" data-s="cat"><?php echo esc_html( $s0['cat'] ); ?></span>
                  <span class="lvh-gs__acts">
                    <i data-t="web"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z"/></svg>Website</i>
                    <i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"><path d="M12 2l9 9-9 9-9-9z"/><path d="M9 13v-2h5l-2-2m2 2l-2 2"/></svg>Directions</i>
                    <i data-call><?php echo $tel_icon; ?>Call</i>
                  </span>
                  <span class="lvh-gs__info"><b>Address</b><span data-s="addr"><?php echo esc_html( $s0['addr'] ); ?></span></span>
                  <span class="lvh-gs__info"><b>Hours</b><span data-s="hours" class="lvh-gs__hours"><?php echo esc_html( $s0['hours'] ); ?></span></span>
                  <span class="lvh-gs__info"><b>Phone</b><span data-s="tel"><?php echo esc_html( $s0['tel'] ); ?></span></span>
                </aside>

                <?php // Loading placeholders, shown while the next query types (.is-searching) ?>
                <div class="lvh-gs__skel" aria-hidden="true">
                  <div class="lvh-gs__main">
                    <i style="width:34%;height:1.3cqw"></i>
                    <div class="lvh-gs__skelpack">
                      <i style="width:22%;height:1.7cqw"></i>
                      <i class="lvh-skel__map"></i>
                      <?php for ( $k = 0; $k < 3; $k++ ) : ?>
                        <span class="lvh-skel__row"><i class="lvh-skel__dot"></i><span><i style="width:<?php echo 52 - $k * 8; ?>%"></i><i style="width:<?php echo 34 - $k * 4; ?>%;height:1.1cqw"></i></span></span>
                      <?php endfor; ?>
                    </div>
                    <span class="lvh-skel__res"><i style="width:30%;height:1.1cqw"></i><i style="width:68%;height:2cqw"></i><i style="width:92%"></i><i style="width:76%"></i></span>
                  </div>
                  <div class="lvh-gs__skelpanel">
                    <i class="lvh-skel__photo"></i>
                    <i style="width:58%;height:2cqw"></i><i style="width:44%"></i><i style="width:70%"></i>
                    <span class="lvh-skel__acts"><i></i><i></i><i></i></span>
                    <i style="width:86%"></i><i style="width:64%"></i><i style="width:52%"></i>
                  </div>
                </div>
              </div>

              <span class="lvh-cursor lvh-cursor--a" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 2.5l15.5 8.3-6.6 1.9-3 6.3z"/></svg><b>Visitor</b></span>
            </div>
          </figure>

          <div class="lvh-device" data-reveal>
            <div class="lvh-tilt">
            <div class="lvh-phone" data-queries="<?php echo esc_attr( wp_json_encode( $queries ) ); ?>">
              <span class="lvh-phone__btn lvh-phone__btn--action"></span>
              <span class="lvh-phone__btn lvh-phone__btn--volup"></span>
              <span class="lvh-phone__btn lvh-phone__btn--voldown"></span>
              <span class="lvh-phone__btn lvh-phone__btn--power"></span>
              <span class="lvh-phone__btn lvh-phone__btn--camera"></span>
              <div class="lvh-phone__bezel">
                <div class="lvh-phone__screen">
                  <div class="lvh-phone__status">
                    <span>9:41</span>
                    <span class="lvh-phone__icons">
                      <svg viewBox="0 0 18 12" fill="currentColor"><rect x="0" y="8" width="3" height="4" rx="1"/><rect x="5" y="5.5" width="3" height="6.5" rx="1"/><rect x="10" y="3" width="3" height="9" rx="1"/><rect x="15" y="0" width="3" height="12" rx="1"/></svg>
                      <svg viewBox="0 0 16 12" fill="currentColor"><path d="M8 2.4c2.3 0 4.4.9 6 2.4l1.2-1.3A10.2 10.2 0 0 0 8 .6 10.2 10.2 0 0 0 .8 3.5L2 4.8a8.4 8.4 0 0 1 6-2.4zm0 3.5c1.3 0 2.5.5 3.5 1.3l1.2-1.3A6.9 6.9 0 0 0 8 4.1a6.9 6.9 0 0 0-4.7 1.8l1.2 1.3c1-.8 2.2-1.3 3.5-1.3zm0 3.4c-.5 0-1 .2-1.3.5L8 11.2l1.3-1.4A1.9 1.9 0 0 0 8 9.3z"/></svg>
                      <span class="lvh-phone__battery"><i></i></span>
                    </span>
                  </div>

                  <div class="lvh-island">
                    <span class="lvh-island__avatar">Y</span>
                    <span class="lvh-island__text"><small>Calling…</small>Your business</span>
                    <span class="lvh-island__end">
                      <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 9c-1.6 0-3.15.25-4.6.72v3.1c0 .39-.23.74-.56.9-.98.49-1.87 1.12-2.66 1.850-.18.18-.43.28-.7.28-.28 0-.53-.11-.71-.29L.29 13.08a.956.956 0 0 1 0-1.36C3.34 8.78 7.46 7 12 7s8.66 1.78 11.71 4.72c.18.18.29.44.29.71 0 .28-.11.53-.29.71l-2.48 2.48c-.18.18-.43.29-.71.29-.27 0-.52-.11-.7-.28a11.27 11.27 0 0 0-2.66-1.85.996.996 0 0 1-.56-.9v-3.1C15.15 9.25 13.6 9 12 9z"/></svg>
                    </span>
                  </div>

                  <div class="lvh-phone__search">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="7" cy="7" r="4.5"/><path d="M10.5 10.5 14 14"/></svg>
                    <span class="lvh-phone__typed"><?php echo esc_html( $queries[0]['q'] ); ?></span><span class="lvh-phone__caret"></span>
                  </div>
                  <div class="lvh-phone__chips"><span class="is-on">Open now</span><span>Top rated</span><span>Nearby</span></div>

                  <div class="lvh-phone__map">
                    <span class="lvh-phone__pin" style="--x:20%;--y:28%;--i:0"></span>
                    <span class="lvh-phone__pin" style="--x:76%;--y:64%;--i:1"></span>
                    <span class="lvh-phone__pin" style="--x:64%;--y:22%;--i:2"></span>
                    <span class="lvh-phone__pin lvh-phone__pin--you" style="--x:44%;--y:50%;--i:3"><b>1</b></span>
                  </div>

                  <div class="lvh-phone__list">
                  <ol class="lvh-phone__results">
                    <?php foreach ( $queries[0]['r'] as $i => $r ) : ?>
                      <li style="--i:<?php echo (int) $i; ?>"<?php echo 0 === $i ? ' class="is-you"' : ''; ?>>
                        <span class="lvh-phone__pos"><?php echo (int) $i + 1; ?></span>
                        <span class="lvh-phone__name"><?php echo esc_html( $r[0] ); ?><small>★ <?php echo esc_html( $r[1] ); ?> (<?php echo esc_html( $r[2] ); ?>) · <?php echo esc_html( $r[3] ); ?> mi · Open</small></span>
                        <?php if ( 0 === $i ) : ?><span class="lvh-phone__call">Call</span><?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ol>
                  <div class="lvh-phone__skel" aria-hidden="true">
                    <?php for ( $k = 0; $k < 3; $k++ ) : ?>
                      <span><i class="lvh-skel__dot"></i><span><i style="width:<?php echo 70 - $k * 10; ?>%"></i><i style="width:<?php echo 46 - $k * 6; ?>%;height:2.6cqw"></i></span></span>
                    <?php endfor; ?>
                  </div>
                  </div>
                  <div class="lvh-phone__tabs"><span class="is-on">Explore</span><span>Go</span><span>Saved</span><span>Updates</span></div>
                  <span class="lvh-phone__home"></span>
                </div>
              </div>
            </div>
            </div>
          </div>

          <div class="lvh-toast">
            <span class="lvh-toast__icon">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z"/></svg>
            </span>
            <span><small>Your business line · now</small><strong>New customer calling</strong><small>Found you on Google Maps</small></span>
          </div>
        </div>
      </div>
    </div>

    <div class="lvh-wrap lvh-roster" data-reveal>
      <span class="lvh-roster__lbl">Trusted by businesses like</span>
      <ul>
        <?php
        $logos = array(
          array( 'Hug in the Mail',                'https://huginthemail.com/' ),
          array( 'Success Circles',                'https://www.successcircles.com/' ),
          array( 'Caregiving Angels of Maryland',  'https://caregivingangelsofmd.com/' ),
          array( 'Security Training Academy',      'https://www.securitytrainingclasses.com/' ),
          array( 'Cullen M Burke Law Office',      'https://www.cullenburke.com/' ),
          array( 'Extreme Vivid Auto Glass',       'https://ev-autoglass.com/' ),
        );
        foreach ( $logos as $l ) : ?>
          <li><a href="<?php echo esc_url( $l[1] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $l[0] ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- ============================================================
       RECENT WORK — pinned reel (scroll drives the track sideways)
       ============================================================ -->
  <?php
  // [client, tag, scope, screenshot, url, one-liner, new?, alt]
  $work = array(
    array( 'Hug in the Mail',               'Subscription',  'Web design',      'huginthemail.jpg',   'huginthemail.com',          'A warm, tactile brand for a monthly mail subscription.',          true,  'Hug in the Mail website — a monthly envelope of warmth' ),
    array( 'Success Circles',               'Coaching',      'Web design',      'successcircles.jpg', 'successcircles.com',        'A confident, video‑led home for an entrepreneur community.',     true,  'Success Circles website — advisory community for established entrepreneurs' ),
    array( 'Caregiving Angels of Maryland', 'Home Care',     'Web + Local SEO', 'caregiving.jpg',     'caregivingangelsofmd.com',  'Trust‑led design that ranks across 40+ home‑care searches.',      true,  'Caregiving Angels of Maryland website — licensed in-home care' ),
    array( 'Extreme Vivid Auto Glass',      'Auto Glass',    'Web + SEO',       'ev-autoglass.jpg',   'ev-autoglass.com',          'Mobile windshield service built for urgent local search.',       false, 'Extreme Vivid Auto Glass website — mobile autoglass service in Baltimore County' ),
    array( 'Cullen Burke, Attorney at Law', 'Legal',         'Web + Content',   'cullen.jpg',         'cullenburke.com',           'An authority‑first identity for a three‑decade defender.',       false, 'Cullen Burke Attorney at Law website — criminal defense Maryland' ),
    array( 'Reflect Neuropsychology',       'Healthcare',    'Web + SEO',       'reflect.jpg',        'reflectneuropsych.com',     'A calm, clinical site that books the next step in two clicks.',  false, 'Reflect Neuropsychology website — assessment through the lifespan' ),
    array( 'Precision Aesthetics',          'Aesthetics',    'Web + Content',   'pa.jpg',             'precisionaesthetics.com',   'Editorial‑grade aesthetics, as seen in Vogue and Elle.',         false, 'Precision Aesthetics website — non-invasive aesthetic treatments NYC' ),
    array( 'Kidzz Kreations',               'Entertainment', 'Web + Local SEO', 'kids.jpg',           'kidzzkreations.com',        'A playful, booking‑first kids entertainment brand.',             false, 'Kidzz Kreations website — kids entertainment agency' ),
  );
  ?>
  <section class="lvh-sec lvh-reel" id="work">
    <div class="lvh-reel__pin">
      <header class="lvh-wrap lvh-head lvh-head--row lvh-reel__head">
        <div>
          <?php echo $eyebrow( 'New builds every month' ); ?>
          <?php echo $title( 'Websites', 'we\'ve shipped.' ); ?>
        </div>
        <div class="lvh-reel__meta" data-reveal>
          <span class="lvh-reel__count" aria-hidden="true"><b class="lvh-reel__n">01</b><span>/ <?php echo str_pad( count( $work ), 2, '0', STR_PAD_LEFT ); ?></span></span>
          <a class="lvh-textlink" href="<?php echo $contact; ?>">Start your project <?php echo $arrow; ?></a>
        </div>
      </header>

      <div class="lvh-reel__view">
        <ol class="lvh-reel__track">
          <?php foreach ( $work as $i => $c ) : ?>
            <li class="lvh-shot" data-reveal>
              <figure class="lvh-shot__win">
                <div class="lvh-window__bar"><span class="lvh-window__dots"><i></i><i></i><i></i></span><span class="lvh-window__url"><?php echo esc_html( $c[4] ); ?></span><span></span></div>
                <div class="lvh-shot__img"><img <?php echo $shot( $c[3] ); ?> alt="<?php echo esc_attr( $c[7] ); ?>" loading="lazy" draggable="false"></div>
                <?php if ( $c[6] ) : ?><span class="lvh-badge">New</span><?php endif; ?>
              </figure>
              <div class="lvh-shot__meta">
                <span class="lvh-shot__num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
                <div>
                  <h3><?php echo esc_html( $c[0] ); ?></h3>
                  <span><?php echo esc_html( $c[1] ); ?> · <?php echo esc_html( $c[2] ); ?></span>
                </div>
                <p><?php echo esc_html( $c[5] ); ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
      <div class="lvh-wrap lvh-reel__foot" aria-hidden="true"><span class="lvh-reel__bar"><i></i></span><span class="lvh-reel__hint">Scroll</span></div>
    </div>
  </section>

  <!-- ============================================================
       PROBLEM — each issue drops you down the results
       ============================================================ -->
  <section class="lvh-sec lvh-sec--bay" id="problem">
    <div class="lvh-bay">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'The problem' ); ?>
          <?php echo $title( 'Your customers are searching.', 'Can they find you?' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          Most local businesses have a website. Fewer have one that ranks, loads fast,
          reads well on mobile, and brings in calls. Close each gap below and watch where you land.
        </p>
      </header>

      <div class="lvh-fall">
        <div class="lvh-fall__aside">
          <div class="lvh-board" data-reveal aria-hidden="true">
            <div class="lvh-board__q">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="7" cy="7" r="4.5"/><path d="M10.5 10.5 14 14"/></svg>
              <span>plumber near me</span><small>Annapolis, MD</small>
            </div>
            <ol class="lvh-board__list">
              <?php
              $rivals = array(
                array( 'Chesapeake Plumbing Co.', '4.9' ), array( 'Annapolis Drain Pros', '4.8' ), array( 'Bay Ridge Plumbing', '4.8' ),
                array( 'Severn Valley Plumbing', '4.7' ), array( 'Capital City Rooter', '4.7' ), array( 'Arundel Pipe &amp; Drain', '4.6' ),
                array( 'Harbor Plumbing Services', '4.6' ), array( 'Eastport Plumbing', '4.5' ), array( 'Crofton Rooter', '4.4' ), array( 'Broadneck Plumbing', '4.3' ),
              );
              // Starts on page 3: every rival above you, your row parked under the fold
              foreach ( $rivals as $i => $r ) : ?>
                <li class="lvh-board__row" style="transform:translateY(<?php echo $i * 100; ?>%)"><span class="lvh-board__pos"><?php echo $i + 1; ?></span><span class="lvh-board__name"><?php echo $r[0]; ?></span><small>★ <?php echo $r[1]; ?></small></li>
              <?php endforeach; ?>
              <li class="lvh-board__row is-you" style="transform:translateY(825%)"><span class="lvh-board__pos">26</span><span class="lvh-board__name">Your business <em class="lvh-board__up"></em></span><small class="lvh-board__where">Page 3</small></li>
            </ol>
            <div class="lvh-board__fold"><span>Below the fold</span></div>
            <div class="lvh-board__foot">
              <span>Your visibility</span>
              <b class="lvh-board__pct">4%</b>
              <span class="lvh-board__meter"><i style="transform:scaleX(.04)"></i></span>
              <span class="lvh-board__pips"><?php echo str_repeat( '<i></i>', 6 ); ?><small class="lvh-board__step">0 of 6 fixed</small></span>
            </div>
          </div>
        </div>

        <ol class="lvh-fall__steps">
          <?php
          // [title, problem, fix, severity, icon, rank once fixed, visibility % once fixed]
          $problems = array(
            array( "You don't show up for local searches",   'Customers Google your service in your city — and find someone else first.', 'A complete Google Business Profile, city pages and citations that put you on the map.', 'Critical', '<path d="M12 21s-6-5.3-6-10a6 6 0 0 1 10.4-4.1"/><path d="M17.7 9.3c.2.5.3 1.1.3 1.7 0 4.7-6 10-6 10"/><path d="M3 3l18 18"/>', 17, 14 ),
            array( 'Competitors outrank you on Google',       'A few SEO basics decide who appears in the map pack and who scrolls by.',  'Technical and on-page SEO done properly, then kept up every month.', 'Critical', '<path d="M3 7l6 6 4-4 8 8"/><path d="M15 17h6v-6"/>', 11, 29 ),
            array( 'Your site looks outdated on mobile',      'Most local searches happen on a phone. Slow, cramped sites lose the click.', 'A fast, mobile-first site where calling you is one tap away.', 'High',     '<rect x="7" y="2.5" width="10" height="19" rx="2.5"/><path d="M11 18.5h2"/>', 8, 47 ),
            array( 'Service pages feel thin',                 "Generic copy doesn't tell Google — or customers — what you actually do.",  'A real page for every service, written around what people search.', 'High',     '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h4"/>', 5, 66 ),
            array( "Your blog isn't targeting real searches", 'Without intent‑driven topics, content sits unread and unranked.',           'A content plan built on what your local customers actually ask.', 'Medium',   '<circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/>', 3, 84 ),
            array( 'Updates take weeks, not hours',           "New service? Seasonal promo? You shouldn't have to wait on a freelancer.",  'Ongoing support: changes go live in hours, not weeks.', 'Medium',   '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>', 1, 100 ),
          );
          $check = '<svg viewBox="0 0 16 16" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3.5 8.5 3 3 6-7"/></svg>';
          foreach ( $problems as $i => $p ) : ?>
            <li class="lvh-fall__step" data-rank="<?php echo (int) $p[5]; ?>" data-pct="<?php echo (int) $p[6]; ?>">
              <div class="lvh-fall__top">
                <span class="lvh-fall__num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
                <span class="lvh-tile-ico lvh-tile-ico--sm"><?php echo $icon( $p[4] ); ?></span>
                <span class="lvh-chip lvh-chip--<?php echo esc_attr( strtolower( $p[3] ) ); ?>"><?php echo esc_html( $p[3] ); ?></span>
                <span class="lvh-chip lvh-chip--fixed"><?php echo $check; ?>Fixed</span>
              </div>
              <h3><?php echo esc_html( $p[0] ); ?></h3>
              <p><?php echo esc_html( $p[1] ); ?></p>
              <div class="lvh-fall__fix"><div><span>The fix</span><?php echo esc_html( $p[2] ); ?></div></div>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SERVICES — typographic index + cursor preview
       ============================================================ -->
  <section class="lvh-sec" id="services">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Services' ); ?>
          <?php echo $title( 'Seven services.', 'One team, built for local growth.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          Buy one, the rest get sharper. Combine them and you stop competing for
          attention and start competing for the click.
        </p>
      </header>

      <?php
      $services = array(
        array( 'Website Design',          'Modern, mobile‑friendly websites that build trust, explain your services clearly, and help visitors take action.',                     'Service businesses on outdated or template sites',   'Cleaner design, faster pages, more phone clicks',            '/development' ),
        array( 'Local SEO',               'On‑page SEO, keyword strategy, metadata, internal linking, and Google Business Profile support — built around your service area.',   'Maryland businesses that want to show up locally',   'Higher map‑pack visibility and qualified search traffic',     '/seo-optimization' ),
        array( 'SEO Blog Articles',       'Ongoing blog content written around real customer questions, service keywords, and local search intent — not filler.',              'Businesses building topical authority over time',    'Long‑term organic traffic and supported service pages',       '/content-creation' ),
        array( 'Social Media Management', 'Consistent posting that keeps your business visible — service updates, blog promotion, seasonal content, and customer education.', 'Local brands that need to stay active, not viral',   'Steady online presence and a trust signal for searchers',     '/social-media-management' ),
        array( 'Custom Plugins & Solutions', 'Booking flows, quote calculators, client portals and integrations with the tools you already use — custom WordPress plugins built around how your business works.', "Businesses whose process doesn't fit an off‑the‑shelf plugin", 'Software that fits your business, not the other way round',  '/development' ),
        array( 'Ongoing Website Support', 'Updates, fixes, new pages, security patches, content changes, and performance tuning — handled without the headache.',              'Owners who want a long‑term partner, not a one‑off', 'A healthy website that stays current and search‑friendly',   '/analytics-reporting' ),
        array( 'AI Search Optimization',  'Get your business named when customers ask ChatGPT, Google AI Overviews, Gemini, or Perplexity who to call — clear facts, schema, and reviews AI can trust.', 'Owners asking "does ChatGPT know about us?"',      'Accurate AI answers that recommend you, not a competitor',   '/ai-search-optimization' ),
      );
      ?>
      <ol class="lvh-index">
        <?php foreach ( $services as $i => $s ) : ?>
          <li data-reveal>
            <a class="lvh-index__row" href="<?php echo esc_url( trailingslashit( home_url( $s[4] ) ) ); ?>" data-peek="<?php echo (int) $i; ?>">
              <span class="lvh-index__num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
              <span class="lvh-index__title"><?php echo esc_html( $s[0] ); ?></span>
              <span class="lvh-index__text">
                <span><?php echo esc_html( $s[1] ); ?></span>
                <span class="lvh-index__dl"><span><small>Best for</small><?php echo esc_html( $s[2] ); ?></span><span><small>You get</small><?php echo esc_html( $s[3] ); ?></span></span>
              </span>
              <span class="lvh-index__go"><?php echo $arrow; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

    <div class="lvh-peek" aria-hidden="true">
      <div class="lvh-peek__card">
        <?php
        // One preview per service, same order as $services. Children with
        // --i animate in (staggered) each time their pane turns on.
        $peek_head = function ( $i ) use ( $services ) {
          return '<div class="lvh-peek__head"><span>' . str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) . '</span>' . esc_html( $services[ $i ][0] ) . '</div>';
        };
        ?>
        <div class="lvh-peek__pane is-on">
          <?php echo $peek_head( 0 ); ?>
          <div class="lvh-peek__stage lvh-pk-site">
            <?php echo $window( 'successcircles.jpg', 'successcircles.com', '' ); ?>
            <span class="lvh-pk-score" style="--i:3"><b>98</b>Performance</span>
            <span class="lvh-pk-score" style="--i:4"><b>100</b>SEO</span>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 1 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-rank">
              <div class="lvh-rank__top"><span>security training baltimore</span></div>
              <?php
              $feed_rows = array(
                array( 1, 'Your business',                '★ 4.9 · 184 reviews', '▲ 6' ),
                array( 2, 'Baltimore Security Institute', '★ 4.6 · 92 reviews',  '▼ 1' ),
                array( 3, 'Maryland Protection Services', '★ 4.4 · 51 reviews',  '—'  ),
              );
              foreach ( $feed_rows as $r ) : ?>
                <div class="lvh-rank__row<?php echo 1 === $r[0] ? ' is-you' : ''; ?>" style="--i:<?php echo (int) $r[0]; ?>">
                  <span class="lvh-rank__pos"><?php echo (int) $r[0]; ?></span>
                  <span class="lvh-rank__name"><?php echo esc_html( $r[1] ); ?><small><?php echo esc_html( $r[2] ); ?></small></span>
                  <span class="lvh-rank__delta"><?php echo esc_html( $r[3] ); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 2 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-doc">
              <span class="lvh-doc__tag">Guide · Maryland</span>
              <strong>How to Choose the Right Security Training Program in Maryland</strong>
              <i style="--i:1"></i><i style="--i:2"></i><i style="--i:3"></i><i style="--i:4;width:64%"></i>
              <span class="lvh-doc__rank">Ranks #3 · 9 min read</span>
            </div>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 3 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-apps"><?php foreach ( array( 'facebook', 'instagram', 'google', 'youtube', 'linkedin', 'tiktok' ) as $k ) { echo $app( $k ); } ?></div>
            <span class="lvh-pk-pill" style="--i:4"><i></i>12 posts scheduled this month</span>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 4 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-plug">
              <div class="lvh-plug__head">
                <span class="lvh-plug__ico">{ }</span>
                <span><b>Instant Quote</b><small>Custom plugin · v1.4</small></span>
                <span class="lvh-plug__on" style="--i:5">Active</span>
              </div>
              <div class="lvh-plug__code">
                <i style="--i:1;--w:46%"></i><i style="--i:2;--w:72%;--x:14%"></i><i style="--i:3;--w:58%;--x:14%"></i><i style="--i:4;--w:30%"></i>
              </div>
            </div>
            <span class="lvh-pk-pill lvh-pk-pill--float" style="--i:6"><i></i>Synced with your CRM</span>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 5 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-care">
              <div class="lvh-care__top">
                <svg class="lvh-care__ring" viewBox="0 0 44 44"><circle cx="22" cy="22" r="19"/><circle cx="22" cy="22" r="19" pathLength="100"/></svg>
                <span class="lvh-care__score"><b>99.98%</b><small>Uptime · last 30 days</small></span>
                <span class="lvh-care__ok" style="--i:2">All systems normal</span>
              </div>
              <div class="lvh-care__bars"><?php for ( $d = 0; $d < 30; $d++ ) { echo '<i style="--d:' . $d . ( 17 === $d ? ';--h:62%' : '' ) . '"></i>'; } ?></div>
              <ul class="lvh-care__feed">
                <?php
                // [what happened, when, tone]
                $care = array(
                  array( 'Security patch applied', '2h ago', 'safe' ),
                  array( 'Nightly backup verified', '6h ago', 'safe' ),
                  array( 'New service page published', 'Yesterday', 'new' ),
                );
                foreach ( $care as $j => $c ) : ?>
                  <li class="is-<?php echo esc_attr( $c[2] ); ?>" style="--i:<?php echo $j + 3; ?>"><span><?php echo esc_html( $c[0] ); ?></span><small><?php echo esc_html( $c[1] ); ?></small></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="lvh-peek__pane">
          <?php echo $peek_head( 6 ); ?>
          <div class="lvh-peek__stage">
            <div class="lvh-doc">
              <span class="lvh-doc__tag">ChatGPT · "best HVAC company in Annapolis?"</span>
              <strong>Your business is a top pick: 4.9 stars, heat pump installs across Anne Arundel County.</strong>
              <i style="--i:1"></i><i style="--i:2"></i><i style="--i:3;width:64%"></i>
              <span class="lvh-doc__rank">Named in 3 of 4 AI answers</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       LOCAL SEO — full-bleed 3D map stage
       ============================================================ -->
  <section class="lvh-sec lvh-sec--bay" id="seo">
    <div class="lvh-bay lvh-mapbay">
      <div class="lvh-mapbay__copy">
        <?php echo $eyebrow( 'Local SEO' ); ?>
        <?php echo $title( 'Local SEO that helps Maryland businesses', 'get found.' ); ?>
        <p class="lvh-deck" data-reveal>
          Local customers search with intent. They want a business nearby, with real
          reviews, that answers the phone. We make sure that's you — at the top of the map pack.
        </p>
        <ul class="lvh-feats">
          <?php
          $seo_items = array(
            array( 'Google Business Profile',         'Categories, photos, posts, services, and review velocity — tuned.',         '<path d="M12 21s-7-6-7-11a7 7 0 0 1 14 0c0 5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/>' ),
            array( 'Local keyword targeting',         'The searches your customers actually use, by city and category.',           '<circle cx="11" cy="11" r="6.5"/><path d="M20 20l-4.4-4.4"/>' ),
            array( 'Service‑area SEO',                'Dedicated pages for each city and service you cover — not one thin page.',  '<path d="M9 4L3 6.5v13.5l6-2.5 6 2.5 6-2.5V4l-6 2.5z"/><path d="M9 4v13.5M15 6.5V20"/>' ),
            array( 'On‑page SEO',                     'Headings, metadata, internal links, and schema, fixed page by page.',       '<path d="M8 6l-5 6 5 6M16 6l5 6-5 6"/>' ),
            array( 'Content structure',               'Pages built to be readable by humans and crawlable by Google.',             '<rect x="4" y="4" width="16" height="16" rx="3"/><path d="M4 10h16M10 10v10"/>' ),
            array( 'Review &amp; reputation support', 'Steady review flow without spammy templates or fake names.',                '<path d="M12 3.5l2.6 5.3 5.9.9-4.2 4.1 1 5.8-5.3-2.8-5.3 2.8 1-5.8-4.2-4.1 5.9-.9z"/>' ),
          );
          foreach ( $seo_items as $it ) : ?>
            <li data-reveal><span class="lvh-tile-ico lvh-tile-ico--sm"><?php echo $icon( $it[2] ); ?></span><strong><?php echo $it[0]; ?></strong><span><?php echo esc_html( $it[1] ); ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="lvh-iso" data-reveal aria-hidden="true">
        <?php // WebGL city (home-city.js); the CSS city below is the fallback without WebGL ?>
        <canvas class="lvh-city"></canvas>
        <div class="lvh-city__tags">
          <span class="lvh-city__tag is-you" data-pin="0">
            <b>1</b><em>Your business</em>
            <span class="lvh-city__qs"><i style="--q:0">plumber near me</i><i style="--q:1">emergency plumber annapolis</i><i style="--q:2">water heater repair</i></span>
          </span>
          <span class="lvh-city__tag" data-pin="1"><b>2</b></span>
          <span class="lvh-city__tag" data-pin="2"><b>3</b></span>
          <span class="lvh-city__tag" data-pin="3"><b>4</b></span>
        </div>
        <div class="lvh-iso__stage">
          <div class="lvh-iso__plane">
            <span class="lvh-iso__water"></span>
            <span class="lvh-iso__road" style="--x:0;--y:44;--w:100;--d:5"></span>
            <span class="lvh-iso__road" style="--x:58;--y:0;--w:5;--d:100"></span>
            <span class="lvh-iso__road" style="--x:22;--y:0;--w:4;--d:44"></span>
            <span class="lvh-iso__road" style="--x:0;--y:76;--w:58;--d:4"></span>
            <?php
            $blocks = array(
              array( 4, 6, 15, 14, 51 ), array( 29, 8, 24, 12, 84 ), array( 68, 6, 14, 16, 63 ), array( 85, 12, 11, 22, 105 ),
              array( 4, 26, 14, 14, 36 ), array( 30, 26, 22, 13, 45 ), array( 68, 28, 24, 11, 39 ),
              array( 6, 54, 14, 18, 69 ), array( 26, 54, 26, 16, 33 ), array( 68, 54, 13, 14, 78 ),
              array( 6, 84, 20, 12, 42 ), array( 32, 84, 20, 12, 57 ),
            );
            foreach ( $blocks as $b ) : ?>
              <span class="lvh-iso__block" style="--x:<?php echo $b[0]; ?>;--y:<?php echo $b[1]; ?>;--w:<?php echo $b[2]; ?>;--d:<?php echo $b[3]; ?>;--h:<?php echo $b[4]; ?>px"><i></i><i></i><i></i><i></i><i></i></span>
            <?php endforeach; ?>
            <span class="lvh-iso__pin" style="--x:40;--y:47;--i:1"><span class="lvh-iso__up"><b>2</b></span></span>
            <span class="lvh-iso__pin" style="--x:60;--y:90;--i:2"><span class="lvh-iso__up"><b>3</b></span></span>
            <span class="lvh-iso__pin" style="--x:88;--y:80;--i:3"><span class="lvh-iso__up"><b>4</b></span></span>
            <span class="lvh-iso__pin lvh-iso__pin--you" style="--x:60;--y:46;--i:0">
              <span class="lvh-iso__ring"></span>
              <span class="lvh-iso__up">
                <b>1</b><em>Your business</em>
                <span class="lvh-iso__qs"><i style="--q:0">plumber near me</i><i style="--q:1">emergency plumber annapolis</i><i style="--q:2">water heater repair</i></span>
              </span>
            </span>
          </div>
        </div>
        <div class="lvh-pack">
          <span class="lvh-pack__label">Places · Anne Arundel County</span>
          <div class="lvh-pack__row is-you"><b>1</b><span>Your business<small><span class="lvh-pack__stars">★★★★★</span> 4.9 (184) · Open now</small></span><span class="lvh-pack__call"><?php echo $icon( '<path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z"/>' ); ?></span></div>
          <div class="lvh-pack__row"><b>2</b><span>Annapolis Drain Pros<small>★ 4.8 (96) · Closes 6 PM</small></span></div>
          <div class="lvh-pack__row"><b>3</b><span>Bay Ridge Plumbing<small>★ 4.6 (51) · Open now</small></span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WEBSITES THAT RANK — exploded layers: design, structure, data
       ============================================================ -->
  <section class="lvh-sec" id="web-design">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Website design' ); ?>
          <?php echo $title( 'Websites designed to look good', 'and rank better.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          A good website should do more than look professional. It should be structured so
          Google understands your services, your locations, and your expertise — and so a
          homeowner on a phone can call you in under ten seconds.
        </p>
      </header>

      <?php
      // One slide per layer of the site. [layer key, title, copy]
      $layers = array(
        array( 'design', 'What visitors see',          'A clear offer, real photos, and a call button within thumb reach. Design earns the trust that turns a visit into a call.' ),
        array( 'struct', 'What Google reads',          'One H1 with your service and city, a page for every service, and internal links that tie your blog to what you sell.' ),
        array( 'data',   'The data underneath',        'Schema and metadata spell out your business type, service area, phone and reviews — in the language search engines parse.' ),
        array( 'result', 'What shows up in search',    'All three layers add up to a rich result: stars, hours and a call button, right on the results page.' ),
      );
      ?>
      <div class="lvh-layers" data-reveal>
        <ol class="lvh-layers__steps" role="tablist" aria-label="How a website ranks, layer by layer">
          <?php foreach ( $layers as $i => $l ) : ?>
            <li role="presentation">
              <button class="lvh-layers__step<?php echo 0 === $i ? ' is-on' : ''; ?>" type="button" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-slide="<?php echo (int) $i; ?>">
                <span class="lvh-layers__num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
                <span class="lvh-layers__title"><?php echo esc_html( $l[1] ); ?></span>
                <span class="lvh-layers__body"><span><?php echo esc_html( $l[2] ); ?></span></span>
                <span class="lvh-layers__bar" aria-hidden="true"><i></i></span>
              </button>
            </li>
          <?php endforeach; ?>
        </ol>

        <div class="lvh-stack" data-slide="0" aria-hidden="true">
          <div class="lvh-stack__rig">
            <?php // Bottom to top: data, structure, design ?>
            <div class="lvh-stack__layer lvh-stack__layer--data">
              <span class="lvh-stack__name">Data</span>
              <div class="lvh-stack__meta">
                <span><i>&lt;title&gt;</i> In‑Home Care in Annapolis, MD | Caregiving Angels</span>
                <span><i>&lt;meta description&gt;</i> Licensed, bonded caregivers for Maryland seniors…</span>
              </div>
              <code class="lvh-stack__code"><span>{</span><span><i>"@type"</i>: <em>"HomeHealthCareService"</em>,</span><span><i>"areaServed"</i>: <em>"Annapolis, MD"</em>,</span><span><i>"telephone"</i>: <em>"+1‑443‑891‑5530"</em>,</span><span><i>"aggregateRating"</i>: <em>{ "ratingValue": 5.0 }</em></span><span>}</span></code>
            </div>
            <div class="lvh-stack__layer lvh-stack__layer--struct">
              <span class="lvh-stack__name">Structure</span>
              <?php
              // [label, left, top, width, height] in % of the page, matched to the screenshot
              $wire = array(
                array( '&lt;header&gt; logo · alt text', 1, 6, 10, 9 ),
                array( '&lt;nav&gt; service pages',      37.5, 8, 40, 6 ),
                array( 'tel: link',                     87.5, 7.6, 11.5, 6 ),
                array( '&lt;h1&gt; service + city',      1, 25.5, 36, 27 ),
                array( '&lt;p&gt; internal links',       1, 54, 36, 16 ),
                array( 'CTA',                           1, 73, 28, 8 ),
                array( 'img · webp · lazy',             55, 26, 44, 66 ),
                array( 'reviews',                       1, 86.5, 34, 7.5 ),
              );
              foreach ( $wire as $k => $w ) : ?>
                <span class="lvh-stack__box<?php echo 3 === $k ? ' is-key' : ''; ?>" style="--l:<?php echo $w[1]; ?>;--t:<?php echo $w[2]; ?>;--w:<?php echo $w[3]; ?>;--h:<?php echo $w[4]; ?>;--i:<?php echo (int) $k; ?>"><b><?php echo $w[0]; ?></b></span>
              <?php endforeach; ?>
            </div>
            <div class="lvh-stack__layer lvh-stack__layer--design">
              <img <?php echo $shot( 'caregiving.jpg' ); ?> alt="" loading="lazy" draggable="false">
            </div>
          </div>

          <?php // The payoff: the result those layers produce ?>
          <div class="lvh-serp">
            <div class="lvh-serp__site"><span class="lvh-serp__fav">CA</span><span>Caregiving Angels of Maryland<small>caregivingangelsofmd.com › in-home-care</small></span></div>
            <strong class="lvh-serp__title">In‑Home Care in Annapolis, MD | Caregiving Angels</strong>
            <span class="lvh-serp__rating"><span>★★★★★</span> 5.0 · 48 reviews · Home health care service</span>
            <p>Licensed, bonded caregivers for Maryland seniors. Personal care, homemaking and companionship — delivered with dignity.</p>
            <span class="lvh-serp__chips"><span>Call</span><span>Directions</span><span>Services</span></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       BLOG CONTENT — editorial covers
       ============================================================ -->
  <section class="lvh-sec" id="blog">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Blog content' ); ?>
          <?php echo $title( 'SEO blog articles that target', 'real customer searches.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          Your blog is where you answer the questions customers Google before they call —
          and where Google decides you're an authority on your service area.
        </p>
      </header>

      <div class="lvh-mags">
        <?php
        // [category, title, read time, rank, sparkline]
        $posts = array(
          array( 'Security · Maryland',   'How to Choose the Right Security Training Program in Maryland', '9 min read',  '3', 'M0 34 C14 33 22 30 32 28 S52 26 62 20 S82 12 100 6' ),
          array( 'Legal · Ocean City',    'What to Do After a DUI Arrest in Ocean City',                   '7 min read',  '1', 'M0 36 C12 35 20 33 30 29 S50 18 60 16 S84 6 100 3' ),
          array( 'Auto Glass · National', 'Five Signs Your Windshield Needs Replacement',                  '6 min read',  '2', 'M0 33 C10 34 22 28 34 27 S56 22 66 14 S88 9 100 5' ),
          array( 'Home Care · Maryland',  'How Home Care Helps Seniors Stay Independent',                  '8 min read',  '4', 'M0 35 C16 34 24 31 36 30 S58 24 70 19 S90 12 100 10' ),
          array( 'Wellness · Maryland',   'What to Expect During an ADHD Evaluation',                      '10 min read', '5', 'M0 36 C14 36 26 33 38 31 S60 27 72 22 S90 16 100 13' ),
          array( 'Dental · Maryland',     'When to Take Your Child to the Dentist for the First Time',     '5 min read',  '2', 'M0 34 C12 33 20 31 30 26 S54 20 64 15 S86 8 100 4' ),
        );
        foreach ( $posts as $i => $p ) : ?>
          <article class="lvh-mag" data-reveal>
            <span class="lvh-mag__big" aria-hidden="true"><?php echo esc_html( $p[3] ); ?></span>
            <div class="lvh-mag__top"><span><?php echo esc_html( $p[0] ); ?></span><span class="lvh-mag__rank">Ranks #<?php echo esc_html( $p[3] ); ?></span></div>
            <h3><?php echo esc_html( $p[1] ); ?></h3>
            <div class="lvh-mag__foot">
              <span><?php echo esc_html( $p[2] ); ?></span>
              <svg class="lvh-mag__spark" viewBox="0 0 100 40" preserveAspectRatio="none" aria-hidden="true"><path class="lvh-mag__area" d="<?php echo esc_attr( $p[4] ); ?> V40 H0 Z"/><path class="lvh-mag__line" d="<?php echo esc_attr( $p[4] ); ?>" pathLength="1"/></svg>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="lvh-ticker" data-reveal>
      <ul class="lvh-ticker__track">
        <?php
        $benefits = array( 'Target real search intent', 'Support and link to service pages', 'Build topical authority over time', 'Answer real customer questions', 'Improve long‑term organic visibility' );
        foreach ( array( '', ' aria-hidden="true"' ) as $dup ) {
          foreach ( $benefits as $b ) { echo '<li' . $dup . '>' . esc_html( $b ) . '</li>'; }
        }
        ?>
      </ul>
    </div>
  </section>

  <!-- ============================================================
       SOCIAL — content calendar
       ============================================================ -->
  <section class="lvh-sec lvh-sec--bay" id="social">
    <div class="lvh-bay lvh-split">
      <div class="lvh-split__copy">
        <?php echo $eyebrow( 'Social media' ); ?>
        <?php echo $title( 'Consistent social media', 'that keeps your business visible.' ); ?>
        <p class="lvh-deck" data-reveal>
          Social media won't replace SEO — but it keeps you active, shares your blog,
          highlights new services, and adds the trust signal a searcher needs before
          they tap “Call.”
        </p>
        <ul class="lvh-platforms" data-reveal>
          <?php foreach ( $platforms as $k => $p ) : ?>
            <li><?php echo $app( $k, 'lvh-app--sm' ); ?><?php echo esc_html( $p[0] ); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="lvh-cal" data-reveal aria-hidden="true">
        <div class="lvh-cal__head">
          <span><b>This week</b> · 3 brands · 6 platforms</span>
          <span class="lvh-cal__count"><b class="lvh-cal__n">0</b> / 12 published</span>
        </div>
        <div class="lvh-cal__grid">
          <?php
          // day => [[platform, brand, time, caption, likes], ...] in publishing order
          $week = array(
            'Mon' => array( array( 'facebook', 'Security Training', '9:14', 'New armed guard certification class starts Monday — six seats left.', 48 ), array( 'google', 'Riverside Dental', '12:30', 'Now accepting new patients — most insurance plans accepted, evening appointments available.', 31 ) ),
            'Tue' => array( array( 'instagram', 'Riverside Dental', '10:00', 'Meet the team behind your smile. Same faces, every visit.', 126 ) ),
            'Wed' => array( array( 'google', 'Calvert Law', '2:30', 'Free 20‑minute consultations for Anne Arundel County residents this month.', 22 ), array( 'linkedin', 'Security Training', '4:00', 'Why Maryland employers are upgrading their security training this year.', 64 ) ),
            'Thu' => array( array( 'youtube', 'Security Training', '11:15', 'Video: what to expect on day one of guard training.', 212 ), array( 'facebook', 'Calvert Law', '3:45', 'Estate planning checklist: five documents every family should have.', 57 ) ),
            'Fri' => array( array( 'instagram', 'Riverside Dental', '11:00', 'Before & after: a same‑day crown in under two hours.', 184 ), array( 'tiktok', 'Riverside Dental', '5:20', 'POV: your dentist actually runs on time.', 942 ) ),
            'Sat' => array( array( 'facebook', 'Riverside Dental', '10:30', 'Saturday appointments are open all month — book online in a minute.', 39 ) ),
            'Sun' => array( array( 'google', 'Calvert Law', '9:00', '5.0 on Google — thank you to every client who left a review.', 27 ), array( 'instagram', 'Security Training', '6:00', "Graduation day for this month's class. Proud of every one of you.", 158 ) ),
          );
          $n = 0; $d = 0;
          foreach ( $week as $day => $items ) : ?>
            <div class="lvh-cal__day<?php echo 2 === $d ? ' is-today' : ''; ?>">
              <span class="lvh-cal__d"><?php echo esc_html( $day ); ?><b><?php echo 10 + $d++; ?></b></span>
              <?php foreach ( $items as $it ) : ?>
                <span class="lvh-cal__post" style="--i:<?php echo $n++; ?>" data-cap="<?php echo esc_attr( $it[3] ); ?>" data-likes="<?php echo (int) $it[4]; ?>" data-when="<?php echo esc_attr( $day . ' ' . $it[2] ); ?>"><?php echo $app( $it[0], 'lvh-app--xs' ); ?><span><b><?php echo esc_html( $it[1] ); ?></b><small><?php echo esc_html( $it[2] ); ?></small></span></span>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <?php // Live preview: the post that just went out (home.js swaps it in) ?>
        <div class="lvh-cal__preview">
          <span class="lvh-post__avatar">RD</span>
          <span class="lvh-cal__pv">
            <span class="lvh-cal__pvhead"><b class="lvh-cal__brand">Riverside Dental</b><span class="lvh-cal__plat"><?php echo $app( 'google', 'lvh-app--xs' ); ?></span><small class="lvh-cal__when">Published · Mon 12:30</small></span>
            <span class="lvh-cal__cap">Now accepting new patients — most insurance plans accepted, evening appointments available.</span>
            <span class="lvh-cal__stats">
              <span><svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M8 14s-5.5-3.4-5.5-7.2A3.1 3.1 0 0 1 8 4.6a3.1 3.1 0 0 1 5.5 2.2C13.5 10.6 8 14 8 14z"/></svg><b class="lvh-cal__likes">31</b></span>
              <span><svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"><path d="M2.5 3.5h11v7h-6l-3 2.5v-2.5h-2z"/></svg><b class="lvh-cal__comments">4</b></span>
              <span><svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 3 14 7.5 9.5 12M14 7.5H6a4 4 0 0 0-4 4v1"/></svg><b class="lvh-cal__shares">2</b></span>
            </span>
          </span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SUPPORT — live status console
       ============================================================ -->
  <section class="lvh-sec" id="support">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Ongoing support' ); ?>
          <?php echo $title( 'Ongoing website support', 'without the headaches.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          A website isn't a one‑time project. Plugins update, browsers change, services get
          added. Here's what we take care of on every supported site.
        </p>
      </header>

      <?php
      $log_groups = array(
        array( 'Every month', 'Routine maintenance',  array( 'Plugin &amp; theme updates', 'Security scans &amp; patches', 'Backups verified', 'Broken link &amp; redirect audit', 'Page speed checks' ) ),
        array( 'On request',  'Whenever you need it', array( 'Content updates &amp; new pages', 'Service &amp; pricing changes', 'New blog post publishing', 'Photo &amp; gallery updates', 'Seasonal banner &amp; promo swaps' ) ),
        array( 'Quarterly',   'Deeper health check',  array( 'On‑page SEO review', 'Internal linking refresh', 'Local citation audit', 'Performance &amp; Core Web Vitals report', 'Recommendation report sent to you' ) ),
      );
      $pool = array();
      foreach ( $log_groups as $g ) { foreach ( $g[2] as $row ) { $pool[] = array( html_entity_decode( $row ), $g[0] ); } }
      ?>
      <div class="lvh-console" data-reveal>
        <div class="lvh-console__main">
          <div class="lvh-console__top">
            <span class="lvh-console__ok"><i></i>All systems normal</span>
            <span class="lvh-console__site">yourbusiness.com</span>
          </div>
          <div class="lvh-uptime" aria-hidden="true">
            <?php for ( $u = 0; $u < 64; $u++ ) { echo '<i' . ( in_array( $u, array( 17, 41 ), true ) ? ' class="is-maint"' : '' ) . ' style="--u:' . $u . '"></i>'; } ?>
          </div>
          <div class="lvh-uptime__axis" aria-hidden="true"><span>90 days ago</span><span>Uptime 99.98%</span><span>Today</span></div>
          <dl class="lvh-console__stats">
            <div><dt>Last backup</dt><dd>2 hours ago</dd></div>
            <div><dt>Security scan</dt><dd>Clean</dd></div>
            <div><dt>Page speed</dt><dd>94 / 100</dd></div>
            <div><dt>Plugins</dt><dd>Up to date</dd></div>
          </dl>
        </div>
        <div class="lvh-console__log" aria-hidden="true">
          <div class="lvh-console__loghead"><span>Activity</span><span class="lvh-console__live"><i></i>Live</span></div>
          <ol class="lvh-log" data-pool="<?php echo esc_attr( wp_json_encode( $pool ) ); ?>">
            <?php foreach ( array( 0, 5, 10, 1, 6, 2 ) as $j => $pi ) : ?>
              <li><time><?php echo esc_html( sprintf( '%02d:%02d', 9 - $j, ( 47 - $j * 7 ) % 60 ) ); ?></time><span><?php echo esc_html( $pool[ $pi ][0] ); ?></span><small><?php echo esc_html( $pool[ $pi ][1] ); ?></small></li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>

      <div class="lvh-cadence">
        <?php foreach ( $log_groups as $g ) : ?>
          <div class="lvh-cadence__col" data-reveal>
            <h3><?php echo esc_html( $g[0] ); ?><small><?php echo esc_html( $g[1] ); ?></small></h3>
            <ul>
              <?php foreach ( $g[2] as $row ) : ?>
                <li><?php echo $row; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       INDUSTRIES — trades in display type
       ============================================================ -->
  <section class="lvh-sec" id="industries">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Industries' ); ?>
          <?php echo $title( 'Built for local service businesses', 'across Maryland.' ); ?>
        </div>
        <p class="lvh-deck lvh-trades__cap" data-reveal aria-live="off"><span class="lvh-trades__line">Each trade has its own playbook — the keywords we chase, the pages we build, and
          the local signals that move the needle.</span></p>
      </header>

      <div class="lvh-trades">
        <ul class="lvh-trades__list">
          <?php
          $inds = array(
            array( 'Contractors',              'Rank for the services homeowners search for most.',                    '/contractors', '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>' ),
            array( 'Security Training',        'Show up when professionals need certification — not three pages in.', '/contact',     '<path d="M12 2l8 3v7c0 5-3.5 9-8 10-4.5-1-8-5-8-10V5z"/><path d="M9 12l2 2 4-4"/>' ),
            array( 'Law Firms',                'Build trust and turn local searches into consultation requests.',     '/law-firms',   '<path d="M12 3v18M5 21h14"/><path d="M6 8l-3 6a3 3 0 0 0 6 0L6 8zM18 8l-3 6a3 3 0 0 0 6 0l-3-6z"/><path d="M3 6h18"/>' ),
            array( 'Dentists',                 'Help nearby patients find your practice and book online.',             '/dentists',    '<path d="M12 5.5c-2-2-5-2-7 0s-2 5 0 8c1 1.5 1.5 3 2 5s1 3 2 3 1.5-1.5 2-3.5l1-3 1 3c.5 2 1 3.5 2 3.5s1.5-1 2-3 1-3.5 2-5c2-3 2-6 0-8s-5-2-7 0z"/>' ),
            array( 'Medical Clinics',          'Get found by patients researching specific care in your area.',       '/contact',     '<path d="M9 3v6H3v6h6v6h6v-6h6V9h-6V3z"/>' ),
            array( 'Auto Glass',               'Show up when drivers need urgent repair or replacement.',              '/auto-glass',  '<path d="M5 17h14M5 17l1.5-6a2 2 0 0 1 2-1.5h7a2 2 0 0 1 2 1.5L19 17M5 17v3M19 17v3"/><circle cx="7.5" cy="17" r="1.5"/><circle cx="16.5" cy="17" r="1.5"/>' ),
            array( 'Home Care Agencies',       'Create content that builds trust with families.',                      '/home-care',   '<path d="M3 11l9-8 9 8v9a2 2 0 0 1-2 2h-3v-7H8v7H5a2 2 0 0 1-2-2z"/>' ),
            array( 'Restaurants',              'Make your menu and local presence easier to find.',                    '/contact',     '<path d="M7 3v8a2 2 0 0 0 2 2v8M11 3v6M7 3h4M17 3c-1.5 0-3 1.5-3 4s1.5 4 3 4v10"/>' ),
            array( 'Security Companies',       'Reach customers researching protection at home or work.',              '/contact',     '<rect x="4" y="10" width="16" height="11" rx="2.5"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>' ),
            array( 'Local Service Businesses', 'If customers Google your category by city, this is for you.',          '/contact',     '<path d="M3 9l1.5-5h15L21 9M3 9v11h18V9M3 9h18M9 14h6v6H9z"/>' ),
          );
          foreach ( $inds as $row ) : ?>
            <li data-reveal>
              <a class="lvh-trade" href="<?php echo esc_url( '/contact' === $row[2] ? lvm_url( 'contact' ) : home_url( $row[2] . '/' ) ); ?>">
                <span class="lvh-trade__ico"><?php echo $icon( $row[3] ); ?></span><span class="lvh-trade__name"><?php echo esc_html( $row[0] ); ?></span><small><?php echo esc_html( $row[1] ); ?></small>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROCESS — scroll-filled timeline
       ============================================================ -->
  <section class="lvh-sec lvh-sec--bay" id="process">
    <div class="lvh-bay">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Process' ); ?>
          <?php echo $title( 'A simple process for improving', 'your online presence.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>Five steps, one team, and a plan you can read in five minutes. Most sites go live in about six weeks.</p>
      </header>
      <ol class="lvh-time">
        <?php
        $steps = array(
          array( 'Review',   "We audit your current website, SEO, content, and local visibility — and write down what's actually broken.", 'Week 1' ),
          array( 'Plan',     'We identify the biggest opportunities to improve rankings, design, and content, sized to your budget.',      'Week 2' ),
          array( 'Build',    'We design or improve your website with SEO‑focused structure, fast pages, and clear conversion paths.',     'Weeks 3–6' ),
          array( 'Optimize', 'We sharpen headings, metadata, internal links, service pages, and local content as data comes in.',         'Week 7+' ),
          array( 'Support',  'We keep going — blog posts, social, updates, and ongoing improvements that compound.',                      'Ongoing' ),
        );
        foreach ( $steps as $i => $s ) : ?>
          <li class="lvh-time__step">
            <span class="lvh-time__dot" aria-hidden="true"></span>
            <span class="lvh-time__when"><?php echo esc_html( $s[2] ); ?></span>
            <span class="lvh-time__num" aria-hidden="true"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
            <h3><?php echo esc_html( $s[0] ); ?></h3>
            <p><?php echo esc_html( $s[1] ); ?></p>
          </li>
        <?php endforeach; ?>
        <li class="lvh-time__rail" aria-hidden="true"><i></i></li>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       TEAM + WHY US
       ============================================================ -->
  <section class="lvh-sec" id="team">
    <div class="lvh-wrap">
      <header class="lvh-head lvh-head--row">
        <div>
          <?php echo $eyebrow( 'Team' ); ?>
          <?php echo $title( 'A small team,', 'close to your business.' ); ?>
        </div>
        <p class="lvh-deck" data-reveal>
          You'll work with the same three people from your first call through every blog post,
          design tweak, and SEO update. No account‑manager carousel, no offshore handoffs.
        </p>
      </header>

      <div class="lvh-team">
        <?php
        $members = array(
          array( 'Garey Simmons',   'CEO &amp; Founder',    'Over 15 years of experience in digital marketing and business strategy. Leads the agency\'s overall direction and works directly with founders on growth strategy.', get_theme_file_uri( '/assets/images/team/garey-simmons.jpg' ) ),
          array( 'Haytham Fourati', 'Website Developer',    'Expert in front‑end development, WordPress, and SEO strategy. Builds the websites and on‑page foundations every Local Vocal site is judged on.', get_theme_file_uri( '/assets/images/team/haytham-fourati.jpg' ) ),
          array( 'David Breth',     'Social Media Manager', 'A social media expert with a knack for creating engaging content. Runs the consistent posting cadence that keeps client brands visible week to week.', get_theme_file_uri( '/assets/images/team/david-breth.jpg' ) ),
        );
        foreach ( $members as $m ) : ?>
          <article class="lvh-person" data-reveal>
            <figure>
              <img src="<?php echo esc_url( $m[3] ); ?>" alt="<?php echo esc_attr( $m[0] . ' — ' . wp_strip_all_tags( $m[1] ) . ', Local Vocal Marketing' ); ?>" loading="lazy">
              <figcaption><strong><?php echo esc_html( $m[0] ); ?></strong><span><?php echo $m[1]; ?></span></figcaption>
            </figure>
            <p><?php echo esc_html( $m[2] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="lvh-why">
        <h3 class="lvh-why__head" data-reveal>Why local businesses choose <span class="lvh-dim">Local Vocal Marketing</span></h3>
        <ol class="lvh-why__list">
          <?php
          $whyus = array(
            array( 'We understand local search',               'Maryland service areas, map pack mechanics, and the keywords customers actually type.' ),
            array( 'We build websites with SEO in mind',       'Not pretty templates retrofitted later. Structure, speed, and schema from page one.' ),
            array( 'We publish content consistently',          'Blog posts that target real searches, written to your voice — not AI filler.' ),
            array( 'We support your website long‑term',        'Updates, fixes, new pages, and small wins, on a calendar — not on hold.' ),
            array( 'We communicate clearly',                   "No jargon. No 40‑slide reports. Just what's working, what's not, and what's next." ),
            array( 'We focus on visibility, trust, and leads', 'Three measurable outcomes. Everything else is a means to those ends.' ),
          );
          foreach ( $whyus as $i => $p ) : ?>
            <li data-reveal><span class="lvh-why__n"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span><strong><?php echo esc_html( $p[0] ); ?></strong><span><?php echo esc_html( $p[1] ); ?></span></li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CTA — shader stage, bookends the hero
       ============================================================ -->
  <?php get_template_part( 'template-parts/cta' ); // shared with every inner page ?>

  <!-- ============================================================
       FAQ
       ============================================================ -->
  <section class="lvh-sec" id="faq">
    <div class="lvh-wrap lvh-faqwrap">
      <header class="lvh-faqwrap__head">
        <?php echo $eyebrow( 'FAQ' ); ?>
        <?php echo $title( 'Maryland web design &amp; SEO', 'questions, answered.' ); ?>
        <p class="lvh-deck" data-reveal>Something else on your mind? <a class="lvh-textlink" href="<?php echo $contact; ?>">Ask us directly <?php echo $arrow; ?></a></p>
      </header>
      <div class="lvh-faq">
        <?php
        $faqs = lvm_seo_current( 'home' )['faqs']; // same list feeds the FAQPage schema
        foreach ( $faqs as $i => $q ) : ?>
          <details class="lvh-faq__item" name="lvh-faq"<?php echo 0 === $i ? ' open' : ''; ?>>
            <summary><span class="lvh-faq__n"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span><span class="lvh-faq__q"><?php echo esc_html( $q[0] ); ?></span><span class="lvh-faq__icon" aria-hidden="true"></span></summary>
            <p><?php echo esc_html( $q[1] ); ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
