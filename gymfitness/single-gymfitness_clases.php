<!-- <h1>Solo visible para las clases y no para las entradas de blog</h1> -->

<?php get_header(); ?>
<main class="contenedor seccion con-sidebar">
    <section class="contenido-principal">
        <?php get_template_part('template-parts/clase'); ?>
    </section>
    <div>
        <h1 class="azul">Mas clases</h1>
        <?php get_sidebar(); ?>
        <?php get_sidebar('clases'); ?>
    </div>
</main>

<?php get_footer(); ?>