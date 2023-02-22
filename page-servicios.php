<?php 
/**
 * Template Name: Listado Servicios
 */
get_header(); ?>

    <main class="contenedor seccion">
    <?php get_template_part('templates-parts/paginas'); ?>
    
    <?php portfolio_servicios(); ?>
    
    </main>

<?php get_footer(); ?>