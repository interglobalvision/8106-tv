<?php
  // Get meta
  $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );
  $author = get_the_author();
  $date = get_the_date( 'j F Y' );
  $tags = get_the_tag_list('',', ','');
?>

<article <?php post_class(); ?> id="page-<?php the_ID(); ?>">

  <header id="single-header" class="theme-grad-bg">
    <div class="container">
      <div class="row">
        <div class="col s1"></div>
        <div class="col s15">
          <h1 id="single-title" class="js-fix-widows"><?php the_title(); ?></h1>
          <h2 class="font-condensed js-fix-widows"><?php echo $subtitle; ?></h2>
        </div>
        <div class="col s8">
          <?php
            if ( has_category('puta-portadazza') ) {
              the_post_thumbnail('single-puta-portadazza');
            } else { ?>
          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
          <?php } ?>
        </div>
      </div>
    </div>
  </header>

  <div id="page-content" class="container">
    <div class="row">
      <div class="col s15">
        <div class="copy">
          <?php the_content(); ?>
        </div>
      </div>

      <div class="col s1"></div>

      <div id="single-sidebar" class="u-float">
        <div class="col s8 single-sidebar-item">
          <?php if ($author) { ?>
          <strong>Autor:</strong> <?php echo $author; ?>
          <?php } if ($date) { ?>
          <br><strong>Fecha:</strong> <?php echo $date; ?>
          <?php } if ($tags) { ?>
          <br><strong>Tags:</strong> <?php echo $tags; ?>
          <?php } ?>
        </div>
        <div class="col s8 single-sidebar-item">
          <?php get_template_part('partials/social-widgets'); ?>
        </div>
        <?php get_template_part('partials/single-popular'); ?>
        <div class="col s8">
          <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400">
        </div>
      </div>

    </div>
  </div>

</article>