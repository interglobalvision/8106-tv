<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">


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

      $featured_id = $post->ID;

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


  <section class="row"> <!-- Puta portadazza, Noticias, Ads -->


  </section>


  <?php get_template_part('partials/twitter'); ?><!-- Twitter feed -->


  <?php 
    // WP_Query arguments
    $exclude_array = array( $featured_id );

    $args = array (
      'post__not_in'    => $exclude_array,
      'post_type'       => array( 'post' ),
      'posts_per_page'  => '20',
    );

    // The Query
    $post_query = new WP_Query( $args );


    // The Loop
    if ( $post_query->have_posts() ) { 

    $post_num = 0;
  ?>

    <!-- main posts loop -->
    <section id="posts" class="row">

<?php
      while ( $post_query->have_posts() ) {
        $post_query->the_post();

        $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

      <article <?php if ( $post_num < 10 ) { post_class('col s8'); } else { post_class('col s8 u-hidden'); } ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <h3 class="feed-title">
            <?php the_title(); ?>
          </h3>

          <?php the_post_thumbnail(); ?>

          <?php if ($subtitle) { ?>
          <div class="feed-subtitle">
            <?php echo $subtitle; ?>
          </div>
          <?php } ?>

        </a>

      </article>

<?php 

        if ( $post_num == 4) {

?>

    </section>


    <?php get_template_part('partials/instagram'); ?><!-- Instagram ticker -->


    <section id="posts-2" class="row">


<?php
        }

        $post_num++;

      } 
?>

    <!-- end posts -->
    </section>

<?php
    } 
    wp_reset_postdata(); 
?>


  <?php get_template_part('partials/agenda'); ?><!-- Agenda -->


  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>