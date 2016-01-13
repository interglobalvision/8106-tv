    <footer id="footer" class="u-align-center">
      <div class="container">
        <div class="row">
          <div class="col s6">
            logo
          </div>
          <div class="col s6">
            <ul>
              <li>Música</li>
              <li>Puta portadazza</li>
              <li>Noticias</li>
              <li>Cats go here?</li>
            </ul>
          </div>
          <div class="col s6">
            <ul>
              <li><a href="https://twitter.com/8106" target="_blank">Twitter</a></li>
              <li><a href="https://www.facebook.com/8106tv" target="_blank">Facebook</a></li>
              <li><a href="http://8106.tumblr.com/" target="_blank">Tumblr</a></li>
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