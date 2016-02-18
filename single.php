<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <!-- main posts loop -->
  <section id="posts">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $category = get_the_category( $post->ID );
    $cat_name = $category[0]->cat_name;

    if ( has_category( 'featured' ) ) {
      get_template_part( 'partials/featured-single', 'layout' );
    } else {
      get_template_part( 'partials/post', 'layout' );
    }

  }

  // WP_Query arguments
  $args = array (
    'category_name'          => $cat_name,
    'post__not_in'           => array($post->ID,),
    'posts_per_page'         => '9',
  );

  // The Query
  $query = new WP_Query( $args );

  // The Loop
  if ( $query->have_posts() ) {
    $post_count = $query->found_posts;
    $item_count = 1;
?>

    <div class="row">

      <?php echo 'Más ' . $cat_name; ?> 

    </div>

    <div class="row">

<?php
    while ( $query->have_posts() ) {
      $query->the_post();
      $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

      <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink(); ?>">

          <?php the_post_thumbnail(); ?>

          <h3 class="feed-title"><?php the_title(); ?></h3>

    <?php if ($subtitle) { ?>
          <div class="feed-subtitle"><?php echo $subtitle; ?></div>
    <?php } ?>

        </a>

      </article>

<?php
      if ( $item_count == $post_count ) {
?>
    </div>
<?php
      } else if ( ( $item_count % 3 ) == 0 ) {
?>

    </div>
    <div class="row">

<?php
      }
      $item_count++;
    }   
  } else {
    // no posts found
  }

  // Restore original Post Data
  wp_reset_postdata();

} else {
?>

    <div class="row">
      <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
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
