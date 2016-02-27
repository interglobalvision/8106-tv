<?php
$now = time();
$args = array (
  'post_type'          => array( 'event' ),
  'posts_per_page'     => '8',
  // Order by _igv_event_date
  'orderby'            => 'meta_value_num',
  'order'              => 'ASC',
  'meta_key'           => '_igv_event_date',
  // Only grater/equal today
  'meta_query'         => array(
    'key'     => '_igv_event_date',
    'value'   => $now,
    'compare' => '>='
  ),
);

$events_query = new WP_Query( $args );

$events_obj = get_post_type_object( 'event' );
$events_name = $events_obj->labels->singular_name;
$events_archive_link = get_post_type_archive_link( 'event' );

if ( $events_query->have_posts() ) {
?>

<section id="events" class="theme-hard-grad-bg">
  <div class="container u-cf">
    <div class="row">

      <div class="col s2 feed-category">
        <a class="rotate-text font-condensed" href="<?php echo esc_url( $events_archive_link ); ?>">Agenda</a>
      </div>

      <div class="col s1"></div>

  <?php
  $post_index = 1;
  while ( $events_query->have_posts() ) {
    $events_query->the_post();

    get_template_part('partials/events-grid-item');

    // if start of a row
    if ($post_index % 3 == 0) {
    ?>
      </div>
      <div class="row">
    <?php
    }
    // if end of loop
    if ($post_index == 8) {
    ?>
      <div class="col s3">
        <a id="more-events" href="<?php echo esc_url( $events_archive_link ); ?>" class="see-more u-align-center u-held">Ver Más</a>
      </div>
      </div>
    <?php
    }
    // if start of 3rd row
    if ($post_index % 6 == 0) {
?>
      <div class="col s3"></div>
  <?php
    }
    // if start of 2rd row
    if ($post_index == 3) {
?>
      <div class="col s2"></div>
  <?php
    }

    $post_index++;
  }
  ?>


    </div>
  </div>
</section>

<?php
}
wp_reset_postdata();
?>
