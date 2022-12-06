<?php
//Registers important hooks for the superplugin
function super_plugin_hooks(){
    register_uninstall_hook( __FILE__, 'secure_uninstall' );
}
register_activation_hook( __FILE__, 'super_plugin_hooks' );

//Drops all Datatables
function secure_uninstallation(){
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
    delete_all_databases();
}
?>
