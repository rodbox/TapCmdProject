<?php

define("DIR_PROJECT", "/Applications/MAMP/htdocs");
define("WEB_PROJECT", "http://localhost:8888");

define("WEB_SRC", "http://localhost:8888/___cmd___");
define("DIR_EDITOR", "/Applications/Utilitaires/Sublime Text.app");
define("TERMINAL", "/Applications/Utilities/Terminal.app");
define("SOFT", [
    "PHOTOSHOP"   => "Adobe Photoshop CC.app",
    "ILLUSTRATOR" => "Adobe Illustrator.app"
    ]);
define("PROCESS", [
    '
    composer require stof/doctrine-extensions-bundle "^1.2"<br>
    composer require doctrine/doctrine-fixtures-bundle "@dev"<br>
    composer require friendsofsymfony/user-bundle "~2.0@dev"<br>
    composer require friendsofsymfony/jsrouting-bundle "^1.5"<br>
    composer require coresphere/console-bundle "@dev"<br>
    composer require rodbox/rodboxcore "@dev"<br>
    composer require rodbox/rodboxbower "@dev"<br>
    composer require rodbox/rodboxtrans "@dev"<br>
    composer require rodbox/rodboxmenu "@dev"<br>
    composer require rodbox/rodboxfront "@dev"<br>
    composer require rodbox/rodboxuser "@dev"<br>
    composer require rodbox/rodboxnote "@dev"<br>
    composer require rodbox/rodboxadmin "@dev"<br>
    composer require rodbox/rodboxblog "@dev"<br>
    composer require rodbox/rodboxdev "@dev"<br>
    php bin/console generate:bundle --namespace=APP/FrontBundle --bundle-name=FrontBundle --format=annotation<br>'
    ])
 ?>