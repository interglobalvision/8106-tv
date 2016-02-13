<?php
get_header();
?>

<!-- main content -->
<main id="main-content" class="container">

<?php
if( have_posts() ) {
?>

  <!-- main posts loop -->
  <section id="events" class="row">
    <div class="col s2 feed-category">
      <a href="<?php echo esc_url( $events_archive_link ); ?>"><?php echo $events_name; ?></a>
    </div>

  <?php
  $post_index = 0;
  while( have_posts() ) {
    the_post();

    get_template_part('partials/event_item');
    $post_index++;

    if( $post_index % 5 == 0 ) {
?>
  <div class="col s2">&#8200;</div>
<?php
    }
  }
} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>


<!-- end main-content -->
</main>

<?php
get_footer();
?>