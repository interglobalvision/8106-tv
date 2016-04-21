<?php
// Get theme color
$theme_color = IGV_get_option( '_igv_theme_color');
$theme_mid_color = hex2rgba($theme_color, '0.3');
pr($theme_mid_color);
$theme_pattern = IGV_get_option( '_igv_theme_pattern');
$soft_white = 'rgb(253, 253, 253)';
?>
<style>
.theme-bg {
  background-color: <?php echo $theme_color; ?>;
}

.theme-grad-bg {
  background: rgb(253, 253, 253);
  background: -moz-linear-gradient(top, <?php echo $soft_white; ?> 0%, <?php echo $theme_color; ?> 100%);
  background: -webkit-linear-gradient(top, <?php echo $soft_white; ?> 0%,<?php echo $theme_color; ?> 100%);
  background: linear-gradient(to bottom, <?php echo $soft_white; ?> 0%,<?php echo $theme_color; ?> 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $soft_white; ?>', endColorstr='<?php echo $theme_color; ?>',GradientType=0 );
}

.theme-hard-grad-bg {
  background: #ffffff;
  background: -moz-linear-gradient(top,  <?php echo $soft_white; ?> 0%, <?php echo $theme_mid_color; ?> 9%, <?php echo $theme_color; ?> 100%);
  background: -webkit-linear-gradient(top,  <?php echo $soft_white; ?> 0%, <?php echo $theme_mid_color; ?> 9%,<?php echo $theme_color; ?> 100%);
  background: linear-gradient(to bottom,  <?php echo $soft_white; ?> 0%, <?php echo $theme_mid_color; ?> 9%,<?php echo $theme_color; ?> 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $soft_white; ?>', endColorstr='<?php echo $theme_color; ?>',GradientType=0 );
}

.theme-border-color {
  border-color: <?php echo $theme_color; ?>;
}

.theme-pattern-bg {
  background-image: url(<?php echo $theme_pattern; ?>);
}

</style>
