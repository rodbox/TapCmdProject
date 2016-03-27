<?php





    $app          = new app();

    $dir_index    = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
    $bundlesIndex = $c->getJson($dir_index);

    $bundle       = $bundlesIndex['vendor'][$bundle];

    //
    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok overide",
            'data'     => $c->viewsAsync('editor','overides-list', $bundle)
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error overide ",
            'data'     => ''
        ];
    }
?>