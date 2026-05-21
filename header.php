<?php
/**
 * Header — Local Vocal Marketing redesign
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Geist+Mono:wght@100..900&family=Newsreader:ital,opsz,wght@0,6..72,400..700;1,6..72,400..700&display=swap">

  <link rel="shortcut icon" type="image/x-icon"
        href="https://localvocalmarketing.com/wp-content/uploads/2025/02/LVM-indigo-color.png">
  <link rel="apple-touch-icon"
        href="https://localvocalmarketing.com/wp-content/uploads/2025/02/LVM-indigo-color.png">

  <?php wp_head(); ?>

  <!-- LocalBusiness Schema Markup -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Local Vocal Marketing",
    "description": "Maryland web design and SEO services for local businesses.",
    "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
    "telephone": "+1-443-852-1000",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "209 Central Ave",
      "addressLocality": "Glyndon",
      "addressRegion": "MD",
      "postalCode": "21071",
      "addressCountry": "US"
    },
    "areaServed": [
      "Annapolis MD","Severna Park MD","Glen Burnie MD","Easton MD",
      "Ocean City MD","Baltimore MD","Frederick MD","Glyndon MD",
      "Reisterstown MD","Anne Arundel County MD","Baltimore County MD"
    ],
    "openingHours": ["Mo-Fr 09:00-18:00","Sa 10:00-15:00"],
    "servicesOffered": [
      "Web Design","Local SEO","SEO Blog Articles",
      "Social Media Management","Ongoing Website Support"
    ],
    "priceRange": "$$"
  }
  </script>
</head>
<body <?php body_class( 'lvm-redesign' ); ?>>

<header class="nav" id="lvm-nav">
  <div class="nav__inner lvm-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__brand">
      <span class="nav__mark" aria-hidden="true"><span></span><span></span><span></span></span>
      <span class="nav__name">Local Vocal</span>
      <span class="nav__suffix mono">MD</span>
    </a>

    <?php
    $lvm_services = array(
      array( 'S/01', 'Web Development',         'Engineering doc',     home_url( '/development/' ) ),
      array( 'S/02', 'Local SEO',               'Ranking report',      home_url( '/seo-optimization/' ) ),
      array( 'S/03', 'Content & Blog',          'Editorial magazine',  home_url( '/content-creation/' ) ),
      array( 'S/04', 'Social Media',            'Social feed',         home_url( '/social-media-management/' ) ),
      array( 'S/05', 'Analytics & Reporting',   'Live dashboard',      home_url( '/analytics-reporting/' ) ),
      array( 'S/06', 'Digital Marketing',       'Campaign brief',      home_url( '/digital-marketing/' ) ),
    );

    $lvm_nav_items = array(
      array( 'label' => 'Home',            'url' => home_url( '/' ) ),
      array( 'label' => 'Advertise',       'url' => home_url( '/grow-your-small-business-online/' ) ),
      array( 'label' => 'Services',        'url' => home_url( '/services/' ), 'children' => $lvm_services ),
      array( 'label' => 'Invoice Payment', 'url' => home_url( '/payment-page/' ) ),
      array( 'label' => 'Requests',        'url' => home_url( '/intake-form/' ) ),
      array( 'label' => 'About Us',        'url' => home_url( '/about-us/' ) ),
      array( 'label' => 'Blog',            'url' => home_url( '/blog/' ) ),
    );
    ?>
    <nav class="nav__links" aria-label="Primary">
      <?php foreach ( $lvm_nav_items as $item ) :
        $has_children = ! empty( $item['children'] );
        if ( $has_children ) : ?>
          <div class="nav__item nav__item--has-children">
            <a class="nav__link nav__link--has-children" href="<?php echo esc_url( $item['url'] ); ?>" aria-haspopup="true" aria-expanded="false">
              <?php echo esc_html( $item['label'] ); ?>
              <span class="nav__caret" aria-hidden="true">⌄</span>
            </a>

            <div class="nav__panel" role="menu" aria-label="<?php echo esc_attr( $item['label'] ); ?> submenu">
              <div class="nav__panel-head mono">
                <span>All services</span>
                <a class="nav__panel-all" href="<?php echo esc_url( $item['url'] ); ?>">Index <span aria-hidden="true">→</span></a>
              </div>
              <ul class="nav__panel-list">
                <?php foreach ( $item['children'] as $child ) : ?>
                  <li>
                    <a class="nav__panel-item" href="<?php echo esc_url( $child[3] ); ?>" role="menuitem">
                      <span class="nav__panel-num mono"><?php echo esc_html( $child[0] ); ?></span>
                      <span class="nav__panel-body">
                        <span class="nav__panel-name"><?php echo esc_html( $child[1] ); ?></span>
                        <span class="nav__panel-sig mono"><?php echo esc_html( $child[2] ); ?></span>
                      </span>
                      <span class="nav__panel-arrow" aria-hidden="true">→</span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php else : ?>
          <a class="nav__link" href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
        <?php endif;
      endforeach; ?>
    </nav>

    <div class="nav__actions">
      <a href="tel:+14438521000" class="btn btn--ghost"><span aria-hidden="true">↳</span> (443) 852‑1000</a>
      <a href="#cta" class="btn btn--primary">Free website &amp; SEO review <svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg></a>
      <button class="nav__toggle" type="button" aria-controls="lvm-drawer" aria-expanded="false" aria-label="Open menu">
        <span class="mono">Menu</span>
      </button>
    </div>
  </div>
</header>

<div class="nav__drawer" id="lvm-drawer">
  <?php foreach ( $lvm_nav_items as $item ) :
    $has_children = ! empty( $item['children'] );
    if ( $has_children ) : ?>
      <details class="nav__drawer-group">
        <summary class="nav__drawer-summary">
          <span><?php echo esc_html( $item['label'] ); ?></span>
          <span class="nav__drawer-caret mono" aria-hidden="true">+</span>
        </summary>
        <div class="nav__drawer-children">
          <a class="nav__drawer-child nav__drawer-child--all" href="<?php echo esc_url( $item['url'] ); ?>">
            <span class="mono">All services</span>
            <span aria-hidden="true">→</span>
          </a>
          <?php foreach ( $item['children'] as $child ) : ?>
            <a class="nav__drawer-child" href="<?php echo esc_url( $child[3] ); ?>">
              <span class="nav__drawer-child-num mono"><?php echo esc_html( $child[0] ); ?></span>
              <span class="nav__drawer-child-name"><?php echo esc_html( $child[1] ); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </details>
    <?php else : ?>
      <a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
    <?php endif;
  endforeach; ?>
  <a href="tel:+14438521000" class="btn btn--ghost" style="margin-top:16px;">↳ (443) 852‑1000</a>
  <a href="#cta" class="btn btn--primary" style="margin-top:8px;">Free website &amp; SEO review</a>
</div>
