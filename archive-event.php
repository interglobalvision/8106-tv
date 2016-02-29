<?php
get_header();

$now = time();
$args = array (
  'post_type'          => array( 'event' ),
  'posts_per_page'     => '-1',
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
query_posts($args);
?>

<!-- main content -->
<main id="main-content" class="theme-grad-bg">
  <div class="container u-cf">

<?php
if( have_posts() ) {
  $events_obj = get_post_type_object( 'event' );
  $events_archive_link = get_post_type_archive_link( 'event' );
?>

  <!-- main posts loop -->
  <section id="events">
    <div class="row">
      <div class="col s2 feed-category">
        <a class="rotate-text font-condensed" href="<?php echo esc_url( $events_archive_link ); ?>">Agenda</a>
      </div>

      <div class="col s1"></div>
    
  <?php
  $post_index = 1;
  while( have_posts() ) {
    the_post();

    get_template_part('partials/events-grid-item');

    // if start of a row
    if ($post_index % 3 == 0) {
    ?>
      </div>
      <div class="row">
      <?php
      // When even lines
      if ( $post_index > 1 && $post_index % 6 == 0) {
      ?>
        <div class="col s3"></div>
      <?php
      // When odd lines
      } else {
      ?>
        <div class="col s2"></div>
      <?php
      }
    }
    $post_index++;
  }
} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

    </div>
  <!-- end posts -->
  </section>


<!-- end main-content -->
  </div>
</main>

<?php
get_footer();
?>
