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

    <div class="col s8">

<?php 
  // WP_Query arguments
  $args = array (
    'category_name'          => 'puta-portadazza',
    'posts_per_page'         => '1',
  );

  // The Query
  $puta_query = new WP_Query( $args );

  $category = get_category_by_slug( 'puta-portadazza' );
  $cat_name = $category->cat_name;
  $cat_id = $category->term_id;
  $cat_link = get_category_link( $cat_id );

  // The Loop
  if ( $puta_query->have_posts() ) { 
?>

      <div class="feed-category">
        <a href="<?php echo esc_url( $cat_link ); ?>">
          <?php echo $cat_name; ?>
        </a>
      </div>

<?php
    while ( $puta_query->have_posts() ) {
      $puta_query->the_post();

      $puta_id = $post->ID;
?>
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <h3 class="featured-title">
            <?php the_title(); ?>
          </h3>

          <?php the_post_thumbnail(); ?>

        </a>

        <?php the_excerpt(); ?>

      </article>
<?php 
    }
  } 
  wp_reset_postdata(); 
?>
    </div>

    <div class="col s8">

<?php 
  // WP_Query arguments
  $args = array (
    'category_name'          => 'noticias',
    'posts_per_page'         => '5',
  );

  // The Query
  $noticias_query = new WP_Query( $args );

  $category = get_category_by_slug( 'noticias' );
  $cat_name = $category->cat_name;
  $cat_id = $category->term_id;
  $cat_link = get_category_link( $cat_id );

  // The Loop
  if ( $noticias_query->have_posts() ) { 
  ?> 

      <div class="feed-category">
        <a href="<?php echo esc_url( $cat_link ); ?>">
          <?php echo $cat_name; ?>
        </a>
      </div>
       
<?php
    while ( $noticias_query->have_posts() ) {
      $noticias_query->the_post();
?>
      <article <?php post_class('noticias'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <h3 class="noticias-title">
            <?php the_title(); ?>
          </h3>

          <?php the_post_thumbnail(); ?>

        </a>

      </article>
<?php 
    }
  } 
  wp_reset_postdata(); 
?>

    </div>

    <div class="col s8">

      <!-- ADS -->
      
    </div>

  </section>


  <?php get_template_part('partials/twitter'); ?><!-- Twitter feed -->


  <?php 
    // WP_Query arguments
    $exclude_array = array( $featured_id, $puta_id );

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

        $category = get_the_category( $post->ID );
        $cat_name = $category[0]->cat_name;
        $cat_id = $category[0]->term_id;
        $cat_link = get_category_link( $cat_id );

        $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

      <article <?php if ( $post_num < 10 ) { post_class('col s8'); } else { post_class('col s8 u-hidden'); } ?> id="post-<?php the_ID(); ?>">

        <div class="feed-category">
          <a href="<?php echo esc_url( $cat_link ); ?>">
            <?php echo $cat_name; ?>
          </a>
        </div> 

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


  <?php get_template_part('partials/events'); ?><!-- Events -->


  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>