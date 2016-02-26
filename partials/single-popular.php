<?php
  // popular posts query
  $args = array (
    'posts_per_page' => '5',
    'post__not_in'   => array($post->ID,),
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
?>

  <div>
    <div class="col s1 feed-category">
      <span class="rotate-text font-condensed">
        Populares
      </span>
    </div>

    <div class="col s7">

<?php
    while ($query->have_posts()) {
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
  wp_reset_postdata();
?>