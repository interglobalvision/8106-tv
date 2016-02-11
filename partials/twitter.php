<?php 
  $twitter_handle = IGV_get_option( '_igv_twitter_handle' ); 
?>
<section id="twitter-feed" class="">

  <?php
    if ($twitter_handle) {
      $twitter_feed = get_twitter_feed($twitter_handle);
      //pr($twitter_feed);

      $url_regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@";
      foreach($twitter_feed as $index => $twitter_item) {

        // Clean twit text from urls
        $twit_text = preg_replace($url_regex, '', $twitter_item->text);

      ?>

      <div class="">
        <a href="#"><?php echo $twit_text; ?></a>
      </div>

      <?php
      }
    }
  ?>

</section>
