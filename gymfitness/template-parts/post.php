<?php

while (have_posts()) : the_post();
    the_title('<h1 class="text-center text-primary">', '</h1>');
    // the_post_thumbnail('full', array('class' => 'imagen-destacada'));
?>
    <div class="contenedor-img">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        ?>
    </div>
    <div class="meta-info">
        <p class="meta">
            <span>Escrito por: </span>
            <!-- get_author_posts_url genera una ruta con todos los post de una persona -->
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author_meta('display_name'); ?>
            </a>
        </p>
        <p class="meta">
            <span>Fecha: </span>
            <?php the_time(get_option('date_format')); ?> <!-- otra alternativa puede ser usar the_date(); pero unicamente se imprime una sola vez -->
        </p>
        <div class="categorias">
            <p class="meta">
                <span>Categorias: </span>
            </p>
            <?php the_category(); ?>
        </div>
    </div>
<?php
    the_content();
endwhile;
?>