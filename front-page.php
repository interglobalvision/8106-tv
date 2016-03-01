<?php
get_header();
?>

<!-- main content -->
<main id="main-content">


<?php
// FEATURED: WP_Query arguments
$args = array (
  'category_name'   => 'featured',
  'posts_per_page'  => '1',
);

// FEATURED: The Query
$featured_query = new WP_Query( $args );

// FEATURED: The Loop
if ( $featured_query->have_posts() ) {
?>

  <section id="featured-post" class="theme-grad-bg u-cf">
    <div class="container">

  <?php
  while ( $featured_query->have_posts() ) {
    $featured_query->the_post();
    $featured_id = $post->ID;
    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
  ?>

      <article <?php post_class(); ?> id="featured-post-container">
        <h3 id="featured-post-title" class="rotate-text js-fix-widows">
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h3>
    <?php if ($subtitle) { ?>
        <div id="featured-post-subtitle" class="rotate-text font-condensed js-fix-widows">
          <h4><a href="<?php the_permalink() ?>"><?php echo $subtitle; ?></a></h4>
        </div>
    <?php } ?>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('', array( 'id' => 'featured-post-image') ); ?></a>
      </article>

  <?php
  }
  ?>

    <div>
  </section>

<?php
}
wp_reset_postdata();
?>

  <!-- Puta portadazza, Noticias, Ads -->
  <section class="container posts-feed">
    <div class="row">

<?php
// PORTADAZZA: WP_Query arguments
$args = array (
  'category_name'   => 'puta-portadazza',
  'posts_per_page'  => '1',
);

// PORTADAZZA: The Query
$puta_query = new WP_Query( $args );

$category = get_category_by_slug( 'puta-portadazza' );
$cat_name = $category->cat_name;
$cat_id = $category->term_id;
$cat_link = get_category_link( $cat_id );

// PORTADAZZA: The Loop
if ( $puta_query->have_posts() ) {
?>

  <?php
  while ( $puta_query->have_posts() ) {
    $puta_query->the_post();
    $puta_id = $post->ID;
  ?>
      <div class="col s1">
        <div class="feed-category">
          <a href="<?php echo esc_url( $cat_link ); ?>">
            <span class="rotate-text font-condensed">
              <?php echo $cat_name; ?>
            </span>
          </a>
        </div>
      </div>

      <div class="col s7">
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
        <?php the_excerpt(); ?>
      </div>
  <?php
  }
}
wp_reset_postdata();

?>

<?php
// NOTICIAS: WP_Query arguments
$args = array (
  'category_name'   => 'noticias',
  'posts_per_page'  => '5',
);

// NOTICIAS: The Query
$noticias_query = new WP_Query( $args );

$category = get_category_by_slug( 'noticias' );

$excluded_posts = array();

// NOTICIAS: The Loop
if ( $noticias_query->have_posts() && $category ) {
  array_push($excluded_posts, wp_list_pluck( $noticias_query->posts, 'ID' ));
  $cat_name = $category->cat_name;
  $cat_id = $category->term_id;
  $cat_link = get_category_link( $cat_id );
?>
      <div class="col s1">
        <div class="feed-category">
          <a href="<?php echo esc_url( $cat_link ); ?>">
            <span class="rotate-text font-condensed"><?php echo $cat_name; ?></span>
          </a>
        </div>
      </div>

      <div class="col s7">
  <?php
  while ( $noticias_query->have_posts() ) {
    $noticias_query->the_post();
  ?>

      <article <?php post_class('small-post theme-border-color u-cf'); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail('small-thumb'); ?>
          <h4 class="small-post-title col s3"><?php the_title(); ?></h4>
        </a>
      </article>

  <?php
  }
}
wp_reset_postdata();
?>
      </div>
      <div class="col s1"></div>

      <div class="col s7">
        <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
        <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
      </div>

    </div>

  </section>

<?php get_template_part('partials/twitter'); ?><!-- Twitter feed -->

<?php
// WP_Query arguments
array_push($excluded_posts, $featured_id, $puta_id);

$args = array (
  'post__not_in'    => $excluded_posts,
  'posts_per_page'  => '16',
);

// The Query
$post_query = new WP_Query( $args );

// The Loop
if ( $post_query->have_posts() ) {
?>

    <!-- main posts loop -->
    <section id="posts" class="container posts-feed">
      <div class="row">

  <?php
  $ads_count = 2;
  $post_count = $post_query->post_count;
  for($item_count = 1; $item_count <= $post_count + $ads_count; $item_count++) { 
  //while ( $post_query->have_posts() ) {
  ?>

    <?php // AD
    if ( $item_count == 4 || $item_count == 12 ) {
    ?>

        <div class="ad u-float<?php if ( $item_count > 12 ) { echo ' u-hidden'; }?>">
          <div class="col s1"></div>
          <div class="feed-post-container col s7">
            <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
          </div>
        </div>
    <?php
    } else {// End AD
    ?>

    <?php // POST
    $post_query->the_post();

    $category = get_the_category( $post->ID );
    $cat_name = $category[0]->cat_name;
    $cat_id = $category[0]->term_id;
    $cat_link = get_category_link( $cat_id );
    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );

    $post_class = $item_count > 12 ? 'feed-post u-float u-hidden' : 'feed-post u-float';

    ?>

        <article <?php post_class($post_class); ?> id="post-<?php the_ID(); ?>">

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
    } // End POST
    ?>
      <?php
      if ( $item_count == 6 ) {
      ?>
      </div>
    </section>

      <?php get_template_part('partials/instagram'); ?><!-- Instagram ticker -->

    <section id="posts-2" class="container posts-feed">
      <div class="row">

      <?php
      }
      ?>

      <?php // Close row after echoing post
      if ( ( $item_count % 3 ) == 0 ) {
        echo '</div>
          <div class="row">';
      }
      ?>

  <?php
  }
  ?>

      </div>
      <div class="row">
        <a href="<?php echo home_url('page/2'); ?>" id="more-posts" class="see-more theme-border-color col s24">Ver Más</a>
      </div>

    <!-- end posts -->
    </section>

<?php
}
wp_reset_postdata();
?>


<?php get_template_part('partials/home-events-grid'); ?><!-- Events -->

<!-- end main-content -->
</main>

<?php
get_footer();
?>
