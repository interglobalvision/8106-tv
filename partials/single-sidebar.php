<?php
// WP_Query arguments
$args = array (
  'posts_per_page'         => '5',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
?>

<div id="single-sidebar">

  <div class="feed-category">
    <span class="rotate-text font-condensed">
      Populares
    </span>
  </div>

  <div class="small-thumbs">

<?php 
  while ( $query->have_posts() ) {
    $query->the_post();
?>

  <div>
    <?php the_post_thumbnail(); ?>
    <h5><?php the_title(); ?></h5>
  </div>

<?php
  }
?>

  </div>
</div>

<?php
} else {
  // no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>

<img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
