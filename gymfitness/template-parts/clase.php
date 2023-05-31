<?php

while (have_posts()) : the_post();
    the_title('<h1 class="text-center text-primary">', '</h1>');
?>
    <div class="contenedor-img">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        ?>
    </div>
    <?php
    if (is_single()) :
        $hora_inicio = get_field('hora_inicio');
        $hora_fin = get_field('hora_fin');
    ?>
        <!-- esta funcion es del plugin Advanced Custom Fields segun lo escribimos -->
        <p class="informacion-clase"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . ' a ' . $hora_fin; ?></p>
<?php endif;

    the_content();
endwhile;
?>