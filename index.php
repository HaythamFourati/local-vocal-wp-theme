<?php
/**
 * Blog Index — Field Notes journal
 * Visual language: editorial newspaper / studio journal
 */
get_header(); ?>

<main class="service-page svc-blog">

  <!-- ============================================================
       MASTHEAD — newspaper-style heading strip
       ============================================================ -->
  <section class="bl-mast">
    <div class="lvm-container">

      <div class="bl-mast__top mono">
        <span class="bl-mast__top-l"><strong>FIELD NOTES</strong> · The Local Vocal journal</span>
        <span class="bl-mast__top-rule"></span>
        <span><?php echo esc_html( gmdate( 'l, F j, Y' ) ); ?></span>
        <span class="bl-mast__top-rule"></span>
        <span>Vol. 04 / Issue <?php echo esc_html( gmdate( 'W' ) ); ?></span>
        <span class="bl-mast__top-rule"></span>
        <span>Annapolis · MD</span>
      </div>

      <div class="page-hero__crumb mono bl-mast__crumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Local Vocal</a>
        <span class="page-hero__crumb-sep">/</span>
        <span>Blog</span>
      </div>

      <h1 class="bl-mast__h">Field<br><em class="serif">Notes.</em></h1>

      <div class="bl-mast__sub-row">
        <p class="bl-mast__sub">
          A working journal. Plain-English notes on local search, web design, content, and what we learn shipping work for Maryland service businesses every month — written by the people doing the work, not a marketing team.
        </p>
        <div class="bl-mast__meta mono">
          <span><span class="bl-mast__meta-k">Editors</span> Local Vocal Studio</span>
          <span><span class="bl-mast__meta-k">Cadence</span> Weekly · Tuesdays</span>
          <span><span class="bl-mast__meta-k">Audience</span> Owners &amp; operators</span>
        </div>
      </div>

      <?php
      $cats = get_categories( array(
        'orderby'    => 'count',
        'order'      => 'DESC',
        'hide_empty' => true,
        'number'     => 8,
      ) );
      $current_cat_id = is_category() ? get_queried_object_id() : 0;
      ?>
      <?php if ( ! empty( $cats ) ) : ?>
        <nav class="bl-mast__nav" aria-label="Article categories">
          <a class="bl-cat<?php echo ! $current_cat_id ? ' bl-cat--active' : ''; ?>" href="<?php echo esc_url( home_url( '/blog' ) ); ?>">
            <span class="bl-cat__lbl">All</span>
            <span class="bl-cat__count mono"><?php echo (int) wp_count_posts()->publish; ?></span>
          </a>
          <?php foreach ( $cats as $cat ) : ?>
            <a class="bl-cat<?php echo $current_cat_id === $cat->term_id ? ' bl-cat--active' : ''; ?>"
               href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
              <span class="bl-cat__lbl"><?php echo esc_html( $cat->name ); ?></span>
              <span class="bl-cat__count mono"><?php echo (int) $cat->count; ?></span>
            </a>
          <?php endforeach; ?>
        </nav>
      <?php endif; ?>

    </div>
  </section>

  <?php if ( have_posts() ) : ?>

    <?php
    // Featured post
    $sticky = get_option( 'sticky_posts' );
    $featured_args = ! empty( $sticky )
      ? array( 'posts_per_page' => 1, 'post__in' => $sticky, 'ignore_sticky_posts' => 1 )
      : array( 'posts_per_page' => 1 );
    $featured_query = new WP_Query( $featured_args );
    $featured_id   = 0;

    if ( $featured_query->have_posts() ) :
      while ( $featured_query->have_posts() ) : $featured_query->the_post();
        $featured_id = get_the_ID();
        $fcats = get_the_category();
        $fcat  = ! empty( $fcats ) ? $fcats[0]->name : 'Editorial';
        $words = str_word_count( strip_tags( get_the_content() ) );
        $mins  = max( 1, round( $words / 250 ) );
    ?>

      <!-- ============================================================
           LEAD STORY
           ============================================================ -->
      <section class="bl-lead">
        <div class="lvm-container">

          <div class="bl-section-bar mono">
            <span class="bl-section-bar__num">§ 01</span>
            <span class="bl-section-bar__rule"></span>
            <span class="bl-section-bar__lbl"><?php echo ! empty( $sticky ) && in_array( $featured_id, $sticky, true ) ? 'Editor\'s pick' : 'Lead story'; ?></span>
            <span class="bl-section-bar__date mono">Updated <?php echo esc_html( get_the_date() ); ?></span>
          </div>

          <a class="bl-lead__art" href="<?php the_permalink(); ?>">

            <div class="bl-lead__media">
              <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) );
              else : ?>
                <div class="bl-lead__placeholder" aria-hidden="true">
                  <span class="bl-lead__placeholder-folio mono">FEATURE / 01</span>
                  <span class="bl-lead__placeholder-h serif"><?php echo esc_html( wp_trim_words( get_the_title(), 4, '…' ) ); ?></span>
                </div>
              <?php endif; ?>
              <span class="bl-lead__cat mono"><?php echo esc_html( $fcat ); ?></span>
            </div>

            <div class="bl-lead__body">
              <div class="bl-lead__kicker mono">
                <span>Story / <?php echo esc_html( $fcat ); ?></span>
                <span class="bl-lead__kicker-dot"></span>
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></time>
              </div>

              <h2 class="bl-lead__h"><?php the_title(); ?></h2>
              <p class="bl-lead__x"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 42, '…' ) ); ?></p>

              <div class="bl-lead__byline">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array( 'class' => 'bl-lead__avatar' ) ); ?>
                <div class="bl-lead__byline-l">
                  <span class="bl-lead__byline-name">By <?php the_author(); ?></span>
                  <span class="bl-lead__byline-meta mono"><?php echo (int) $words; ?> words · <?php echo (int) $mins; ?> min read</span>
                </div>
                <span class="bl-lead__cta">
                  Read the story <span aria-hidden="true">→</span>
                </span>
              </div>
            </div>

          </a>
        </div>
      </section>

    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>

    <!-- ============================================================
         ARCHIVE — column-based article list
         ============================================================ -->
    <section class="bl-archive" id="latest">
      <div class="lvm-container">

        <div class="bl-section-bar mono">
          <span class="bl-section-bar__num">§ 02</span>
          <span class="bl-section-bar__rule"></span>
          <span class="bl-section-bar__lbl">All articles</span>
          <span class="bl-section-bar__date mono"><?php echo (int) wp_count_posts()->publish; ?> in archive</span>
        </div>

        <h2 class="bl-archive__h">Everything we've<br><em class="serif">written so far.</em></h2>

        <?php
        $skip_ids = array();
        if ( $featured_id ) $skip_ids[] = $featured_id;

        $paged = max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 ) );
        $main_query = new WP_Query( array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' => 9,
          'paged'          => $paged,
          'post__not_in'   => $skip_ids,
        ) );

        if ( $main_query->have_posts() ) : ?>
          <ol class="bl-list">
            <?php
            $i = 0;
            while ( $main_query->have_posts() ) : $main_query->the_post();
              $i++;
              $rc      = get_the_category();
              $rcname  = ! empty( $rc ) ? $rc[0]->name : 'Editorial';
              $rwords  = str_word_count( strip_tags( get_the_content() ) );
              $rmins   = max( 1, round( $rwords / 250 ) );
              $rnum    = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
              ?>
              <li class="bl-row">
                <a class="bl-row__link" href="<?php the_permalink(); ?>">
                  <span class="bl-row__num mono"><?php echo esc_html( $rnum ); ?></span>

                  <div class="bl-row__body">
                    <span class="bl-row__cat mono"><?php echo esc_html( $rcname ); ?></span>
                    <h3 class="bl-row__title"><?php the_title(); ?></h3>
                    <p class="bl-row__x"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26, '…' ) ); ?></p>
                  </div>

                  <div class="bl-row__media">
                    <?php if ( has_post_thumbnail() ) :
                      the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) );
                    else : ?>
                      <div class="bl-row__placeholder" aria-hidden="true">
                        <span class="serif"><?php echo esc_html( substr( get_the_title(), 0, 1 ) ); ?></span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="bl-row__meta mono">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'M j' ) ); ?></time>
                    <span class="bl-row__meta-dot"></span>
                    <span><?php echo (int) $rmins; ?> min</span>
                  </div>

                  <span class="bl-row__cta" aria-hidden="true"><svg class="lvm-arrow-ne" viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 11.5 L11.5 4.5 M6.5 4.5 L11.5 4.5 L11.5 9.5"/></svg></span>
                </a>
              </li>
            <?php endwhile; ?>
          </ol>

          <?php
          $pag = paginate_links( array(
            'total'     => $main_query->max_num_pages,
            'current'   => $paged,
            'prev_text' => '← Previous',
            'next_text' => 'Next →',
            'type'      => 'array',
          ) );
          wp_reset_postdata();

          if ( ! empty( $pag ) ) : ?>
            <nav class="bl-pag" aria-label="Blog pagination">
              <span class="bl-pag__lbl mono">Page <?php echo (int) $paged; ?> of <?php echo (int) $main_query->max_num_pages; ?></span>
              <div class="bl-pag__items">
                <?php foreach ( $pag as $link ) : ?>
                  <span class="bl-pag__item"><?php echo $link; ?></span>
                <?php endforeach; ?>
              </div>
            </nav>
          <?php endif; ?>

        <?php endif; ?>

      </div>
    </section>

  <?php else : ?>

    <section class="bl-empty">
      <div class="lvm-container">
        <div class="bl-empty__inner">
          <span class="bl-empty__tag mono">Empty archive · 00 issues filed</span>
          <h2 class="bl-empty__h">Nothing here<br><em class="serif">just yet.</em></h2>
          <p class="bl-empty__p">We're working on the first set of articles. In the meantime, get in touch — we'll likely answer your question with a post next week.</p>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Ask a question <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </section>

  <?php endif; ?>

  <!-- ============================================================
       CTA
       ============================================================ -->
  <section class="cta">
    <div class="cta__glow" aria-hidden="true"></div>
    <div class="lvm-container cta__inner">
      <div class="cta__eyebrow mono">↳ Free review</div>
      <h2 class="cta__h">Want this applied<br><em class="serif">to your own site?</em></h2>
      <p class="cta__p">Reading is good. Doing is better. We'll review your current website and local SEO and show you the highest-leverage moves first.</p>
      <div class="cta__actions">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--lg">Contact us today <span aria-hidden="true">→</span></a>
        <a href="tel:+14438521000" class="btn btn--dark-ghost btn--lg">↳ (443) 852‑1000</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer();
