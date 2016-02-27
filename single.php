<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="single">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    // here we choose layout conditionally for Features or normal Posts
    if ( has_category( 'featured' ) ) {
      get_template_part( 'partials/featured-single', 'layout' );
    } else {
      get_template_part( 'partials/post', 'layout' );
      get_template_part( 'partials/post', 'more' );
    }
  }
} else {
?>

  <div class="container">
    <div class="row">
      <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
    </div>
  </div>

<?php
}
?>

  <!-- end posts -->
  </section>

<!-- end main-content -->
</main>

<?php
get_footer();
?>
