<?php
/**
 * Single Post Template — Field Notes article view
 * Visual language: editorial long-read with sticky table of contents
 */
get_header();

if ( have_posts() ) : the_post();

  // ---- Article meta ------------------------------------
  $categories = get_the_category();
  $primary    = ! empty( $categories ) ? $categories[0] : null;
  $words      = str_word_count( strip_tags( get_the_content() ) );
  $mins       = max( 1, round( $words / 250 ) );
  $tags       = get_the_tags();
  $author_bio = get_the_author_meta( 'description' );

  // ---- Build TOC + inject anchor IDs into headings -----
  $raw_content = apply_filters( 'the_content', get_the_content() );
  $toc         = array();

  // Match h2/h3 in the rendered HTML and inject ids if missing
  $processed = preg_replace_callback(
    '/<(h[23])([^>]*)>(.*?)<\/\1>/is',
    function ( $m ) use ( &$toc ) {
      $level = $m[1];                             // h2 | h3
      $attrs = $m[2];
      $inner = $m[3];
      $text  = trim( wp_strip_all_tags( $inner ) );
      if ( '' === $text ) {
        return $m[0];
      }
      // Reuse existing id if any
      if ( preg_match( '/\bid=("|\')([^"\']+)\1/i', $attrs, $idm ) ) {
        $slug = $idm[2];
      } else {
        $slug  = sanitize_title( $text );
        $attrs = ' id="' . esc_attr( $slug ) . '"' . $attrs;
      }
      $toc[] = array(
        'level' => $level,
        'slug'  => $slug,
        'text'  => $text,
      );
      return '<' . $level . $attrs . '>' . $inner . '</' . $level . '>';
    },
    $raw_content
  );

  // Only show TOC if we have at least 2 headings
  $show_toc = count( $toc ) >= 2;
?>

<main class="service-page svc-single">

  <!-- ============================================================
       READING PROGRESS BAR
       ============================================================ -->
  <div class="bl-progress" aria-hidden="true">
    <div class="bl-progress__bar"></div>
  </div>

  <!-- ============================================================
       ARTICLE HEADER
       ============================================================ -->
  <header class="bl-art-head">
    <div class="lvm-container">

      <div class="bl-art-head__top mono">
        <span class="bl-art-head__top-l"><strong>FIELD NOTES</strong> · The Local Vocal journal</span>
        <span class="bl-art-head__top-rule"></span>
        <span>Filed <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
        <span class="bl-art-head__top-rule"></span>
        <span>No. <?php echo esc_html( str_pad( get_the_ID() % 1000, 3, '0', STR_PAD_LEFT ) ); ?></span>
      </div>

      <div class="page-hero__crumb mono bl-art-head__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Field Notes</a>
        <?php if ( $primary ) : ?>
          <span class="page-hero__crumb-sep">/</span>
          <a href="<?php echo esc_url( get_category_link( $primary->term_id ) ); ?>"><?php echo esc_html( $primary->name ); ?></a>
        <?php endif; ?>
      </div>

      <?php if ( $primary ) : ?>
        <a href="<?php echo esc_url( get_category_link( $primary->term_id ) ); ?>" class="bl-art-head__cat mono">
          <span class="bl-art-head__cat-dot"></span>
          <?php echo esc_html( $primary->name ); ?>
        </a>
      <?php endif; ?>

      <h1 class="bl-art-head__h"><?php the_title(); ?></h1>

      <?php if ( has_excerpt() ) : ?>
        <p class="bl-art-head__dek"><?php echo esc_html( get_the_excerpt() ); ?></p>
      <?php endif; ?>

      <div class="bl-art-head__byline">
        <div class="bl-art-head__author">
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 44, '', '', array( 'class' => 'bl-art-head__avatar' ) ); ?>
          <div class="bl-art-head__author-l">
            <span class="bl-art-head__author-lbl mono">Written by</span>
            <span class="bl-art-head__author-name"><?php the_author(); ?></span>
          </div>
        </div>
        <div class="bl-art-head__stats mono">
          <div><span class="bl-art-head__stats-k">Date</span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></time></div>
          <div><span class="bl-art-head__stats-k">Read</span><?php echo (int) $mins; ?> min · <?php echo (int) $words; ?> words</div>
          <div><span class="bl-art-head__stats-k">Topic</span><?php echo $primary ? esc_html( $primary->name ) : 'Editorial'; ?></div>
        </div>
      </div>

    </div>
  </header>

  <!-- ============================================================
       FEATURED MEDIA
       ============================================================ -->
  <?php if ( has_post_thumbnail() ) : ?>
    <figure class="bl-art-feat">
      <div class="lvm-container">
        <div class="bl-art-feat__frame">
          <?php the_post_thumbnail( 'full', array( 'loading' => 'eager' ) ); ?>
        </div>
        <?php $caption = get_the_post_thumbnail_caption(); if ( $caption ) : ?>
          <figcaption class="bl-art-feat__cap mono">
            <span class="bl-art-feat__cap-folio">Fig. 01</span>
            <?php echo esc_html( $caption ); ?>
          </figcaption>
        <?php endif; ?>
      </div>
    </figure>
  <?php endif; ?>

  <!-- ============================================================
       ARTICLE BODY  +  STICKY TABLE OF CONTENTS
       ============================================================ -->
  <section class="bl-art-body<?php echo $show_toc ? '' : ' bl-art-body--no-toc'; ?>">
    <div class="lvm-container">
      <div class="bl-art-body__grid">

        <?php if ( $show_toc ) : ?>
          <aside class="bl-toc" aria-label="Table of contents">
            <div class="bl-toc__inner">
              <div class="bl-toc__head">
                <span class="bl-toc__head-num mono">§</span>
                <span class="bl-toc__head-lbl mono">In this article</span>
              </div>
              <ol class="bl-toc__list">
                <?php
                $i = 0;
                foreach ( $toc as $item ) :
                  if ( 'h2' === $item['level'] ) $i++;
                ?>
                  <li class="bl-toc__item bl-toc__item--<?php echo esc_attr( $item['level'] ); ?>">
                    <a href="#<?php echo esc_attr( $item['slug'] ); ?>" data-toc-link="<?php echo esc_attr( $item['slug'] ); ?>">
                      <?php if ( 'h2' === $item['level'] ) : ?>
                        <span class="bl-toc__num mono"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
                      <?php else : ?>
                        <span class="bl-toc__num bl-toc__num--sub" aria-hidden="true">↳</span>
                      <?php endif; ?>
                      <span class="bl-toc__txt"><?php echo esc_html( $item['text'] ); ?></span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ol>
              <div class="bl-toc__foot">
                <span class="bl-toc__foot-k mono">Read time</span>
                <span class="bl-toc__foot-v"><?php echo (int) $mins; ?> min</span>
              </div>
            </div>
          </aside>
        <?php endif; ?>

        <article class="bl-art">
          <div class="bl-prose">
            <?php echo $processed; // Already passed through the_content filter ?>
          </div>

          <!-- ============================================================
               INLINE CTA BANNER  (right after the post body)
               ============================================================ -->
          <aside class="bl-cta-banner" aria-label="Call to action">
            <div class="bl-cta-banner__bar mono">
              <span class="bl-cta-banner__bar-num">↳ Sponsored by reality</span>
              <span class="bl-cta-banner__bar-rule"></span>
              <span class="bl-cta-banner__bar-tag">Free review</span>
            </div>
            <div class="bl-cta-banner__body">
              <h3 class="bl-cta-banner__h">Reading is good. <em class="serif">Doing is better.</em></h3>
              <p class="bl-cta-banner__p">Want this exact playbook applied to your own site? We'll audit your website and local SEO and show you the highest-leverage moves first — no decks, no fluff.</p>
              <div class="bl-cta-banner__actions">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary">Get a free review <span aria-hidden="true">→</span></a>
                <a href="tel:+14438521000" class="bl-cta-banner__phone mono">↳ (443) 852‑1000</a>
              </div>
            </div>
            <div class="bl-cta-banner__sig mono">
              <span>Local Vocal Studio</span>
              <span class="bl-cta-banner__sig-rule"></span>
              <span>Annapolis · MD</span>
            </div>
          </aside>

          <!-- TAGS -->
          <?php if ( ! empty( $tags ) ) : ?>
            <div class="bl-art__tags">
              <span class="bl-art__tags-lbl mono">Tagged</span>
              <div class="bl-art__tags-list">
                <?php foreach ( $tags as $tag ) : ?>
                  <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="bl-art__tag">#<?php echo esc_html( $tag->name ); ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- AUTHOR BIO -->
          <?php if ( ! empty( $author_bio ) ) : ?>
            <aside class="bl-art__author">
              <div class="bl-art__author-bar mono">
                <span class="bl-art__author-bar-num">§</span>
                <span class="bl-art__author-bar-rule"></span>
                <span class="bl-art__author-bar-lbl">About the author</span>
              </div>
              <div class="bl-art__author-card">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 96, '', '', array( 'class' => 'bl-art__author-avatar' ) ); ?>
                <div class="bl-art__author-body">
                  <h4 class="bl-art__author-name"><?php the_author(); ?></h4>
                  <p class="bl-art__author-bio"><?php echo esc_html( $author_bio ); ?></p>
                  <?php
                  $author_url = get_the_author_meta( 'user_url' );
                  if ( $author_url ) : ?>
                    <a href="<?php echo esc_url( $author_url ); ?>" class="bl-art__author-link mono" rel="author">More from <?php the_author(); ?> <span aria-hidden="true">→</span></a>
                  <?php endif; ?>
                </div>
              </div>
            </aside>
          <?php endif; ?>

          <!-- PREV / NEXT -->
          <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          if ( $prev_post || $next_post ) : ?>
            <nav class="bl-art__nav" aria-label="Article navigation">
              <?php if ( $prev_post ) : ?>
                <a class="bl-art__nav-link bl-art__nav-link--prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                  <span class="bl-art__nav-dir mono">← Previous article</span>
                  <span class="bl-art__nav-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                </a>
              <?php else : ?>
                <span></span>
              <?php endif; ?>

              <?php if ( $next_post ) : ?>
                <a class="bl-art__nav-link bl-art__nav-link--next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                  <span class="bl-art__nav-dir mono">Next article →</span>
                  <span class="bl-art__nav-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                </a>
              <?php endif; ?>
            </nav>
          <?php endif; ?>

        </article>

      </div>
    </div>
  </section>

  <!-- ============================================================
       RELATED READING
       ============================================================ -->
  <?php
  $cat_ids = array();
  if ( ! empty( $categories ) ) foreach ( $categories as $c ) $cat_ids[] = $c->term_id;
  $related = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => array( get_the_ID() ),
    'category__in'   => $cat_ids,
    'orderby'        => 'rand',
  ) );
  if ( $related->have_posts() ) : ?>
    <section class="bl-related">
      <div class="lvm-container">
        <div class="bl-section-bar mono">
          <span class="bl-section-bar__num">§ 03</span>
          <span class="bl-section-bar__rule"></span>
          <span class="bl-section-bar__lbl">Keep reading</span>
        </div>
        <h2 class="bl-related__h">Related notes from<br><em class="serif">the same desk.</em></h2>

        <div class="bl-related__grid">
          <?php while ( $related->have_posts() ) : $related->the_post();
            $rc     = get_the_category();
            $rcname = ! empty( $rc ) ? $rc[0]->name : 'Editorial';
            $rwords = str_word_count( strip_tags( get_the_content() ) );
            $rmins  = max( 1, round( $rwords / 250 ) );
          ?>
            <a href="<?php the_permalink(); ?>" class="bl-related__card">
              <div class="bl-related__media">
                <?php if ( has_post_thumbnail() ) :
                  the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) );
                else : ?>
                  <div class="bl-related__placeholder" aria-hidden="true">
                    <span class="serif"><?php echo esc_html( substr( get_the_title(), 0, 1 ) ); ?></span>
                  </div>
                <?php endif; ?>
                <span class="bl-related__cat mono"><?php echo esc_html( $rcname ); ?></span>
              </div>
              <div class="bl-related__body">
                <h3 class="bl-related__title"><?php the_title(); ?></h3>
                <span class="bl-related__meta mono"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?> · <?php echo (int) $rmins; ?> min</span>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- ============================================================
       FINAL CTA
       ============================================================ -->
  <section class="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free review</div>
      <h2 class="cta__h">Ready to apply this<br><em class="serif">to your business?</em></h2>
      <p class="cta__p">Get a free review of your website and local SEO. We'll show you exactly where the leverage is, on screen.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Contact us today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php
endif; // have_posts
get_footer();
