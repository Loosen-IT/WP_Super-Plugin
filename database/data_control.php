<?php
//SQL-Update for WP-Database
function set_database_value($table, $attr, $val){
    global $wpdb;
    $wpdb->update(add_prefix($table),array($attr=>$val),array('dummy_bool'=>'1'));
}

//SQL-Querry for WP-Database
function get_database_value($table, $attr){
    global $wpdb;
    $val = $wpdb -> get_var("SELECT ".$attr." FROM ".add_prefix($table));
    return $val;
}

//SQL-Inserttion for WP-Database
function insert_into_database($table, $attr, $val){
    global $wpdb;
    $wpdb -> insert(add_prefix($table), array($attr=>$val,));
}

//SQL-Querry for WP-Database
function is_function_activated($func){
    $bool = get_database_value(add_prefix('super_main',$func));
    return ($bool==1);
}

//Adds current prefix to name of table
function add_prefix($table){
    global $wpdb;
    $prefix = $wpdb->prefix;
    return $prefix.$table;
}

//Destroy all super-plugin databases
function delete_all_databases(){

}

//Checks the current plugin-version and update/create tables if needed
function check_requirements($version){
    global $wpdb;
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    $main_scheme="CREATE TABLE ".add_prefix('super_main')."(version VARCHAR(20),dummy_bool boolean DEFAULT true,debug_mode boolean DEFAULT false,quick_copy_pages boolean DEFAULT false,quick_copy_posts boolean DEFAULT false,PRIMARY KEY(version))";
    //Checks existence of main-table (lists functions of super-plugin) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_main')) != add_prefix('super_main')){
        dbDelta($main_scheme);
        insert_into_database('super_main','version',$version);
    }
    //Checks the current version of main-table and updates if not
    if (get_database_value('super_menu','version') != $version) {
        $values = ($wpdb->get_results("SELECT * FROM ".add_prefix('super_main'), ARRAY_A))[0];
        $wpdb->flush();
        $wpdb->query("DROP TABLE ".add_prefix('super_main'));
        dbDelta($main_scheme);
        $values['version']=$version;
        $wpdb->insert(add_prefix('super_main'), $values);
    }
    //Checks existence of color-table (for color-customizer) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_colors')) != add_prefix('super_colors')){
        dbDelta("CREATE TABLE ".add_prefix('super_colors')."(dummy_bool boolean DEFAULT true,color_base VARCHAR(10) DEFAULT '#3e94c3',color_text VARCHAR(10) DEFAULT '#ffffff',color_high VARCHAR(10) DEFAULT '#d54e21',color_subh VARCHAR(10) DEFAULT '#0067bc',color_note VARCHAR(10) DEFAULT '#d54e21',color_link VARCHAR(10) DEFAULT '#1e73be',color_form VARCHAR(10) DEFAULT '#3e94c3',color_back VARCHAR(10) DEFAULT '#ffffff',PRIMARY KEY(dummy_bool))");
        insert_into_database('super_colors','dummy_bool',true);
    }
    //Checks existence of menu-table (old and new names) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_menus')) != add_prefix('super_menus')){
        dbDelta("CREATE TABLE ".add_prefix('super_menus')."(name_org VARCHAR(40),name_new VARCHAR(40),PRIMARY KEY(name_org))");
    }
    //Checks existence of capability-table (original menu and new capability) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_capabilities')) != add_prefix('super_capabilities')){
        dbDelta("CREATE TABLE ".add_prefix('super_capabilities')."(menu_org VARCHAR(40),capability_new VARCHAR(40),PRIMARY KEY(menu_org))");
    }
}