<?php
/*
Plugin Name: WW Bayern Imagefilm
Description: Zeigt den WW Bayern Imagefilm in der Seitenleiste an. Installation: Gehe zu "Design" → "Widgets" und ziehe das Widget "WW Bayern Imagevideo" in die gewünschte Seitenleiste.
Requires at least: 2.8
Requires PHP: 5.6
*/
// Register and load the widget
function wol_imagefilm_load_widget() {
    register_widget ( 'WP_Widget_Imagefilm' );
}
add_action ( 'widgets_init', 'wol_imagefilm_load_widget' );

// Creating the widget
class WP_Widget_Imagefilm extends WP_Widget {
    function __construct() {
        parent::__construct (

            'wol_imagefilm',
            __ ( 'WW Bayern Imagevideo', 'wol_imagefilm_domain' ),
            array (
                'description' => __ ( 'Zeigt den WW Imagefilm in der Seitenleiste an', 'wol_imagefilm_domain' )
            ) );
    }

    // Creating widget front-end
    public function widget($args, $instance) {
        // before and after widget arguments are defined by themes
        echo $args ['before_widget'];
        // This is where you run the code and display the output
        echo __ ( '<iframe width="280" height="158" src="https://www.youtube-nocookie.com/embed/3gZtZv8FWzA" frameborder="0" allowfullscreen></iframe>', 'wol_imagefilm_domain' );
        echo $args ['after_widget'];
    }

    // Widget Backend
    public function form($instance) {
        if (isset ( $instance ['title'] )) {
            $title = $instance ['title'];
        } else {
            $title = __ ( '--', 'wol_imagefilm_domain' );
        }
        // Widget admin form
        ?>
    <p>Installation:<br>
1. Ziehe dieses Widget in die gewünschte Seitenleiste<br>
2. Das Video (280x158 Pixel) wird automatisch eingefügt<br>
3. Fertig!</p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array ();
        return $instance;
    }
} // Class wol_imagefilm ends here


