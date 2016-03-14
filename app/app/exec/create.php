<?php

    /**
     * Créer un nouveau fichier de projet
     */

$dir_new_project = DIR_PROJECTS.'/'.$name.'.json';

if (!file_exists($dir_new_project) || $force ?? false) {
    file_put_contents($dir_new_project, '');

    $r = [
        'infotype' => "success",
        'msg'      => "ok",
        'force'    => $force
    ];

    if ($new ?? false) {
        /**
        * TODO : si la variable new est true on install le projet depuis le dossier template
        **/
        $r['new'] = $name;
        mkdir(DIR_PROJECT.'/'.$name);
    }
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "Fichier existe",
        'data'     => ''
    ];
}
 ?>