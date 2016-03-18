<?php
// Get twitter feed
$twitter_feed = get_twitter_feed( IGV_get_option( '_igv_twitter_handle' ) );

if( $twitter_feed ) {
?>

<section id="twitter-feed" class="theme-bg hide-on-mobile">

  <div id="twitter-marquee-outer">
    <div id="twitter-marquee-holder">
      <div class="twitter-marquee">

  <?php
  foreach($twitter_feed as $twitter_item) {
    $url = $twitter_item->link->url;
    $target = $twitter_item->link->blank === TRUE ? '_blank' : '_self';
    // NOTE: we can also check $blank to add the ajax-link class
    $text = $twitter_item->text;
  ?>

    <a class="twitter-feed-tweet" href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $text; ?></a>

  <?php
  }
  ?>
      </div>
    </div>
  </div>

</section>

<?php
}
?>

