<?php
    /**
     * Retire un element du workspace
     */

    $app = new app();
    // $dirStars  = $app->dir().'/stars.json';

    // $star = $c->getJson($dirStars);
    // unset($star[$key]);
    // $c->setJson($dirStars, $star);

    // $ws = $app->delWorkspace($index, $key);
    $app->addWorkspace('pane',$pane, $id, true);

// $ws      = $app->setWorkspace($ws);

// $app->addWorkspace('open',$dir.'/'.$file, $id_replace);
    if (true) {


        $r = [
            'infotype' => "success",
            'ws' => $ws
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