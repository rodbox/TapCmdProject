<?php
    /**
     * Retire un element du workspace
     */

    $app = new app();

    $ws = $app->delWorkspace($index, $key);
    $app->delWorkspace('pane', $key);

    if (true) {


        $r = [
            'infotype' => "success",
            'dirStars' => "",
            'target'   => [
                '#files-workspace'  => $c->viewsAsync('editor','files-workspace','workspace')
            ],
            'a'=>'replaceWith'
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error star ",
            'data'     => ''
        ];
    }
?>