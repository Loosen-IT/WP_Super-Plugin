<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit(); }
require_once(plugin_dir_path(__FILE__).'database/data_control.php');
global $wpdb;
$main = $wpdb->prefix.'super_main';
$colors = $wpdb->prefix.'super_colors';
$capabilities = $wpdb->prefix.'super_capabilities';
$menus = $wpdb->prefix.'super_menus';

$wpdb-> query ("DROP TABLE IF EXISTS {$main}");
$wpdb-> query ("DROP TABLE IF EXISTS {$colors}");
$wpdb-> query ("DROP TABLE IF EXISTS {$capabilities}");
$wpdb-> query ("DROP TABLE IF EXISTS {$menus}");
?>
