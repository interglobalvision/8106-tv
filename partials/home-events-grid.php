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

<section id="events" class="theme-hard-grad-bg">
  <div class="container">
    <div class="row">

      <div class="col s2 feed-category">
        <a href="<?php echo esc_url( $events_archive_link ); ?>"><?php echo $events_name; ?></a>
      </div>

  <?php
  $post_index = 0;
  while ( $events_query->have_posts() ) {
    $events_query->the_post();

    get_template_part('partials/events-grid-item');
    $post_index++;

    if( $post_index % 5 == 0 ) {
?>
      <div class="col s2">&#8200;</div>
  <?php
    }
  }
  ?>

      <button id="more-events" class="see-more col s8">Ver Más</button>

    </div>
  </div>
</section>

<?php
}
wp_reset_postdata();
?>
