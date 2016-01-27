<?php
get_header();
?>

<!-- main content -->

<main id="main-content" class="container">

  <section id="featured-post">

    <article <?php post_class('col s24'); ?> id="post-<?php // the_ID(); ?>">

      <a href="<?php // the_permalink() ?>">

        <?php // the_title(); ?>

        <?php // the_post_thumbnail(); ?>

      </a>

    </article>

  </section>


  <section> <!-- Puta porta, Noticias, Ads -->

  </section>


  <section> <!-- Twitter ticker -->

  </section>


  <!-- main posts loop -->
  <section id="posts" class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>

    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>">

        <?php the_title(); ?>

        <?php the_post_thumbnail(); ?>

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


  <section> <!-- Instagram ticker -->

  </section>


  <section> <!-- Agenda -->

  </section>


  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>