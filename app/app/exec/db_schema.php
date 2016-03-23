<?php
    /**
     * Créer un nouveau fichier de projet
     */

    $app = new app();


    $cmd  = "php ".DIR_PROJECT."/".app::cur()."/bin/console doctrine:schema:create --dump-sql";

    $dump = shell_exec($cmd);

    file_put_contents($app->dir().'/db-schema.sql',$dump);

    $r = [
        'infotype' => "success",
        'msg'      => "Fichier existe",
        'data'     => $dump
    ];
 ?>