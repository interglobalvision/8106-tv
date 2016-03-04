<?php

// [bartag foo="foo-value"]
/*
function bartag_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );

    return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );
*/

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