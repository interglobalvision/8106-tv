<?php
if (get_next_posts_link() || get_previous_posts_link()) {
  $previous = get_previous_posts_link('← Más Nuevo');
  $next = get_next_posts_link('Más Viejo →');
?>
  <!-- post pagination -->
  <nav id="pagination" class="row u-align-center font-italic">
<?php
  if ($previous) {
    echo $previous;
  } else {
?>
    <div class="col s8"></div>
<?php
  }
?>
    <div class="col s8 theme-border-color pagination-block">
      <h3><?php echo paginate_links(array('prev_next' => false,)); ?></h3>
    </div>
<?php
  if ($next) {
    echo $next;
  } else {
?>
    <div class="col s8"></div>
<?php
  }
?>
  </nav>
<?php
}
?>
