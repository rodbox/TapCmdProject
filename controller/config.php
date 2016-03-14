<?php

define("TITLE", "Rodbox DeepTap");

define("DIR_PROJECT", "/Applications/MAMP/htdocs");
define("WEB_SRC", "http://localhost:8888/___cmd___");

define("DIR_SRC", DIR_PROJECT."/___cmd___");

define("DIR_APP", DIR_SRC."/app");
define("WEB_APP", WEB_SRC."/app");

define("APP_LOADER", DIR_APP."/app-loader.php");




define("WEB_PAGE", WEB_SRC."/app/page.php");
define("WEB_MODEL", WEB_SRC."/app/model.php");
define("WEB_VIEW", WEB_SRC."/app/view.php");
define("WEB_EXEC", WEB_SRC."/app/exec.php");

define("DIR_VAR", DIR_SRC."/var");

define("DIR_TEMPLATE", DIR_VAR."/templates");
define("DIR_CMDS", DIR_VAR."/cmd");
define("DIR_PROJECTS", DIR_VAR."/project");

define("DIR_TMP", DIR_VAR."/tmp");

define("WEB_COMBO", WEB_APP."/exec_combo.php");

define("WEB_TICTAC", WEB_APP."/tictac.php");
define("DIR_TICTAC", DIR_VAR."/tictac");

?>