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
<?php
    the_content();
endwhile;
?>