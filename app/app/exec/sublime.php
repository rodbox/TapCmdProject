<?php
    /**
     * sublime
     */

    $app = new app();
    $dir = $app->dirManage();
    $cur = $app->cur();
    $cmd = 'open '.$dir.'/'.$cur.'.sublime-project';
    $out = shell_exec($cmd);

    if (true) {
    $dataView    = [];
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec sublime",
            'out'      => $cmd
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec sublime ",
            'data'     => ''
        ];
    }
?>