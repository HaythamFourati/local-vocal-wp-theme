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
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Geist+Mono:wght@100..900&display=swap">

  <?php // Current logo mark (assets/images/favicon.svg); PNG for browsers without SVG icons and iOS home screens ?>
  <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_theme_file_uri( '/assets/images/favicon.svg' ) ); ?>">
  <link rel="icon" type="image/png" sizes="180x180" href="<?php echo esc_url( get_theme_file_uri( '/assets/images/apple-touch-icon.png' ) ); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_file_uri( '/assets/images/apple-touch-icon.png' ) ); ?>">

  <?php wp_head(); ?>

  <?php // Business schema lives in inc/seo.php (one entity, matching the contact page) ?>
</head>
<body <?php body_class( 'lvm-redesign' ); ?>>

<header class="nav" id="lvm-nav">
  <div class="nav__inner lvm-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__brand" aria-label="Local Vocal Marketing — home">
      <?php lvm_logo( 'nav__logo' ); ?>
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
      array( 'label' => 'Services',        'url' => home_url( '/services/' ), 'children' => $lvm_services ),
      array( 'label' => 'Requests',        'url' => home_url( '/intake-form/' ) ),
      array( 'label' => 'About Us',        'url' => home_url( '/about-us/' ) ),
      array( 'label' => 'Blog',            'url' => home_url( '/blog/' ) ),
      array( 'label' => 'Contact',         'url' => home_url( '/contact/' ) ),
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
          <?php $is_current = untrailingslashit( $item['url'] ) === untrailingslashit( home_url( add_query_arg( array(), $GLOBALS['wp']->request ) ) ); ?>
          <a class="nav__link" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $is_current ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
        <?php endif;
      endforeach; ?>
    </nav>

    <div class="nav__actions">
      <a href="tel:+14438521000" class="nav__phone" aria-label="Call (443) 852-1000">
        <svg viewBox="0 0 24 24" width="15" height="15" fill="currentColor" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z"/></svg>
        <span>(443) 852‑1000</span>
      </a>
      <a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="nav__cta" data-lvm-intake>
        <span>Free SEO review</span>
        <span class="nav__cta-icon" aria-hidden="true"><svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
      </a>
      <button class="nav__toggle" type="button" aria-controls="lvm-drawer" aria-expanded="false" aria-label="Open menu">
        <span class="nav__toggle-lines" aria-hidden="true"><i></i><i></i></span>
        <span>Menu</span>
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
  <div class="nav__drawer-actions">
    <a href="tel:+14438521000" class="nav__phone">(443) 852‑1000</a>
    <a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="nav__cta" data-lvm-intake><span>Free SEO review</span><span class="nav__cta-icon" aria-hidden="true"><svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span></a>
  </div>
</div>
