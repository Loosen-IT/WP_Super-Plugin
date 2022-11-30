<?php
<<<<<<< Updated upstream

?>
=======
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
require_once(plugin_dir_path(__DIR__).'/styles/style_creator.php')
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<script src="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.bundle.js'; ?>" crossorigin="anonymous"></script>
<div class="container-fluent pt-3 pe-3">
    <div class="row px-2">
        <div class="col">
            <h3>Individualisierung</h3>
            <label class="pb-4">Hier kann die Benutzerfläche von WP-Admin angepasst werden.<br>
                Die Übersicht wird nur Benutzern mit der Capability "edit_plugins" angezeigt.</label>
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
            <div class="container-fluid bg-light rounded border">
                <h5 class="pt-2">Menümanager <?php if(!is_function_activated('custom_menus')){ echo '[DEAKTIVIERT]'; } ?></h5>
                <span>Verwalte hier die Menüs und Submenüs, ändere ihre Namen und setze neue Capabilities.</span>
                <div class="row pb-3">
                    <div class="col-6">
                    <?php
                        global $menu, $wp_roles;
                        $roles = $wp_roles->roles;
                        $index = 0;
                        require_once(plugin_dir_path(__DIR__).'functions/func_menu.php');
                        foreach($menu as $menuARR){
                            if($menuARR[0] != ""){
                                $tag = "menu".$index;
                                ?>
                                <div class="card p-0">
                                    <div class="card-header rounded bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $tag; ?>" aria-expanded="false" aria-controls="collapse<?php echo $tag; ?>">
                                        <?php echo cut_menu_name($menuARR[0]); ?>
                                    </div>
                                    <div class="card-body collapse input-group rounded" id="collapse<?php echo $tag; ?>">
                                        <form input method="post" action="
                                        <?php
                                        if(isset($_POST[$tag.'_submit'])){
                                            require_once(plugin_dir_path(__DIR__).'/functions/func_menu.php');
                                            rename_menu(cut_menu_name($menuARR[0]),$_POST['name'],'menu');
                                        }
                                        ?>">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="name" style="max-width:6em; min-width:7em;">Menü-Titel</span>
                                                <input type="text" name="name" class="form-control" value="<?php echo cut_menu_name($menuARR[0]); ?>" aria-describedby="name" style="min-width:23em;">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" style="max-width:6em; min-width:7em;">Menü-Url</span>
                                                <input type="text" class="form-control" disabled value="<?php echo get_menu_url($menuARR);?>" style="min-width:23em;">
                                            </div>
                                            <div class="container">
                                            <?php
                                            $run = 0;
                                            foreach(array_keys($roles['administrator']['capabilities']) as $capability){
                                                if($run==0){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="form-checkbox" type="radio" name="capability" value="<?php echo $capability; ?>" <?php if($menuARR[1]==$capability){ echo 'checked'; } ?>>
                                                            <label class="pe-1" style="vertical-align:top"><?php echo $capability; ?></label>
                                                        </div>
                                                    <?php
                                                    $run=1;
                                                }
                                                else{
                                                    ?>
                                                        <div class="col">
                                                            <input class="form-checkbox" type="radio" name="capability" value="<?php echo $capability; ?>" <?php if($menuARR[1]==$capability){ echo 'checked'; } ?>>
                                                            <label class="pe-1" style="vertical-align:top"><?php echo $capability; ?></label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $run=0;
                                                }
                                            }
                                            if($run==1) { echo '</div>'; };
                                            ?>
                                            </div>
                                            <?php
                                            if(is_function_activated('custom_menus')) {
                                            ?>
                                            <div class="pt-3">
                                                <button name="<?php echo $tag; ?>_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                            $index++;
                        }
                    ?>
                    </div>
                    <div class="col-6">
                        <?php
                        global $submenu, $wp_roles;
                        $roles = $wp_roles->roles;
                        $index = 0;
                        require_once(plugin_dir_path(__DIR__).'functions/func_menu.php');
                        foreach($submenu as $sub){
                            foreach($sub as $menuArr){
                                if($menuArr[0] != ""){
                                    $tag = "submenu".$index;
                                    ?>
                                    <div class="card p-0">
                                        <div class="card-header rounded bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $tag; ?>" aria-expanded="false" aria-controls="collapse<?php echo $tag; ?>">
                                            <?php echo cut_menu_name($menuArr[2]).": ".cut_menu_name($menuArr[0]); ?>
                                        </div>
                                        <div class="card-body collapse input-group rounded" id="collapse<?php echo $tag; ?>">
                                            <form input method="post" action="
                                            <?php
                                            if(isset($_POST[$tag.'_submit'])){
                                                //Has to be set
                                            }
                                            ?>">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="name" style="max-width:6em; min-width:7em;">Menü-Titel</span>
                                                    <input type="text" name="name" class="form-control" value="<?php echo cut_menu_name($menuArr[0]); ?>" aria-describedby="name" style="min-width:23em;">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" style="max-width:6em; min-width:7em;">Menü-Url</span>
                                                    <input type="text" class="form-control" disabled value="<?php echo get_menu_url($menuArr);?>" style="min-width:23em;">
                                                </div>
                                                <div class="container">
                                                    <?php
                                                    $run = 0;
                                                    foreach(array_keys($roles['administrator']['capabilities']) as $capability){
                                                        if($run==0){
                                                            ?>
                                                            <div class="row">
                                                            <div class="col">
                                                                <input class="form-checkbox" type="radio" name="capability" value="<?php echo $capability; ?>" <?php if($menuARR[1]==$capability){ echo 'checked'; } ?>>
                                                                <label class="pe-1" style="vertical-align:top"><?php echo $capability; ?></label>
                                                            </div>
                                                            <?php
                                                            $run=1;
                                                        }
                                                        else{
                                                            ?>
                                                            <div class="col">
                                                                <input class="form-checkbox" type="radio" name="capability" value="<?php echo $capability; ?>" <?php if($menuARR[1]==$capability){ echo 'checked'; } ?>>
                                                                <label class="pe-1" style="vertical-align:top"><?php echo $capability; ?></label>
                                                            </div>
                                                            </div>
                                                            <?php
                                                            $run=0;
                                                        }
                                                    }
                                                    if($run==1) { echo '</div>'; };
                                                    ?>
                                                </div>
                                                <?php
                                                if(is_function_activated('custom_menus')) {
                                                    ?>
                                                    <div class="pt-3">
                                                        <button name="<?php echo $tag; ?>_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                                                    </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $index++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(is_function_activated('custom_colors')){ wp_enqueue_style('super-style',plugin_dir_url(__DIR__).'/styles/style.css'); }
?>
>>>>>>> Stashed changes
