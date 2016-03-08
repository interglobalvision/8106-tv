<?php

// Fire our meta box setup function on the post editor screen
add_action( 'load-post.php', 'igv_insctuctions_meta_boxes_setup' );
add_action( 'load-post-new.php', 'igv_instructions_meta_boxes_setup' );

// Meta box setup function
function igv_instructions_meta_boxes_setup() {

  // Add meta boxes on the 'add_meta_boxes' hook
  add_action( 'add_meta_boxes', 'igv_add_instructions_meta_boxes' );
}

function igv_add_instructions_meta_boxes() {

  add_meta_box(
    'igv-instructions-class',      // Unique ID
    esc_html__( 'Instrucciones' ),    // Title
    'igv_instructions_class_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'side',         // Context
    'high'         // Priority
  );
}

// Render the box
function igv_instructions_class_meta_box( $object, $box ) { 
?>
<p>Aqui van las indicaciones.</p>
<?php 
} 
?>
