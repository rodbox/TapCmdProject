<?php
    /**
     * palettes
     */

    $dir = $img_name.'-palette.json';
    $c->setJson($dir,$palette);

    if (true) {
    $dataView    = [];
        $target      = [
            '#debug' => $c->viewsAsync('app', 'default', $dataView)
        ];

        $cb          = 'defaut';
        $a           = 'append';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec palettes",
            'data'     => $dataView,
            'target'   => $target,
            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec palettes  ",
            'data'     => ''
        ];
    }
?>