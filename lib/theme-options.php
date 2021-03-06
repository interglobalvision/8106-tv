<?php

/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class IGV_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'IGV_options';

	/**
 	 * Option prefix
 	 * @var string
 	 */
	private $prefix = '_igv_';
	private $ads_prefix = '_igv_ads_';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'IGV_option_metabox';
	private $ads_metabox_id = 'IGV_ads_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = 'Site Options';
	protected $ads_title = 'Ads';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = __( 'Site Options', 'IGV' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
      <hr />
			<h2><?php echo  $this->ads_title; ?></h2>
			<?php cmb2_metabox_form( $this->ads_metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		$cmb = new_cmb2_box( array(
			'id'      => $this->metabox_id,
			'hookup'  => false,
			'show_on' => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields

		$cmb->add_field( array(
			'name' => __( 'Max age of popular posts', 'IGV' ),
			'desc'    => __( 'How many weeks old can popular posts be? Just set the number', 'IGV' ),
			'id'   => $this->prefix . 'popular_expiry',
			'type' => 'text',
			'default' => '3',
		) );

		$cmb->add_field( array(
			'name'    => __( 'Radio', 'IGV' ),
			'desc'    => __( 'Mixcloud embed code', 'IGV' ),
			'id'      => $this->prefix . 'radio_embed',
			'type'    => 'textarea_code',
		) );

		$cmb->add_field( array(
			'name' => __( 'Twitter handle', 'IGV' ),
			'id'   => $this->prefix . 'twitter_handle',
			'type' => 'text',
			'default' => '8106',
		) );

		$cmb->add_field( array(
			'name' => __( 'Instagram handle', 'IGV' ),
			'id'   => $this->prefix . 'instagram_handle',
			'type' => 'text',
			'default' => '8106tv',
		) );

		$cmb->add_field( array(
			'name' => __( 'Twitter Consumer Key (NO TOCAR)', 'IGV' ),
			'id'   => $this->prefix . 'twitter_key',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Twitter Consumer secret (NO TOCAR)', 'IGV' ),
			'id'   => $this->prefix . 'twitter_secret',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Facebook App ID', 'IGV' ),
			'id'   => $this->prefix . 'facebook_app_id',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name'    => __( 'Color', 'IGV' ),
			'desc'    => __( '', 'IGV' ),
			'id'      => $this->prefix . 'theme_color',
			'type'    => 'colorpicker',
			'default' => '#a5cfca',
		) );

		$cmb->add_field( array(
			'name'    => __( 'Background Pattern', 'IGV' ),
			'desc'    => __( '', 'IGV' ),
			'id'      => $this->prefix . 'theme_pattern',
			'type'    => 'file',
		) );

    // ADS

		$ads_cmb = new_cmb2_box( array(
			'id'      => $this->ads_metabox_id,
			'hookup'  => false,
			'show_on' => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields for Ads

    // -- Document Header Code
		$ads_cmb->add_field( array(
			'name'    => __( 'Document Header Code', 'IGV' ),
			'desc'    => __( '', 'IGV' ),
			'id'      => $this->ads_prefix . 'doc_header_code',
			'type'    => 'textarea_code',
		) );

    // -- Top Leadebord
		$ads_cmb->add_field( array(
			'name'    => __( 'Top Leaderboard', 'IGV' ),
			'desc'    => __( 'Leadeboard que aparece hasta arriba del sitio', 'IGV' ),
			'id'      => $this->ads_prefix . 'top_leaderboard',
			'type'    => 'textarea_code',
		) );

    // -- Home: Main squares
		$ads_cmb->add_field( array(
			'name'    => __( 'Home 1', 'IGV' ),
			'desc'    => __( 'Usados en los primeros bloques del Home', 'IGV' ),
			'id'      => $this->ads_prefix . 'home_1',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Home 2', 'IGV' ),
			'desc'    => __( 'Usados en los primeros bloques del Home', 'IGV' ),
			'id'      => $this->ads_prefix . 'home_2',
			'type'    => 'textarea_code',
		) );

    // -- Home: Grid squares
		$ads_cmb->add_field( array(
			'name'    => __( 'Grid 1', 'IGV' ),
			'desc'    => __( 'Usados en el grid del Home, categorias, etc', 'IGV' ),
			'id'      => $this->ads_prefix . 'grid_1',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Grid 2', 'IGV' ),
			'desc'    => __( 'Usados en el grid del Home, categorias, etc', 'IGV' ),
			'id'      => $this->ads_prefix . 'grid_2',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Grid 3', 'IGV' ),
			'desc'    => __( 'Usados en el grid de categorias', 'IGV' ),
			'id'      => $this->ads_prefix . 'grid_3',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Grid 4', 'IGV' ),
			'desc'    => __( 'Usados en el grid de categorias', 'IGV' ),
			'id'      => $this->ads_prefix . 'grid_4',
			'type'    => 'textarea_code',
		) );

    // -- Single
		$ads_cmb->add_field( array(
			'name'    => __( 'Single 1', 'IGV' ),
			'desc'    => __( 'Usado en el single', 'IGV' ),
			'id'      => $this->ads_prefix . 'single_1',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Single 2', 'IGV' ),
			'desc'    => __( 'Usado en el single', 'IGV' ),
			'id'      => $this->ads_prefix . 'single_2',
			'type'    => 'textarea_code',
		) );

    // -- Embed Ads
		$ads_cmb->add_field( array(
			'name'    => __( 'Embed 1', 'IGV' ),
			'desc'    => __( 'Usados en junto a los embed', 'IGV' ),
			'id'      => $this->ads_prefix . 'embed_1',
			'type'    => 'textarea_code',
		) );

		$ads_cmb->add_field( array(
			'name'    => __( 'Embed 2', 'IGV' ),
			'desc'    => __( 'Usados en junto a los embed', 'IGV' ),
			'id'      => $this->ads_prefix . 'embed_2',
			'type'    => 'textarea_code',
		) );

	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the IGV_Admin object
 * @since  0.1.0
 * @return IGV_Admin object
 */
function IGV_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new IGV_Admin();
		$object->hooks();
	}

	return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function IGV_get_option( $key = '' ) {
	return cmb2_get_option( IGV_admin()->key, $key );
}

// Get it started
IGV_admin();
