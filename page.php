<?php
get_header();
?>

<!-- main content -->
<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>
    <article <?php post_class(); ?> id="page-<?php the_ID(); ?>">

      <header id="page-header" class="theme-grad-bg">
        <div class="container u-align-center">
          <div class="row">
            <div class="col s24">
               <h1>
                <?php the_title(); ?>
              </h1>
            </div>
          </div>
        </div>
      </header>

      <div id="page-content" class="container">
        <div class="row">
          <div class="col s16">
            <div class="copy">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="col s8">
          <?php
            echo IGV_get_option('_igv_ads_single_1');
            echo IGV_get_option('_igv_ads_single_2');
          ?>
          </div>
        </div>
      </div>

    </article>

<?php
  }
} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

<!-- end main-content -->
</main>

<?php
get_footer();
?>
