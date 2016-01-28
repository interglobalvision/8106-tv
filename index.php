<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">


  <!-- Featured Post -->

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

  <!-- End Featured Post -->


  <section> <!-- Puta portadazza, Noticias, Ads -->

  </section>


  <?php get_template_part('partials/twitter'); ?><!-- Twitter feed -->


  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

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
  }
} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>


  <?php get_template_part('partials/instagram'); ?><!-- Instagram ticker -->


  <!-- Agenda -->

<?php 
  // WP_Query arguments
  $args = array (
    'post_type'          => array( 'event' ),
    'posts_per_page'     => '8',
  );

  // The Query
  $agenda_query = new WP_Query( $args );


  // The Loop
  if ( $agenda_query->have_posts() ) { 
?>

  <section id="featured-post">

<?php
    while ( $agenda_query->have_posts() ) {
      $agenda_query->the_post();

      $timestamp = get_post_meta( $post->ID, '_igv_event_date', true );
      $month = date( 'F', $timestamp );
      $day = date( 'd', $timestamp );
      $venue = get_post_meta( $post->ID, '_igv_event_address', true );

      if ( $timestamp ) {
?>
      
    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <div class="agenda-date">
          <div class="agenda-day"><?php echo $day; ?></div>
          <?php echo $month; ?>
        </div>

        <h3 class="agenda-title">
          <?php the_title(); ?>
        </h3>

        <?php if ( $venue ) { ?>
        <span class="agenda-venue">
          <?php echo $venue; ?>
        </span>
        <?php } ?>

      </a>

    </article>

<?php 
      }
    }
?>

  </section>

<?php 
  } 
  wp_reset_postdata(); 
?>

  <!-- End Agenda -->


  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>