<!DOCTYPE html>
<!-- consulta el idioma en que fue instalado wp y lo pone en el lang -->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> con add_theme_support se hace de forma dinamica -->
    <!-- informacion interna de wp entre ella est la etiqueta link con los estilos -->
    <?php wp_head(); ?>
</head>

<!-- Coloca varias clases al home -->

<body <?php body_class(); ?>>
    <header class="header">
        <div class="contenedor barra-navegacion">
            <div class="logo">
                <!-- get_template_directory_uri es como un __DIR__ pero dinamico -->
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" class="logo" alt="Logo">
                </a>
            </div>
            <div class="hamburguer-menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64" height="64" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>
            </div>
            <div class="contenedor-menu">
                <?php
                /* especificar a que menu se le va agregar */
                $args = array(
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal',
                );
                wp_nav_menu($args);
                ?>
            </div>
        </div>
        <?php if (is_front_page()) : ?>
            <div class="contenedor tagline text-center">
                <h1 class="ml2"><?php the_field('hero_heading'); ?></h1>
                <p><?php the_field('hero_texto'); ?></p>
            </div>
        <?php endif; ?>
    </header>