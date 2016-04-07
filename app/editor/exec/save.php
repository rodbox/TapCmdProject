<?php

    /**
    * TODO : enregistrement du fichier mais en créant une securité d'archive et/ ou de lockage
    **/

$app = new app();



    // exec name
    if (file_put_contents($dir, $content)) {
        if ($_SESSION['app']['sui']['sync']=="true")
            $uploadFile = $app->uploadFile($dir);

        $r = [
            'infotype' => "success",
            'msg'      => "ok exec name",
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