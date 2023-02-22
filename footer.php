<footer class="site-footer">
    <hr class="border-footer">

            <div class="contenido-footer contenedor">
                <?php
                    $args = array(
                        'theme_location' => 'main-menu', 
                        'container' => 'nav',
                        'container_class' => 'menu-principal'
                    );
                    wp_nav_menu($args);
                ?>

                <p class="copyright">Todos los derechos reservados <?php echo get_bloginfo('name') . " " . date('Y'); ?>  </p>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>