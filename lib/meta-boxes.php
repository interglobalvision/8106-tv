<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */

  $post_meta = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Meta', 'cmb2' ),
    'object_types'  => array( 'post', 'event', ), // post type
  ) );

  $post_meta->add_field( array(
    'name'       => __( 'Sub-titulo', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'post_subtitle',
    'type'       => 'text',
  ) );


  /* Events */
  $event_meta = new_cmb2_box( array(
    'id'            => $prefix . 'event_metabox',
    'title'         => __( 'Meta', 'cmb2' ),
    'object_types'  => array( 'event', ), // post type
  ) );

  $event_meta->add_field( array(
    'name' => 'Lugar',
    'id' => $prefix . 'event_address',
    'type' => 'textarea_small'
  ) );

  $event_meta->add_field( array(
    'name'    => 'Precio',
    'id' => $prefix . 'event_price',
    'type'    => 'text',
    'attributes' => array(
      'placeholder'    => '$200',
    ),
  ) );

  $event_meta->add_field( array(
    'name' => 'Fecha',
    'id' => $prefix . 'event_date',
    'type' => 'text_date_timestamp',
  ) );

  $event_meta->add_field( array(
    'name' => 'Hora',
    'id' => $prefix . 'event_time',
    'type' => 'text_time',
  ) );


  
}
?>
