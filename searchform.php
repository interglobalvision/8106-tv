<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="row">
    <div class="col s2">
    </div>
    <div class="col s16">
      <input type="search" class="search-field" placeholder="keyword" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <div class="col s4">
      <button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>
    </div>
  </div>
</form>