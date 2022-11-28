<?php
//Cuts menu names and removes notifications
function cut_menu_name($name){
    $arr = explode(" ", $name);
    $ret = $arr[0];

    for($i=1;$i<sizeof($arr);$i++){
        if(str_contains('<span', $arr[$i])){
            return $ret;
        }
        $ret = $ret.' '.$arr[$i];
    }

    return $ret;
}

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

function get_menu_url($menu){
    $file = $menu[2];
    $url = get_admin_menu_item_url( $file );
    return get_site_url().'/wp-admin/'.$url;
}
?>