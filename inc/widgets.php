<?php

if(!defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gymfitness_widget',
			esc_html__( 'Mis Servicios', 'gymfitness' ), 
			array( 'description' => esc_html__( 'Agrega las Servicios como Widget', 'gymfitness' ), )
		);
	}

	public function widget( $args, $instance ) {
          ?>
           <ul class="clases-sidebar">
            <?php
                $args = array(
                    'post_type' => 'portfolio_servicios',
                    'posts_per_page' => $instance['cantidad']
                );
                $clases = new WP_Query($args);
                while($clases->have_posts()): $clases->the_post();
            ?>
            <li class="contenido-clase">
            <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('mediano'); ?>
                </a>
                
                  <div class="contenido text-center">
                <a href="<?php the_permalink(); ?>">
                   <h3><?php the_title(); ?></h3>
                </a>

                <?php echo wp_trim_words(get_the_content(), 20); ?>
          </div>
            </li>

            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
          <?php
        
       
          
	}

    	public function form( $instance ) {
         $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('Cuantos clases deseas mostrar?'); ?>

         <p>
            <label for="<?php echo esc_attr($this->get_field_id('cantidad')) ?>">
                 <?php esc_attr_e('Cuantos clases deseas mostrar?') ?>
            </label>

            <input
             class="widefat"
             id="<?php echo esc_attr($this->get_field_id('cantidad')) ?>"
             name="<?php echo esc_attr($this->get_field_name('cantidad')) ?>"
             type ="number"
             value="<?php echo esc_attr($cantidad) ?>"

            />
        </p>  
        <?php
   	}

	public function update( $new_instance, $old_instance ) {
              $instance = array();
              $instance ['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance ['cantidad']) : '';
              return $instance; 
	}
} 

function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_Widget' );
}
add_action( 'widgets_init', 'gymfitness_registrar_widget' );