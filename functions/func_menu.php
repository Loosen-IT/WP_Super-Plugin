<?php
//Cuts menu names and removes notifications
function cut_menu_name($name){
    $arr = explode("<", $name);
    return $arr[0];
}

//Finds Url of a WP-Admin menu
function get_admin_menu_item_url( $menu_item_file, $submenu_as_parent = true ) {
    global $menu, $submenu, $self, $parent_file, $submenu_file, $plugin_page, $typenow;
    $admin_is_parent = false;
    $item = '';
    $submenu_item = '';
    $url = '';
    foreach( $menu as $key => $menu_item ) {
        if ( array_keys( $menu_item, $menu_item_file, true ) ) {
            $item = $menu[ $key ];
        }
        if ( $submenu_as_parent && ! empty( $submenu_item ) ) {
            $menu_hook = get_plugin_page_hook( $submenu_item[2], $item[2] );
            $menu_file = $submenu_item[2];

            if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
                $menu_file = substr( $menu_file, 0, $pos );
            if ( ! empty( $menu_hook ) || ( ( 'index.php' != $submenu_item[2] ) && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! file_exists( ABSPATH . "/wp-admin/$menu_file" ) ) ) {
                $admin_is_parent = true;
                $url = 'admin.php?page=' . $submenu_item[2];
            } else {
                $url = $submenu_item[2];
            }
        }
        elseif ( ! empty( $item[2] ) && current_user_can( $item[1] ) ) {
            $menu_hook = get_plugin_page_hook( $item[2], 'admin.php' );
            $menu_file = $item[2];
            if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
                $menu_file = substr( $menu_file, 0, $pos );
            if ( ! empty( $menu_hook ) || ( ( 'index.php' != $item[2] ) && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! file_exists( ABSPATH . "/wp-admin/$menu_file" ) ) ) {
                $admin_is_parent = true;
                $url = 'admin.php?page=' . $item[2];
            } else {
                $url = $item[2];
            }
        }
    }
    // 2. Check if sub-level menu item
    if ( ! $item ) {
        $sub_item = '';
        foreach( $submenu as $top_file => $submenu_items ) {
            // Reindex $submenu_items
            $submenu_items = array_values( $submenu_items );
            foreach( $submenu_items as $key => $submenu_item ) {
                if ( array_keys( $submenu_item, $menu_item_file ) ) {
                    $sub_item = $submenu_items[ $key ];
                    break;
                }
            }
            if ( ! empty( $sub_item ) )
                break;
        }
        // Get top-level parent item
        foreach( $menu as $key => $menu_item ) {
            if ( array_keys( $menu_item, $top_file, true ) ) {
                $item = $menu[ $key ];
                break;
            }
        }

        // If the $menu_item_file parameter doesn't match any menu item, return false
        if ( ! $sub_item )
            return false;

        // Get URL
        $menu_file = $item[2];

        if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
            $menu_file = substr( $menu_file, 0, $pos );

        // Handle current for post_type=post|page|foo pages, which won't match $self.
        $self_type = ! empty( $typenow ) ? $self . '?post_type=' . $typenow : 'nothing';
        $menu_hook = get_plugin_page_hook( $sub_item[2], $item[2] );

        $sub_file = $sub_item[2];
        if ( false !== ( $pos = strpos( $sub_file, '?' ) ) )
            $sub_file = substr($sub_file, 0, $pos);

        if ( ! empty( $menu_hook ) || ( ( 'index.php' != $sub_item[2] ) && file_exists( WP_PLUGIN_DIR . "/$sub_file" ) && ! file_exists( ABSPATH . "/wp-admin/$sub_file" ) ) ) {
            // If admin.php is the current page or if the parent exists as a file in the plugins or admin dir
            if ( ( ! $admin_is_parent && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! is_dir( WP_PLUGIN_DIR . "/{$item[2]}" ) ) || file_exists( $menu_file ) )
                $url = add_query_arg( array( 'page' => $sub_item[2] ), $item[2] );
            else
                $url = add_query_arg( array( 'page' => $sub_item[2] ), 'admin.php' );
        } else {
            $url = $sub_item[2];
        }
    }
    return esc_url( $url );
}

//Gets URL for a menu
function get_menu_url($menu){
    $file = $menu[2];
    $url = get_admin_menu_item_url( $file );
    return get_site_url().'/wp-admin/'.$url;
}

//Gets original name for a menu
function get_orig_name($name, $slug){
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
    $val=get_database_value_MULT('super_menus', 'old_name', array('slug'=>$slug,'new_name'=>$name));
    if(is_null($val)) { return $name; }
    else { return $val; }
}

//Changes capability and name of menu
function change_menu($slug, $old_name, $new_name,$new_capability){
    if(strcmp($new_capability,"nicht ausgewaehlt")==0) { $new_capability="nicht_ausgewaehlt"; }
    $old_name = get_orig_name($old_name, $slug);
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');

    $val=get_database_value_MULT('super_menus','new_name',array('slug'=>$slug,'old_name'=>$old_name));

    if(is_null($val)) { insert_into_database_MULT('super_menus', array('old_name'=>$old_name,'slug'=>$slug,'new_name'=>$new_name,'capability'=>$new_capability));}
    else {
        set_database_value_MULT('super_menus', array('new_name'=>$new_name,'capability'=>$new_capability), array('old_name'=>$old_name,'slug'=>$slug));
    }
}

//Gets current added Capability
function current_capability($slug,$old_name){
    $old_name = get_orig_name($old_name,$slug);
    $capability=get_database_value_MULT('super_menus','capability',array('slug'=>$slug,'old_name'=>$old_name));
    if(is_null($capability)){ return "nicht ausgewaehlt"; }
    else {
        if(strcmp($capability,"nicht_ausgewaehlt")==0) { return "nicht ausgewaehlt"; }
        else { return $capability; }
    }
}

//Overrides all new information of the menu-customizer
function override_menu_defaults(){
    require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
    if(is_function_activated('custom_menus')){

        global $menu, $submenu;
        foreach($menu as $menuarr){
            $name=get_database_value_MULT('super_menus', 'new_name', array('slug'=>$menuarr[2], 'old_name'=>cut_menu_name($menuarr[0])));
            $capability=get_database_value_MULT('super_menus', 'capability', array('slug'=>$menuarr[2], 'old_name'=>cut_menu_name($menuarr[0])));

            $index=array_search($menuarr,$menu);
            if(!is_null($name)){
                $override=str_replace(cut_menu_name($menu[$index][0]),$name,$menu[$index][0]);
                $menu[$index][0]=$override;
            }
            if(!is_null($capability)){
                if(strcmp($capability,"nicht_ausgewaehlt")!=0 && !current_user_can($capability)){
                    remove_menu_page($menuarr[2]);
                }
            }

            if(isset($submenu[$menuarr[2]])){
                foreach($submenu[$menuarr[2]] as $subarr){
                    $name=get_database_value_MULT('super_menus', 'new_name', array('slug'=>$subarr[2], 'old_name'=>cut_menu_name($subarr[0])));
                    $capability=get_database_value_MULT('super_menus', 'capability', array('slug'=>$subarr[2], 'old_name'=>cut_menu_name($subarr[0])));

                    if(!is_null($name)){

                    }
                    if(!is_null($capability)){
                        if(strcmp($capability,"nicht_ausgewaehlt")!=0 && !current_user_can($capability)){
                            remove_submenu_page($menuarr[2],$subarr[2]);
                        }
                    }
                }
            }
        }

        foreach($submenu as $sub){
            foreach($sub as $subarr){
                $name=get_database_value_MULT('super_menus', 'new_name', array('slug'=>$subarr[2], 'old_name'=>cut_menu_name($subarr[0])));
                $capability=get_database_value_MULT('super_menus', 'capability', array('slug'=>$subarr[2], 'old_name'=>cut_menu_name($subarr[0])));
                $index=array_search($subarr,$sub);
                if(!is_null($name)){
                    $override=str_replace(cut_menu_name($sub[$index][0]),$name,$sub[$index][0]);
                    $submenu[array_search($sub,$submenu)][$index][0]=$override;
                }
                if(!is_null($capability)){
                    if(strcmp($capability,"nicht_ausgewaehlt")!=0 && !current_user_can($capability)){

                    }
                }
            }
        }

    }
}
add_action( 'admin_menu', 'override_menu_defaults', 999);


function recreate_footer(){
    global $submenu;
    $url = get_menu_url($submenu['super_plugin'][sizeof($submenu['super_plugin'])-1]);
    $footer_text = 'Individualisiert durch das <a href="'.$url.'">Super-Plugin</a> |'.'&nbsp'.'<a href="https://feldmannservices.de/" target="_blank">FeldmannServices e.K.</a>';
    return $footer_text;
}
add_filter('admin_footer_text','recreate_footer');
?>
