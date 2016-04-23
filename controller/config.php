<?php

define("TITLE", "Rodbox DeepTap");

define("DIR_PROJECT", "/Applications/MAMP/htdocs");
define("WEB_PROJECT", "http://localhost:8888");

define("DEFAULT_PROJECT", "__rodbox_sources__");

define("WEB_SRC", "http://localhost:8888/___cmd___");
define("REL_SRC", ".");

define("DIR_SRC", DIR_PROJECT."/___cmd___");

define("DIR_APP", DIR_SRC."/app");
define("WEB_APP", WEB_SRC."/app");

define("APP_LOADER", DIR_APP."/app-loader.php");

define("COMPOSER", DIR_SRC."/vendor/autoload.php");

define("WEB_PAGE", WEB_SRC."/app/page.php");
define("WEB_MODEL", WEB_SRC."/app/model.php");
define("WEB_VIEW", WEB_SRC."/app/view.php");
define("WEB_EXEC", WEB_SRC."/app/exec.php");

define("DIR_VAR", DIR_SRC."/var");
define("WEB_VAR", WEB_SRC."/var");

define("DIR_TEMPLATE", DIR_VAR."/templates");
define("DIR_CMDS", DIR_VAR."/cmd");

define("DIR_PROJECTS", DIR_VAR."/project");
define("DIR_MANAGE", DIR_PROJECTS);

define("WEB_PROJECTS", WEB_VAR."/project");

define("DIR_TMP", DIR_VAR."/tmp");

define("WEB_COMBO", WEB_APP."/exec_combo.php");

define("WEB_TICTAC", WEB_APP."/tictac.php");
define("DIR_TICTAC", DIR_VAR."/tictac");


define("WEB_OVERIDES", WEB_APP."/overides");
define("DIR_OVERIDES", DIR_VAR."/overides");

define("DIR_EDITOR", "/Applications/Utilitaires/Sublime Text.app");
define("TERMINAL", "/Applications/Utilities/Terminal.app");

define("DIR_TOOLS", DIR_SRC."/assets/paper/tools");

define("SOFT", [
    "PHOTOSHOP"   => "Adobe Photoshop CC.app",
    "ILLUSTRATOR" => "Adobe Illustrator.app"
    ]);

 # on attribut un editeur en fonction de l'extension
define("EDITOR", [
    'default'         => 'default',
    'xls'             => 'default',
    'csv'             => 'default',
    'sh'              => 'code',
    'bat'             => 'code',
    'txt'             => 'txt',
    'md'              => 'txt',
    'pdf'             => 'pdf',
    'svg'             => 'img',
    'jpg'             => 'img',
    'jpeg'            => 'img',
    'png'             => 'img',
    'gif'             => 'img',
    'php'             => 'code',
    'yml'             => 'code',
    'twig'            => 'code',
    'js'              => 'code',
    'css'             => 'code',
    'less'            => 'code',
    'html'            => 'code',
    'htm'             => 'code',
    'json'            => 'code',
    'xml'             => 'code',
    'ini'             => 'code',
    'mp3'             => 'player',
    'wav'             => 'player',
    'zip'             => 'zip',
    'sublime-snippet' => 'code'
]);

    # on attribut la source a envoyer a l'editeur en fonction de son type.
define("EDITOR_SRC", [
    'default' => 'content',
    'txt'     => 'content',
    'pdf'     => 'web',
    'img'     => 'web',
    'code'    => 'content',
    'zip'     => 'dir'
]);

// SETTING

define('TRANS_SETTING', [
    'en'=>'en',
    'fr'=>'fr',
    'de'=>'de',
    'es'=>'es',
    'it'=>'it'
]);


define("PROJECT_TYPE",[
    "Symfony" => "Symfony",
    "Rodbox"  => "Rodbox"
    ]);

define("CSS_SETTING_COLORS", [
    'body'      => ['#ecf0f1','#242424'],
    'primary'   => ['#2980b9','#fff'],
    'danger'    => ['#C0272D','#fff'],
    'info'      => ['#008C9A','#fff'],
    'warning'   => ['#f39c12','#fff'],
    'inverse'   => ['#242424','#ecf0f1'],
    'secondary' => ['#bdc3c7','#242424']
    ]);

define("CSS_SETTING_VARS", [
    'padSize'      => '5'
    ]);

?>