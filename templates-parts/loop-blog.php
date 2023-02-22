<li class="blog-card gradient" data-tilt data-tilt-reverse="true">
        <?php the_post_thumbnail('blog', array('class' => 'imagen-destacada')); ?>
      
       <?php the_category(); ?> 

        <div class="contenido">
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>

                        
    <div class="meta-blog">
            <p class="meta">
                <span> Por: </span>
                <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>">
                    <?php echo get_the_author_meta('display_name') ?>
                </a>
            </p>
            <p class="meta">
                <span>Fecha: </span>
            <a href="<?php the_permalink(); ?>">
            <?php the_time( get_option('date_format')); ?> 
            </a>

            </p>
</div>
        </div>
    </li>