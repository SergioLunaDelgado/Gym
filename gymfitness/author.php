<?php get_header(); ?>
<main class="seccion contenedor">
    <?php 
        /* hace una consulta a la bd y se trae el nombre de la categoria que actualmente se esta mostrando */
        $autor = get_queried_object();
    ?>
    <h2 class="text-primary text-center">Autor: <?php echo $autor->data->display_name; ?></h2>
    <p class="text-center"><?php echo get_the_author_meta('description', $autor->data->ID); ?></p>
    <ul class="listado-grid">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/blog');
        endwhile;
        ?>
    </ul>
</main>

<?php get_footer(); ?>