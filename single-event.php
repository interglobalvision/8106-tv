<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="single">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    // Get meta
    $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );
    $author = get_the_author();
    $date = get_the_date( 'j F Y' );
    $tags = get_the_tag_list('',', ','');

    $event_venue  = get_post_meta( get_the_ID(), '_igv_event_venue', true );
    $event_address  = get_post_meta( get_the_ID(), '_igv_event_address', true );
    $event_price  = get_post_meta( get_the_ID(), '_igv_event_price', true );
    $event_date  = get_post_meta( get_the_ID(), '_igv_event_date', true );

    if ($event_date) {
      $event_date= strtotime($event_date);
      $event_month = date_i18n('F', $event_date);
      $event_day = date_i18n('d', $event_date);
    }

    $event_time  = get_post_meta( get_the_ID(), '_igv_event_time', true );
    $event_fb_link  = get_post_meta( get_the_ID(), '_igv_event_fb_link', true );
?>

    <article <?php post_class(); ?> id="event-<?php the_ID(); ?>">

      <header id="single-header" class="theme-grad-bg">
        <div class="container">
          <div class="row">
            <div class="col s1"></div>
            <div class="col s15">
              <h1 id="single-title" class="js-fix-widows"><?php the_title(); ?></h1>
              <h2 class="font-condensed js-fix-widows"><?php
                echo $event_day . ' ' . $event_month;
                if ($event_venue) {
                  echo ' @ ' . $event_venue;
                }
              ?></h2>
            </div>
            <div class="col s8">
              <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
            </div>
          </div>
        </div>
      </header>

      <div id="page-content" class="container">
        <div class="row">
          <div class="col s15">
            <div class="copy">
              <?php the_content(); ?>
            </div>
          </div>

          <div class="col s1"></div>

          <div id="single-sidebar" class="u-float">
            <div class="col s8 single-sidebar-item">

            <?php
                if ($event_address) { ?>
                  <h3>Ubicación:</h3>
                  <p class="indent"><?php echo esc_html($event_address); ?></p>
            <?php
                }
                if ($event_price) { ?>
                  <h3>Precio:</h3>
                  <p class="indent"><?php echo esc_html($event_price); ?></p>
            <?php
                }
                if ($event_date) { ?>
                  <h3>>Fecha:</h3>
                  <p class="indent"><?php echo date_i18n('j F, Y', $event_date); ?></p>
            <?php
                }
                if ($event_time) { ?>
                  <h3>Hora:</h3>
                  <p class="indent"><?php echo $event_time; ?></p>
            <?php
                }
                if ($event_fb_link) { ?>
                  <h3><a href="<?php echo $event_fb_link; ?>">Evento en facebook</a></h3>
            <?php } ?>

            </div>
            <div class="col s8 single-sidebar-item">
              Facebook / Twitter
            </div>
            <?php get_template_part('partials/single-popular'); ?>
            <div class="col s8">
              <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
            </div>
          </div>

        </div>
      </div>

    </article>

<?php
    get_template_part( 'partials/post', 'more' );
  }
} else {
?>

  <div class="container">
    <div class="row">
      <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
    </div>
  </div>

<?php
}
?>

  <!-- end posts -->
  </section>

<!-- end main-content -->
</main>

<?php
get_footer();
?>