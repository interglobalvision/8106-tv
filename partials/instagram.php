<?php
// Get instagram feed
$instagram_feed = get_instagram_feed( IGV_get_option( '_igv_instagram_handle' ) );

if ($instagram_feed) {
?>

<section id="instagram-feed" class="theme-grad-bg">
  <div class="container">
    <div class="row"> 

  <?php
  foreach($instagram_feed as $index => $instagram_item) {
    $likes = $instagram_item->likes->count;
    $comments = $instagram_item->comments->count;
    $url = $instagram_item->images->standard_resolution->url;
    $caption = $instagram_item->caption->text;
  ?>

  <?php if( $index != 0 ) { ?>
      <div class="col s1">&#8200;</div>
  <?php } ?>

      <div class="instagram-item col s4">
        <a href="<?php echo $instagram_item->link; ?>" target="_blank">

          <header>
            <?php echo $likes ? $likes . '<span class="genericon genericon-heart"></span>' : ''; ?>
            <?php echo $comments ? $comments . '<span class="genericon genericon-comment"></span>' : ''; ?>
          </header>

            <img src="<?php echo $instagram_item->images->standard_resolution->url; ?>" alt="<?php echo $caption; ?>" />

        </a>
      </div>

  <?php
  }
  ?>
    </div>
  </div>

</section>

<?php
}
?>
