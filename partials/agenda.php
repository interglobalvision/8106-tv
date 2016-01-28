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

  <section id="featured-post" class="row">

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
