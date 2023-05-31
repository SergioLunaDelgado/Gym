<?php

/* includes */
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

function gymfitness_setup()
{
   /* Imagenes Destacadas */
   add_theme_support('post-thumbnails');

   /* Titulos para SEO */
   add_theme_support('title-tag');
}
/* se ejecta cuando un tema fue activado */
add_action('after_setup_theme', 'gymfitness_setup');

/* Funcion para crear menus */
function gymfitness_menus()
{
   register_nav_menus(array(
      'menu-principal' => __('Menu Principal', 'gymfitness')
   ));
}
/* add_action = create
   add_filter = update */
add_action('init', 'gymfitness_menus');

/* funcion para agregar estilos */
function gymfitness_scripts_styles()
{
   /* CSS */
   /* podriamos usar la funcion get_template_directory_uri pero get_stylesheet_uri toma por defecto la hoja de estilo de style.css */
   /* en array le indicamos el orden de preferencias de las dependencias (normalize, bootstrap) */
   wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
   /* mejoramos el seo al especificar en que zonas se va aplicar los estilos, es incorrecto cargar todo ya que es mas pesado */
   if(is_page('galeria')) {
      wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');
   }
   if(is_front_page()) {
      wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.6');
   }
   wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
   /* JS */
   /*                                                                                    para que funcione lightbox necesita jquery */
   /* no es conveniente meszclar en el if styles y los scripts */
   if(is_page('galeria')) {
      wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true); /* el true es para que coloque el escript en el footer */
   }
   if(is_front_page()) {
      wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.6', true);
      wp_enqueue_script('anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);
   }
   wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');
/* definir zona de widgets, añadimos el soporte para widgets */
function gymfitness_widgets()
{
   /* no solamente en los sidebar se puede implementar los widgets */
   register_sidebar(array(
      'name' => 'Sidebar 1',
      'id' => 'sidebar_1',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="text-center text-primary">',
      'after_title' => '</h3>',
   ));
   register_sidebar(array(
      'name' => 'Sidebar 2',
      'id' => 'sidebar_2',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="text-center text-primary">',
      'after_title' => '</h3>',
   ));
}
add_action('widgets_init', 'gymfitness_widgets');

/* crear shortcode */
function gymfitness_ubicacion_shortcode()
{
?>
   <div class="mapa">
      <?php
      /* is_page busca el slug de la pagina */
      if (is_page('contacto')) {
         the_field('ubicacion'); /* ubicacion fue el nombre del campo que genero Advanced Custom Fields */
      }
      ?>
   </div>
   <h2 class="text-primary text-center">Formulario de Contacto</h2>
<?php
   /* render shortcode */
   echo do_shortcode('[contact-form-7 id="99" title="Formulario de contacto 1"]');
}
add_shortcode('gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode');

/* Imagenes dinamicas como BG */
function gymfitness_hero_imagen(){
   /* Obtener el ID de la pagina de inicio */
   $front_id = get_option('page_on_front'); /* para conocer el id tenemos que buscar una ruta oculta en la url llamada /wp-admin/options.php */
   
   /* Obtener la imagen */
   $id_imagen = get_field('hero_imagen', $front_id); /* como estamos en un archivo de funciones y no el inicio pasamos como segundo parametro el id de la pagina */
   
   /* Obtener la ruta de la imagen */
   $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

   /* Crear CSS, hoja de estilo virtual porque no se puede pasar una variable php a css son dos ambitos diferentes */
   wp_register_style('custom', false); /* registra y le decimos que no existe en el servidor */
   wp_enqueue_style('custom'); /* pero lo agregamos */

   $imagen_css = "
      body.home .header {
         background-image: linear-gradient( rgb(0 0 0 / .75), rgb(0 0 0 / .75) ), url($imagen);
      }
   ";

   /* Inyectar el CSS */
   wp_add_inline_style('custom', $imagen_css);
}
add_action('init', 'gymfitness_hero_imagen');