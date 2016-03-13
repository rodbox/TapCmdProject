<?php

$dir_new_project = DIR_PROJECTS.'/'.$name.'.json';

if (!file_exists($dir_new_project)) {
    file_put_contents($dir_new_project, '');

    $r = [
        'infotype' => "success",
        'msg'      => "ok"
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "Fichier existe",
        'data'     => ''
    ];
}
 ?>