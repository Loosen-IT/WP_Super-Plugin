<?php
//Creates new Stylesheet by filling placeholders with database-entries
function update_stylesheet(){
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
    $path = plugin_dir_path( __FILE__ );
    $mask = fopen($path.'/mask.css',"r");
    $style = fopen($path.'/style.css', "w");
    $table = 'super_colors';
    fwrite($style, "");
    while(!feof($mask)){
        $line = fgets($mask);
        $line = str_replace('§color_text', get_database_value($table, 'color_text'), $line); //Textcolor of admin-bar
        $line = str_replace('§color_base', get_database_value($table, 'color_base'), $line); //Background for admin-bar
        $line = str_replace('§color_high', get_database_value($table, 'color_high'), $line); //Highlight and hoover
        $line = str_replace('§color_note', get_database_value($table, 'color_note'), $line); //Color of notifications
        $line = str_replace('§color_subh', get_database_value($table, 'color_subh'), $line); //Color of current submenu
        $line = str_replace('§color_link', get_database_value($table, 'color_link'), $line); //Color of links
        $line = str_replace('§color_form', get_database_value($table, 'color_form'), $line); //Color of buttons and forms
        $line = str_replace('§color_back', get_database_value($table, 'color_back'), $line); //Background for menus
        fwrite($style, $line);
    }
    fclose($mask);
    fclose($style);
}
?>


