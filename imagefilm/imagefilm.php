<?php
/*

Plugin Name: WW Bayern Imagefilm
Description: Test
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
    <p>Hier gibts nix zu tun ;) Ziehe das Widget einfach in deine Seitenleiste.</p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array ();
        return $instance;
    }
} // Class wol_imagefilm ends here


