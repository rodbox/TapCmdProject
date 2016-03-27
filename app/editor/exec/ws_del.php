<?php
    /**
     * Retire un element du workspace
     */

    $app = new app();
    // $dirStars  = $app->dir().'/stars.json';

    // $star = $c->getJson($dirStars);
    // unset($star[$key]);
    // $c->setJson($dirStars, $star);

    $ws = $app->delWorkspace($index, $key);

    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok star",
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