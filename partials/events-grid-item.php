<?php
$date = get_post_meta( $post->ID, '_igv_event_date', true );
if ($date) {
  $month = date_i18n('F', $date);
  $day = date_i18n('d', $date);
}
$venue = get_post_meta( $post->ID, '_igv_event_venue', true );
?>

<article <?php post_class('event-item u-float'); ?> id="post-<?php the_ID(); ?>">

  <a href="<?php the_permalink() ?>">
    <div class="col s3">
    <?php
    if ($date) {
    ?>
      <div class="event-date s3 u-held u-align-center">
        <span class="month font-condensed"><?php echo $month; ?></span>
        <span class="day"><?php echo $day; ?></span>
      </div>
    <?php
    }
    ?>
    </div>

    <div class="event-info col s4">
      <h3 class="event-name"><?php the_title(); ?></h3>
    <?php
    if($venue) {
    ?> 
      <p class="event-venue"><?php echo '@' . $venue; ?></p>
    <?php
    }
    ?>
    </div>

  </a>

</article>
