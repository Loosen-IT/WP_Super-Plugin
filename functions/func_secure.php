<?php

use function WP_CLI\Utils\get_home_dir;

function get_the_user_ip() {

    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {

//check ip from share internet

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {

//to check ip is pass from proxy

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ip = $_SERVER['REMOTE_ADDR'];

    }

    return apply_filters( 'wpb_get_ip', $ip );

}
add_shortcode('display-ip', 'get_the_user_ip');

/*
function get_access_file(){
    $path = ABSPATH;
    if(file_exists($path.'/.htaccess')){ return $path.'.htaccess'; };
}
add_shortcode('display-file', 'get_access_file');
*/

?>
