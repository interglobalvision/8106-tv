<?php
  $related_query = get_related_posts();
  if ($related_query->have_posts()) {
?>

    <div class="col s1 feed-category">
      <span class="rotate-text font-condensed">
        Relacionados
      </span>
    </div>

    <div class="col s7">

<?php
    while ($related_query->have_posts()) {
      $related_query->the_post();
?>
      <article <?php post_class('small-post theme-border-color u-cf'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <?php the_post_thumbnail('small-thumb'); ?>
          <h4 class="small-post-title"><?php the_title(); ?></h4>

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
