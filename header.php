<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<header class="site-header">
   <div class="contenedor">
        <div class="barra-navegacion">
            <div class="logo">
            <a href="<?php echo site_url('/') ?>">
            <h2 class="logo-nombre">Web Development </h2>
                </a>
            </div>

            <?php
                $args = array(
                    'theme_location' => 'main-menu', 
                    'container' => 'nav',
                    'container_class' => 'menu-principal'
                );
                wp_nav_menu($args);
            ?>
        </div>
   </div>

   <?php if(is_front_page()) { ?>
  
    <div class="tagline text-center contenedor">
    <h1 class="ml2"><?php the_field('hero_heading'); ?></h1>
    <p><?php the_field('contenido_hero') ?></p>
    </div>
     <?php  } ?>

</header>