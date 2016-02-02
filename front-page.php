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

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <div class="col s3">
          <h3 class="featured-title">
            <span class="rotate-text">
              <?php the_title(); ?>
            </span>
          </h3>
        </div>

        <?php if ($subtitle) { ?>
        <div class="featured-subtitle col s3">
          <span class="rotate-text">
            <?php echo $subtitle; ?>
          </span>
        </div>
        <?php } ?>

        <div class="col s12">
          <?php the_post_thumbnail(); ?>
        </div>

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
          <span class="rotate-text">
            <?php echo $cat_name; ?>
          </span>
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

  // The Loop
  if ( $noticias_query->have_posts() && $category ) {

    $cat_name = $category->cat_name;
    $cat_id = $category->term_id;
    $cat_link = get_category_link( $cat_id );

  ?> 

      <div class="feed-category">
        <a href="<?php echo esc_url( $cat_link ); ?>">
          <span class="rotate-text">
            <?php echo $cat_name; ?>
          </span>
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

      <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">

      <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
      
    </div>

  </section>


  <?php get_template_part('partials/twitter'); ?><!-- Twitter feed -->


  <?php 
    // WP_Query arguments
    $exclude_array = array( $featured_id, $puta_id );

    $args = array (
      'post__not_in'    => $exclude_array,
      'posts_per_page'  => '20',
    );

    // The Query
    $post_query = new WP_Query( $args );


    // The Loop
    if ( $post_query->have_posts() ) { 

    $item_count = 1;
    $post_count = 1;
    $ad_freq = 4;
  ?>

    <!-- main posts loop -->
    <section id="posts">

      <div class="row">

<?php
      while ( $post_query->have_posts() ) {
        $post_query->the_post();

        $category = get_the_category( $post->ID );
        $cat_name = $category[0]->cat_name;
        $cat_id = $category[0]->term_id;
        $cat_link = get_category_link( $cat_id );

        $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );


        if ( ( $post_count % $ad_freq ) == 0 ) {
?>

        <div class="ad col s8<?php if ( $item_count > 12 ) { echo ' u-hidden'; }?>">

          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">

        </div>

<?php 
          $post_count = 1;

          if ( $ad_freq == 4 ) {
            $ad_freq = 8; 
          } else {
            $ad_freq = 4;
          }

        } else {
?>

        <article <?php if ( $item_count > 12 ) { post_class('col s8 u-hidden'); } else { post_class('col s8'); } ?> id="post-<?php the_ID(); ?>">

          <div class="feed-category">
            <a href="<?php echo esc_url( $cat_link ); ?>">
              <?php echo $cat_name; ?>
            </a>
          </div> 

          <a href="<?php the_permalink() ?>">

            <?php the_post_thumbnail(); ?>

            <h3 class="feed-title">
              <?php the_title(); ?>
            </h3>

            <?php if ($subtitle) { ?>
            <div class="feed-subtitle">
              <?php echo $subtitle; ?>
            </div>
            <?php } ?>

          </a>

        </article>

<?php 
          $post_count++;

        }

        if ( $item_count == 6 ) {
?>
      </div>
    </section>


    <?php get_template_part('partials/instagram'); ?><!-- Instagram ticker -->


    <section id="posts-2">
      <div class="row">

<?php
        } else if ( ( $item_count % 3 ) == 0 ) {
?>
      
      </div>
      <div class="row">

<?php 
        }

        $item_count++;

      } 
?>

    <!-- end posts -->
      </div>
    </section>


    <div class="row">

      <button id="more-posts" class="see-more col s24">Ver Más</button>

    </div>


<?php
    } 
    wp_reset_postdata(); 
?>


  <?php get_template_part('partials/events'); ?><!-- Events -->

<!-- end main-content -->

</main>

<?php
get_footer();
?>