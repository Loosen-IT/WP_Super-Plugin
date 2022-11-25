<?php
require_once(plugin_dir_path(__DIR__).'/database/data_control.php');
?>
<link href="<?php echo plugin_dir_url(__DIR__).'/pages/styles/bootstrap.css'; ?>" rel="stylesheet">
<div class="container-fluent pt-3" style="background-color:<?php get_database_value('super_color','color_back')?>">
    <div class="row px-2 pb-4 pe-4">
        <div class="col">
            <h2>Impressum</h2>
            <label class="pb-1">
                Das Super-Plugin und der dazugehörgige Quellcode ist, auch wenn es keine Verifizierung gibt, ein Lizenzprodukt und das geistige Eigentum von Loosen-IT.
                Entwickler und Lizenzinhaber räumen sich das Recht ein, dass die gewerbliche Nutzung und Verbreitung des Quellcodes ausschließlich dem Lizenzurheber und
                Lizenzinhabern vorbehalten ist. Die gewerbliche Nutzung beinhaltet Vermarktung und Nutzung des Plugins in jeglichen betrieblichen Arbeitsprozessen.
                Die Verbreitung des Quellcodes beginnt bereits beim Kopieren des Codes auf einen beliebigen digitalen oder analogen Datenträger.
            </label>
            <br>
            <label class="pb-1">
                Das Plugin enthält verschiedene Sicherheitsmaßnahmen, welche aktiviert werden können. Diese erhöhen die Sicherheit der Website, bieten aber keinen
                allumfassenden Schutz. Wordpress beinhaltet weiterhin potentielle Angriffsflächen, welche durch das Plugin nicht abgesichert werden.
                Dementsprechend kann der Lizenzurheber keine Sicherheitsgarantien aussprechen und tritt diesbezüglich von einer Haftungspflicht zurück.
                Dieser Umstand wird aber auch in den entsprechenden Menüs klar kommuniziert.
            </label>
            <br>
            <label class="pb-1">
                Das Super-Plugin ist ein hoch-individualisiertes Produkt und ist in enger Zusammenarbeit mit dem unten aufgelisteten Lizenzinhaber entstanden.
                Das Lizenzprodukt ist eine Anwendungs-Erweiterung: Der Wordpress-Quellcode bleibt unverändert.
            </label>
            <br>
            <label>
                Nutzungs- und Vermarktungslizenzen können bei den unten aufgelisteten Lizenzurheber und Lizenzinhaber erworben werden.
            </label>
        </div>
    </div>
    <div class="row p-2 pb-3 pe-4">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="card">
                <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/loosen-it.png'; ?>" height="240" width="" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Lizenzurheber</h3>
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
                <img src="<?php echo plugin_dir_url(__DIR__).'/pages/source/feldmann.jpg'; ?>" height="240" width="500" class="card-img-top">
                <div class="card-body">
                    <h2 class="card-title">Lizenzinhaber</h2>
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
<?php
?>