<?php
get_header();
?>

<!-- main content -->
<main id="main-content">

<?php
// The Loop
if ( have_posts() ) {
  $item_count = 1;
  ?>

  <!-- main posts loop -->
  <section id="posts" class="container posts-feed">
    <div class="row">

  <?php
  while (have_posts() ) {

    the_post();
    $category = get_the_category( $post->ID );
    $cat_name = $category[0]->cat_name;
    $cat_id = $category[0]->term_id;
    $cat_link = get_category_link( $cat_id );
    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );

  ?>

      <article <?php post_class('feed-post u-float'); ?> id="post-<?php the_ID(); ?>">
        <div class="col s1">
          <div class="feed-category">
            <a class="rotate-text font-condensed" href="<?php echo esc_url( $cat_link ); ?>"><?php echo $cat_name; ?></a>
          </div>
        </div>

        <div class="col s7">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail(); ?>
            <h3 class="feed-title"><?php the_title(); ?></h3>
      <?php if ($subtitle) { ?>
            <div class="feed-subtitle"><?php echo $subtitle; ?></div>
      <?php } ?>
          </a>
        </div>

      </article>

    <?php
    if ( ( $item_count % 3 ) == 0 ) {
    ?>

    </div>
    <div class="row">

    <?php
    }

    $item_count++;
    ?>

    <?php
    // AD
    if ( $item_count == 4 || $item_count == 12  || $item_count == 16 || $item_count == 24) {
    ?>

      <div class="ad u-float">
        <div class="col s1"></div>
        <div class="feed-post-container col s7">
          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
        </div>
      </div>

      <?php
      if ( ( $item_count % 3 ) == 0 ) {
      ?>

    </div>
    <div class="row">

      <?php
      }
      $item_count++;
    }
  }
  ?>
  <?php get_template_part('partials/pagination'); ?>

    <!-- end posts -->
      </div>

  <!-- end posts -->
  </section>

<?php
}
?>

<!-- end main-content -->
</main>

<?php
get_footer();
?>
