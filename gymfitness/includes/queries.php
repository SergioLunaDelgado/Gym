<?php

/* el -1 significa todos los registros */
function gymfitness_lista_clases($cantidad = -1)
{
?>
    <ul class="listado-grid">
        <?php
        $args = array(
            'post_type' => 'gymfitness_clases', /* busca la seccion creada en el panel de admin */
            'posts_per_page' => $cantidad
        );
        /* Las consultar normales de wp se hacen en los tempaltes
            pero cuando se quiera modificar la consulta o buscar algo en especifico es por esta forma en la bd */
        $clases = new WP_Query($args);
        while ($clases->have_posts()) :
            $clases->the_post();
        ?>
            <li class="card">
                <?php the_post_thumbnail(); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php
                    $hora_inicio = get_field('hora_inicio');
                    $hora_fin = get_field('hora_fin');
                    ?>
                    <!-- esta funcion es del plugin Advanced Custom Fields segun lo escribimos -->
                    <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . ' a ' . $hora_fin; ?></p>
                </div>
            </li>
        <?php
        endwhile;
        wp_reset_postdata(); /* en la consulta anterior cambiamos el comportamiento normal de wp asi que con esta linea lo reestablecemos como normalmente trabajaria */
        ?>
    </ul>
<?php
}

function gymfitness_instructores()
{
?>
    <ul class="listado-grid instructores">
        <?php
        $args = array(
            'post_type' => 'instructores', /* busca la seccion creada en el panel de admin, esto se encuentra en function.php*/
        );
        /* Las consultar normales de wp se hacen en los tempaltes
            pero cuando se quiera modificar la consulta o buscar algo en especifico es por esta forma en la bd */
        $instructores = new WP_Query($args);
        while ($instructores->have_posts()) :
            $instructores->the_post();
        ?>
            <li class="instructor">
                <?php the_post_thumbnail(); ?>
                <div class="contenido text-center">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <div class="especialidad">
                        <?php
                        $esp = get_field('especialidad');
                        foreach ($esp as $e) : ?>
                            <span class="etiqueta"><?php echo esc_html($e) ?></span>

                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
        <?php
        endwhile;
        wp_reset_postdata(); /* en la consulta anterior cambiamos el comportamiento normal de wp asi que con esta linea lo reestablecemos como normalmente trabajaria */
        ?>
    </ul>
<?php
}

function gymfitness_testimoniales()
{
?>
    <ul class="listado-testimoniales swiper-wrapper">
        <?php
        $args = array(
            'post_type' => 'testimoniales', /* busca la seccion creada en el panel de admin, esto se encuentra en function.php*/
        );
        /* Las consultar normales de wp se hacen en los tempaltes
            pero cuando se quiera modificar la consulta o buscar algo en especifico es por esta forma en la bd */
        $testimoniales = new WP_Query($args);
        while ($testimoniales->have_posts()) :
            $testimoniales->the_post();
        ?>
            <li class="testimonial swiper-slide">
                <blockquote>
                    <?php the_content(); ?>
                </blockquote>
                <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <p><?php the_title(); ?></p> <!-- el nombre de la persona -->
                </footer>
            </li>
        <?php
        endwhile;
        wp_reset_postdata(); /* en la consulta anterior cambiamos el comportamiento normal de wp asi que con esta linea lo reestablecemos como normalmente trabajaria */
        ?>
    </ul>
<?php
}
