<?php 
/**
 * Pagina del blog
 */
get_header(); ?>
    <main class="pagina seccion no-sidebars contenedor">
        <?php 
         $categoria = get_queried_object();
        ?>
        <h2 class="text-primary text-center">Categorias: <?php echo $categoria->name; ?></h2>
        <ul class="listado-blog">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('templates-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

    <?php get_footer(); ?>