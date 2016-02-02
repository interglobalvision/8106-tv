<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    if ( has_category( 'featured' ) ) {
      get_template_part( 'partials/single', 'featured' );
    } else {
      get_template_part( 'partials/single', 'post' );
    }

  }

} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
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
