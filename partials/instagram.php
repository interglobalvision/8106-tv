<section class="row"> 

  <?php
  $instagram_handle = IGV_get_option( '_igv_instagram_handle' ); 
  if ($instagram_handle) {
    echo '@' . $instagram_handle;

    // Get instagram feed
    $instagram_feed = instagram_feed();

  }
  ?>

</section>
