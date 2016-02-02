<?php 
  // WP_Query arguments
  $args = array (
    'post_type'          => array( 'event' ),
    'posts_per_page'     => '8',
  );

  // The Query
  $events_query = new WP_Query( $args );

  $events_obj = get_post_type_object( 'event' );
  $events_name = $events_obj->labels->singular_name;
  $events_archive_link = get_post_type_archive_link( 'event' );

  // The Loop
  if ( $events_query->have_posts() ) { 
?>

  <section id="events" class="row">

    <div class="feed-category">
      <a href="<?php echo esc_url( $events_archive_link ); ?>">
        <?php echo $events_name; ?>
      </a>
    </div>

<?php
    while ( $events_query->have_posts() ) {
      $events_query->the_post();

      $timestamp = get_post_meta( $post->ID, '_igv_event_date', true );
      $month = date( 'F', $timestamp );
      $day = date( 'd', $timestamp );
      $venue = get_post_meta( $post->ID, '_igv_event_address', true );

      if ( $timestamp ) {
?>
      
    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <div class="events-date">
          <div class="events-day"><?php echo $day; ?></div>
          <?php echo $month; ?>
        </div>

        <h3 class="events-title">
          <?php the_title(); ?>
        </h3>

        <?php if ( $venue ) { ?>
        <h4 class="events-venue">
          <?php echo $venue; ?>
        </h4>
        <?php } ?>

      </a>

    </article>

<?php 
      }
    }
?>
  
    <button id="more-events" class="see-more col s8">Ver Más</button>

  </section>

<?php 
  } 
  wp_reset_postdata(); 
?>
