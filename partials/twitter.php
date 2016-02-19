<?php
// Get twitter feed
$twitter_feed = get_twitter_feed( IGV_get_option( '_igv_twitter_handle' ) );

if( $twitter_feed ) {
?>

<section id="twitter-feed" class="theme-bg">

  <?php
  foreach($twitter_feed as $twitter_item) {
    $url = $twitter_item->link->url;
    $target = $twitter_item->link->blank === TRUE ? '_blank' : '_self';
    // NOTE: we can also check $blank to add the ajax-link class
    $text = $twitter_item->text;
  ?>

    <a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $text; ?></a>

  <?php
  }
  ?>

</section>

<?php
}
?>

