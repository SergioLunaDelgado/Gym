<?php

if (!defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'gymfitness_widget',
            esc_html__('GymFitness Clases', 'gymfitness'),
            array('description' => esc_html__('Agrega las Clases como Widget', 'gymfitness'),)
        );
    }

    /* muestra contenido en la pantalla del usuario */
    public function widget($args, $instance)
    {
?>
        <ul class="clases-sidebar">
            <?php
            $args = array(
                'post_type' => 'gymfitness_clases',
                'posts_per_page' => $instance['cantidad'], /* posts_per_page viene siendo un limit */
                // 'order' => 'ASC',
                // 'orderby' => 'title'
                'orderby' => 'rand' /* consume mucho recursos en la bd */
            );
            $clases = new WP_Query($args);
            while ($clases->have_posts()) :
                $clases->the_post();
            ?>
                <li>
                    <div class="imagen">
                        <?php the_post_thumbnail('medium'); ?> <!-- thumbnail, medium, medium_large, large; full (por defecto) -->
                    </div>
                    <div class="contenido-clase">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <?php
                        $hora_inicio = get_field('hora_inicio');
                        $hora_fin = get_field('hora_fin');
                        ?>
                        <!-- esta funcion es del plugin Advanced Custom Fields segun lo escribimos -->
                        <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . ' a ' . $hora_fin; ?></p>
                    </div>
                </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    <?php
    }

    /* instance es una variable de wp 
    esto imprime el formulario en el panel de admin aperiencia -> widgets */
    public function form($instance)
    {
        /*                                              esc_html es como si fuera un htmlspecialchars para sanitizar */
        $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('¿Cuántas clases deseas mostrar?');
    ?>
        <p>
            <label for="<?php esc_attr($this->get_field_id('cantidad')) ?>"><?php esc_attr_e('¿Cuántas clases deseas mostrar?') ?></label>
            <input type="number" name="<?php echo esc_attr($this->get_field_name('cantidad')) ?>" id="<?php echo esc_attr($this->get_field_id('cantidad')) ?>" class="widefat" value="<?php echo esc_attr($cantidad) ?>"> <!-- widefat clase de wp -->
        </p>
<?php
    }

    /* guardar el valor de la cantidad */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '';

        return $instance;
    }
}

function gymfitness_registrar_widget()
{
    register_widget('GymFitness_Clases_Widget');
}
add_action('widgets_init', 'gymfitness_registrar_widget');
