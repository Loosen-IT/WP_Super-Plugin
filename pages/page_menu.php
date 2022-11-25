<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<div class="container-fluent pt-3" style="background-color:<?php get_database_value('super_color','color_back')?>">
    <div class="row px-2">
        <div class="col">
            <h2>Übersicht</h2>
            <label class="pb-4">Dies ist das Hauptmenü des Super-Plugins. Hier können die einzelnen Funktionen aktiviert und deaktiviert werden.<br>
               Die Übersicht wird nur Benutzern mit der Capability "edit_plugins" angezeigt.</label>
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