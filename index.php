<?php
get_header();
?>

<!-- main content -->
<main id="main-content">

<?php
// The Loop
if ( have_posts() ) {
?>

  <!-- main posts loop -->
  <section id="posts" class="container posts-feed">
    <div class="row">

  <?php
  $post_count = count($wp_query->posts);
  $ads_count = 4;

  // In case is last page and theres less than 20 posts
  if($post_count < 20) {
    $ads_count = floor($post_count / 5) ;
  }

  $total_items = $ads_count + $post_count;

  for($item_count = 1; $item_count <= $total_items; $item_count++) {
  ?>

    <?php // AD
    if ( $item_count == 4 || $item_count == 12  || $item_count == 16 || $item_count == 24 ) {
    ?>

      <div class="ad u-float">
        <div class="col s1"></div>
        <div class="feed-post-container col s7">
          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
        </div>
      </div>

    <?php // End AD
    } else {
    ?>

      <?php // POST
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
            <?php
              $uncropped_thumb_meta = wp_get_attachment_metadata(get_post_thumbnail_id());

              if ($uncropped_thumb_meta) {
                if ($uncropped_thumb_meta['width'] >= $uncropped_thumb_meta['height']) {
                  // landscape thumbnail
                  the_post_thumbnail('index-post-thumb');
                } else {
                  the_post_thumbnail('index-post-thumb-portrait');
                }
              }
            ?>
            <h3 class="feed-title"><?php the_title(); ?></h3>
      <?php if ($subtitle) { ?>
            <div class="feed-subtitle"><?php echo $subtitle; ?></div>
      <?php } ?>
          </a>
        </div>

      </article>

    <?php
    } // End POST
    ?>

    <?php // Close row when 3rd item
    if ( ( $item_count % 3 ) == 0 ) {
    ?>
    </div>
    <div class="row">
    <?php
    }
    ?>

    <?php // Break loop when out of posts
    if ( $item_count > $total_items && !have_posts() ) {
      break;
    }
    ?>

  <?php
  }
  ?>

    <!-- end posts -->
  </div>

  <div class="row">
    <?php get_template_part('partials/pagination'); ?>
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
