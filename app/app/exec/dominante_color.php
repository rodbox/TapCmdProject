<?php
    /**
     * dominante Color
     */
    $img = new img();

    $color = $img->getMyColor($file);
    if (true) {
    $dataView    = [];
        $target      = [
            '#debug' => $c->viewsAsync('app', 'default', $dataView)
        ];

        $cb          = 'default';
        $a           = 'append';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec dominante Color",
            'data'     => $color

        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec dominante Color ",
            'data'     => ''
        ];
    }
?>