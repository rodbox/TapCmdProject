<?php

define("SEP", "/");

// a definir
define("DIR_VHOST", "/Applications/MAMP/htdocs");

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
    0 => 'curl https://getcomposer.org/composer.phar > composer.phar<br>
    php composer.phar require stof/doctrine-extensions-bundle "^1.2"<br>
    php composer.phar require doctrine/doctrine-fixtures-bundle "@dev"<br>
    php composer.phar require friendsofsymfony/user-bundle "~2.0@dev"<br>
    php composer.phar require friendsofsymfony/jsrouting-bundle "^1.5"<br>
    php composer.phar require coresphere/console-bundle "@dev"<br>
    php composer.phar require picqer/php-barcode-generator "@dev"<br>
    php composer.phar require rodbox/rodboxcore "@dev"<br>
    php composer.phar require rodbox/rodboxbower "@dev"<br>
    php composer.phar require rodbox/rodboxtrans "@dev"<br>
    php composer.phar require rodbox/rodboxmenu "@dev"<br>
    php composer.phar require rodbox/rodboxfront "@dev"<br>
    php composer.phar require rodbox/rodboxuser "@dev"<br>
    php composer.phar require rodbox/rodboxnote "@dev"<br>
    php composer.phar require rodbox/rodboxadmin "@dev"<br>
    php composer.phar require rodbox/rodboxblog "@dev"<br>
    php composer.phar require rodbox/rodboxdev "@dev"<br>
    php bin/console generate:bundle --namespace=APP/FrontBundle --bundle-name=FrontBundle --format=annotation<br>'
    ,
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
    bower install handsontable<br>
    ',
    3=> 'php bin/console generate:controller --controller=AdminBundle:AdminInput --template-format=twig --route-format=annotation<br>',
    ]
    )
 ?>