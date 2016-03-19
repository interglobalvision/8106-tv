<?php

// YOUTUBE
// [embed_youtube id="cd4nwMt4nyA"]
// [embed_youtube id="cd4nwMt4nyA" ad="1"]

function embed_youtube_shortcode($atts) {
  $a = shortcode_atts( array(
    'id' => false,
    'ad' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://www.youtube.com/embed/' . $a['id'] .'" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed"><div class="responsive-video"><iframe src="https://www.youtube.com/embed/' . $a['id'] . '" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_youtube', 'embed_youtube_shortcode' );

// VIMEO
// [embed_vimeo id="64447340"]
// [embed_vimeo id="64447340" ad="1"]

function embed_vimeo_shortcode($atts) {
  $a = shortcode_atts( array(
    'id' => false,
    'ad' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://player.vimeo.com/video/' . $a['id'] . '?portrait=0" width="500" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed"><div class="responsive-video"><iframe src="https://player.vimeo.com/video/' . $a['id'] . '?portrait=0" width="500" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_vimeo', 'embed_vimeo_shortcode' );

// SOUNDLCLOUD
// [embed_soundcloud url="https://soundcloud.com/teehnbwitches/la-minitk-del-miedo-yo-soy-la"]
// [embed_soundcloud url="https://soundcloud.com/teehnbwitches/la-minitk-del-miedo-yo-soy-la" ad="1"]

function embed_soundcloud_shortcode($atts) {
  $a = shortcode_atts( array(
    'url' => false,
    'ad' => false,
  ), $atts );

  if (!$a['url']) {
    return '';
  }

  // Check if the URL is a Soundcloud Set to change the embed height
  if( strpos($a['url'], 'sets') ) {
    $height = '450';
  } else {
    $height = '200';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="square-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="450" frameborder="no" scrolling="no"></iframe></div></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed"><div class="wide-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="'. $height .'" frameborder="no" scrolling="no"></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_soundcloud', 'embed_soundcloud_shortcode' );

// SPOTIFY
// [embed_spotify url="https://embed.spotify.com/?uri=spotify%3Aalbum%3A4S0W0okk5PWd4SW7c4lY1T" ]
// [embed_spotify url="https://embed.spotify.com/?uri=spotify%3Aalbum%3A4S0W0okk5PWd4SW7c4lY1T" ad="1"]
function embed_spotify_shortcode($atts) {
  $a = shortcode_atts( array(
    'url' => false,
    'ad' => false,
  ), $atts );

  if (!$a['url']) {
    return '';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe src="' . $a['url'] . '" width="300" height="380" frameborder="0"></iframe></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed u-cf"><div class="embed"><iframe src="' . $a['url'] . '" width="300" height="380" frameborder="0"></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_spotify', 'embed_spotify_shortcode' );

// BANDCAMP
// [embed_bandcamp album=93340823 track=2205921216]
// [embed_bandcamp album=93340823]
function embed_bandcamp_shortcode($atts) {
  $a = shortcode_atts( array(
    'ad' => false,
    'album' => false,
    'track' => false,
  ), $atts );

  if (!$a['album'] ) {
    return '';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe style="border: 0; width: 350px; height: 470px;" src="https://bandcamp.com/EmbeddedPlayer/album='. $a['album'] .'/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/track='. $a['track'] .'/transparent=true/" seamless></iframe></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed u-cf"><div class="embed"><iframe style="border: 0; width: 100%; max-width: 700px; height: 120px; margin: 0 auto; display: block" src="https://bandcamp.com/EmbeddedPlayer/album='. $a['album'] .'/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/artwork=small/track='. $a['track'] .'/transparent=true/" seamless></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_bandcamp', 'embed_bandcamp_shortcode' );

// APPLE MUSIC
// [embed_apple id=idsa.e01e836d-dbf3-11e5-ae92-08d9ecf56e8d]
// [embed_apple id=idsa.e01e836d-dbf3-11e5-ae92-08d9ecf56e8d ad=1]
function embed_apple_shortcode($atts) {
  $a = shortcode_atts( array(
    'id' => false,
    'ad' => false,
  ), $atts );

  if (!$a['id']) {
    return '';
  }

  if($a['ad']) {
    $ad = '<div class="embed-ad">' . IGV_get_option('_igv_ads_embed_' . $a['ad']) . '</div>';
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe src="https://embed.itunes.apple.com/us/embedded-player/' . $a['id'] . '" width="560" height="104" frameborder="0" scrolling="no"></iframe></div>' . $ad . '</div>';
  } else {
    $html = '<div class="custom-embed u-cf"><div class="embed"><iframe src="https://embed.itunes.apple.com/us/embedded-player/' . $a['id'] . '" width="560" height="104" frameborder="0" scrolling="no"></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_apple', 'embed_apple_shortcode' );
