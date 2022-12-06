<?php
//SQL-Update for WP-Database
function set_database_value($table, $attr, $val){
    global $wpdb;
    set_database_value_COMP($table, $attr, $val, 'dummy_bool', '1');
}

//SQL-Update for WP-Database with WHERE
function set_database_value_COMP($table, $attr, $val, $where, $is){
    global $wpdb;
    $wpdb->update(add_prefix($table),array($attr=>$val),array($where=>$is));
}

//SQL-Update for WP-Database with multiple WHERE
function set_database_value_MULT($table, $attrANDval, $whereANDis){
    global $wpdb;
    $wpdb->update(add_prefix($table),$attrANDval,$whereANDis);
}

//SQL-Querry for WP-Database
function get_database_value($table, $attr){
    global $wpdb;
    $val = $wpdb -> get_var("SELECT ".$attr." FROM ".add_prefix($table));
    return $val;
}

//SQL-Querry for WP-Database with WHERE
function get_database_value_COMP($table, $attr, $where, $is){
    global $wpdb;
    $val = $wpdb -> get_var("SELECT ".$attr." FROM ".add_prefix($table)." WHERE ".$where."='".$is."'");
    return $val;
}

//SQL-Querry for WP-Database with multiple WHERE
function get_database_value_MULT($table, $attr, $whereANDis){
    global $wpdb;
    $search = "SELECT ".$attr." FROM ".add_prefix($table)." WHERE ";
    $counter = 0;
    foreach($whereANDis as $pair){
        $search .= array_search($pair,$whereANDis)."='".$pair."'";
        $counter ++;
        if($counter < sizeof($whereANDis)) { $search .= " AND "; }
        else $search .= ";";
    }
    $val = $wpdb -> get_var($search);
    return $val;
}

//SQL-Insertion for WP-Database
function insert_into_database($table, $attr, $val){
    global $wpdb;
    $wpdb -> insert(add_prefix($table), array($attr=>$val,));
}

//SQL-Insertion with multiple Attributes
function insert_into_database_MULT($table, $arr){
    global $wpdb;
    $wpdb -> insert(add_prefix($table), $arr);
}

//SQL-Querry for WP-Database
function is_function_activated($func){
    $bool = get_database_value('super_main',$func);
    return ($bool == true);
}

//Adds current prefix to name of table
function add_prefix($table){
    global $wpdb;
    $prefix = $wpdb->prefix;
    return $prefix.$table;
}

//Destroy all super-plugin databases
function delete_all_databases(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS ".add_prefix('super_main'));
    $wpdb->query("DROP TABLE IF EXISTS ".add_prefix('super_colors'));
    $wpdb->query("DROP TABLE IF EXISTS ".add_prefix('super_menus'));
    $wpdb->query("DROP TABLE IF EXISTS ".add_prefix('super_capabilities'));
}

//Checks the current plugin-version and update/create tables if needed
function check_requirements($version){
    global $wpdb;
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    $main_scheme="CREATE TABLE ".add_prefix('super_main')."(version VARCHAR(20),dummy_bool boolean DEFAULT true,debug_mode boolean DEFAULT false,quick_copy_pages boolean DEFAULT false,quick_copy_posts boolean DEFAULT false,custom_colors boolean DEFAULT false,custom_menus boolean DEFAULT false, PRIMARY KEY(version))";
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
        dbDelta("CREATE TABLE ".add_prefix('super_colors')."(dummy_bool boolean DEFAULT true,color_base VARCHAR(7) DEFAULT '#3e94c3',color_text VARCHAR(7) DEFAULT '#ffffff',color_high VARCHAR(7) DEFAULT '#d54e21',color_subh VARCHAR(7) DEFAULT '#0067bc',color_note VARCHAR(7) DEFAULT '#d54e21',color_link VARCHAR(7) DEFAULT '#1e73be',color_form VARCHAR(7) DEFAULT '#3e94c3',color_back VARCHAR(7) DEFAULT '#ffffff',PRIMARY KEY(dummy_bool))");
        insert_into_database('super_colors','dummy_bool',true);
    }
    //Checks existence of menu-table (old and new names) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_menus')) != add_prefix('super_menus')){
        dbDelta("CREATE TABLE ".add_prefix('super_menus')."(slug VARCHAR(128),old_name VARCHAR(128),new_name VARCHAR(128),PRIMARY KEY(old_name,slug))");
    }
    //Checks existence of capability-table (original menu and new capability) and creates if not
    if($wpdb-> get_var("SHOW TABLES LIKE ".add_prefix('super_capabilities')) != add_prefix('super_capabilities')){
        dbDelta("CREATE TABLE ".add_prefix('super_capabilities')."(slug VARCHAR(128),org_name VARCHAR(128),capability VARCHAR(128),PRIMARY KEY(org_name))");
    }
}