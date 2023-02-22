<?php while( have_posts() ): the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <?php 
    
        if(has_post_thumbnail() ): 
            the_post_thumbnail('full', array('class' => 'imagen-destacada imagen-clases'));
        endif;
        ?>
  
   
        <div class="especialidad">
        <?php
            $esp = get_field('servicios');
            foreach($esp as $e): ?>
                <span class="servicio"><?php echo esc_html( $e ); ?></span>  
        
        <?php endforeach; ?>
    </div>
          

    


            <?php the_content(); ?>
<?php endwhile;  ?>