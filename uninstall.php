<?php
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

//Deletes tables, which are created by the superplugin
global $wpdb;
$prefix = $wpdb->prefix;
$wpdb->query( "DROP TABLE IF EXISTS {$prefix}super_main" );
$wpdb->query( "DROP TABLE IF EXISTS {$prefix}super_colors" );
$wpdb->query( "DROP TABLE IF EXISTS {$prefix}super_menus" );

?>