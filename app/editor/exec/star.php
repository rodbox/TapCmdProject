<?php
    /**
     * Ajoute un lien star dans le workspace
     * @var app
     */

    $app = new app();
    // $dirStars  = $app->dir().'/stars.json';

    $star = $app->addWorkspace('star',$dir);
    // $star[] = $dir;
    // $c->setJson($dirStars, $star);

    if (true) {

        $r = [
            'infotype' => "success",
            'msg'      => "ok star",
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