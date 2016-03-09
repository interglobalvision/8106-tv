<?php

// here we get more posts from the same category

if (get_post_type() !== 'post') {

  $categories = get_categories(array('hide_empty' => 1));

  // reset indexes if empty cats are excluded
  $categories = array_values($categories);

  // get a random cat
  $random_index = rand(0, (count($categories) - 1));
  $random_category = $categories[$random_index];

  $category = $random_category;
  $cat_name = $random_category->cat_name;

} else {

  $category = get_the_category($post->ID);
  $cat_name = $category[0]->cat_name;

}

$args = array (
  'category_name'          => $cat_name,
  'post__not_in'           => array($post->ID,),
  'posts_per_page'         => '9',
);

$query = new WP_Query( $args );

if ($query->have_posts()) {
  $post_count = $query->found_posts;
  $item_count = 1;
?>

<div id="single-more-posts" class="container">

  <div class="row">
    <button id="more-music" class="see-more theme-border-color col s24"><?php echo 'Más ' . $cat_name; ?></button>
  </div>

  <div class="row">
<?php
  while ( $query->have_posts() ) {
    $query->the_post();
    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

    <div class="col s1"> </div>
    <article <?php post_class('col s6 single-more-post'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink(); ?>">

        <?php the_post_thumbnail('index-post-thumb'); ?>

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
