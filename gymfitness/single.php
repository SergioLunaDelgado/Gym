<!-- <h1>Desde single- Custom post y entradas de blog</h1> -->
<!-- solamente la usamos para las entradas de blog -->

<?php get_header(); ?>
<main class="contenedor seccion">
    <?php get_template_part('template-parts/post'); ?>
    <div class="comentarios">
        <?php comment_form(); ?>
        <h3 class="heading-comentarios">Comentarios</h3>
        <ul class="lista-comentarios">
            <?php 
                $comentarios = get_comments(array(
                    'post_id' => $post->ID,
                    'status' => 'approve',
                ));
                wp_list_comments(array(
                    'per_page' => 10,
                    'reverse_top_level' => false /* los comentarios mas nuevos primero */
                ), $comentarios);
            ?>
        </ul>
    </div>
</main>

<?php get_footer(); ?>