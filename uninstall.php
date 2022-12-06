<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit(); }
require_once(plugin_dir_path(__FILE__).'database/data_control.php');
delete_all_databases();
?>
