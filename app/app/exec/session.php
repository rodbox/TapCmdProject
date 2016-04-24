<?php
    /**
     * session
     */

    $_SESSION['val'][$id] = $value;

    if (true) {
    $dataView    = [];
        $target      = [
            '#debug' => $c->viewsAsync('app', 'default', $dataView)
        ];

        $cb          = 'defaut';
        $a           = 'append';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec session",
            'data'     => $dataView,
            'target'   => $target,
            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec session ",
            'data'     => ''
        ];
    }
?>
