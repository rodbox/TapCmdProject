<?php

    /**
    * TODO : enregistrement du fichier mais en créant une securité d'archive et/ ou de lockage
    **/



    // exec name
    if (file_put_contents($dir, $content)) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok exec name",
            'data'     => '',
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