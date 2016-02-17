<?php
$date = get_post_meta( $post->ID, '_igv_event_date', true );
if ($date) {
  $month = date_i18n('F', $date);
  $day = date_i18n('d', $date);
}
$venue = get_post_meta( $post->ID, '_igv_event_address', true );
?>

<article <?php post_class('col s7 event-item'); ?> id="post-<?php the_ID(); ?>">

  <a href="<?php the_permalink() ?>">
    <div class="event-date col s3 u-align-center">
    <?php
      if ($date) {
    ?>
      <p class="month"><?php echo $month; ?></p>
      <p class="day"><?php echo $day; ?></p>
    <?php
      }
    ?>
    </div>

    <h3 class="event-info col s4">
<?php the_title(); ?>
    </h3>

  </a>

</article>
