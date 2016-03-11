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
    // TODO: Get ad from field
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://www.youtube.com/embed/' . $a['id'] .'" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';
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
    // TODO: Get ad from field
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="responsive-video"><iframe src="https://player.vimeo.com/video/' . $a['id'] . '?portrait=0" width="500" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';
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

  if($a['ad']) {
    // TODO: Get ad from field
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><div class="square-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="450" frameborder="no" scrolling="no"></iframe></div></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';
  } else {
    $html = '<div class="custom-embed"><div class="wide-soundcloud"><iframe src="https://w.soundcloud.com/player/?url=' . $a['url'] . '&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_reposts=false&amp;visual=true" width="100%" height="200" frameborder="no" scrolling="no"></iframe></div></div>';
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
    // TODO: Get ad from field
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe src="' . $a['url'] . '" width="300" height="380" frameborder="0"></iframe></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';
  } else {
    $html = '<div class="custom-embed u-cf"><div class="embed"><iframe src="' . $a['url'] . '" width="300" height="380" frameborder="0"></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_spotify', 'embed_spotify_shortcode' );

// BANDCAMP
// [embed_bandcamp width=350 height=470 album=93340823 size=large bgcol=ffffff linkcol=0687f5 tracklist=false track=2205921216]
// [embed_bandcamp width=350 height=470 album=93340823 size=large bgcol=ffffff linkcol=0687f5 tracklist=false]
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
    // TODO: Get ad from field
    $html = '<div class="custom-embed-with-ad u-cf"><div class="embed"><iframe style="border: 0; width: 350px; height: 470px;" src="https://bandcamp.com/EmbeddedPlayer/album='. $a['album'] .'/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/track='. $a['track'] .'/transparent=true/" seamless></iframe></div><img class="embed-ad" src="https://placeholdit.imgix.net/~text?txtsize=50&txt=AD&w=400&h=400"></div>';
  } else {
    $html = '<div class="custom-embed u-cf"><div class="embed"><iframe style="border: 0; width: 100%; max-width: 700px; height: 120px; margin: 0 auto; display: block" src="https://bandcamp.com/EmbeddedPlayer/album='. $a['album'] .'/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/artwork=small/track='. $a['track'] .'/transparent=true/" seamless></iframe></div></div>';
  }

  return $html;
}
add_shortcode( 'embed_bandcamp', 'embed_bandcamp_shortcode' );
