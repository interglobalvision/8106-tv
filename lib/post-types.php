<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>
 
<style>
#menu-posts-event .dashicons-admin-post:before {
  content: "\f486";
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_event' );

function register_cpt_event() {

    $labels = array( 
        'name' => _x( 'Eventos', 'event' ),
        'singular_name' => _x( 'Evento', 'event' ),
        'add_new' => _x( 'Agregar Nuevo', 'event' ),
        'add_new_item' => _x( 'Agregar nuevo Evento', 'event' ),
        'edit_item' => _x( 'Editar Evento', 'event' ),
        'new_item' => _x( 'Nuevo Evento', 'event' ),
        'view_item' => _x( 'Ver Evento', 'event' ),
        'search_items' => _x( 'Buscar Eventos', 'event' ),
        'not_found' => _x( 'No se encontraron eventos', 'event' ),
        'not_found_in_trash' => _x( 'No se encontraron eventos en la papelera', 'event' ),
        'parent_item_colon' => _x( 'Parent Evento:', 'event' ),
        'menu_name' => _x( 'Eventos', 'event' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array(
          'slug' => 'evento',
        ),
        'capability_type' => 'post',
        'taxonomies' => array('post_tag')
    );

    register_post_type( 'event', $args );
}
