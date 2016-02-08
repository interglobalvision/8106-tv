<section id="instagram-feed" class="row"> 

<?php
$instagram_handle = IGV_get_option( '_igv_instagram_handle' ); 
if ($instagram_handle) {
  //echo '@' . $instagram_handle;
  // Get instagram feed
  $instagram_feed = get_instagram_feed();

  foreach($instagram_feed as $index => $instagram_item) {
    $likes = $instagram_item->likes->count;
    $comments = $instagram_item->comments->count;
    $url = $instagram_item->images->standard_resolution->url;
  ?>

  <?php if( $index != 0 ) { ?>
    <div class="col s1">&#8200;</div>
  <?php } ?>

  <div class="instagram-item col s4">
    <a href="<?php echo $instagram_item->link; ?>">

      <header>
        <?php echo $likes ? $likes . '<span class="genericon genericon-heart"></span>' : ''; ?>
        <?php echo $comments ? $comments . '<span class="genericon genericon-comment"></span>' : ''; ?>
      </header>

      <img src="<?php echo $instagram_item->images->standard_resolution->url; ?>" alt="" width="190px" />

    </a>
  </div>

  <?php
  }

}
?>

</section>
