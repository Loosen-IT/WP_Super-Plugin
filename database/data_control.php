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

//SQL-Querry for WP-Database
function is_function_activated($func){
    global $wpdb;
    $bool = $wpdb -> get_var("SELECT ".$func." FROM ".add_prefix('super_main'));
    return ($bool==1);
}

//Adds current prefix to name of table
function add_prefix($table){
    global $wpdb;
    $prefix = $wpdb->prefix;
    return $prefix.$table;
}