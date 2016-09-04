<?php

define("SEP", "\\");

// a definir
define("DIR_VHOST", "C:/wamp64/bin/apache/apache2.4.17/conf/");

define("DIR_PROJECT", "C:/wamp64/www/");
define("WEB_PROJECT", "http://localhost");

define("WEB_SRC", "http://localhost/___cmd___");
define("DIR_EDITOR", "C:\Program Files\Sublime Text 3\sublime_text.exe");
define("TERMINAL", "C:\Windows\System32\cmd.exe");
define("SOFT", [
    "PHOTOSHOP"   => "Adobe Photoshop CC.app",
    "ILLUSTRATOR" => "Adobe Illustrator.app"
    ]);
define("PROCESS", [
    0 => 'composer require stof/doctrine-extensions-bundle "^1.2"<br>
    composer require doctrine/doctrine-fixtures-bundle "@dev"<br>
    composer require friendsofsymfony/user-bundle "~2.0@dev"<br>
    composer require friendsofsymfony/jsrouting-bundle "^1.5"<br>
    composer require coresphere/console-bundle "@dev"<br>
    composer require picqer/php-barcode-generator "@dev"<br>
    composer require lexik/form-filter-bundle "@dev"<br>
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
    php bin/console generate:bundle --namespace=APP/FrontBundle --bundle-name=FrontBundle --format=annotation<br>',
    1 => 'php bin/console generate:bundle --namespace=APP/AdminBundle --bundle-name=AdminBundle --format=annotation<br>',
    2 => 'bower install jquery<br>
    bower install bootstrap#v4.0.0-alpha.2<br>
    bower install tether<br>
    bower install summernote<br>
    bower install https://github.com/Nanakii/summernote-plugins.git<br>
    bower install select2<br>
    bower install https://github.com/FaroeMedia/selectator.git<br>
    bower install https://github.com/moxiecode/plupload.git<br>
    bower install font-awesome<br>
    bower install https://github.com/fat/zoom.js.git<br>
    bower install velocity<br>
    bower install codemirror<br>
    bower install notiny<br>
    bower install clipboard<br>
    bower install html.sortable --save<br>
    bower install https://code.jquery.com/jquery-3.0.0.min.js<br>
    bower install https://github.com/jquery/jquery-migrate.git<br>
    bower install mustache<br>
    bower install mustache-wax<br>
    bower install bootstrap-touchspin<br>
    bower install handsontable<br>
    bower install bootstrap-touchspin<br>
    ',
    3=> 'php bin/console generate:controller --controller=AdminBundle:AdminInput --template-format=twig --route-format=annotation<br>',
    ])
 ?>