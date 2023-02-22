<?php
/*
* Template Name: Template para Galerias
*/
get_header(); ?>

    <main class="contenedor pagina seccion">
    
        <?php while( have_posts() ): the_post(); 
      the_title('<h1 class="text-center text-primary">', '</h1>'); ?>

                <?php
                    // obtener la galeria de la página actual
                    $galeria = get_post_gallery( get_the_ID(), false );
                    // obtener los ids
                    $galeria_imagenes_ID = explode(',', $galeria['ids']);
                ?>

                <ul class="galeria-imagenes">
                    <?php
                        
                        foreach($galeria_imagenes_ID as $id):
    
                            $imagen_grande = wp_get_attachment_image_src( $id, 'large' )[0]; 
                            $imagen_full =  wp_get_attachment_image_src( $id, 'full' )[0]; 
                    ?>  
                        <li>
                            <a href="<?php echo $imagen_full; ?>" data-lightbox="galeria">
                                <img src="<?php echo $imagen_grande; ?>" alt="imagen">
                            </a>
                        </li>
                            
                    <?php endforeach;?>
                </ul>
                
            <?php endwhile;  ?>
     
    </main>

<?php get_footer(); ?>