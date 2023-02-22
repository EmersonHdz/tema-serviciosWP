<?php get_header(); ?>

    <main class="contenedor seccion con-sidebar">
        <div class="contenido-principal">
            <?php get_template_part('templates-parts/servicios'); ?>
        </div>
           <?php get_sidebar('servicios'); ?>
      
    </main>

<?php get_footer(); ?>