<?php
// Get theme color
$theme_color = IGV_get_option( '_igv_theme_color');
$theme_pattern = IGV_get_option( '_igv_theme_pattern');
?>
<style>
.theme-bg {
  background-color: <?php echo $theme_color; ?>;
}

.theme-grad-bg {
  background: #ffffff;
  background: -moz-linear-gradient(top, #ffffff 0%, <?php echo $theme_color; ?> 100%);
  background: -webkit-linear-gradient(top, #ffffff 0%,<?php echo $theme_color; ?> 100%);
  background: linear-gradient(to bottom, #ffffff 0%,<?php echo $theme_color; ?> 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='<?php echo $theme_color; ?>',GradientType=0 );
}

.theme-hard-grad-bg {
  background: #ffffff;
  background: -moz-linear-gradient(top,  #ffffff 0%, #edf4f2 12%, <?php echo $theme_color; ?> 100%);
  background: -webkit-linear-gradient(top,  #ffffff 0%,#edf4f2 12%,<?php echo $theme_color; ?> 100%);
  background: linear-gradient(to bottom,  #ffffff 0%,#edf4f2 12%,<?php echo $theme_color; ?> 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='<?php echo $theme_color; ?>',GradientType=0 );
}

.theme-border-color {
  border-color: <?php echo $theme_color; ?>;
}

.theme-pattern-bg {
  background-image: url(<?php echo $theme_pattern; ?>);
}
</style>
