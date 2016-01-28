<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">


  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $subtitle = get_post_meta( $post->ID, '_igv_post_subtitle', true );
?>

    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <h3 class="feed-title">
          <?php the_title(); ?>
        </h3>

        <?php the_post_thumbnail(); ?>

        <?php if ($subtitle) { ?>
        <div class="feed-subtitle">
          <?php echo $subtitle; ?>
        </div>
        <?php } ?>

      </a>

    </article>

<?php
  }
} else {
?>
    <article class="u-alert col s16"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>

  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>