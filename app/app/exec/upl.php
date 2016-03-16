<?php
    /**
     * Upload par le ftp le fichier zip d'un projet
     */

    // $app = new app();

    if(!isset($_GET['combo'])){
        $dir_zip     = DIR_TMP.'/'.$name.'.zip';
        $file_zip    = $name.'.zip';


    }
    $upl        = date('d m Y H:i:s');

    $app->uploadProject($name, $dir_zip, $file_zip);

    if (true) {
        $r = [
            'infotype' => 'success',
            'msg'      => 'ok upl',
            'data'     => '',
            'upl'      => $upl,
            'name'     => $name,
            'dir_zip'  => $dir_zip,
            'file_zip' => $file_zip
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