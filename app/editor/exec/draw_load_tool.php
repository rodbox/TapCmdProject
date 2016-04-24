<?php
    /**
     * load tool
     */

    $menu = $c->viewsAsync("editor","editors/menu/tools/".$toolName);

    if (true) {
    $dataView    = [];
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec load tool",
            'a'   => 'html',
            'target'   => ['#toolMenu'=>$menu]
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec load tool ",
            'data'     => ''
        ];
    }
?>