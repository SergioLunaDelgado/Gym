<?php get_header(); ?>
<!-- home = blog -->
<main class="seccion contenedor">
    <h1 class="azul">Nuestros blogs</h1>
    <ul class="listado-grid">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/blog');
        endwhile;
        ?>
    </ul>
    <!-- <php posts_nav_link(); ?> imprime siguiente o anterior --> 
    <?php the_posts_pagination(); ?>
</main>

<?php get_footer(); ?>