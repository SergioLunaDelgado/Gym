<!-- 
    page-$id = El id se encuentra en el url en el panel de admin de una pagina en especifico, no se recomiendo ya que lo hace poco reutilizable
    page-$slug = Slug es el nombre con el cual wp identifica esa pagina, se habilita en el panel de administracion en opciones de pantalla
-->
<!-- en php seria include o require -->
<?php get_header(); ?>
<main class="contenedor seccion">
    <?php get_template_part('template-parts/pagina'); ?>
</main>

<?php get_footer(); ?>