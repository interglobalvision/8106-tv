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

    // Get meta
    $subtitle  = get_post_meta( get_the_ID(), '_igv_post_subtitle', true );
    $event_address  = get_post_meta( get_the_ID(), '_igv_event_address', true );
    $event_price  = get_post_meta( get_the_ID(), '_igv_event_price', true );
    $event_date  = get_post_meta( get_the_ID(), '_igv_event_date', true );
    $event_time  = get_post_meta( get_the_ID(), '_igv_event_time', true );
    $event_fb_link  = get_post_meta( get_the_ID(), '_igv_event_fb_link', true );

?>

    <article <?php post_class('col s8'); ?> id="post-<?php the_ID(); ?>">

      <?php the_post_thumbnail(); ?>
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      <h2><?php echo $subtitle; ?></h2>

      <?php the_content(); ?>

    <p><b>Ubicación: </b><?php echo esc_html($event_address); ?></p>
    <p><b>Precio: </b><?php echo esc_html($event_price); ?></p>
    <p><b>Fecha: </b><?php echo date_i18n('j F, Y', $event_date); ?></p>
    <p><b>Hora: </b><?php echo $event_time; ?></p>
    <p><a href="<?php echo $event_fb_link; ?>">Evento en facebook</a></p>

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
