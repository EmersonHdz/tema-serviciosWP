<?php

function themegym_lista_clases($cantidad = -1) { 
    ?>

   <ul class="listado-grid">
            <?php
                $args = array(
                    'post_type' => 'gymfitness_clases', 
                    'posts_per_page' => $cantidad
                );
                $clases = new WP_Query($args);
                while($clases->have_posts()): $clases->the_post();
            ?>
            <li class="card gradient" data-tilt data-tilt-reverse="true">
                <?php the_post_thumbnail('mediano'); ?>
          <div class="contenido text-center">
                <a href="<?php the_permalink(); ?>">
                   <h3><?php the_title(); ?></h3>
                </a>

                <?php
                        $hora_inicio = get_field('hora_inicio');
                        $hora_fin = get_field('hora_fin');
                    ?>
                    <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?></p>
          </div>
            </li>

            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
<?php
}


function portfolio_servicios(){
    ?>

<ul class="listado-grid instructores">
            <?php
                $args = array(
                    'post_type' => 'portfolio_servicios', 
                );
                $instructores = new WP_Query($args);
                while($instructores->have_posts()): $instructores->the_post();
            ?>
            <li class="instructor" data-tilt data-tilt-reverse="true">
                 <?php the_post_thumbnail('blog'); ?>

                 <div class="contenido text-center">
                 <a class="texto-blanco" href="<?php the_permalink(); ?>">
                    <h3 ><?php the_title(); ?></h3>
            </a>
                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                    

                    <div class="especialidad">
                        <?php
                            $esp = get_field('servicios');
                            foreach($esp as $e): ?>
                                <span class="etiqueta"><?php echo esc_html( $e ); ?></span>  
                        
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>

            <?php endwhile; wp_reset_postdata(); ?>
        </ul>

    <?php
}


function themegym_testimoniales(){

    ?>
    <ul class="listado-testimoniales swiper-wrapper">
   <?php
        $args = array(
            'post_type' => 'testimoniales',
            'posts_per_page' => 10
        );
        $testimoniales = new WP_Query($args);
        while($testimoniales->have_posts()): $testimoniales->the_post();
    ?>
    <li class="testimonial text-center swiper-slide">
        <blockquote>
            <?php the_content(); ?>
        </blockquote>

        <footer class="testimonial-footer">
            <?php the_post_thumbnail('thumbnail'); ?>
            <p><?php the_title(); ?></p>
        </footer>

    </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php
}