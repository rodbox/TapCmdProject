<?php
    /**
     * IP
     */


    if (true) {
    $dataView    = [];

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec IP : ".$_POST['ip']
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec IP ",
            'data'     => ''
        ];
    }
?>