<?php
get_header();
?>

<!-- main content -->

<main id="main-content">
  <div id="not-found" class="container">
    <h1>No encontramos lo que estas buscando :(</h1>
    <h2>Pero puedes echarle un ojo a lo más nuevo (;</h2>
  </div>

<?php

// here we get more posts from the same category

$args = array (
  'posts_per_page'         => '9',
);

$query = new WP_Query( $args );

if ($query->have_posts()) {
  $post_count = $query->found_posts;
  $item_count = 1;
?>

<div id="single-more-posts" class="container">

  <div class="row">
<?php
  while ( $query->have_posts() ) {
    $query->the_post();
    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

    <div class="col s1"> </div>
    <article <?php post_class('col s6 single-more-post'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink(); ?>">

        <?php the_post_thumbnail(); ?>

        <h3 class="feed-title"><?php the_title(); ?></h3>

  <?php if ($subtitle) { ?>
        <div class="feed-subtitle"><?php echo $subtitle; ?></div>
  <?php } ?>

      </a>

    </article>

<?php
    if ( $item_count == $post_count ) {
?>
  </div>
<?php
    } else if ( ( $item_count % 3 ) == 0 ) {
?>

  </div>
  <div class="row">

<?php
    }
    $item_count++;
  }
} else {
  // no posts found
}

wp_reset_postdata();
?>
</div>
<!-- end main-content -->
</main>

<?php
get_footer();
?>
