<?php
    /**
     * routes
     */
    $url      = 'http://localhost:8000/dev';

    $routes   = $c->getRest($url,['req'=>'routes']);
    $bundles  = $c->getRest($url,['req'=>'bundles']);
    $services = $c->getRest($url,['req'=>'services']);
    // $routes = $rest['routes']['data'];

    if (true) {
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec routes",

            'routes'   => $routes,
            'bundles'  => $bundles,
            'services' => $services
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec routes ",
            'data'     => ''
        ];
    }
?>