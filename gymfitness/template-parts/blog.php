<li class="card">
    <!-- busca las categorias que llenamos en el panel de administracion -->
    <?php the_category(); ?>
    <?php the_post_thumbnail(); ?>
    <div class="contenido">
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <p class="meta">
            <span>Escrito Por: </span>
            <!-- get_author_posts_url genera una ruta con todos los post de una persona -->
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author_meta('display_name'); ?>
            </a>
        </p>
        <p class="meta">
            <span>Fecha: </span>
            <?php the_time(get_option('date_format')); ?> <!-- otra alternativa puede ser usar the_date(); pero unicamente se imprime una sola vez -->
        </p>
    </div>
</li>