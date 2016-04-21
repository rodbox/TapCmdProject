<?php

    $app    = new app();

    $json   = $file.'.json';

    // exec name
    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "<strong><i class='fa fa-floppy-o'></i> ".basename($file)."</strong> enregistré",
            'project'   => $c->getJson($json)
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