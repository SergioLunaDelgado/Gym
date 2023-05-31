<?php get_header(); ?>
<main>
    <?php
    /*  
            WordPress = hace mucho uso de while
            have_post = consulta en la bd
            the_post = nos da acceso a las entradas (paginas)  
        */
    while (have_posts()) : the_post();
        the_title();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>