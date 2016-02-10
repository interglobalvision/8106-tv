<?php

    // Get meta
    $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );

?>
<div class="row">
  <article <?php post_class('col s16'); ?> id="post-<?php the_ID(); ?>">

    <?php the_post_thumbnail(); ?>
    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    <h2><?php echo $subtitle; ?></h2>

    <?php the_content(); ?>

  </article>
</div>


