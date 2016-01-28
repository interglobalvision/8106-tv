<?php 
  // WP_Query arguments
  $args = array (
    'category_name'          => 'featured',
    'posts_per_page'         => '1',
  );

  // The Query
  $featured_query = new WP_Query( $args );


  // The Loop
  if ( $featured_query->have_posts() ) { 
?>

  <section id="featured-post">

<?php
    while ( $featured_query->have_posts() ) {
      $featured_query->the_post();

      $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

    <article <?php post_class('col s24'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <h3 class="featured-title">
          <?php the_title(); ?>
        </h3>

        <?php if ($subtitle) { ?>
        <div class="featured-subtitle">
          <?php echo $subtitle; ?>
        </div>
        <?php } ?>

        <?php the_post_thumbnail(); ?>

      </a>

    </article>

<?php 
    }
?>

  </section>

<?php 
  } 
  wp_reset_postdata(); 
?>