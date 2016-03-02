<?php
  // popular posts query
  $args = array (
    'posts_per_page' => '5',
    'post__not_in'   => array($post->ID,),
    'meta_key' => 'ghb_hype',
    'orderby' => 'meta_value_num',
    'date_query' => array(
      'after' => date('Ymd', strtotime('-' . IGV_get_option( '_igv_popular_expiry') . ' weeks')),
    ),
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
?>

  <div id="single-popular" class="u-cf single-sidebar-item">
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
      <article <?php post_class('small-post theme-border-color u-cf'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php the_permalink() ?>">

          <?php the_post_thumbnail('small-thumb'); ?>
          <h4 class="small-post-title col s3"><?php the_title(); ?></h4>

        </a>

      </article>

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
