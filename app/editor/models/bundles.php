<?php
    $app           = new app();
    $dir_index     = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
    $bundles       = $c->getJson($dir_index);

    $d['vendor']   = array_keys($bundles['vendor']);
    $d['src']      = array_keys($bundles['src']);
    $d['overides'] = ['controller','views'];
 ?>