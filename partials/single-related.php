<?php
  // needs related posts query
  $args = array (
    'posts_per_page' => '3',
    'post__not_in'   => array($post->ID,),
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
?>

    <div class="col s1 feed-category">
      <span class="rotate-text font-condensed">
        Relacionados
      </span>
    </div>

    <div class="col s7">

<?php
    while ($query->have_posts()) {
      $query->the_post();
?>
      <article <?php post_class('small-post theme-border-color u-cf'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <?php the_post_thumbnail('small-thumb'); ?>
          <h4 class="small-post-title col s4"><?php the_title(); ?></h4>

        </a>

      </article>

<?php
    }
?>

    </div>

<?php
  } else {
    // no posts found
  }
  wp_reset_postdata();
?>
