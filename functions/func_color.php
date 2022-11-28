<?php
function super_admin_color_scheme() {
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
    if(is_function_activated('custom_colors')){
        $theme_dir = plugin_dir_url(__DIR__).'/styles';
        wp_admin_css_color( 'super-style', __( 'Super-Plugin' ),
            $theme_dir . '/style.css',
            array( '#ffffff', '#ffffff', '#ffffff' , '#ffffff')
        );
    }
}
add_action('admin_init', 'super_admin_color_scheme');

function super_remove_color_picker(){
    if(is_function_activated('custom_colors')){
        remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
        add_filter('get_user_option_admin_color', function () { return 'super-style'; });
    }
}
add_action('admin_init', 'super_remove_color_picker');
?>
