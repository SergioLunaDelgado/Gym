<!-- 
    Aqui hacemos uso de coustume templates
-->
<?php
/* 
* Template Name: Galeria 
*/
get_header();
?>
<main class="contenedor seccion">
    <?php
    while (have_posts()) : the_post();
        the_title('<h1 class="text-center text-primary">', '</h1>');
        // the_content();
        /* Obtener la galeria,                    true = treaer el codigo de html */
        $galeria = get_post_gallery(get_the_ID(), false);

        /* Obtener los ids en un array */
        $galeria_imagenes_id = explode(",", $galeria['ids']);
        ?>
        <p class="descripcion-galeria">Galeria del sitio web</p>
            <ul class="galeria-imagenes">
                <?php foreach($galeria_imagenes_id as $id) :
                    $imagen_grande = wp_get_attachment_image_src($id, 'large')[0]; /* wp_get_attachment_image_src = la ubicacion donde esta almacenada la imagen en el servidor */
                    $imagen_full = wp_get_attachment_image_src($id, 'full')[0]; /* esta tiene mayor resolución */
                ?>
                    <li>
                        <a data-lightbox="galeria" href="<?php echo $imagen_full; ?>">
                            <img src="<?php echo $imagen_grande; ?>" alt="Imagen Galeria">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php 
    endwhile;
    ?>
</main>

<?php get_footer(); ?>