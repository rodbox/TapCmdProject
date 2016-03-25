<?php

 use Symfony\Component\Finder\Finder;

    $app     = new app();
    $finder  = new finder();

    $dir     = DIR_PROJECT.'/'.$app->cur();

    $exclude = ['var','/web/assets','/web/bundles'];
    $bundles = [];
    $list    = [];
    $d       = [];



    // Filtre de dossier
    foreach ($exclude as $key => $value)
        $finder->notPath($value);

    // Regurlar ex by js
    // $finder->path('/'.$_GET['reg'].'/i');
    $finder->files()->name('#Bundle.php$#');
    $finder->in($dir);
    $bundles_controller = $finder;

    foreach ($bundles_controller as $key => $file) {
        $bundleController = $file->getRelativePathname();
        $info             = pathinfo($bundleController);
        extract($info);

        // $finder->in($dirname);

        // Les controllers
        $controllers       = [];
        $finderController  = new finder();
        $finderController->in($dir.'/'.$dirname)->files()->name('#Controller.php$#');
        $bundleControllers = $finderController;
        foreach ($bundleControllers as $keyCont => $fileCont)
            $controllers[]      = basename($fileCont->getRelativePathname());

        // Les commands
        $commands       = [];
        $finderCommand  = new finder();
        $finderCommand->in($dir.'/'.$dirname)->files()->name('#Command.php$#');
        $bundleCommands = $finderCommand;
        foreach ($bundleCommands as $keyCom => $fileCom)
            $commands[]      = basename($fileCom->getRelativePathname());

        // Les events
        $events       = [];
        $finderEvent  = new finder();
        $finderEvent->in($dir.'/'.$dirname)->files()->name('#Event.php$#');
        $bundleEvents = $finderEvent;
        foreach ($bundleEvents as $keyCom => $fileCom)
            $events[]      = basename($fileCom->getRelativePathname());

        // Les listeners
        $listeners    = [];
        $finderEvent  = new finder();
        $finderEvent->in($dir.'/'.$dirname)->files()->name('#Listener.php$#');
        $bundleEvents = $finderEvent;
        foreach ($bundleEvents as $keyList => $fileList)
            $listeners[]      = basename($fileList->getRelativePathname());


        // Les views
        $views      = [];
        if(is_dir($dir.'/'.$dirname.'/Resources/views')){
            $finderView = new finder();
            $finderView->in($dir.'/'.$dirname.'/Resources/views')->files();
            $bundleViews = $finderView;
            foreach ($bundleViews as $keyView => $fileView)
                $views[]      = $fileView->getRelativePathname();
        }

        $dirReadme1 = $dir.'/'.$dirname.'/README.md';
        $dirReadme2 = $dir.'/'.$dirname.'/README.markdown';

        if(file_exists($dirReadme1))
            $readme = $dirReadme1;
        else if(file_exists($dirReadme2))
            $readme = $dirReadme2;
        else
            $readme = '';


        $bundle           = [
            'dir'         => $dirname,
            'file'        => $basename,
            'bundle'      => $filename,
            'readme'      => $readme,
            'events'      => $events,
            'listeners'   => $listeners,
            'controllers' => $controllers,
            'commands'    => $commands,
            'views'       => $views
        ];


        //si c'est un bundle de vendor
        if(preg_match("#^vendor#", $bundleController) == 1)
            $bundles['vendor'][$filename] = $bundle;
        // sinon c'est un bundle de src
        else
            $bundles['src'][$filename] = $bundle;

    }


    // $bundles = $finder;

    // $files = $f->facade($dir,[
    //     $dir.'/var',
    //     $dir.'/web/assets',
    //     $dir.'/web/bundles'
    // ]);




// $bundles    = [];
// $controller = [];
// $command    = [];
// $listener   = [];
// $view       = [];


// foreach ($files as $key => $value) {
//     // on cherche les bundles
//     if(preg_match("#Bundle.php$#",$value) == 1){

//         $info    = pathinfo($value);
//         extract($info);

//         $dirname     = DIR_PROJECT.'/'.$app->cur().$dirname;
//         $controllers = $f->facade($dirname.'/Controller');
//         $commands    = $f->facade($dirname.'/Command');
//         $views       = $f->facade($dirname.'/Resources/views');

//         $bundle  = [
//             'dir'        => $dirname,
//             'file'       => $basename,
//             'bundle'     => $filename,
//             'controller' => $controllers,
//             'command'    => $commands,
//             'views'      => $views
//         ];

//         // si c'est un bundle de vendor
//         if(preg_match("#^/vendor#",$value) == 1)
//             $bundles['vendor'][$filename] = $bundle;
//         // sinon c'est un bundle de src
//         else
//             $bundles['src'][$filename] = $bundle;
//     }
// }

$dir_index = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
$c->setJson($dir_index, $bundles);

if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "ok list",
        'content'  => $bundles
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error list ",
        'data'     => ''
    ];
}
?>