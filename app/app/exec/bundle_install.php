<?php
    /**
     * bundle install
     */

    $app            = new app();

    $app->pushBundle($bundles);

    if (true) {
    $dataView    = [];

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec bundle install"
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec bundle install ",
            'data'     => ''
        ];
    }
?>