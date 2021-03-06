<?php

// Get Sponsored cat ID
$sponsored_cat = get_category_by_slug('sponsored');
$sponsored_id = '-' . $sponsored_cat->cat_ID;

?>
    <div id="pattern-space" class="theme-pattern-bg"></div>
    <footer id="footer" class="u-align-center font-condensed">
      <div class="container">
        <div class="row">
          <div class="col s6">
            <a href="<?php echo home_url(); ?>"><?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/img/dist/8106-logo.svg'); ?></a>
          </div>
          <div class="col s6">
            <ul>
<?php 
wp_list_categories( array(
  'title_li' => '',
  'orderby' => 'count', 
  'order' => 'DESC', 
  'hide_empty' => true,
  'exclude'  => $sponsored_id,
)); ?>
            </ul>
          </div>
          <div class="col s6">
            <ul>
              <li><a href="https://twitter.com/8106" target="_blank">Twitter</a></li>
              <li><a href="https://www.facebook.com/8106tv" target="_blank">Facebook</a></li>
              <li><a href="http://8106.tumblr.com/" target="_blank">Tumblr</a></li>
              <li><a href="https://www.instagram.com/8106tv/" target="_blank">Instagram</a></li>
            </ul>
          </div>
          <div class="col s6">
            <ul>
              <li><a href="<?php echo home_url('about/'); ?>">About</a></li>
              <li><a href="<?php echo home_url('advertising/'); ?>">Advertising</a></li>
              <li><a href="<?php echo home_url('legal/'); ?>">Legal</a></li>
              <li>&#169; <?php echo date('Y'); ?> 8106.tv</li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

  </section>

  <div id="loading" class="u-flex-center u-align-center">
    <div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div>
  </div>

  <?php get_template_part('partials/scripts'); ?>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "http://www.8106.tv",
      "logo": "http://www.example.com/images/logo.png",
      "contactPoint" : [
        { "@type" : "ContactPoint",
          "telephone" : "+1-877-746-0909",
          "contactType" : "customer service",
          "contactOption" : "TollFree",
          "areaServed" : "US"
        } , {
          "@type" : "ContactPoint",
          "telephone" : "+1-505-998-3793",
          "contactType" : "customer service"
        } ],
      "sameAs" : [
        "http://www.facebook.com/your-profile",
        "http://instagram.com/yourProfile",
        "http://www.linkedin.com/in/yourprofile",
        "http://plus.google.com/your_profile"
        ]
    }
  </script>

  </body>
</html>
