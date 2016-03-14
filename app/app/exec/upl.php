<?php
    /**
     * Upload par le ftp le fichier zip d'un projet
     */

    $app = new app();

    $dir_zip     = DIR_TMP.'/'.$project.'.zip';
    $file_zip    = $project.'.zip';

    $app->uploadProject($project, $dir_zip, $file_zip);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok upl",
        'data'     => ''
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error upl ",
        'data'     => ''
    ];
}
?>