<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
require_once(plugin_dir_path(__DIR__).'/styles/style_creator.php')
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<script src="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.bundle.js'; ?>" crossorigin="anonymous"></script>
<div class="container-fluent pt-3 pe-3">
    <div class="row px-2">
        <div class="col">
            <h3>Individualisierung</h3>
            <label class="pb-4">Hier kann die Benutzerfläche von WP-Admin angepasst werden.</label>
        </div>
    </div>
    <div class="row p-2 pb-3 pe-4">
        <div class="col">
            <div class="container-fluid bg-light rounded border">
                <h5 class="pt-2">Farbanpassung <?php if(!is_function_activated('custom_colors')){ echo '[DEAKTIVIERT]'; } ?></h5>
                <span>Kopiere Pages und Posts schnell und einfach in der Tabellenübersicht.</span>
                <form class="py-2 pt-4" method="post" action="
                <?php
                if(isset($_POST['color_submit'])){
                    set_database_value('super_colors', 'color_back', $_POST['color_back']);
                    set_database_value('super_colors', 'color_base', $_POST['color_base']);
                    set_database_value('super_colors', 'color_subh', $_POST['color_subh']);
                    set_database_value('super_colors', 'color_text', $_POST['color_text']);
                    set_database_value('super_colors', 'color_high', $_POST['color_high']);
                    set_database_value('super_colors', 'color_link', $_POST['color_link']);
                    set_database_value('super_colors', 'color_form', $_POST['color_form']);
                    set_database_value('super_colors', 'color_note', $_POST['color_note']);
                    update_stylesheet();
                    wp_enqueue_style('super-style',plugin_dir_url(__DIR__).'/styles/style.css');
                }
                ?>">
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Haupt-Hintergrund</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_back" value="<?php echo get_database_value('super_colors','color_back'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Sitebar-Hintergrund</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_base" value="<?php echo get_database_value('super_colors','color_base'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Submenü-Auswahl</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_subh" value="<?php echo get_database_value('super_colors','color_subh'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Highlight-Farbe</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_high" value="<?php echo get_database_value('super_colors','color_high'); ?>" title="Choose your color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Sitebar-Text</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_text" value="<?php echo get_database_value('super_colors','color_text'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Buttons und Forms</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_form" value="<?php echo get_database_value('super_colors','color_form'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Links</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_link" value="<?php echo get_database_value('super_colors','color_link'); ?>" title="Choose your color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="min-width:15em;max-width:15em;">
                                    <span class="input-group-text" id="basic-addon1">Nachrichten</span>
                                </div>
                                <input type="color" class="form-control form-control-color" name="color_note" value="<?php echo get_database_value('super_colors','color_note'); ?>" title="Choose your color">
                            </div>
                        </div>
                    </div>
                    <?php if(is_function_activated('custom_colors')) {
                    ?>
                    <div class="pt-3 pb-1">
                        <button name="color_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>


    <div class="row p-2 pb-3 pe-4">
        <div class="col">
            <div class="container-fluid bg-light border">
                <div class="container-fluid pb-3 p-0">
                    <h5 class="pt-2">Menümanager <?php if(!is_function_activated('custom_menus')){ echo '[DEAKTIVIERT]'; } ?></h5>
                    <span>Verwalte hier die Menüs und Submenüs, ändere ihre Namen und setze neue Capabilities.</span>
                </div>
                <?php
                global $menu, $submenu, $wp_roles;
                $roles = $wp_roles->roles;
                $index = 0;
                foreach($menu as $menuARR){
                    if($menuARR[0]!=""){
                        $tag = "menu".$index;
                        ?>
                        <div class="container d-grid pb-3 px-2">
                            <button class="btn btn-secondary d-flex rounded-0 rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $tag; ?>" aria-expanded="false" aria-controls="<?php echo $tag; ?>">
                                <?php echo cut_menu_name($menuARR[0]); ?>
                            </button>
                            <div class="collapse pt-0" id="<?php echo $tag; ?>">
                                <div class="container-fluid bordered rounded-0" style="background-color:#ffffff;border: solid #6C757D;border-width:1px;">
                                    <form method="post" action="
                                    <?php
                                    if(isset($_POST[$tag.'_submit'])){
                                        if($_POST[$tag.'_name'] != ""){
                                            require_once(plugin_dir_path(__DIR__).'/functions/func_menu.php');
                                            change_menu($menuARR[2],cut_menu_name($menuARR[0]),$_POST[$tag.'_name']);
                                        }
                                    }
                                    ?>
                                    ">
                                        <div class="input-group mb-3 pt-3">
                                            <span class="input-group-text" id="<?php echo $tag; ?>_name" style="max-width:6em; min-width:7em;">Menü-Titel</span>
                                            <input type="text" name="<?php echo $tag; ?>_name" class="form-control" value="<?php echo cut_menu_name($menuARR[0]); ?>" aria-describedby="name" style="min-width:23em;">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" style="max-width:6em; min-width:7em;">Menü-Url</span>
                                            <input type="text" class="form-control" disabled value="<?php echo get_menu_url($menuARR);?>" style="min-width:23em;">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" style="max-width:12em; min-width:12em;">Required Capability</span>
                                            <input type="text" class="form-control" disabled value="<?php echo $menuARR[1]?>" style="min-width:23em;">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" style="max-width:12em; min-width:12em;">Additional Capability</span>
                                            <select name="<?php echo $tag; ?>_addcap" class="form-select" aria-label="Default select example">
                                                <option selected>Keine Auswahl</option>
                                                <?php
                                                foreach (array_keys($roles['administrator']['capabilities']) as $capability){
                                                    ?>
                                                    <option value="<?php echo $capability; ?>"><?php echo $capability; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                        <?php

                                        ?>
                                        </div>
                                        <?php
                                        if(is_function_activated('custom_menus')) {
                                        ?>
                                        <div class="py-3 pb-3">
                                            <button name="<?php echo $tag; ?>_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                                        </div>
                                        <?php } ?>
                                </form>
                                <?php
                                $index++;
                                if(isset($submenu[$menuARR[2]])){
                                    foreach($submenu[$menuARR[2]] as $submenuARR){
                                        $tag = "menu".$index;
                                        ?>
                                        <div class="container d-grid pb-2 px-0">
                                            <button class="btn btn-secondary d-flex rounded-0 rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $tag; ?>" aria-expanded="false" aria-controls="<?php echo $tag; ?>">
                                                <?php echo cut_menu_name($submenuARR[0]); ?>
                                            </button>
                                            <div class="collapse pt-0" id="<?php echo $tag; ?>">
                                                <div class="container-fluid bordered rounded-0" style="background-color:#ffffff;border: solid #6C757D;border-width:1px;">
                                                    <form method="post" action="
                                                <?php
                                                    if(isset($_POST[$tag.'_submit'])){
                                                        if($_POST[$tag.'_name'] != ""){
                                                            require_once(plugin_dir_path(__DIR__).'/functions/func_menu.php');
                                                            change_menu($submenuARR[2],cut_menu_name($submenuARR[0]),$_POST[$tag.'_name']);
                                                        }
                                                    }
                                                    ?>
                                                ">
                                                        <div class="input-group mb-3 pt-3">
                                                            <span class="input-group-text" id="<?php echo $tag; ?>_name" style="max-width:6em; min-width:7em;">Menü-Titel</span>
                                                            <input type="text" name="<?php echo $tag; ?>_name" class="form-control" value="<?php echo cut_menu_name($submenuARR[0]); ?>" aria-describedby="name" style="min-width:23em;">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" style="max-width:6em; min-width:7em;">Menü-Url</span>
                                                            <input type="text" class="form-control" disabled value="<?php echo get_menu_url($submenuARR);?>" style="min-width:23em;">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" style="max-width:12em; min-width:12em;">Required Capability</span>
                                                            <input type="text" class="form-control" disabled value="<?php echo $submenuARR[1]?>" style="min-width:23em;">
                                                        </div>
                                                        <?php
                                                        if(strcmp($submenuARR[2],"super_impress")!=0){
                                                            ?>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" style="max-width:12em; min-width:12em;">Additional Capability</span>
                                                                <select name="<?php echo $tag; ?>_addcap" class="form-select" aria-label="Default select example">
                                                                    <option selected>Keine Auswahl</option>
                                                                    <?php
                                                                    foreach (array_keys($roles['administrator']['capabilities']) as $capability){
                                                                        ?>
                                                                        <option value="<?php echo $capability; ?>"><?php echo $capability; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if(is_function_activated('custom_menus')) {
                                                            ?>
                                                            <div class="py-3">
                                                                <button name="<?php echo $tag; ?>_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                                                            </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $index++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>
