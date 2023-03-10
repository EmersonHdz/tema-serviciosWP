<?php 
/**
 * Pagina del blog
 */
get_header(); ?>
    <main class="pagina seccion no-sidebars contenedor">
        <ul class="listado-blog">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('templates-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
        <?php  
         the_posts_pagination();
        ?>
    </main>


<?php get_footer(); ?>