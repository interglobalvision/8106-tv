<?php

// YOUTUBE

function embed_youtube_shortcode($atts) {
  $a = shortcode_atts( array(
    'id' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  $html = '<div class="custom-embed"><div class="responsive-video"><iframe src="https://www.youtube.com/embed/' . $a['id'] . '" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div>';

  return $html;
}
add_shortcode( 'embed_youtube', 'embed_youtube_shortcode' );

function embed_youtube_shortcode_ad($atts) {
  $a = shortcode_atts( array(
    'id' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://www.youtube.com/embed/' . $a['id'] .'" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';

  return $html;
}
add_shortcode( 'embed_youtube_with_ad', 'embed_youtube_shortcode_ad' );

// VIMEO

function embed_vimeo_shortcode($atts) {
  $a = shortcode_atts( array(
    'id' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  $html = '<div class="custom-embed"><div class="responsive-video"><iframe src="https://player.vimeo.com/video/' . $a['id'] . '?portrait=0" width="500" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>';

  return $html;
}
add_shortcode( 'embed_vimeo', 'embed_vimeo_shortcode' );

function embed_vimeo_shortcode_ad($atts) {
  $a = shortcode_atts( array(
    'id' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://player.vimeo.com/video/' . $a['id'] . '?portrait=0" width="500" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';

  return $html;
}
add_shortcode( 'embed_vimeo_with_ad', 'embed_vimeo_shortcode_ad' );

// SOUNDLCLOUD

function embed_soundcloud_shortcode($atts) {
  $a = shortcode_atts( array(
    'url' => false,
  ), $atts );

  if (!$a['url']) {
    return '';
  }

  $html = '<div class="custom-embed"><div class="wide-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="200" frameborder="no" scrolling="no"></iframe></div></div>';

  return $html;
}
add_shortcode( 'embed_soundcloud', 'embed_soundcloud_shortcode' );

function embed_soundcloud_shortcode_ad($atts) {
  $a = shortcode_atts( array(
    'url' => false,
  ), $atts );

  if (!$a['url']) {
    return '';
  }

  $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="square-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="450" frameborder="no" scrolling="no"></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';

  return $html;
}
add_shortcode( 'embed_soundcloud_with_ad', 'embed_soundcloud_shortcode_ad' );

// SPOTIFY

function embed_spotify_ad($atts) {
  $a = shortcode_atts( array(
    'url' => false,
  ), $atts );

  if (!$a['url']) {
    return '';
  }

  $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe src="' . $a['url'] . '" width="300" height="380" frameborder="0"></iframe></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';

  return $html;
}
add_shortcode( 'embed_spotify', 'embed_spotify_ad' );
