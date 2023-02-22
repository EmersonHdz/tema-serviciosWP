<?php
/** Consulta archivos reutilisables */
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/queries.php';

/** scripts for files */

function themegym_assets() {
  wp_enqueue_script('index js', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0', true);
  wp_enqueue_style('index css', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0' );

  if(is_front_page()){
    wp_enqueue_style( 'swiper-css' ,'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.5');
  }

  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

  wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

  if(is_page('galeria')):
    wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.0');
endif;
   
  //Script Javascipt
  if(is_front_page()) {
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.5', true);
    wp_enqueue_script('anime-js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);
  }

  
  wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('vanilla-tillJS', get_template_directory_uri() . '/js/vanilla-till.js', array('jquery'), '1.0.0', true);

  if(is_page('galeria')):
    wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.0', true);
endif;

  
}

add_action('wp_enqueue_scripts', 'themegym_assets');


// When the theme is activated
function themegym_setup() {

  //Enable featured images
  add_theme_support('post-thumbnails');

    // Agregar imagenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);

  // Title SEO
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'themegym_setup');

// Navigation menus, add more using array
function themegym_menus() {
  register_nav_menus(array(
      'main-menu' => __( 'Main Menu', 'themegym' )
  ));
}

add_action('init', 'themegym_menus');

// Define and Add Widget Zone
function themegym_widgets() {
  register_sidebar( array(
      'name' => 'Sidebar 1', 
      'id' => 'sidebar_1',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="text-center text-primary">',
      'after_title' => '</h3>'
  ));
  register_sidebar( array(
      'name' => 'Sidebar Clases', 
      'id' => 'sidebar_clases',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="text-center text-primary">',
      'after_title' => '</h3>'
  ));
}
add_action('widgets_init', 'themegym_widgets' );

// Crear ShortCode
function themegym_ubicacion_shortcode(){

  echo do_shortcode( '[contact-form-7 id="251" title="Contact form 1"]' );
}
add_shortcode( 'themegym_ubicacion', 'themegym_ubicacion_shortcode' );


//Imagen Hero
function portafolio_theme_hero_image() {
    
  //obtener id pagina principal
  $front_page_id = get_option('page_on_front');
  // Obtener id imagen
  $id_imagen = get_field('imagen-hero',  $front_page_id);
  // Obtener la imagen
  $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

  // Style CSS
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  $imagen_destacada_css = "
      body.home .site-header {
        background-image: linear-gradient( rgba(0,0,0,0.60), rgba(0,0,0,0.60)  ), url($imagen) ;
      }
  ";

  wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'portafolio_theme_hero_image');
