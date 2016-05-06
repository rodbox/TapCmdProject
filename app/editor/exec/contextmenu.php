<?php
    /**
     * contextmenu
     */


    if (true) {
    $dataView    = [];


        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec contextmenu",
            'data'     => $dataView,
            'menu'   => $c->viewsAsync('editor', 'editors/menu/context/'.$menu, $data),

        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec contextmenu ",
            'data'     => ''
        ];
    }
?>