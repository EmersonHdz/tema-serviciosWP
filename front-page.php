
<?php get_header(); ?>

<section class="bienvenida seccion contenedor text-center">
    <h2 class="text-primary"><?php the_field('encabezado_bienvenida'); ?></h2>

    <p><?php the_field('texto_bienvenida'); ?></p>
</section>

<section class="areas">


</section>

<?php
/**<main class="contenedor seccion ">
<h2 class="text-center text-primary">Nuestras Clases</h2>
  <?php themegym_lista_clases(4); ?>

  <div class="contenedor-boton">
  <a href="<?php echo esc_url( get_permalink( get_page_by_title('Nuestras Clases'))); ?>" class="boton boton-primario">
  Ver todas las clases
  </a>
  </div>
  
</main>
 * 
 */
?>


<section class="contenedor seccion">
    
<?php portfolio_servicios();   ?> 


    
    <div class="contenedor-boton">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title('servicios'))); ?>" class="boton boton-primario">
            Ver todos los servicios
        </a>
    </div>
</section>
 



<section class="contenedor seccion">
    <h2 class="text-center text-primary">Nuestro Blog</h2>
    <p class="text-center">Aprende tips de nuestros instructores expertos</p>
    <ul class="listado-grid">
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            $blog = new WP_Query($args);
            while($blog->have_posts()): $blog->the_post(); 
             get_template_part('templates-parts/loop', 'blog'); 
            endwhile; wp_reset_postdata(); 
        ?>
    </ul>
</section>

<?php get_footer(); ?>
