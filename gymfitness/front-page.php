<?php get_header(); ?>

<section class="bienvenida seccion contenedor text-center">
    <h2 class="text-primary"><?php the_field('encabezado_bienvenida'); ?></h2>
    <p><?php the_field('texto_bienvenida'); ?></p>
</section>

<section class="areas">
    <div class="area">
        <!-- los templates tags ya escapan los caracteres pero estos no, usamos los esc_attr _html por seguridad -->
        <?php $area1 = get_field('area_1'); ?>
        <img src="<?php echo esc_attr($area1['imagen']['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($area1['texto']); ?>">
        <p><?php echo esc_html($area1['texto']); ?></p>
    </div>
    <div class="area">
        <?php $area2 = get_field('area_2'); ?>
        <img src="<?php echo esc_attr($area2['imagen']['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($area2['texto']); ?>">
        <p><?php echo esc_html($area2['texto']); ?></p>
    </div>
    <div class="area">
        <?php $area3 = get_field('area_3'); ?>
        <img src="<?php echo esc_attr($area3['imagen']['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($area3['texto']); ?>">
        <p><?php echo esc_html($area3['texto']); ?></p>
    </div>
    <div class="area">
        <?php $area4 = get_field('area_4'); ?>
        <img src="<?php echo esc_attr($area4['imagen']['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($area4['texto']); ?>">
        <p><?php echo esc_html($area4['texto']); ?></p>
    </div>
</section>

<main class="contenedor seccion">
    <h2 class="text-center text-primary">Nuestras Clases</h2>
    <?php gymfitness_lista_clases(5); ?>
    <!-- no es recomendable usar el permalink buscando el id porque no es intuitivo y puede cambiar en actualizaciones -->
    <div class="contenedor-boton">
        <a href="<?php echo esc_url(get_permalink(get_page_by_title('Nuestras Clases'))); ?>" class="boton boton-primario">Ver todas las clases</a>
    </div>
</main>

<section class="contenedor seccion">
    <h2 class="text-center text-primary">Nuestros Instructores</h2>
    <p class="text-center">Instructores profesionales que te ayudarán a lograr tus objetivos</p>
    <?php gymfitness_instructores(); ?>
</section>

<section class="testimoniales">
    <h2 class="text-center text-blanco">Testimoniales</h2>
    <div class="gymfitness_instructores swiper">
        <?php gymfitness_testimoniales(); ?>
    </div>
</section>

<section class="contenedor seccion">
    <h2 class="text-center text-primary">Nuestro Blog</h2>
    <p class="text-center">Aprende tips de nuestros instructores expertos</p>

    <ul class="listado-grid">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $blog = new WP_Query($args);
        while ($blog->have_posts()) {
            $blog->the_post();
            get_template_part('template-parts/blog');
        }
        wp_reset_postdata();
        ?>
    </ul>
</section>

<section class="contenedor seccion">
    <h2 class="text-center text-primary">Esta es una nueva seccion</h2>
    <p class="text-center">nueva seccion</p>
</section>
<section class="contenedor seccion">
    <h2 class="text-center text-primary azul">Esta es otra nueva seccion</h2>
    <p class="text-center letter-spacing">otra nueva seccion</p>
    <p class="text-center letter-spacing">otra nueva seccion</p>
    <p class="text-center fw-bold">otra nueva seccion</p>
</section>

<?php get_footer(); ?>