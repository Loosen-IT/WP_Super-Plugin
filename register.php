<?php
/**
 * Plugin Name: Super-Plugin
 * Description: Das Multi-Tool für Wordpress.
 * Version: 1.0
 * Requires PHP: 7.2, MySQL or MariaDB Database for Wordpress
 * Author: Jan-Niclas Loosen
 * Author URI: https://loosen-it.de
 * License: personal licence
 * Text Domain: Super-Plugin
 **/

//Registration of new menus
function super_register(){
    $version='0.1';
    require_once('database/data_control.php');
    check_requirements($version);

    /** --- --- registers the menus in wp-admin --- --- **/
    add_menu_page('Super-Plugin', 'Super-Plugin', 'edit_plugins','super_plugin','super_menu','dashicons-superhero',2);
    add_submenu_page('super_plugin', 'Super-Plugin', 'Übersicht','edit_plugins','super_plugin', 'super_menu',1);
    add_submenu_page('super_plugin','Individualisierung', 'Individualisierung', 'edit_plugins', 'super_customizer', 'super_customizer');
    add_submenu_page('super_plugin','Information', 'Lizensierung und Haftungsausschluss', 'read', 'super_impress', 'super_impress', 10);

}
add_action('admin_menu','super_register');

//Registration of menu-pages
function super_impress(){ include('pages/page_impress.php'); }
function super_customizer(){ include('pages/page_customizer.php'); }
function super_menu(){ include('pages/page_menu.php'); }

//Registration of needed functions
include('functions/func_copy.php');

