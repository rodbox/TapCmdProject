<?php
    use Symfony\Component\Finder\Finder;

    $app          = new app();
    $finder       = new Finder();
    $file       = new file();


    $dir_index    = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
    $dir_archive  = DIR_OVERIDES.'/'.$bundle;


    $archives     = (is_dir($dir_archive))?$finder->in($dir_archive)->files():[];
    $archivesSrc  = (is_dir($dir_archive))?$file->dir($dir_archive):[];

    $bundlesIndex = $c->getJson($dir_index);

    $bundle       = $bundlesIndex['vendor'][$bundle];

    $data         = [
        'bundle'      => $bundle,
        'archives'    => $archives ?? [],
        'archivesSrc' => $archivesSrc ?? [],
        'dir_archive' => $dir_archive
    ];

    //
    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok overide",
            'data'     => $c->viewsAsync('editor','overides-list', $data),
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