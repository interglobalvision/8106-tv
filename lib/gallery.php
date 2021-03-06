<?php
remove_shortcode('gallery', 'gallery_shortcode');
function my_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

  $image_size = has_category( 'featured' ) ? 'featured-gallery' : 'gallery';

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'li',
		'icontag'    => 'li',
		'captiontag' => 'span',
		'columns'    => 3,
		'size'       => $image_size,
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

  $gallery_div = "<div id='$selector' class='cycle-slider gallery galleryid-{$id}' data-cycle-fx='fade' data-cycle-timeout='0' data-cycle-swipe=true data-cycle-slides='div' data-cycle-auto-height='container'>
	<nav class='cycle-prev u-pointer'><svg viewBox='50 0 205 310'><polygon xmlns='http://www.w3.org/2000/svg' points='247.35,35.7 211.65,0 58.65,153 211.65,306 247.35,270.3 130.05,153'/></svg></span></nav>
  <nav class='cycle-next u-pointer'><svg viewBox='50 0 205 310'><polygon xmlns='http://www.w3.org/2000/svg' points='58.65,267.75 175.95,153 58.65,35.7 94.35,0 247.35,153 94.35,306   '/></svg></nav>";
	$output = $gallery_div;

	$i = 0;
  $attachment_size = count($attachments);
	foreach ( $attachments as $id => $attachment ) {

		$tag = '';

		$img = wp_get_attachment_image_src($id, $size);
/*
		$largeimg = wp_get_attachment_image_src($id, 'single');
		$large = $largeimg[0];
 */

    $counter = $i+1 . '/' . $attachment_size;

    $tag .= "<{$captiontag} class='wp-caption-text gallery-caption u-align-center'>";

    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $counter .= ': ';
      $tag .= $counter . wptexturize($attachment->post_excerpt);
    } else {
      $tag .= $counter;
    }

    $tag .= "</{$captiontag}>";

		/*

		$output .= "
			<{$icontag} class='gallery-item'>
			<div class='gallery-item-holder'>
				<div class='gallery-img'>
					<img src='{$img[0]}'>
				</div>
				{$tag}
			</div>
			</{$icontag}>";
*/


		$output .= "<div><img src='{$img[0]}'>{$tag}</div>";
    $i++;
		}

	$output .= "</div>\n";

	return $output;
}
add_shortcode('gallery', 'my_gallery_shortcode');
