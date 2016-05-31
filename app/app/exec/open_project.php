<?php
    /**
     * Ouvre le dossier du projet
     */

    $app = new app();

    $dir = ($force == "true")?$app->dir():$app->dirProject();

    $r = [
        'infotype' => "success",
        'msg'      => "ok sys",
        'data'     => shell_exec('open '.$dir)
    ];
 ?>