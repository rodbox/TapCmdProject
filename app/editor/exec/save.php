<?php

    /**
    * TODO : enregistrement du fichier mais en créant une securité d'archive et/ ou de lockage
    **/

$app = new app();



    // exec name
    if (file_put_contents($dir, $content)) {
        if ($_SESSION['app']['sui']['sync'] ?? false =="true")
            $uploadFile = $app->uploadFile($dir);

        $r = [
            'infotype' => "success",
            'msg'      => "<strong><i class='fa fa-floppy-o'></i> ".basename($dir)."</strong> enregistré",
            'id'       => $id
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec name ",
            'data'     => ''
        ];
    }
?>