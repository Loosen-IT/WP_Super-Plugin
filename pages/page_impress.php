<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<style type="text/css">
    body { background: <?php echo get_database_value('super_colors', 'color_back'); ?> !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>
<div class="container-fluent pt-3 pe-3">
    <div class="row px-2 pe-4">
        <div class="col">
            <h5>Lizensierung</h5>
            <label class="pb-2">
                Das Super-Plugin und der dazugehörgige Quellcode ist, auch wenn es keine Verifizierung gibt, ein Lizenzprodukt und das geistige Eigentum von Loosen-IT (i.f. Lizenzurheber).
                Der Lizenzurheber räumt sich das Recht ein, dass die gewerbliche Nutzung und Verbreitung des Quellcodes ausschließlich Loosen-IT selbst und
                Lizenzinhabern vorbehalten ist. Die gewerbliche Nutzung beinhaltet die Vermarktung und Nutzung des Plugins in jeglichen betrieblichen Arbeitsprozessen.
                Die Verbreitung des Quellcodes beginnt bereits mit dem Kopieren des Codes auf einen beliebigen digitalen oder analogen Datenträger.
            </label>
            <br>
            <label class="pb-2">
                Das Super-Plugin ist ein hoch-individualisiertes Produkt und ist in enger Zusammenarbeit mit dem unten aufgelisteten Lizenzinhaber entstanden.
                Das Lizenzprodukt ist eine Anwendungs-Erweiterung: Der Wordpress-Quellcode bleibt unverändert. Nutzungs- und Vermarktungslizenzen können bei dem
                unten aufgelisteten Lizenzurheber oder dem Lizenzinhaber erworben werden.
            </label>
        </div>
    </div>
    <div class="row p-2 pb-4 pe-4">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="card">
                <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/loosen-it.png'; ?>" class="rounded mx-auto d-block card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Lizenzurheber</h5>
                    <label>
                        <a href="https://loosen-it.de">Loosen-IT</a><br>
                        Jan-Niclas Loosen <br>
                        Weingartenstraße 34 <br>
                        56854 Ernst <br>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/feldmann.png'; ?>" class="rounded mx-auto d-block card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Lizenzinhaber</h5>
                    <label>
                        <a href="https://feldmannservices.de/">FeldmannServices e.K.</a><br>
                        Dennis Feldmann <br>
                        Schüllerplatz 1 <br>
                        56070 Koblenz <br>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row px-2 pe-4 pt-4">
        <div class="col">
            <h5>Haftungsausschluss</h5>
            <label class="pb-2">
                Wordpress ist eine komplexe Anwendung, welche regelmäßig aktualisiert und in der Regel durch weitere Plugins ergänzt wird.
                Dadurch können, auch wenn der Lizenzurheber um eine Vermeidung bemüht ist, Inkompatibilitäten und Fehler nicht ausgeschlossen werden.
                Sowohl Lizenzurheber, als auch Lizenzinhaber, haften nicht für Schäden, insbesondere nicht für unmittelbare oder mittelbare Folgeschäden,
                Datenverlust, entgangenen Gewinn, System- oder Produktionsausfälle, die durch die Nutzung des Super-Plugins entstehen. Liegt bei einem entstandenen
                Schaden durch die Nutzung des Super-Plugins Vorsatz oder grobe Fahrlässigkeit vor, gilt der Haftungsausschluss nicht.
                Dieser Sachverhalt wird auch in den Lizenzverträgen klar kommuniziert.
            </label>
            <label class="pb-2">
                Desweiteren stellt das Super-Plugin Sicherheitsfunktionen zur Verfügung. Diese bieten aber keinen allumfassenden Schutz.
                Wordpress beinhaltet weiterhin potentielle Angriffsflächen, welche nicht durch dieses Plugin gesichert werden.
                Auch hier ist, wie im letzten Absatz bereits beschrieben, keine Funktionalitätsgarantie gegeben. Dieser Sachverhalt wird in den
                entsprechenden Menüs nocheinmal hervorgehoben.
            </label>
        </div>
    </div>
<?php
if(is_function_activated('custom_colors')){ wp_enqueue_style('super-style',plugin_dir_url(__DIR__).'/styles/style.css'); }
?>