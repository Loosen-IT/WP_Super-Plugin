<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<div class="container-fluent pt-3" style="background-color:<?php get_database_value('super_color','color_back')?>">
    <div class="row px-2">
        <div class="col">
            <h3>Übersicht</h3>
            <label class="pb-4">Dies ist das Hauptmenü des Super-Plugins. Hier können die einzelnen Funktionen aktiviert und deaktiviert werden.<br>
               Die Übersicht wird nur Benutzern mit der Capability "edit_plugins" angezeigt.</label>
        </div>
    </div>
    <div class="row p-2 pb-3 pe-4">
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h5 class="pt-2">Quick-Copy</h5>
                <span>Ermöglicht es in der Tabellenansicht der Pages bzw. Posts schnell Beiträge zu kopieren.</span>
                <form class="py-2" method="post" action="
                <?php
                if(isset($_POST['copy_submit'])){
                    set_database_value('super_main', 'quick_copy_pages', isset($_POST['copy_pages']));
                    set_database_value('super_main', 'quick_copy_posts', isset($_POST['copy_posts']));
                }
                ?>">
                    <input type="checkbox" name="copy_pages" <?php if(is_function_activated('quick_copy_pages')) { echo 'checked'; } ?>><label style="vertical-align:top; padding-left:0.5em;">Schnelles Kopieren für Pages</label><br>
                    <input type="checkbox" name="copy_posts" <?php if(is_function_activated('quick_copy_posts')) { echo 'checked'; } ?>><label style="vertical-align:top; padding-left:0.5em;">Schnelles Kopieren für Posts</label><br>
                    <div class="pt-3 pb-1">
                        <button name="copy_submit" class="btn btn-secondary" type="submit">Bestätige</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h6 class="pt-2">More is coming soon...</h6>
            </div>
        </div>
    </div>
    <div class="row p-2 pb-3 pe-4">
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h6 class="pt-2">More is coming soon...</h6>
            </div>
        </div>
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h6 class="pt-2">More is coming soon...</h6>
            </div>
        </div>
    </div>
    <div class="row p-2 pb-3 pe-4">
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h6 class="pt-2">More is coming soon...</h6>
            </div>
        </div>
        <div class="col-6">
            <div class="container bg-light rounded border">
                <h6 class="pt-2">More is coming soon...</h6>
            </div>
        </div>
    </div>
</div>
<?php
?>