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
    'normal',         // Context
    'low'         // Priority
  );
}

// Render the box
function igv_instructions_class_meta_box( $object, $box ) { 
?>
<h1>Featured Image</h1>
<p>La <i>featured image</i> es muy importante. De ella se generan los thumbs que aparecen en home, categorias, relacionados, etc</p>
<p>Las fotos verticales lucen bien, pero de preferencia utiliza imagenes <b>horizontales</b> con un ancho minimo de <b>680px</b>.</p>
<p>En articulos <i>featured</i> la foto tiene que ser horizontal</p>

<h1>Categorias</h1>
<p>Recuerda, es muy importante ser cuidadoso con las categorias.</p>
<p><i>Featured</i> destaca cualquier nota en el home</p>

<h1>Tags / Etiquetas</h1>
<p>Hay que usar las etiquetas con cautela. Evitar etiquetas repetidas y no usar variaciones de la misma etiqueta.</p>
<p><b>¡Usa tu criterio editorial!</b></p>
<p><i>Ex. Nueva York, <del>NYC</del>,<del>New York</del>,<del>New York City</del></p>

<h1>Embeds / Shortcodes</h1>
<p>Los embeds de youtube, vimeo, soundcloud y spotify utilizan un <i>id</i> o <i>url</i>.</p>
<p><i>En posts Featured</i>: El parametro <i>ad</i> sirve para seleccionar el anuncio que acompaña al embed. Puede ser <i>1</i> o  <i>2</i></p>

<b>Youtube</b>
<p>Utiliza el id del video. <i>Ej.</i></p>
<p><code>[embed_youtube id="OBoP82cTc3s"]</code></p>
<p><code>[embed_youtube id="OBoP82cTc3s" ad="1"]</code></p>

<b>Vimeo</b>
<p>Utiliza el id del video. <i>Ej.</i></p>
<p><code>[embed_vimeo id="21520602"]</code></p>
<p><code>[embed_vimeo id="21520602" ad="2"]</code></p>

<b>Soundcloud</b>
<p>Utiliza el url de la pista o playlist. <i>Ej.</i></p>
<p><code>[embed_soundcloud url="https://soundcloud.com/teehnbwitches/la-minitk-del-miedo-yo-soy-la"]</code></p>
<p><code>[embed_soundcloud url="https://soundcloud.com/teehnbwitches/la-minitk-del-miedo-yo-soy-la" ad="1"]</code></p>

<b>Spotify</b>
<p>Utiliza el url de la pista o playlist. Este lo obtienes directamente del codigo embed que te ofrece la aplicacíon de Spotify <i>Ej.</i></p>
<p><code>[embed_spotify url="https://embed.spotify.com/?uri=spotify%3Aalbum%3A4S0W0okk5PWd4SW7c4lY1T" ]</code></p>
<p><code>[embed_spotify url="https://embed.spotify.com/?uri=spotify%3Aalbum%3A4S0W0okk5PWd4SW7c4lY1T" ad="2"]</code></p>
<?php 
} 
?>
