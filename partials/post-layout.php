<?php

    // Get meta
    $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );
    $author = get_the_author();
    $date = get_the_date( 'j F Y' );
    $tags = get_the_tag_list('',', ','');

?>
  <div class="row">
    <div class="col s16">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      <h2><?php echo $subtitle; ?></h2>
    </div>
    <div class="col s8">
      <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
    </div>
  </div>
  <div class="row">
    <article <?php post_class('col s16'); ?> id="post-<?php the_ID(); ?>">

      <?php the_content(); ?>

    </article>
    <div class="col s8">
      <?php if ($author) { ?>
      <strong>Autor:</strong> <?php echo $author; ?>
      <?php } if ($date) { ?>
      <br><strong>Fecha:</strong> <?php echo $date; ?>
      <?php } if ($tags) { ?>
      <br><strong>Tags:</strong> <?php echo $tags; ?>
      <?php } ?>
      <div>
        Facebook / Twitter
      </div>
      <?php get_template_part( 'partials/single', 'sidebar' ); ?>
    </div>
  </div>


