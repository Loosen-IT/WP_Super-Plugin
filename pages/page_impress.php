<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/custom.css'; ?>" rel="stylesheet">
<style type="text/css">
    body { background: <?php echo get_database_value('super_colors', 'color_back'); ?> !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>
<div class="container-fluent pt-3 pe-3">
    <h5 class="px-2">Lizensierung</h5>
    <label class="pb-2 px-2">
        Das Super-Plugin und der dazugehörgige Quellcode ist, auch wenn es keine Verifizierung gibt, ein Lizenzprodukt von Loosen-IT (i.f. Lizenzurheber).
        Der Lizenzurheber räumt sich das Recht ein, dass die gewerbliche Nutzung und Verbreitung des Quellcodes ausschließlich Loosen-IT selbst und
        Lizenzinhabern vorbehalten ist. Die gewerbliche Nutzung beinhaltet die Vermarktung und Nutzung des Plugins in jeglichen betrieblichen Arbeitsprozessen.
        Die Verbreitung des Quellcodes beginnt bereits mit dem Kopieren des Codes auf einen beliebigen digitalen oder analogen Datenträger.
    </label>
    <br>
    <label class="pb-2 px-2">
        Das Super-Plugin ist ein hoch-individualisiertes Produkt und ist in enger Zusammenarbeit mit dem unten aufgelisteten Lizenzinhaber entstanden.
        Das Lizenzprodukt ist eine Anwendungs-Erweiterung: Der Wordpress-Quellcode bleibt unverändert und ist kein Teil der Lizenz. Nutzungs- und Vermarktungslizenzen können bei dem
        unten aufgelisteten Lizenzurheber oder dem Lizenzinhaber erworben werden.
    </label>
    <div class="row ps-2 pb-5">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="card">
                <a target="_blank" href="https://loosen-it.de">
                    <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/loosen-it.png'; ?>" class="rounded mx-auto d-block card-img-top">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Lizenzurheber</h5>
                    <label>
                        Loosen-IT (<a target="_blank" href="https://loosen-it.de">https://loosen-it.de</a>) <br><br>
                        Jan-Niclas Loosen <br>
                        info@loosen-it.de <br><br>
                        Weingartenstraße 34 <br>
                        56854 Ernst <br>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <a target="_blank" href="https://designraketen.de/">
                    <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/designraketen.png'; ?>" class="rounded mx-auto d-block card-img-top">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Lizenzinhaber</h5>
                    <label>
                        Designraketen GmbH (<a target="_blank" href="https://designraketen.de/">https://designraketen.de</a>) <br><br>
                        Dennis Feldmann <br>
                        info@designraketen.de <br><br>
                        Beatusstraße 50 <br>
                        56073 Koblenz <br>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <h5 class="px-2">Haftungsausschluss</h5>
    <label class="pb-2 px-2 pe-2">
        Wordpress ist eine komplexe Anwendung, welche regelmäßig aktualisiert und in der Regel durch weitere Plugins ergänzt wird.
        Dadurch können, auch wenn der Lizenzurheber um eine Vermeidung bemüht ist, Inkompatibilitäten und Fehler nicht ausgeschlossen werden.
        Sowohl Lizenzurheber, als auch Lizenzinhaber, haften nicht für Schäden, insbesondere nicht für unmittelbare oder mittelbare Folgeschäden,
        Datenverlust, entgangenen Gewinn, System- oder Produktionsausfälle, die durch die Nutzung des Super-Plugins entstehen. Liegt bei einem
        durch das Super-Plugin entstandenen Schaden Vorsatz oder grobe Fahrlässigkeit vor, gilt der Haftungsausschluss nicht.
    </label>
<?php
if(is_function_activated('custom_colors')){ wp_enqueue_style('super-style',plugin_dir_url(__DIR__).'/styles/style.css'); }
?>