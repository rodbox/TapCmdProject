<?php
    /**
     * Ajoute une traduction au fichier principale du projet
     */

    $app = new $app();

    foreach ($value as $lang => $value)
        $list[$lang] = $app->addTrans($index, $value, $lang);

    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "ok trans push",
            'data'     => $list
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error trans push ",
            'data'     => ''
        ];
    }
?>