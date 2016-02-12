<?php
// Use namespace for TwitterOAuth
use Abraham\TwitterOAuth\TwitterOAuth;

function scripts_and_styles_method() {

  $templateuri = get_template_directory_uri() . '/js/';

  // library.js is to bundle plugins. my.js is your scripts. enqueue more files as needed
  $jslib = $templateuri."library.js";
  wp_enqueue_script( 'jslib', $jslib,'','',true);
  $myscripts = $templateuri."main.js";
  wp_enqueue_script( 'myscripts', $myscripts,'','',true);

  // enqueue stylesheet here. file does not exist until stylus file is processed
  wp_enqueue_style( 'site', get_stylesheet_directory_uri() . '/css/site.css' );

  // dashicons for admin
  if(is_admin()){
    wp_enqueue_style( 'dashicons' );
  }

}
add_action('wp_enqueue_scripts', 'scripts_and_styles_method');

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );

  add_image_size( 'name', 199, 299, true );
}

// Register Nav Menus
/*
register_nav_menus( array(
	'menu_location' => 'Location Name',
) );
*/

get_template_part( 'lib/gallery' );
get_template_part( 'lib/post-types' );
get_template_part( 'lib/meta-boxes' );
get_template_part( 'lib/theme-options' );

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
  // Add CMB2 plugin
  if( ! class_exists( 'cmb2_bootstrap_202' ) )
    require_once 'lib/CMB2/init.php';
}

// Remove WP Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable that freaking admin bar
add_filter('show_admin_bar', '__return_false');

// Turn off version in meta
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );

// Show thumbnails in admin lists
add_filter('manage_posts_columns', 'new_add_post_thumbnail_column');
function new_add_post_thumbnail_column($cols){
  $cols['new_post_thumb'] = __('Thumbnail');
  return $cols;
}
add_action('manage_posts_custom_column', 'new_display_post_thumbnail_column', 5, 2);
function new_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'new_post_thumb':
    if( function_exists('the_post_thumbnail') ) {
      echo the_post_thumbnail( 'admin-thumb' );
      }
    else
    echo 'Not supported in theme';
    break;
  }
}

// Instagram Feed
function get_instagram_feed($instagram_handle) {
  
  if( empty($instagram_handle) ) {
    return new WP_ERROR('no-instagram-handle', 'Missing Instagram handle');
  }

  $feed = get_transient( 'instagram_feed_' . $instagram_handle );
  // Transient is a piece of information that may be or not stored in 
  // fast memory instead of in the db. This data is expected to expire,
  // or could expire at any time. 

  // If feed doesn't exist
  if ( empty($feed) ) {
    $url = 'https://instagram.com/' . $instagram_handle . '/media/';

    // Make API call to instagram
    $response = wp_remote_get( $url );

    if( !is_wp_error( $response ) ) {
      $body = json_decode( $response['body'] );
      $feed = $body->items;

      // Slice first 5 elements
      $feed = array_slice($feed, 0, 5);

      // Set response item's as transient with expiration time of 30 min
      set_transient( 'instagram_feed_' . $instagram_handle, $feed, 30 * 'MINUTE_IN_SECONDS' );

    }

  }
  return $feed;
}

// Twitter Feed
function get_twitter_feed($twitter_handle) {
  
  if( empty($twitter_handle) ) {
    return new WP_ERROR('no-twitter-handle', 'Missing twitter handle');
  }

  $feed = get_transient( 'twitter_feed_' . $twitter_handle );

  // If feed is not cached
  if( empty($feed) ) {

    // Require TwitterOAuth lib
     if ( ! class_exists('TwitterOAuth')) {
      require "lib/twitteroauth/autoload.php";
     }

    // Get keys
    $twitter_key = IGV_get_option( '_igv_twitter_key' ); 
    $twitter_secret = IGV_get_option( '_igv_twitter_secret' ); 

    // Connect to twitter
    $twitter = new TwitterOAuth($twitter_key, $twitter_secret);

    // Get Timeline
    $feed = $twitter->get('statuses/user_timeline', array(
      'count'         =>  10,
      'screen_name'   =>  $twitter_handle,
      'trim_user'     => 'true',
      'exclude_replies' => 'true',
      'contributor_details' => 'false',
      'include_rts'   => 'false'
    ));

    if( $feed->errors ) {
      return false;
    }

    // Regex for URLs
    $url_regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@";

    foreach($feed as &$twit) {
      // Remove URLs from the text
      $twit->text = preg_replace($url_regex, '', $twit->text);

      $urls = $twit->entities->urls;

      $link = new StdClass();
      
      // If the twit links to a post inside the site, link that twit to that post
      // else link it to twitter and set "blank" as TRUE
      // we don't care about link to other sites inside the twit
      if( strpos( $urls[0]->display_url,'8106.tv') !== FALSE ) {
        $link->url = $urls[0]->expanded_url;
      } else {
        $link->url = 'https://twitter.com/statuses/' . $twit->id;
        $link->blank = TRUE;
      }

      $twit->link = $link;
    }

    // Set timeline as transient with expiration time of 5 min
    set_transient( 'twitter_feed_' . $twitter_handle, $feed, 5 * 'MINUTE_IN_SECONDS' );
  }

  //delete_transient( 'twitter_feed_' . $twitter_handle);
  return $feed;
}


// remove automatic <a> links from images in blog
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// custom login logo
/*
function custom_login_logo() {
  echo '<style type="text/css">h1 a { background-image:url(' . get_bloginfo( 'template_directory' ) . '/images/login-logo.png) !important; background-size:300px auto !important; width:300px !important; }</style>';
}
add_action( 'login_head', 'custom_login_logo' );
*/

// UTILITY FUNCTIONS

// to replace file_get_contents
function url_get_contents($Url) {
  if (!function_exists('curl_init')){
      die('CURL is not installed!');
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $Url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}

// get ID of page by slug
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if($page) {
		return $page->ID;
	} else {
		return null;
	}
}
// is_single for custom post type
function is_single_type($type, $post) {
  if (get_post_type($post->ID) === $type) {
    return true;
  } else {
    return false;
  }
}

// print var in <pre> tags
function pr($var) {
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}

?>
