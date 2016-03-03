<?php
  // Get meta
  $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );
  $author = get_the_author();
  $date = get_the_date( 'j F Y' );
  $tags = get_the_tag_list('',', ','');
?>

<article <?php post_class(); ?> id="single-featured-<?php the_ID(); ?>">

  <header id="featured-single-header" class="theme-grad-bg">
    <div class="container" id="featured-post-container">
      <div id="featured-post-title-holder">
          <h3 id="featured-post-title" class="rotate-text js-fix-widows">
            <?php the_title(); ?>
          </h3>
        </div>

    <?php if ($subtitle) { ?>
        <div id="featured-post-subtitle-holder">
          <h4 id="featured-post-subtitle" class="rotate-text font-condensed js-fix-widows">
            <?php echo $subtitle; ?>
          </h4>
        </div>
    <?php } ?>

        <div id="featured-post-image-holder">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('', array( 'id' => 'featured-post-image') ); ?></a>
        </div>
    <div>
  </header>

  <div id="page-content" class="container">
    <div class="row">
      <div class="col s4"></div>

      <div class="col s16">
        <div id="featured-copy" class="copy">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <footer id="featured-single-footer">

      <div class="row">
        <div class="col s24 u-align-center">
          <?php get_template_part('partials/social-widgets'); ?>
        </div>
      </div>

      <div class="row">
        <div class="col s4"></div>
        <?php get_template_part('partials/single-related'); ?>
        <div class="col s2"></div>
        <div class="col s7">
          <?php if ($author) { ?>
          <strong>Autor:</strong> <?php echo $author; ?>
          <?php } if ($date) { ?>
          <br><strong>Fecha:</strong> <?php echo $date; ?>
          <?php } if ($tags) { ?>
          <br><strong>Tags:</strong> <?php echo $tags; ?>
          <?php } ?>
        </div>
      </div>

    </footer>

  </div>

</article>