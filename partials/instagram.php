<?php 
$instagram_handle = IGV_get_option( '_igv_instagram_handle' ); 
?>
<section class="row"> 

  <?php
  if ($instagram_handle) {
    echo '@' . $instagram_handle;
  }
  ?>

</section>
