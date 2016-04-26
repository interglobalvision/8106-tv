<form id="search-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="row">
    <div class="col s2">
    </div>
    <div id="search-field-holder" class="col s16">
      <input type="search" id="search-field" placeholder="Buscar" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <div id="search-submit-holder" class="col s4">
      <button type="submit" id="search-submit"><span class="genericon genericon-search"></span></button>
    </div>
  </div>
</form>
