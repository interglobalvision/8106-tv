<?php 
  $twitter_handle = IGV_get_option( '_igv_twitter_handle' ); 
?>
<section class="row">

  <?php
    if ($twitter_handle) {
      echo '@' . $twitter_handle;
    }
  ?>

</section>